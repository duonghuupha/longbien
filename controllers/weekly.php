<?php
class Weekly extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('weekly/index');
        require('layouts/footer.php');
    }

    function content_user(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_users($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('weekly/content_user');
    }

    function content(){
        $this->view->render('weekly/content');
    }

    function export_pdf(){
        $this->view->week = $_REQUEST['week'];
        $this->view->render('weekly/export_pdf');
    }
}
?>
