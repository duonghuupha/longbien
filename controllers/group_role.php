<?php
class Group_role extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('group_role/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('group_role/content');
    }

    function add(){
        $code = time(); $title = $_REQUEST['title']; $roles = base64_decode($_REQUEST['datadc']);
        $status = 0; $create_at = date("Y-m-d H:i:s");
        $data = array("code" => $code, "title" => $title, "roles" => $roles, "status" => $status, "create_at" =>  $create_at);
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
        $this->view->render('group_role/add');
    }

    function update(){
        $this->view->render('group_role/update');
    }

    function del(){
        $this->view->render('group_role/del');
    }
////////////////////////////////////////////////////////////////////////////////////////////////////
    function data_role(){
        $jsonObj = $this->model->get_data_role();
        $this->view->jsonObj = $jsonObj;
        $this->view->render('group_role/data_role');
    }
}
?>
