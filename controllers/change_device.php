<?php
class Change_device extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('change_device/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('change_device/content');
    }

    function list_device(){
        $id = $_REQUEST['id'];
        $keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : '';
        $jsonObj = $this->model->get_data_device($id, $keyword);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render('change_device/list_device');
    }

    function add(){
        $yearid = $this->_Year[0]['id'];
        $physical_from = $_REQUEST['physical_from_id']; $physical_to = $_REQUEST['physical_to_id'];
        $device= $_REQUEST['device_id']; $device = explode(".", $device); $content = $_REQUEST['content'];
        $code = time();
        $data = array("code" => $code, "year_id" => $yearid, "physical_from_id" => $physical_from,
                        "physical_to_id" => $physical_to, "device_id" => $device[0], "sub_device" => $device[1],
                        "create_at" => date("Y-m-d H:i:s"), 'status' => 0, 'content' => $content,
                        "user_id" => $this->_Info[0]['id'], 'user_app' => 0);
        $temp = $this->model->addObj($data);
        if($temp){
            $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg']  = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj= json_encode($jsonObj);
        }
        $this->view->render("change_device/add");
    }

    function detail(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("change_device/detail");
    }

    function approval(){
        $id = $_REQUEST['id']; $type = $_REQUEST['type'];
        $data = array("status" => $type, 'user_app' => $this->_Info[0]['id']);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            if($type == 1){// duyet
                $item = $this->model->get_info($id);
                // kiem tra xem co ban ghi  phan bo cho phong chua
                if($this->model->check_export_device_physical($item[0]['physical_to_id'], $this->_Year[0]['id']) > 0){ // da ton tai ban ghi phan bo
                    $detail = $this->model->get_info_export($item[0]['physical_to_id']);
                    $data_detail = array("code" => $detail[0]['code'], "device_id"  => $item[0]['device_id'],
                    "sub_device" => $item[0]['sub_device'], "status" => 0, 'create_at' => date("Y-m-d H:i:s"));
                    $tmp = $this->model->addObj_export_detail($data_detail);
                    if($tmp){
                        $datau = array("status" => 1);
                        $this->model->updateObj_export_detail($item[0]['physical_from_id'], $datau, $item[0]['device_id'], $item[0]['sub_device']);
                        $jsonObj['msg']  = "Ghi dữ liệu thành công";
                        $jsonObj['success'] = true;
                        $this->view->jsonObj= json_encode($jsonObj);
                    }else{
                        $jsonObj['msg']  = "Ghi dữ liệu không thành công";
                        $jsonObj['success'] = false;
                        $this->view->jsonObj= json_encode($jsonObj);
                    }
                }else{ // chua ton tai ban ghi phan bo
                    $data_global = array("code" => $item[0]['code'], "year_id" => $this->_Year[0]['id'], "physical_id" => $item[0]['physical_to_id'],
                                        "create_at" => date("Y-m-d H:i:s"));
                    $tmp = $this->model->addObj_export($data_global);
                    if($tmp){
                        $data_detail = array("code" => $item[0]['code'], "device_id" => $item[0]['device_id'], "sub_device" => $item[0]['sub_device'],
                                            "status" => 0, 'create_at' => date("Y-m-d H:i:s"));
                        $this->model->addObj_export_detail($data_detail);
                        $datau = array("status" => 1);
                        $this->model->updateObj_export_detail($item[0]['physical_from_id'], $datau, $item[0]['device_id'], $item[0]['sub_device']);
                        $jsonObj['msg']  = "Ghi dữ liệu thành công";
                        $jsonObj['success'] = true;
                        $this->view->jsonObj= json_encode($jsonObj);
                    }else{
                        $jsonObj['msg']  = "Ghi dữ liệu không thành công";
                        $jsonObj['success'] = false;
                        $this->view->jsonObj= json_encode($jsonObj);
                    }
                }
            }else{ // khong duyet
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("change_device/approval");
    }
}
?>
