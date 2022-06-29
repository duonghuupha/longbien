<?php
class Qrcode_device extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
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

    function print_code(){
        $this->view->render("qrcode_device/print_code");
    }

    function print_barcode(){
        $this->view->render("qrcode_device/print_barcode");
    }
}
?>
