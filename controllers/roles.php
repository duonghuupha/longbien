<?php
class Roles extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('roles/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('roles/content');
    }

    function add(){
        $title = $_REQUEST['title']; $link = $_REQUEST['link'];
        $function = isset($_REQUEST['functions']) ? implode(",", $_REQUEST['functions']) : '';
        $parent = isset($_REQUEST['parent_id']) ? $_REQUEST['parent_id'] : 0;
        $data = array("title" => $title, "link" => $link, "functions" => $function, "parent_id" => $parent);
        $temp = $this->model->addObj($data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ  liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ  liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render('roles/add');
    }

    function update(){
        $title = $_REQUEST['title']; $link = $_REQUEST['link']; $id = $_REQUEST['id'];
        $function = isset($_REQUEST['functions']) ? implode(",", $_REQUEST['functions']) : '';
        $parent = isset($_REQUEST['parent_id']) ? $_REQUEST['parent_id'] : 0;
        $data = array("title" => $title, "link" => $link, "functions" => $function,"parent_id" => $parent);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ  liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ  liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render('roles/update');
    }

    function del(){
        $id = $_REQUEST['id'];
        $temp = $this->model->delObj($id);
        if($temp){
            $jsonObj['msg'] = "Xóa dữ  liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ  liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render('roles/del');
    }
/////////////////////////////////////////////////////////////////////////////////
    function combo_link(){
        $this->view->render('roles/combo_link');
    }

    function combo_menu(){
        $jsonObj = $this->model->get_data_parent();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("roles/combo_menu");
    }
}
?>
