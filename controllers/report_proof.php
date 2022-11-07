<?php
class Report_proof extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_proof/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $quanlity = isset($_REQUEST['quan']) ? $_REQUEST['quan'] : '';
        $standard = isset($_REQUEST['stand']) ? $_REQUEST['stand'] : '';
        $criteria = isset($_REQUEST['criteria']) ? $_REQUEST['criteria'] : '';
        $code = isset($_REQUEST['code']) ? str_replace("$", " ", $_REQUEST['code']) : '';
        $title = isset($_REQUEST['title']) ? str_replace("$", " ", $_REQUEST['title']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($quanlity, $standard, $criteria, $code, $title, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('report_proof/content');
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function qrcode(){
        $this->view->render("report_proof/qrcode");
    }

    function combo_quan(){
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $jsonObj = $this->model->get_data_combo_quanlity($keyword);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("report_proof/combo_quan");
    }

    function combo_stand(){
        $id = $_REQUEST['id'];
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $jsonObj = $this->model->get_data_combo_standard($keyword, $id);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("report_proof/combo_stand");
    }

    function combo_criteria(){
        $id = $_REQUEST['id'];
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $jsonObj = $this->model->get_data_combo_criteria($keyword, $id);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("report_proof/combo_criteria");
    }
//////////////////////////////////////////////////////////////////////////////////////////////////
    function print_proof(){
        $quanlity = isset($_REQUEST['quan']) ? $_REQUEST['quan'] : '';
        $standard = isset($_REQUEST['stand']) ? $_REQUEST['stand'] : '';
        $criteria = isset($_REQUEST['criteria']) ? $_REQUEST['criteria'] : '';
        $code = isset($_REQUEST['code']) ? str_replace("$", " ", $_REQUEST['code']) : '';
        $title = isset($_REQUEST['title']) ? str_replace("$", " ", $_REQUEST['title']) : '';
        $jsonObj = $this->model->getFetObj_export($quanlity, $standard, $criteria, $code, $title);
        $this->view->jsonObj = $jsonObj;
        $this->view->render('report_proof/print_proof');
    }
}
?>