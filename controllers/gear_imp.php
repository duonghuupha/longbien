<?php
class Gear_imp extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('gear_imp/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('gear_imp/content');
    }

    function add(){
        $code = time(); $userid = $this->_Info[0]['id']; $source = $_REQUEST['source'];
        $dateimp = $this->_Convert->convertDate($_REQUEST['date_import']);
        $notes = $_REQUEST['notes']; $datadc = json_decode($_REQUEST['datadc'], true);
        $data = array("code" => $code, "date_import" => $dateimp, "user_id" => $userid, "source" => $source,
                        "notes" => $notes, "create_at" => date("Y-m-d H:i:s"));
        $temp = $this->model->addObj($data);
        if($temp){
            foreach($datadc as $row){
                $datact = array("code" => $code, "utensils_id" => $row['id'], "quantily" => $row['qty']);
                $this->model->addObj_detail($datact);
            }
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu thành không công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("gear_imp/add");
    }

    function update(){
        $code = $_REQUEST['code']; $userid = $this->_Info[0]['id']; $source = $_REQUEST['source'];
        $dateimp = $this->_Convert->convertDate($_REQUEST['date_import']); $id = $_REQUEST['id'];
        $notes = $_REQUEST['notes']; $datadc = json_decode($_REQUEST['datadc'], true);
        $data = array("date_import" => $dateimp, "user_id" => $userid, "source" => $source,
                        "notes" => $notes, "create_at" => date("Y-m-d H:i:s"));
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $this->model->delObj_detail($code);
            foreach($datadc as $row){
                $datact = array("code" => $code, "utensils_id" => $row['id'], "quantily" => $row['qty']);
                $this->model->addObj_detail($datact);
            }
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu thành không công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("gear_imp/update");
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
        $this->view->render("gear_imp/del");
    }
///////////////////////////////////////////////////////////////////////////////////////////
    function content_gear(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_utensils($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('gear_imp/content_gear');
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    function detail(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("gear_imp/detail");
    }
}
?>