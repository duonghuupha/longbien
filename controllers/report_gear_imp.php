<?php
class Report_gear_imp extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_gear_imp/index');
        require('layouts/footer.php');
    }

    function content(){
        $this->view->render('report_gear_imp/content');
    }

    function export_xlsx(){

    }
}
?>