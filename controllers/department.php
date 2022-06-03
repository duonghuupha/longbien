<?php
class Department extends Controller{
    function __construct(){
        parent::__construct();
    }

    function content(){
        $this->view->render('department/content');
    }

    function add(){
        $title = $_REQUEST['title_department'];
        $namhocid = $_REQUEST['years_id'];
        $vatly = $_REQUEST['physical_id'];
        $data = array('title' => $title, "years_id" => $namhocid, 'physical_id' => $vatly);
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
        $this->view->render("department/add");
    }

    function update(){
        $id = $_REQUEST['id_department'];
        $title = $_REQUEST['title_department'];
        $namhocid = $_REQUEST['years_id'];
        $vatly = $_REQUEST['physical_id'];
        $data = array('title' => $title, "years_id" => $namhocid, 'physical_id' => $vatly);
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
        $this->view->render("department/update");
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
        $this->view->render("department/del");
    }
}
?>
