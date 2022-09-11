<?php
class Calendars extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
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
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($title, $date, $lesson, $lesson_export, $teacher, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('calendars/content');
    }

    function add(){
        $userid = $_REQUEST['user_id']; $usercreate = $this->_Info[0]['id']; $datestudy = $this->_Convert->convertDate($_REQUEST['date_study']);
        $department = $_REQUEST['department_id']; $lesson = $_REQUEST['lesson']; $subject = $_REQUEST['subject_id']; $lessonmain = $_REQUEST['lesson_export'];
        $title = $_REQUEST['title']; $code = time();
        $datadc = ($_REQUEST['datadc'] != '') ? json_decode($_REQUEST['datadc'], true) : [];
        if($datestudy > date("Y-m-d")){
            $jsonObj['msg'] = "Không báo giảng trước sau ngày hiện tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            if($this->model->dupliObj(0, $lesson, $department, $datestudy) > 0){
                $jsonObj['msg'] = "Ngày ".$_REQUEST['date_study']." lớp ".$this->model->get_title_deparmentt($department)." vào tiết ".$lesson." đã có giờ dạy";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                // kiem tra xem tiet hoc dc phan bo da ton tai chua
                if($this->model->dupliObj_lessonmain(0, $lessonmain, $subject) > 0){
                    $jsonObj['msg'] = "Tiết học ".$lessonmain."  theo chương trình phân bổ của môn học ".$this->_Data->return_title_subject($subject)." đã tồn tại";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $data = array("code" => $code, "user_id" => $userid, "user_create" => $usercreate, "lesson" => $lesson, "subject_id" => $subject,
                                    "department_id" => $department, "lesson_export" => $lessonmain, "date_study" => $datestudy, "title" => $title,
                                    "create_at" => date("Y-m-d H:i:s"));
                    $temp = $this->model->addObj($data);
                    if($temp){
                        // kiem tra xem co muon do dung hay thiet bi khong
                        if(count($datadc) > 0){
                            foreach($datadc as $row){
                                /*$device = explode(".", $row['id']);
                                if($row['type'] == 1){ //muon thiet bi
                                    if($this->model->check_code_loans_device($code) == 0){ // neu chua co phieu thi tao phieu
                                        $data_loan_device = array("code" => $code, "user_id" => $usercreate, "user_loan" => $usercreate,
                                                            "date_loan" => $datestudy, "date_return" =>  $datestudy, 
                                                            "content" => "Phục vụ bài dạy môn ".$this->_Data->return_title_subject($subject).": ".$title,
                                                            "status" => 3, "create_at" => date("Y-m-d H:i:s"));
                                        $this->model->addObj_device_loan($data_loan_device);
                                    }

                                    if($this->model->check_device_loans($code, $device[0], $row['sub']) == 0){
                                        // them moi du lieu chi tiet  muon thiet bi
                                        $data_loan_device_detail = array("code" => $code, "device_id" => $device[0],
                                                                    "sub_device" => $row['sub'], "status" => 0, "date_return" => $datestudy);
                                        $this->model->addObj_device_loan_detail($data_loan_device_detail);
                                    }
                                }else{ // muon do dung
                                    if($this->model->check_code_loans_gear($code) == 0){ // neu chua co phieu thi tao phieu
                                        $data_loan_device = array("code" => $code, "user_id" => $usercreate, "user_loan" => $usercreate,
                                                            "date_loan" => $datestudy, "date_return" =>  $datestudy, 
                                                            "content" => "Phục vụ bài dạy môn ".$this->_Data->return_title_subject($subject).": ".$title,
                                                            "status" => 3, "create_at" => date("Y-m-d H:i:s"));
                                        $this->model->addObj_gear_loan($data_loan_device);
                                    }

                                    if($this->model->check_gear_loans($code, $device[0], $row['sub']) == 0){
                                        // them moi du lieu chi tiet  muon thiet bi
                                        $data_loan_device_detail = array("code" => $code, "utensils_id" => $device[0],
                                                                    "sub_utensils" => $row['sub'], "status" => 0, "date_return" => $datestudy);
                                        $this->model->addObj_gear_loan_detail($data_loan_device_detail);
                                    }
                                }*/
                                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                                $jsonObj['success'] = false;
                                $this->view->jsonObj = json_encode($jsonObj);
                            }
                        }
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
        $id = $_REQUEST['id'];
        $userid = $_REQUEST['user_id']; $usercreate = $this->_Info[0]['id']; $datestudy = $this->_Convert->convertDate($_REQUEST['date_study']);
        $department = $_REQUEST['department_id']; 
        $lesson = (isset($_REQUEST['lesson']) && $_REQUEST['lesson'] != '') ? $_REQUEST['lesson'] : $_REQUEST['lesson_id']; 
        $subject = (isset($_REQUEST['subject_id']) && $_REQUEST['subject_id'] != '') ? $_REQUEST['subject_id'] : $_REQUEST['subjectid']; 
        $lessonmain = $_REQUEST['lesson_export']; $title = $_REQUEST['title']; $code = $_REQUEST['code'];
        if($datestudy > date("Y-m-d")){
            $jsonObj['msg'] = "Không báo giảng trước sau ngày hiện tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            if($this->model->dupliObj($id, $lesson, $department, $datestudy) > 0){
                $jsonObj['msg'] = "Ngày ".$_REQUEST['date_study']." lớp ".$this->model->get_title_deparmentt($department)." vào tiết ".$lesson." đã có giờ dạy";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                // kiem tra xem tiet hoc dc phan bo da ton tai chua
                if($this->model->dupliObj_lessonmain($id, $lessonmain, $subject) > 0){
                    $jsonObj['msg'] = "Tiết học ".$lessonmain."  theo chương trình phân bổ của môn học ".$this->_Data->return_title_subject($subject)." đã tồn tại";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $data = array("user_id" => $userid, "user_create" => $usercreate, "lesson" => $lesson, "subject_id" => $subject,
                                    "department_id" => $department, "lesson_export" => $lessonmain, "date_study" => $datestudy, "title" => $title,
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
        $this->view->jsonObj = $this->model->get_info($_REQUEST['id']);
        $this->view->render('calendars/detail');
    }
/////////////////////////////////////////////////////////////////////////////////
    function data_edit(){
        $id = $_REQUEST['id']; $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj  = json_encode($jsonObj[0]);
        $this->view->render('calendars/data_edit');
    }

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

    function combo_subject(){
        $userid = $_REQUEST['userid'];
        $jsonObj = $this->model->get_combo_subject($userid);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("calendars/combo_subject");
    }

    function combo_lesson(){
        $this->view->render("calendars/combo_lesson");
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
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
