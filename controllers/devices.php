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
}
?>
