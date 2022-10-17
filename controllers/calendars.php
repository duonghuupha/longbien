<?php
class Calendars extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $teacher = $this->model->check_user_is_teacher($this->_Info[0]['id']);
        $this->view->teacher = $teacher;
        $this->view->render('calendars/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $title = isset($_REQUEST['title']) ? str_replace("$", " ", $_REQUEST['title']) : '';
        $date = isset($_REQUEST['date']) ? $this->_Convert->convertDate($_REQUEST['date']) : '';
        $lesson = isset($_REQUEST['lesson']) ? $_REQUEST['lesson'] : ''; 
        $lesson_export = isset($_REQUEST['lesson_export']) ? $_REQUEST['lesson_export'] : '';
        $teacher = isset($_REQUEST['teacher']) ? str_replace("$", " ", $_REQUEST['teacher']) : '';
        $department_id = isset($_REQUEST['department_id']) ? $_REQUEST['department_id'] : '';
        $subject_id = isset($_REQUEST['subject_id']) ? $_REQUEST['subject_id'] : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($this->_Info[0]['id'], $title, $date, $lesson, $lesson_export, $teacher, $department_id, $subject_id, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('calendars/content');
    }

    function add(){
        
        $this->view->render('calendars/add');
    }

    function update(){
        
        $this->view->render('calendars/update');
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
        $this->view->render('calendars/del');
    }

    function detail(){
        
        $this->view->render('calendars/detail');
    }
/////////////////////////////////////////////////////////////////////////////////
    function list_user(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_users($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('calendars/list_user');
    }

    function list_user_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_users_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('calendars/list_user_page');
    }

    function combo_lesson(){
        $this->view->render("calendars/combo_lesson");
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
}
?>
