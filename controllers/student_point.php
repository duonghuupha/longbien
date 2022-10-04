<?php
class Student_point extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('student_point/index');
        require('layouts/footer.php');
    }

    function content(){
        $this->view->render('student_point/content');
    }

    function add(){
        $this->view->render('student_point/add');
    }

    function del(){
        $this->view->render('student_point/del');
    }
}
?>
