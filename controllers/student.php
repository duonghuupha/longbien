<?php
class Student extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('student/index');
        require('layouts/footer.php');
    }

    function content(){
        $this->view->render('student/content');
    }

    function add(){

    }

    function update(){

    }

    function del(){
        
    }
}
?>
