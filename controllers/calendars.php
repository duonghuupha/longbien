<?php
class Calendars extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('calendars/index');
        require('layouts/footer.php');
    }

    function content(){
        $this->view->render('calendars/content');
    }

    function add(){
        $this->view->render('calendars/add');
    }

    function update(){
        $this->view->render('calendars/update');
    }

    function del(){
        $this->view->render('calendars/del');
    }
/////////////////////////////////////////////////////////////////////////////////
    function data_edit(){
        $this->view->render('calendars/data_edit');
    }
}
?>
