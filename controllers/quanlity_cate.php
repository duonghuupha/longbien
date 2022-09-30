<?php
class Quanlity_cate extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('quanlity_cate/index');
        require('layouts/footer.php');
    }
/////////////////////////////// giai doan //////////////////////////////////////////////////////////////////
    function content_quanlity(){
        $rows = 5;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj_quanlity($offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('quanlity_cate/content_quanlity');
    }

    function form_quanlity(){
        if(isset($_REQUEST['id'])){
            $jsonObj = $this->model->get_info_quanlity($_REQUEST['id']);
            $this->view->jsonObj = $jsonObj;
        }else{
            $this->view->jsonObj = [];
        }
        $this->view->render('quanlity_cate/form_quanlity');
    }

    function add_quanlity(){
        $title = $_REQUEST['title'];
        $data = array("title" => $title, "create_at" => date("Y-m-d H:i:s"), 'status' => 1);
        $temp = $this->model->addObj_quanlity($data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("quanlity_cate/add_quanlity");
    }

    function update_quanlity(){
        $id = $_REQUEST['id']; $title = $_REQUEST['title'];
        $data = array("title" => $title, "create_at" => date("Y-m-d H:i:s"));
        $temp = $this->model->updateObj_quanlity($id, $data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("quanlity_cate/update_quanlity");
    }

    function del_quanlity(){
        $id = $_REQUEST['id'];
        $temp = $this->model->delObj_quanlity($id);
        if($temp){
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("quanlity_cate/del_quanlity");
    }

    function change_quanlity(){
        $id = $_REQUEST['id']; $status = $_REQUEST['status'];
        $data = array('status' => $status);
        $this->model->updateObj_all_quanlity();
        $temp = $this->model->updateObj_quanlity($id, $data);
        if($temp){
            $jsonObj['msg'] = "Cập nhật dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Cập nhật dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("quanlity_cate/change_quanlity");
    }
//////////////////// tieu chuan //////////////////////////////////////////////////////////////////////////////
    function content_standard(){
        $rows = 5;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj_standard($offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('quanlity_cate/content_standard');
    }

    function add_standard(){
        $quanlity = $_REQUEST['quanlity_id']; $title = $_REQUEST['title_standard'];
        $data = array("quanlity_id" => $quanlity, "title" => $title);
        $temp = $this->model->addObj_standard($data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("quanlity_cate/add_standard");
    }

    function update_standard(){
        $id = $_REQUEST['id'];
        $quanlity = $_REQUEST['quanlity_id']; $title = $_REQUEST['title_standard'];
        $data = array("quanlity_id" => $quanlity, "title" => $title);
        $temp = $this->model->updateObj_standard($id, $data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("quanlity_cate/update_standard");
    }

    function del_standard(){
        $id = $_REQUEST['id'];
        $temp = $this->model->delObj_standard($id);
        if($temp){
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("quanlity_cate/del_standard");
    }
////////////////////////////// tieu chi////////////////////////////////////////////////////////////
    function content_criteria(){
        $rows = 5;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj_criteria($offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('quanlity_cate/content_criteria');
    }

    function add_criteria(){
        $quanlity = $_REQUEST['quanlity_id']; $standard = $_REQUEST['standard_id'];
        $title = $_REQUEST['title_criteria'];
        $data = array("quanlity_id" => $quanlity, "standard_id" => $standard, "title" => $title);
        $temp = $this->model->addObj_criteria($data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render('quanlity_cate/add_criteria');
    }

    function update_criteria(){
        $id = $_REQUEST['id'];
        $quanlity = $_REQUEST['quanlity_id']; $title = $_REQUEST['title_criteria'];
        $standard = (isset($_REQUEST['standard_id']) && $_REQUEST['standard_id'] != '') ? $_REQUEST['standard_id'] : $_REQUEST['standard_old'];
        $data = array("quanlity_id" => $quanlity, "standard_id" => $standard, "title" => $title);
        $temp = $this->model->updateObj_criteria($id, $data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render('quanlity_cate/update_criteria');
    }

    function del_criteria(){
        $id = $_REQUEST['id'];
        $temp = $this->model->delObj_criteria($id);
        if($temp){
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render('quanlity_cate/del_criteria');
    }
/////////////////////////////// phan quyen tieu chi///////////////////////////////////////////
    
}
?>
