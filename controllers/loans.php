<?php
class Loans extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
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
            $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
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
                $jsonObj['msg'] = "Ghi d??? li???u th??nh c??ng, trong ???? c?? ".count($status)." thi???t b??? kh??ng m?????n ???????c do ???? thi???t b??? ch??a ???????c tr??? ho???c ???? c?? ng?????i kh??c m?????n";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Ghi d???  li???u th??nh c??ng";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Ghi d??? li???u kh??ng th??nh c??ng";
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
        // kiem tra xem da tra h???t ch??a
        if($this->model->check_return_all_device($info[0]['code']) > 0){
            // chua tra het
            $data = array("date_return" => $datereturn, "status" => 2);
        }else{
            $data = array("date_return" => $datereturn, "status" => 1);
        }
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'edit');
            $jsonObj['msg'] = "Ghi d???  li???u th??nh c??ng";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi d??? li???u kh??ng th??nh c??ng";
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
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_device($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render("loans/list_device");
    }

    function list_device_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_total_data_device($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('loans/list_device_page');
    }

    function list_user(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_users($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('loans/list_user');
    }

    function list_user_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->geet_total_Data_user($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('loans/list_user_page');
    }

    function data_edit(){
        $jsonObj = $this->model->get_info($_REQUEST['id']);
        $this->view->jsonObj = json_encode($jsonObj[0]);
        $this->view->render("loans/data_edit");
    }

    function return_quick(){
        $devicecode = explode(".", $_REQUEST['code']);
        $info = $this->model->get_detail_loans_via_device($devicecode[0], $devicecode[1]);
        $datereturn = date("Y-m-d H:i:s");
        if(count($info) > 0){
            $data_detail = array("status" => 1, "date_return" => $datereturn);
            $temp = $this->model->updateObj_detail($data_detail, $info[0]['code'], $info[0]['device_id'], $devicecode[1]);
            if($temp){
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'edit');
                if($this->model->check_return_all_device($info[0]['code']) > 0){
                    // chua tra het
                    $data = array("date_return" => $datereturn, "status" => 2);
                }else{
                    $data = array("date_return" => $datereturn, "status" => 1);
                }
                $this->model->updateObj_via_code($info[0]['code'], $data);
                $jsonObj['msg'] = "Tr??? thi???t b??? th??nh c??ng";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Tr??? thi???t b??? kh??ng th??nh c??ng. Vui l??ng th??? l???i";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Thi???t b??? ???? ???????c tr???";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("loans/return_quick");
    }

    function reserve(){
        $code = time(); $userid = $this->_Info[0]['id']; $userloan = $this->_Info[0]['id'];
        $dateloan = $this->_Convert->convertDate($_REQUEST['date_loan']);
        $datereturn = $this->_Convert->convertDate($_REQUEST['date_return']);
        $content = $_REQUEST['content']; $notes = $_REQUEST['notes'];
        $datadc = json_decode($_REQUEST['datadc'], true);
        if($dateloan > $datereturn){
            $jsonObj['msg'] = "Ng??y tr??? ph???i l???n h??n ng??y m?????n";
            $jsonObj['success'] = false;
            $this->view->jsonObj  = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "user_id" => $userid, "user_loan" =>  $userloan, "date_loan" => $dateloan,
                            "date_return" => $datereturn, "content" => $content, "notes" => $notes,
                            "status" => 3, "create_at" => date("Y-m-d H:i:s"));
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
                    $jsonObj['msg'] = "Ghi d??? li???u th??nh c??ng, trong ???? c?? ".count($status)." thi???t b??? kh??ng m?????n ???????c do ???? thi???t b??? ch??a ???????c tr??? ho???c ???? c?? ng?????i kh??c m?????n";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $jsonObj['msg'] = "Ghi d??? li???u th??nh c??ng";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }else{
                $jsonObj['msg'] = "Ghi d??? li???u kh??ng th??nh c??ng";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render("loans/reserve");
    }
}
?>
