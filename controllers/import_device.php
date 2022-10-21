<?php
class Import_device extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('import_device/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('import_device/content');
    }

    function add(){
        $code = time(); $userid = $this->_Info[0]['id']; $source = $_REQUEST['source'];
        $dateimport = $this->_Convert->convertDate($_REQUEST['date_import']);
        $notes = $_REQUEST['notes']; $datadc = json_decode($_REQUEST['datadc'], true);
        $data = array("code" => $code, "date_import" => $dateimport, "user_id" => $userid,
                        "source" => $source, "notes" => $notes, "create_at" => date("Y-m-d H:i:s"));
        $temp = $this->model->addObj($data);
        if($temp){
            foreach($datadc as $row){
                $datact = array("code" => $code, "device_id" => $row['id'], "quantily" => $row['qty']);
                $this->model->addObj_detail($datact);
            }
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("import_device/add");
    }

    function update(){
        $id = $_REQUEST['id']; $source = $_REQUEST['source']; $code = $_REQUEST['code'];
        $dateimport = $this->_Convert->convertDate($_REQUEST['date_import']); 
        $notes = $_REQUEST['notes']; $datadc = json_decode($_REQUEST['datadc'], true);
        $data = array("date_import" => $dateimport, "source" => $source, "notes" => $notes, 
                        "create_at" => date("Y-m-d H:i:s"));
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $this->model->delObj_detail($code);
            foreach($datadc as $row){
                $datact = array("code" => $code, "device_id" => $row['id'], "quantily" => $row['qty']);
                $this->model->addObj_detail($datact);
            }
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("import_device/update");
    }

    function del(){
        $id = $_REQUEST['id'];
        $temp = $this->model->delObj($id);
        if($temp){
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("import_device/del");
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function content_device(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_device($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('import_device/content_device');
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function detail(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("import_device/detail");
    }
}
?>
