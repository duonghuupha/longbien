<?php
class Gear_loans extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('gear_loans/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $name = isset($_REQUEST['name']) ? str_replace("$", " ", $_REQUEST['name']) : '';
        $title = isset($_REQUEST['title']) ? str_replace("$", " ", $_REQUEST['title']) : '';
        $dateloan = isset($_REQUEST['date_loan']) ? $this->_Convert->convertDate($_REQUEST['date_loan']) : '';
        $datereturn = isset($_REQUEST['date_return']) ? $this->_Convert->convertDate($_REQUEST['date_return']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($name, $title, $dateloan,  $datereturn, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('gear_loans/content');
    }

    function list_user(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_users($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('gear_loans/list_user');
    }

    function list_user_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_users_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('gear_loans/list_user_page');
    }

    function list_gear(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_gear($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('gear_loans/list_gear');
    }

    function list_gear_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_date_gear_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('gear_loans/list_gear_page');
    }

    function add(){
        $code = time(); $userloan = $_REQUEST['user_loan']; $userid = $this->_Info[0]['id'];
        $dateloan = date("Y-m-d H:i:s"); $datereturn = date("Y-m-d H:i:s");
        $content = $_REQUEST['content']; $notes = $_REQUEST['notes']; $datadc = json_decode($_REQUEST['datadc'], true);
        $data= array("code" => $code, "user_id" => $userid, "user_loan" => $userloan, "date_loan" => $dateloan,
                    "date_return" => $datereturn, "content" => $content, "notes" => $notes, "status" => 0,
                    "create_at" => date("Y-m-d H:i:s"));
        $temp = $this->model->addObj($data); $status = array();
        if($temp){
            foreach($datadc as $row){
                $gear = explode(".", $row['id']);
                $data_detail = array("code" => $code, "utensils_id" => $gear[0], "sub_utensils" => $row['sub_utensils'],
                                "status" => 0, "date_return" => '');
                if($this->model->dupliObj($gear[0], $gear[1]) == 0){
                    $this->model->addObj_detail($data_detail);
                }else{
                    array_push($status, 1);
                }
            }
            if(count($status) > 0){
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                $jsonObj['msg'] = "Ghi dữ liệu thành công, trong đó có ".count($status)." đồ dùng không mượn được do đã đồ dùng chưa được trả hoặc đã có người khác mượn";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                $jsonObj['msg'] = "Ghi dữ  liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("gear_loans/add");
    }

    function data_edit(){
        $jsonObj = $this->model->get_info($_REQUEST['id']);
        $this->view->jsonObj = json_encode($jsonObj[0]);
        $this->view->render("gear_loans/data_edit");
    }

    function update(){
        $id = $_REQUEST['id'];
        $datereturn = date("Y-m-d H:i:s"); $datadc = json_decode($_REQUEST['datadc'], true);
        $info = $this->model->get_info($id);
        foreach($datadc as $row){
            if($row['status'] == 1){
                $device = explode(".", $row['id']);
                $data_detail = array("status" => 1, "date_return" => $datereturn);
                $this->model->updateObj_detail($data_detail, $info[0]['code'], $device[0], $device[1]);
            }
        }
        // kiem tra xem da tra hết chưa
        if($this->model->check_return_all_utensils($info[0]['code']) > 0){
            // chua tra het
            $data = array("date_return" => $datereturn, "status" => 2);
        }else{ // tra het
            $data = array("date_return" => $datereturn, "status" => 1);
        }
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'edit');
            $jsonObj['msg'] = "Ghi dữ  liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("gear_loans/update");
    }

    function info_gear(){
        $data = $_REQUEST['data']; $data = explode(".", $data);
        if(count($data) > 1){
            $utensilscode = $data[0]; $subutensils = $data[1];
            // kiem tra xem co ton tai do dug khong
            $detail = $this->model->get_info_utensils($utensilscode);
            if(count($detail) > 0){
                // kiem tra xem do dung co kha nang muon nua khong
                if($this->model->check_utensils_loan($utensilscode, $subutensils) > 0){
                    $jsonObj['msg'] = "Đồ dùng đang cho mượn, không thể mượn tiếp";
                    $jsonObj['success']  = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $jsonObj['msg'] = "Load dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $jsonObj['id'] = $detail[0]['id'];
                    $jsonObj['code'] = $detail[0]['code'];
                    $jsonObj['title'] = $detail[0]['title'];
                    $jsonObj['sub'] = $subutensils;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }else{
                $jsonObj['msg']  = "Mã đồ dùng không chính xác";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Mã đồ dùng không chính xác";
            $jsonObj['success']= false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("gear_loans/info_gear");
    }
}
?>
