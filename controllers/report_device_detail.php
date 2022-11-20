<?php
class Report_device_detail extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_device_detail/index');
        require('layouts/footer.php');
    }

    function content(){
        $this->view->render('report_device_detail/content');
    }

    function export_xlsx(){
        
    }
}
?>