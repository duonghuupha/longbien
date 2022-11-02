<?php
class Repair extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('repair/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $date = isset($_REQUEST['date']) ? $this->_Convert->convertDate($_REQUEST['date']) : '';
        $agency = isset($_REQUEST['agency']) ? str_replace("$", " ", $_REQUEST['agency']) : '';
        $device = isset($_REQUEST['device']) ? str_replace("$", " ", $_REQUEST['device']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($date, $agency, $device, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('repair/content');
    }

    function add(){
        $code = time(); $date = $this->_Convert->convertDate($_REQUEST['date_repair']);
        $agency = $_REQUEST['agency']; $file = $this->_Convert->convert_file($_FILES['file']['name'], 'repair');
        $datadc = json_decode($_REQUEST['datadc'], true);
        $data = array("code" => $code, "date_repair" => $date, "agency" => $agency, "file_bb" => $file,
                        "user_id" => $this->_Info[0]['id'], "create_at" => date("Y-m-d H:i:s"));
        $temp = $this->model->addObj($data);
        if($temp){
            if(move_uploaded_file($_FILES['file']['tmp_name'], DIR_UPLOAD.'/assets/repair/'.$file)){
                foreach($datadc as $row){
                    $datact = array("code" => $code, "device_id" => $row['id'], 'sub_device' => $row['sub'],
                                "content_error" => $row['error'], "content_repair" => $row['fixed']);
                    $this->model->addObj_detail($datact);
                }
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Thông tin ngày thực hiện và đơn vị thực hiện đã được lưu, Quá trình tải file bị lỗi";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("repair/add");
    }

    function update(){
        $code = $_REQUEST['code']; $date = $this->_Convert->convertDate($_REQUEST['date_repair']);
        $agency = $_REQUEST['agency']; $datadc = json_decode($_REQUEST['datadc'], true); 
        $id = $_REQUEST['id'];
        $file = ($_FILES['file']['name']  != '') ? $this->_Convert->convert_file($_FILES['file']['name'], 'repair') : $_REQUEST['file_old'];
        $data = array("date_repair" => $date, "agency" => $agency, "file_bb" => $file,
                        "user_id" => $this->_Info[0]['id'], "create_at" => date("Y-m-d H:i:s"));
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $this->model->delObj_detail($code);
            if($_FILES['file']['name'] != ''){
                if(move_uploaded_file($_FILES['file']['tmp_name'], DIR_UPLOAD.'/assets/repair/'.$file)){
                    foreach($datadc as $row){
                        $datact = array("code" => $code, "device_id" => $row['id'], 'sub_device' => $row['sub'],
                                    "content_error" => $row['error'], "content_repair" => $row['fixed']);
                        $this->model->addObj_detail($datact);
                    }
                    $jsonObj['msg'] = "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $jsonObj['msg'] = "Thông tin ngày thực hiện và đơn vị thực hiện đã được lưu, Quá trình tải file bị lỗi";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }else{
                foreach($datadc as $row){
                        $datact = array("code" => $code, "device_id" => $row['id'], 'sub_device' => $row['sub'],
                                    "content_error" => $row['error'], "content_repair" => $row['fixed']);
                        $this->model->addObj_detail($datact);
                    }
                    $jsonObj['msg'] = "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("repair/update");
    }

    function del(){
        $id = $_REQUEST['id'];
        $temp = $this->model->delObj($id);
        if($temp){
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj  = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj  = json_encode($jsonObj);
        }
        $this->view->render("repair/del");
    }

    function data_edit(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = json_encode($jsonObj[0]);
        $this->view->render("repair/data_edit");
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function list_device(){
        $rows = 10; $id = $_REQUEST['id'];
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_device_dep($keyword, $id, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('repair/list_device');
    }
}
?>
