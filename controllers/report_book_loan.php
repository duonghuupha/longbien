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
        $this->view->render('report_book_loan/content');
    }

    function export_xlsx(){

    }
}
?>