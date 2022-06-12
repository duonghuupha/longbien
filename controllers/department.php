<?php
class Department extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('department/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('department/content');
    }

    function add(){
        $title = $_REQUEST['title'];
        $namhocid = $_REQUEST['year_id'];
        $vatly = $_REQUEST['physical_id'];
        $data = array('title' => $title, "year_id" => $namhocid, 'physical_id' => $vatly);
        if($this->model->check_exit(0, $namhocid, $vatly) > 0){
            $jsonObj['msg'] = "Phòng 'vật lý' này trong năm học này đã được sắp xếp";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
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
        $this->view->render("department/add");
    }

    function update(){
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $namhocid = $_REQUEST['year_id'];
        $vatly = $_REQUEST['physical_id'];
        $data = array('title' => $title, "year_id" => $namhocid, 'physical_id' => $vatly);
        if($this->model->check_exit($id, $namhocid, $vatly) > 0){
            $jsonObj['msg'] = "Phòng 'vật lý' này trong năm học này đã được sắp xếp";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
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
        $this->view->render("department/update");
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
        $this->view->render("department/del");
    }
}
?>
