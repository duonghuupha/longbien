<?php
class Report_gear extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_gear/index');
        require('layouts/footer.php');
    }

    function content(){
        $this->view->render('report_gear/content');
    }

    function export_xlsx(){
        
    }
}
?>