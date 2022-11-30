<?php
class Report_device_detail extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_device_detail/index');
        require('layouts/footer.php');
    }

    function content(){
        $this->view->render('report_device_detail/content');
    }

    function export_xlsx(){
        
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    function list_device(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_device($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render("calendars/list_device");
    }
}
?>