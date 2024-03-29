<?php
class Works_role extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('works_role/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 5;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('works_role/content');
    }

    function add(){
        $userid = $_REQUEST['user_id']; $datadc = base64_decode($_REQUEST['datadc']);
        $code = time(); $createat = date("Y-m-d H:i:s"); $status = 1;
        if($this->model->dupliObj(0, $userid) > 0){
            $jsonObj['msg'] = "Người dùng này đã được phân quyền, vui lòng cập nhật lại nếu thay đổi";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "user_id" => $userid, "works" => $datadc, "status" => $status,
                            "create_at" => $createat);
            $temp = $this->model->addObj($data);
            if($temp){
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render('works_role/add');
    }

    function update(){
        $userid = $_REQUEST['user_id']; $datadc = base64_decode($_REQUEST['datadc']);
        $id = $_REQUEST['id']; $createat = date("Y-m-d H:i:s");
        if($this->model->dupliObj($id, $userid) > 0){
            $jsonObj['msg'] = "Người dùng này đã được phân quyền, vui lòng cập nhật lại nếu thay đổi";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("user_id" => $userid, "works" => $datadc, "create_at" => $createat);
            $temp = $this->model->updateObj($id, $data);
            if($temp){
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render('works_role/update');
    }

    function del(){
        $id = $_REQUEST['id'];
        $temp = $this->model->delObj($id);
        if($temp){
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render('works_role/del');
    }

    function change(){
        $id = $_REQUEST['id']; $status = $_REQUEST['status'];
        $data = array('status' => $status);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render('works_role/change');
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    function list_user(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_users($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('works_role/list_user');
    }

    function list_user_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_users_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('works_role/list_user_page');
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    function list_roles(){
        $jsonObj = $this->model->get_all_works_group();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("works_role/list_roles");
    }
}
?>