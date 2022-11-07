<?php
class Report_works extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_works/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 5;
        $group = isset($_REQUEST['group']) ? $_REQUEST['group'] : '';
        $cate = (isset($_REQUEST['cate']) && $_REQUEST['cate']  != 'null') ? $_REQUEST['cate'] : '';
        $title = isset($_REQUEST['title']) ? str_replace("$", " ", $_REQUEST['title']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($group, $cate, $title, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('report_works/content');
    }

    function print_works(){
        $group = isset($_REQUEST['group']) ? $_REQUEST['group'] : '';
        $cate = (isset($_REQUEST['cate']) && $_REQUEST['cate']  != 'null') ? $_REQUEST['cate'] : '';
        $title = isset($_REQUEST['title']) ? str_replace("$", " ", $_REQUEST['title']) : '';
        $jsonObj = $this->model->getFetObj_export($group, $cate, $title);
        $this->view->jsonObj = $jsonObj;
        $this->view->render('report_works/print_works');
    }

    function qrcode(){
        $this->view->render('report_works/qrcode');
    }
}
?>
