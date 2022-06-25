<?php
class Change_device extends Controller{
    private $_Convert;
    private $_Data;
    private $_Year;
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
        $this->_Year = $_SESSION['year'];
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
        $jsonObj = $this->model->get_data_device($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render('change_device/list_device');
    }

    function add(){
        $yearid = $this->_Year[0]['id'];
        $physical_from = $_REQUEST['physical_from_id']; $physical_to = $_REQUEST['physical_to_id'];
        $device= $_REQUEST['device_id']; $device = explode(".", $device);
        $code = time();
        $data = array("code" => $code, "year_id" => $yearid, "physical_from_id" => $physical_from,
                        "physical_to_id" => $physical_to, "device_id" => $device[0], "sub_device" => $device[1],
                        "create_at" => date("Y-m-d H:i:s"));
        $temp = $this->model->addObj($data);
        if($temp){
            // kiem tra xem co ban ghi  phan bo cho phong chua
            if($this->model->check_export_device_physical($physical_to, $yearid) > 0){
                // da ton tai ban ghi phan bo
                $detail = $this->model->get_info_export($physical_to);
                $data_detail = array("code" => $detail[0]['code'], "device_id"  => $detail[0]['device_id'],
                                "sub_device" => $detail[0]['sub_device'], "status" => 0);
                $tmp = $this->model->addObj_export_detail($data_detail);
                if($tmp){
                    $datau = array("status" => 1);
                    $this->model->updateObj_export_detail($physical_from, $datau, $device[0], $device[1]);
                    $jsonObj['msg']  = "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj= json_encode($jsonObj);
                }else{
                    $jsonObj['msg']  = "Ghi dữ liệu không thành công";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj= json_encode($jsonObj);
                }
            }else{
                // chua ton tai ban ghi phan bo
                $data_global = array("code" => $code, "year_id" => $yearid, "physical_id" =>$physical_to,
                                        "create_at" => date("Y-m-d H:i:s"));
                $tmp = $this->model->addObj_export($data_global);
                if($tmp){
                    $data_detail = array("code" => $code, "device_id" => $device[0], "sub_device" => $device[1],
                                        "status" => 0);
                    $this->model->addObj_export_detail($data_detail);
                    $datau = array("status" => 1);
                    $this->model->updateObj_export_detail($physical_from, $datau, $device[0], $device[1]);
                    $jsonObj['msg']  = "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj= json_encode($jsonObj);
                }else{
                    $jsonObj['msg']  = "Ghi dữ liệu không thành công";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj= json_encode($jsonObj);
                }
            }
        }else{
            $jsonObj['msg']  = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj= json_encode($jsonObj);
        }
        $this->view->render("change_device/add");
    }
}
?>
