<?php
class Gear_code extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        unset($_SESSION['code_gear']);
        $this->view->render('gear_code/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $title = isset($_REQUEST['title']) ? str_replace("$", " ", $_REQUEST['title']) : '';
        $code = isset($_REQUEST['code']) ? $_REQUEST['code'] : '';
        $cate = isset($_REQUEST['cate']) ? $_REQUEST['cate'] : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($title, $code, $cate, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('gear_code/content');
    }

    function qrcode(){
        $this->view->render("gear_code/qrcode");
    }

    function add_code(){
        $datadc = json_decode($_REQUEST['datadc'], true);
        if(count($datadc) > 0){
            $_SESSION['code_gear'] = $datadc;
        }else{
            $_SESSION['code_gear'] = [];
        }
        $jsonObj['msg'] = "Load code thành công";
        $jsonObj['success']  = true;
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("gear_code/add_code");
    }

    function code(){
        $this->view->render("gear_code/code");
    }
}
?>
