<?php
class Gear_code extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
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

    function print_code(){
        // xoa het ban ghi tam trong folder
        $dirname = DIR_UPLOAD.'/barcode/utensils/*';
        array_map('unlink', array_filter((array) glob($dirname)));
        $this->view->render('gear_code/print_code');
    }

    function qrcode(){
        $this->view->render("lib_code/qrcode");
    }
}
?>
