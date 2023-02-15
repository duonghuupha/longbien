<?php
class Cate_book extends Controller{
    function __construct(){
        parent::__construct();
    }

    function content(){
        $jsonObj = $this->model->getFetObj();
        $this->view->jsonObj = $jsonObj;
        $this->view->render('cate_book/content');
    }

    function add(){
        $parentid = isset($_REQUEST['parent_id']) ? $_REQUEST['parent_id'] : 0;
        $title = $_REQUEST['title'];
        $data = array('title' => $title, "user_id" => $this->_Info[0]['id'],
                        "create_at" => date("Y-m-d H:i:s"), "status" => 0, 'parent_id' => $parentid);
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
        $this->view->render("cate_book/add");
    }

    function update(){
        $parentid = isset($_REQUEST['parent_id']) ? $_REQUEST['parent_id'] : 0;
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $data = array('title' => $title, "user_id" => $this->_Info[0]['id'],
                        "create_at" => date("Y-m-d H:i:s"), 'parent_id' => $parentid);
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
        $this->view->render("cate_book/update");
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
        $this->view->render("cate_book/del");
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function form(){
        if(isset($_REQUEST['id'])){
            $jsonObj = $this->model->get_info($_REQUEST['id']);
            $this->view->jsonObj = $jsonObj;
        }else{
            $this->view->jsonObj = [];
        }
        $this->view->render('cate_book/form');
    }
}
?>
