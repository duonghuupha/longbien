<?php
class Returns extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('returns/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('returns/content');
    }
 
    function combo_department(){
        $jsonObj = $this->model->get_combo_department($this->_Year[0]['id']);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("returns/combo_department");
    }

    function combo_devices(){
        $id = $_REQUEST['physicalid'];
        $jsonObj = $this->model->get_combo_device($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("returns/combo_devices");
    }

    function add(){
        $code = time(); $physical = $_REQUEST['physical_id']; $device = $_REQUEST['device_id'];
        $device = explode(".", $device); $content = $_REQUEST['content'];
        if($this->model->dupliObj($physical, $device[0], $device[1]) == 0){
            $jsonObj['msg'] = "Thiết bị thu hồi đang chờ duyệt";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "create_at" => date("Y-m-d H:i:s"), "year_id" => $this->_Year[0]['id'],
                            "physical_id" => $physical, "device_id" =>  $device[0], 'sub_device' =>  $device[1],
                            "status" => 0, 'user_id' => $this->_Info[0]['id'], 'content' => $content);
            $temp = $this->model->addObj($data);
            if($temp){
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                $jsonObj['msg'] = "Ghi dữ liệu thành công. Yêu cầu thu hồi thiết bị đang chờ duyệt";
                $jsonObj['success'] = true;
                $this->view->jsonObj= json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Ghi dữu  liệu không thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render("returns/add");
    }

    function del(){
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
        $this->view->render("returns/del");
    }

    function detail(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info_returns($id);
        $this->view->jsonObj  = $jsonObj;
        $this->view->render("returns/detail");
    }

    function detailr(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info_returns($id);
        $this->view->jsonObj  = $jsonObj;
        $this->view->render("returns/detailr");
    }

    function approval(){
        $id = $_REQUEST['id']; $type = $_REQUEST['type'];
        if($type == 1){ // dong y duyet
            $info = $this->model->get_info($id);
            $data = array("status" => 1);
            $temp = $this->model->updateObj($id, $data);
            if($temp){
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'edit');
                $data_exp = array("status" => 2);
                $this->model->updateObj_device_export($info[0]['device_id'], $info[0]['sub_device'], $info[0]['physical_id'],$data_exp);
                $jsonObj['msg'] = "Duyệt dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Duyệt dữ liệu không thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{ // khong dong y
            $data = array("status" => 2);
            $temp = $this->model->updateObj($id, $data);
            if($temp){
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'edit');
                $jsonObj['msg'] = "Duyệt dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Duyệt dữ liệu không thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render("returns/approval");
    }

    function data_edit(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info_restore($id);
        $this->view->jsonObj = json_encode($jsonObj[0]);
        $this->view->render('returns/data_edit');
    }

    function restore(){
        $code = time();
        $physical = $_REQUEST['physicalid']; $device = $_REQUEST['deviceid'];
        $subdevice = $_REQUEST['subdevice']; $content = $_REQUEST['content_restore'];
        if($this->model->dupliObj($physical, $device, $subdevice) == 3){
            $jsonObj['msg'] = "Thiết bị đã được khôi phục không thể khôi phục lại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "create_at" => date("Y-m-d H:i:s"), "year_id" => $this->_Year[0]['id'],
                            "physical_id" => $physical, "device_id" =>  $device, 'sub_device' => $subdevice,
                            "status" => 3, 'user_id' => $this->_Info[0]['id'], 'content' => $content);
            $temp = $this->model->addObj($data);
            if($temp){
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                $jsonObj['msg'] = "Khôi phục trang thiết bị thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj= json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Khôi phục trang thiết bị không thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render("returns/restore");
    }

    function add_notify($array, $title, $link){
        foreach($array as $row){
            $this->_Log->save_notify($row, $title, $link, $this->_Info[0]['id']);
        }
    }
}
?>
