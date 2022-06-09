<?php
class Devices extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('devices/index');
        require('layouts/footer.php');
    }

    function content(){
        $this->view->render('devices/content');
    }

    function add(){

    }

    function update(){

    }

    function del(){
        
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    function form_info(){
        $this->view->render('devices/form_info');
    }

    function import(){
        require('layouts/header.php');
        $this->view->render('devices/import');
        require('layouts/footer.php');
    }

    function content_tmp(){
        $this->view->render('devices/content_tmp');
    }
}
?>
