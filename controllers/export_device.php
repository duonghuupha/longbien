<?php
class Export_device extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('export_device/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('export_device/content');
    }

    function combo_devices(){
        $keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : '';
        $jsonObj = $this->model->get_combo_device($keyword);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("export_device/combo_devices");
    }

    function combo_sub_device(){
        $jsonObj = $this->model->get_info_device($_REQUEST['id']);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("export_device/combo_sub_device");
    }

    function list_device(){
        $this->view->render("export_device/list_device");
    }

    function add(){
        $code = time(); $yearid = $this->_Year[0]['id']; $physical = $_REQUEST['physical_id'];
        $device = $_REQUEST['device_selected'];
        if($this->model->dupliObj(0, $physical) > 0){
            $jsonObj['msg'] = "Phòng này đã được phân bổ trang thiết bị, vui lòng cập nhật lại nếu có thay đổi";
            $jsonObj['success'] =  false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "year_id" => $yearid, "physical_id" => $physical,
                            "create_at" => date("Y-m-d H:i:s"));
            $temp = $this->model->addObj($data);
            if($temp){
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                $device = base64_decode($device); $device = explode(",", $device);
                foreach($device as $row){
                    $value = explode(".", $row);
                    $data_detail = array("code" => $code,  "device_id" =>$value[0], "sub_device" => $value[1], "status" => 0, 
                                        'create_at' => date("Y-m-d H:i:s"));
                    $this->model->addObj_detail($data_detail);
                }
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render("export_device/add");
    }

    function update(){
        $id = $_REQUEST['id'];
        $code = $_REQUEST['code']; $yearid = $this->_Year[0]['id']; $physical = $_REQUEST['physical_id'];
        $device = $_REQUEST['device_selected'];
        if($this->model->dupliObj($id, $physical) > 0){
            $jsonObj['msg'] = "Phòng này đã được phân bổ trang thiết bị, vui lòng cập nhật lại nếu có thay đổi";
            $jsonObj['success'] =  false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("year_id" => $yearid, "physical_id" => $physical,
                            "create_at" => date("Y-m-d H:i:s"));
            $temp = $this->model->updateObj($id, $data);
            if($temp){
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'edit');
                $this->model->delObj_detail($code); // xoa ban ghi cu
                $device = base64_decode($device); $device = explode(",", $device);
                foreach($device as $row){
                    $value = explode(".", $row);
                    $data_detail = array("code" => $code,  "device_id" =>$value[0], "sub_device" => $value[1], "status" => 0,
                                            'create_at' => date("Y-m-d H:i:s"));
                    $this->model->addObj_detail($data_detail);
                }
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render("export_device/update");
    }

    function  del(){
        $id = $_REQUEST['id'];
        $temp = $this->model->delObj($id);
        if($temp){
            $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'del');
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("export_device/del");
    }
/////////////////////////////////////////////////////////////////////////////////////////
    function data_edit(){
        $id = $_REQUEST['id'];
        $result = $this->model->get_list_device_export($id);
        foreach($result as $row){
            $jsonObj[] = $row['device_id'].'.'.$row['sub_device'];
        }
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("export_device/data_edit");
    }

    function detail(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info_export($id);
        $this->view->jsonObj = $jsonObj;
        $detail = $this->model->get_detail_export_device($jsonObj[0]['code']);
        $this->view->detail = $detail;
        $this->view->render("export_device/detail");
    }
/////////////////////////////////////////////////////////////////////////////////////////////
    function content_device_all(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_data_device_pass_id($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("/export_device/content_device_all");
    }

    function update_all(){
        $id = $_REQUEST['iddevice']; $datadc = json_decode($_REQUEST['datadc_all'], true);
        $detail = $this->model->get_info_export($id); $iddevice = $_REQUEST['device_all_id'];
        foreach($datadc as $row){
            $data = array("code" => $detail[0]['code'], "device_id" => $iddevice, "sub_device" => $row,
                            "create_at" => date("Y-m-d H:i:s"), "status" => 0);
            $this->model->addObj_detail($data);
        }
        $jsonObj['msg'] = "Ghi dữ liệu thành công";
        $jsonObj['success'] = true;
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("export_device/update_all");
    }
}
?>
