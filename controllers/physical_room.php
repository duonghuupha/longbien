<?php
class Physical_room extends Controller{
    function __construct(){
        parent::__construct();
    }

    function content(){
        $this->view->render('physical_room/content');
    }

    function add(){
        $title = $_REQUEST['title'];
        $data = array('title' => $title);
        $temp = 1;
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("physical_room/add");
    }

    function update(){
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $data = array('title' => $title);
        $temp = 1;
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("physical_room/update");
    }

    function del(){
        $id = $_REQUEST['id'];
        $temp = 1;
        if($temp){
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("physical_room/del");
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function form(){
        $this->view->render('physical_room/form');
    }
}
?>
