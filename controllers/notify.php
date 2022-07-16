<?php
class Notify extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('notify/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($this->_Info[0]['id'], $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('notify/content');
    }

    function total_notify(){
        $total = $this->model->get_total_notify_unread($this->_Info[0]['id']);
        $this->view->total = $total;
        $this->view->render('notify/total_notify');
    }

    function list_notify_modal(){
        $total = $this->model->get_total_notify_unread($this->_Info[0]['id']);
        $this->view->total = $total;
        $jsonObj = $this->model->get_data_notify_modal($this->_Info[0]['id']);
        $this->view->jsonObj  = $jsonObj;
        $this->view->render('notify/list_notify_modal');
    }

    function readed(){
        $id  = $_REQUEST['id']; $data = array('readed' => 1);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $link = $this->model->get_link_notify($id);
            $jsonObj['success'] = true;
            $jsonObj['link'] = $link;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['success'] = false;
            $jsonObj['link'] = URL;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("notify/readed");
    }

    function change(){
        $data = $_REQUEST['data']; $data = base64_decode($data);
        $data = explode(",",  $data);
        foreach($data as $row){
            $data_u = array("readed" => 1);
            $this->model->updateObj($row, $data_u);
        }
        $jsonObj['msg'] = "Cập nhật dữ  liệu thành công";
        $jsonObj['success'] = true;
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("notify/change");
    }

    function del(){
        $data = $_REQUEST['data']; $data = base64_decode($data);
        $data = explode(",",  $data);
        foreach($data as $row){
            $this->model->delObj($row);
        }
        $jsonObj['msg'] = "Xóa dữ liệu thành công";
        $jsonObj['success'] = true;
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("notify/del");
    }
}
?>
