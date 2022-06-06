<?php
class Personal extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('personal/index');
        require('layouts/footer.php');
    }

    function content(){
        $this->view->render('personal/content');
    }

    function add(){

    }

    function update(){

    }

    function del(){
        
    }
}
?>
