<?php
class Report_device_return extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_device_return/index');
        require('layouts/footer.php');
    }

    function content(){
        $this->view->render('report_device_return/content');
    }

    function export_xlsx(){
        
    }
}
?>