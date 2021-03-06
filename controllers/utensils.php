<?php
class Utensils extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function content(){
        $rows = 5;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('utensils/content');
    }

    function add(){
        $title = $_REQUEST['title'];
        $data = array('title' => $title, "user_id" => $this->_Info[0]['id'], "status" => 0,
                        "create_at" => date("Y-m-d H:i:s"));
        $temp = $this->model->addObj($data);
        if($temp){
            $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("utensils/add");
    }

    function update(){
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $data = array('title' => $title, "user_id" => $this->_Info[0]['id'], "create_at" => date("Y-m0d H:i:s"));
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'edit');
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("utensils/update");
    }

    function del(){
        $id = $_REQUEST['id']; $data = array("status" => 1);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'del');
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("utensils/del");
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function form(){
        if(isset($_REQUEST['id'])){
            $jsonObj = $this->model->get_info($_REQUEST['id']);
            $this->view->jsonObj = $jsonObj;
        }else{
            $this->view->jsonObj = [];
        }
        $this->view->render('utensils/form');
    }
}
?>
