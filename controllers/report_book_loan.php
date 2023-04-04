<?php
class Report_book_loan extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_book_loan/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $tungay = $this->_Convert->convertDate($_REQUEST['tungay']);
        $denngay = $this->_Convert->convertDate($_REQUEST['denngay']);
        $cate = $_REQUEST['cate']; $manu = $_REQUEST['manu']; $title = $_REQUEST['title'];
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_total_content_book($tungay, $denngay, $cate, $manu, $title, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('report_book_loan/content');
    }

    function export_xlsx(){

    }
}
?>