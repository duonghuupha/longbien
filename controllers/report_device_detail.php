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
        $id = $_REQUEST['id']; $id = explode(".", $id);
        $device_id = $id[0]; $sub_device = $id[1];

        $info = $this->model->get_info_device($device_id);
        $this->view->info = $info;
        $export = $this->model->get_info_export_detail($device_id, $sub_device);
        $this->view->export = $export;
        $change = $this->model->get_info_change_device($device_id, $sub_device);
        $this->view->change = $change;
        $repair = $this->model->get_info_repair_device($device_id, $sub_device);
        $this->view->repair = $repair;
        $loan = $this->model->get_info_loan_device($device_id, $sub_device);
        $this->view->loan = $loan;
        $return = $this->model->get_info_return_device($device_id, $sub_device);
        $this->view->return = $return;

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
        $this->view->render("report_device_detail/list_device");
    }

    function combo_department(){
        $jsonObj = $this->model->get_combo_department($this->_Year[0]['id']);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("report_device_detail/combo_department");
    }

    function combo_devices(){
        $id = $_REQUEST['physicalid'];
        $jsonObj = $this->model->get_combo_device($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("report_device_detail/combo_devices");
    }

}
?>