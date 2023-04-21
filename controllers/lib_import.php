<?php
class Lib_import extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('lib_import/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_import/content');
    }

    function add(){
        $code = time(); $dateimport = $this->_Convert->convertDate($_REQUEST['date_import']);
        $source = $_REQUEST['source']; $notes = $_REQUEST['notes']; $userid = $this->_Info[0]['id'];
        $datadc = json_decode($_REQUEST['datadc'], true); $codeimport = $_REQUEST['code_import'];
        $type_price = $_REQUEST['type_price'];
        $data = array("code" => $code, "date_import" => $dateimport, "source"=>$source, "user_id"=> $userid,
                        "notes" => $notes, "create_at" => date("Y-m-d H:i:s"), "code_import" => $codeimport,
                        "type_price" => $type_price);
        $temp = $this->model->addObj($data);
        if($temp){
            foreach($datadc as $row){
                $data_c = array("code" => $code, "book_id" => $row['id'], "quanlity" => $row['qty']);
                $this->model->addObj_detail($data_c);
            }
            $jsonObj['msg'] = 'Ghi dữ liệu thành công';
            $jsonObj['success']= true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = 'Ghi dữ liệu không thành công';
            $jsonObj['success']= false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("lib_import/add");
    }

    function update(){
        $id= $_REQUEST['id'];
        $code = $_REQUEST['code']; $dateimport = $this->_Convert->convertDate($_REQUEST['date_import']);
        $source = $_REQUEST['source']; $notes = $_REQUEST['notes']; $userid = $this->_Info[0]['id'];
        $datadc = json_decode($_REQUEST['datadc'], true); $codeimport = $_REQUEST['code_import'];
        $type_price = $_REQUEST['type_price'];
        $data = array("date_import" => $dateimport, "source"=>$source, "user_id"=> $userid,
                        "notes" => $notes, "create_at" => date("Y-m-d H:i:s"), "code_import" => $codeimport,
                        "type_price" => $type_price);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $this->model->delObj_detail($code);
            foreach($datadc as $row){
                $data_c = array("code" => $code, "book_id" => $row['id'], "quanlity" => $row['qty']);
                $this->model->addObj_detail($data_c);
            }
            $jsonObj['msg'] = 'Ghi dữ liệu thành công';
            $jsonObj['success']= true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = 'Ghi dữ liệu không thành công';
            $jsonObj['success']= false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("lib_import/update");
    }

    function del(){
        $id = $_REQUEST['id'];
        $temp = $this->model->delObj($id);
        if($temp){
            $jsonObj['msg'] = 'Xóa dữ liệu thành công';
            $jsonObj['success']= true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = 'Xóa dữ liệu không thành công';
            $jsonObj['success']= false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("lib_import/del");
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function list_library(){
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $rows = 15;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_book($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_import/list_library');
    }

    function detail(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("lib_import/detail");
    }
}
?>