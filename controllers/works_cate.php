<?php
class Works_cate extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('works_cate/index');
        require('layouts/footer.php');
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    function content_cate(){
        $rows = 5;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj_cate($offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('works_cate/content_cate');
    }

    function add_cate(){
        $title = $_REQUEST['title_cate'];  $createat = date("Y-m-d H:i:s");
        $status = 1; $group = $_REQUEST['group_id'];
        $data = array("title" => $title, "create_at" => $createat, "status" => $status,
                        "group_id" => $group);
        $temp = $this->model->addObj_cate($data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("works_cate/add_cate");
    }

    function update_cate(){
        $title = $_REQUEST['title_cate'];  $createat = date("Y-m-d H:i:s");
        $status = 1; $id = $_REQUEST['id']; $group = $_REQUEST['group_id'];
        $data = array("title" => $title, "create_at" => $createat, "group_id" => $group);
        $temp = $this->model->updateObj_cate($id, $data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("works_cate/update_cate");
    }

    function del_cate(){
        $id = $_REQUEST['id'];
        $temp = $this->model->delObj_cate($id);
        if($temp){
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("works_cate/del_cate");
    }

    function change_cate(){
        $id = $_REQUEST['id']; $status = $_REQUEST['status'];
        $data = array("status" => $status);
        $temp = $this->model->updateObj_cate($id, $data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("works_cate/change_cate");
    }
//////////////////////////////////////////////////////////////////////////////////////////////////
    function content_group(){
        $rows = 5;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj_group($offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('works_cate/content_group');
    }

    function add_group(){
        $title = $_REQUEST['title_group'];  $createat = date("Y-m-d H:i:s");
        $status = 1; 
        $data = array("title" => $title, "create_at" => $createat, "status" => $status);
        $temp = $this->model->addObj_group($data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("works_cate/add_group");
    }

    function update_group(){
        $title = $_REQUEST['title_group'];  $createat = date("Y-m-d H:i:s");
        $status = 1; $id = $_REQUEST['id'];
        $data = array("title" => $title, "create_at" => $createat);
        $temp = $this->model->updateObj_group($id, $data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("works_cate/update_group");
    }

    function del_group(){
        $id = $_REQUEST['id'];
        $temp = $this->model->delObj_group($id);
        if($temp){
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("works_cate/del_group");
    }

    function change_group(){
        $id = $_REQUEST['id']; $status = $_REQUEST['status'];
        $data = array("status" => $status);
        $temp = $this->model->updateObj_group($id, $data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("works_cate/change_group");
    }
}
?>