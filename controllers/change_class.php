<?php
class Change_class extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('change_class/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render("change_class/content");
    }

    function student(){
        $q = trim($_REQUEST['keyWord']);
        if($q != ''){
            $jsonObj = $this->model->get_data_student($q, $this->_Year[0]['id']);
        }else{
            $jsonObj = [];
        }
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render('change_class/student');
    }

    function add(){
        $student_id = $_REQUEST['student_id']; $classto = $_REQUEST['class_to'];
        $classcurrent = $_REQUEST['class_current_id']; $content = $_REQUEST['content'];
        $data = array("student_id" => $student_id, "year_id_from" => $this->_Year[0]['id'],
                        "department_id_from" => $classcurrent,  "year_id_to" => $this->_Year[0]['id'],
                        "department_id_to" => $classto, "create_at" => date("Y-m-d H:i:s"),
                        "content" => $content);
        $temp = $this->model->addObj($data);
        if($temp){
            // cap nhat vao bang phan lop
            $data_phanlop = array("department_id" => $classto);
            $this->model->updateObj_student($student_id, $this->_Year[0]['id'], $data_phanlop);
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj  = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj  = json_encode($jsonObj);
        }
        $this->view->render("change_class/add");
    }
}
?>