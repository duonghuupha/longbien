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
        $data = array("title" => $title, "create_at" => date("Y-m-d H:i:s"));
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
//////////////////// tieu chuan //////////////////////////////////////////////////////////////////////////////
}
?>
