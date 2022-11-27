<?php
class Report extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');

        $menu = $this->model->get_info_menu_report($this->_Url[0]);
        $jsonObj = $this->model->get_report_user($this->_Info[0]['id'], $menu[0]['id']);
        $this->view->jsonObj = $jsonObj;

        $this->view->render('report/index');
        require('layouts/footer.php');
    }
}
?>