<?php
class Report extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report/index');
        require('layouts/footer.php');
    }
}
?>