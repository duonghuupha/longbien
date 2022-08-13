<?php
class Student_change extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('student_change/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $year = isset($_REQUEST['year']) ? $_REQUEST['year'] : '';
        $gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : 0;
        $fullname = isset($_REQUEST['fullname']) ? str_replace("$", " ", $_REQUEST['fullname']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($fullname, $year, $gender, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('student_change/content');
    }
}
?>
