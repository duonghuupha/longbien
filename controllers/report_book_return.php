<?php
class Report_book_return extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_book_return/index');
        require('layouts/footer.php');
    }

    function content(){
        $this->view->render('report_book_return/content');
    }

    function export_xlsx(){

    }
}
?>