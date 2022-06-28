<?php
class Loans extends Controller{
    private $_Convert;
    private $_Data;
    private $_Year;
    private $_Info;
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
        $this->_Convert = new Convert();
        $this->_Data = new Model();
        $this->_Info = $_SESSION['data'];
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('loans/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('loans/content');
    }

    function add(){
        $code = time(); $userid = $this->_Info[0]['id']; $userloan = $_REQUEST['user_loan'];
        $dateloan = date("Y-m-d H:i:s"); $datereturn = date("Y-m-d H:i:s");
        $content = $_REQUEST['content']; $notes = $_REQUEST['notes'];
        $datadc = json_decode($_REQUEST['datadc'], true);
        $data = array("code" => $code, "user_id" => $userid, "user_loan" =>  $userloan, "date_loan" => $dateloan,
                        "date_return" => $datereturn, "content" => $content, "notes" => $notes,
                        "status" => 0, "create_at" => date("Y-m-d H:i:s"));
        $temp = $this->model->addObj($data);
        if($temp){
            $status = array();
            foreach($datadc as $row){
                $device = explode(".", $row['id']);
                $data_detail = array("code" => $code, "device_id" => $device[0], "sub_device" =>  $device[1],
                                    "status" => 0, "date_return" => $datereturn);
                if($this->model->dupliObj($device[0], $device[1]) == 0){
                    $this->model->addObj_detail($data_detail);
                }else{
                    array_push($status, 1);
                }
            }
            if(count($status) > 0){
                $jsonObj['msg'] = "Ghi dữ liệu thành công, trong đó có ".count($status)." thiết bị không mượn được do đã thiết bị chưa được trả hoặc đã có người khác mượn";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Ghi dữ  liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("loans/add");
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
        if($this->model->check_return_all_device($info[0]['code']) > 0){
            // chua tra het
            $data = array("date_return" => $datereturn, "status" => 2);
        }else{
            $data = array("date_return" => $datereturn, "status" => 1);
        }
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ  liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("loans/update");
    }

    function del(){
        $this->view->render("loans/del");
    }
///////////////////////////////////////////////////////////////////////////////////////////////
    function list_device(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_device($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render("loans/list_device");
    }

    function list_users(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_users($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render("loans/list_users");
    }

    function data_edit(){
        $jsonObj = $this->model->get_info($_REQUEST['id']);
        $this->view->jsonObj = json_encode($jsonObj[0]);
        $this->view->render("loans/data_edit");
    }
}
?>
