<?php
class Lib_code extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        unset($_SESSION['code_cate']); unset($_SESSION['code_manu']); unset($_SESSION['code_lib']);
        $this->view->render('lib_code/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_code/content');
    }

    function add_code(){
        $datadc = json_decode($_REQUEST['datadc'], true);
        if(count($datadc) > 0){
            $_SESSION['code_lib'] = $datadc;
        }else{
            $_SESSION['code_lib'] = [];
        }
        $jsonObj['msg'] = "Load code thành công";
        $jsonObj['success']  = true;
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("lib_code/add_code");
    }

    function code(){
        $this->view->render("lib_code/code");
    }

    function qrcode(){
        $this->view->render("lib_code/qrcode");
    }
/////////////////////////////////////////////////////////////////////////////////////////////
    function add_code_cate(){
        $datadc = json_decode($_REQUEST['data_cate'], true);
        if(count($datadc) > 0){
            $_SESSION['code_cate'] = $datadc;
        }else{
            $_SESSION['code_cate'] = [];
        }
        $jsonObj['msg'] = "Load code thành công";
        $jsonObj['success']  = true;
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("lib_code/add_code_cate");
    }

    function code_cate(){
        $array_id = implode(",", $_SESSION['code_cate']);
        $jsonObj = $this->model->get_book_via_cate_id($array_id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("lib_code/code_cate");
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    function add_code_manu(){
        $datadc = json_decode($_REQUEST['data_manu'], true);
        if(count($datadc) > 0){
            $_SESSION['code_manu'] = $datadc;
        }else{
            $_SESSION['code_manu'] = [];
        }
        $jsonObj['msg'] = "Load code thành công";
        $jsonObj['success']  = true;
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("lib_code/add_code_manu");
    }

    function code_manu(){
        $array_id = implode(",", $_SESSION['code_manu']);
        $jsonObj = $this->model->get_book_via_manu_id($array_id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("lib_code/code_manu");
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    function list_cate(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_cate($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_code/list_cate');
    }

    function list_cate_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_cate_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_code/list_cate_page');
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    function list_manu(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_manu($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_code/list_manu');
    }

    function list_manu_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_manu_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_code/list_manu_page');
    }
}
?>
