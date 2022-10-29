<?php
class Qrcode_device extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        unset($_SESSION['code_dep']);  unset($_SESSION['code']);
        $this->view->render('qrcode_device/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('qrcode_device/content');
    }

    function qrcode(){
        $this->view->render("qrcode_device/qrcode");
    }

    function add_code(){
        $datadc = json_decode($_REQUEST['datadc'], true);
        if(count($datadc) > 0){
            $_SESSION['code'] = $datadc;
        }else{
            $_SESSION['code'] = [];
        }
        $jsonObj['msg'] = "Load code thành công";
        $jsonObj['success']  = true;
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("qrcode_device/add_code");
    }

    function code(){
        $this->view->render("qrcode_device/code");
    }

    function add_code_dep(){
        $datadc = json_decode($_REQUEST['datadc_dep'], true);
        if(count($datadc) > 0){
            $_SESSION['code_dep'] = $datadc;
        }else{
            $_SESSION['code_dep'] = [];
        }
        $jsonObj['msg'] = "Load code thành công";
        $jsonObj['success']  = true;
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("qrcode_device/add_code_dep");
    }

    function code_dep(){
        $this->view->render("qrcode_device/code_dep");
    }
///////////////////////////////////////////////////////////////////////////////////////////////
    function content_dep(){
        $id = $_REQUEST['id']; 
        if($id != ''){
            $jsonObj = $this->model->get_device_by_dep($id);
            $this->view->jsonObj = $jsonObj;
        }else{
            $this->view->jsonObj = [];
        }
        $this->view->render("qrcode_device/content_dep");
    }
}
?>
