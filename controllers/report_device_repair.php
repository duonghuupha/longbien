<?php
class Report_device_repair extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_device_repair/index');
        require('layouts/footer.php');
    }

    function content(){
        $this->view->render('report_device_repair/content');
    }

    function export_xlsx(){
        
    }
}
?>