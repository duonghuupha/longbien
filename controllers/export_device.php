<?php
class Export_device extends Controller{
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
        $jsonObj = $this->model->get_combo_device();
        $this->view->jsonObj = $jsonObj;
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
                $device = base64_decode($device); $device = explode(",", $device);
                foreach($device as $row){
                    $value = explode(".", $row);
                    $data_detail = array("code" => $code,  "device_id" =>$value[0], "sub_device" => $value[1], "status" => 0);
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
}
?>
