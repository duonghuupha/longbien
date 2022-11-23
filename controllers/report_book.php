<?php
class Report_book extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_book/index');
        require('layouts/footer.php');
    }

    function content(){
        $this->view->render('report_book/content');
    }

    function export_xlsx(){

    }
}
?>