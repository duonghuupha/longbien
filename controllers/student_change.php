<?php
class Student_change extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('student_change/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $year = isset($_REQUEST['year']) ? $_REQUEST['year'] : '';
        $gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : 0;
        $fullname = isset($_REQUEST['fullname']) ? str_replace("$", " ", $_REQUEST['fullname']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($fullname, $year, $gender, $this->_Year[0]['id'], $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('student_change/content');
    }

    function content_check(){
        $rows = 15; $data = $_REQUEST['data'];
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj_check($data, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('student_change/content_check');
    }

    function add(){
        $department = $_REQUEST['department_id']; $data = base64_decode($_REQUEST['data']);
        $data = explode(",", $data); $status = array();
        foreach($data as $row){
            $info_student = $this->model->get_info_student($row);
            $data_class = array("student_id" => $row, "year_id" => $this->_Year[0]['id'],
                                "department_id" => $department, "create_at" => date("Y-m-d H:i:s"));
            $temp = $this->model->addObj($data_class);
            if($temp){
                $status[] = '';
            }else{
                $status[] = $info_student[0]['code'];
            }
        }
        $success = array_filter(array_unique($status));
        if(count($success) == 0){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Các học sinh có mã ".implode(", ", $success)." chưa được phân lớp";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("student_change/add");
    }

    function content_class(){
        $rows = 15;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj_class($this->_Year[0]['id'], $_REQUEST['classid'], $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('student_change/content_class');
    }
}
?>
