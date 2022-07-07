<?php
class Student_change extends Controller{
    private $_Year;
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
        $this->_Year = $_SESSION['year'];
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('student_change/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 10;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('student_change/content');
    }

    function student(){
        $q = trim($_REQUEST['keyWord']);
        if($q != ''){
            $jsonObj = $this->model->get_data_student($q);
        }else{
            $jsonObj = [];
        }
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render('student_change/student');
    }

    function add(){
        $studentid = $_REQUEST['student_id']; $yearfrom = $this->_Year[0]['id'];
        $departmentfrom = $_REQUEST['class_current_id']; $yearto = $this->_Year[0]['id'];
        $departmento = $_REQUEST['class_to']; $create = date("Y-m-d H:i:s");
        $data = array("student_id" => $studentid, "year_from_id" => $yearfrom, "department_from_id" =>  $departmentfrom,
                        "year_to_id" => $yearto, "department_to_id" => $departmento, "create_at" => $create);
        $temp = $this->model->addObj($data);
        if($temp){
            if($this->check_active_year($yearto) > 0){
                $data_s = array('department_id' => $departmento);
                $this->model->updateObj_student($studentid, $data_s);
            }
            $jsonObj['msg'] = "Chuyển lớp cho học sinh thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Chuyển lớp cho học sinh không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("student_change/add");
    }
}
?>
