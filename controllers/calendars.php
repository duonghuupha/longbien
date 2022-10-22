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
        $code = time(); $userid = $_REQUEST['user_id']; $datestudy = $this->_Convert->convertDate($_REQUEST['date_study']);
        $subject = $_REQUEST['subject_id']; $department = $_REQUEST['department_id']; $lesson = $_REQUEST['lesson'];
        $lesson_export = $_REQUEST['lesson_export']; $title = $_REQUEST['title'];
        if($datestudy > date("Y-m-d")){
            $jsonObj['msg'] = "Không báo giảng sau ngày hiện tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            if($this->model->dupliObj(0, $lesson, $department, $datestudy) > 0){
                $jsonObj['msg'] = "Ngày ".$_REQUEST['date_study']." lớp ".$this->_Data->return_title_department($department)." vào tiết ".$lesson." đã có giờ dạy";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                if($this->model->dupliObj_lessonmain(0, $lesson_export, $subject) > 0){
                    $jsonObj['msg'] = "Tiết học ".$lesson_export."  theo chương trình phân bổ của môn học ".$this->_Data->return_title_subject($subject)." đã tồn tại";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $data = array("code" => $code, "user_id" => $userid, "user_create" => $this->_Info[0]['id'],
                                    "lesson" => $lesson, "subject_id" => $subject, "department_id" => $department,
                                    "lesson_export" => $lesson_export, "date_study" => $datestudy, "title" => $title,
                                    "create_at" => date("Y-m-d H:i:s"));
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
            }
        }
        $this->view->render('calendars/add');
    }

    function update(){
        $code = $_REQUEST['code']; $userid = $_REQUEST['user_id']; $datestudy = $this->_Convert->convertDate($_REQUEST['date_study']);
        $subject = $_REQUEST['subject_id']; $department = $_REQUEST['department_id']; $lesson = $_REQUEST['lesson'];
        $lesson_export = $_REQUEST['lesson_export']; $title = $_REQUEST['title']; $id = $_REQUEST['id'];
        if($datestudy > date("Y-m-d")){
            $jsonObj['msg'] = "Không báo giảng sau ngày hiện tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            if($this->model->dupliObj($id, $lesson, $department, $datestudy) > 0){
                $jsonObj['msg'] = "Ngày ".$_REQUEST['date_study']." lớp ".$this->_Data->return_title_department($department)." vào tiết ".$lesson." đã có giờ dạy";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                if($this->model->dupliObj_lessonmain($id, $lesson_export, $subject) > 0){
                    $jsonObj['msg'] = "Tiết học ".$lesson_export."  theo chương trình phân bổ của môn học ".$this->_Data->return_title_subject($subject)." đã tồn tại";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $data = array("user_id" => $userid, "user_create" => $this->_Info[0]['id'],
                                    "lesson" => $lesson, "subject_id" => $subject, "department_id" => $department,
                                    "lesson_export" => $lesson_export, "date_study" => $datestudy, "title" => $title,
                                    "create_at" => date("Y-m-d H:i:s"));
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
            }
        }
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
    function data_edit(){
        $id = $_REQUEST['id']; $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj  = json_encode($jsonObj[0]);
        $this->view->render('calendars/data_edit');
    }
//////////////////////////////////////////////////////////////////////////////////////////////////
    function list_device(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_device($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render("calendars/list_device");
    }

    function list_device_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_device_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('calendars/list_device_page');
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    function list_gear(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_gear($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('calendars/list_gear');
    }

    function list_gear_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_date_gear_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('calendars/list_gear_page');
    }
}
?>
