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
        $lesson_export = $_REQUEST['lesson_export']; $title = $_REQUEST['title']; $datadc = json_decode($_REQUEST['datadc'], true);
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
                        if(count($datadc) > 0 ){
                            $status = true;
                            foreach($datadc as $row){
                                $loanid = explode(".", $row['id']);
                                $sub = (count($loanid) > 2) ? $loanid[1] : 0;
                                $status = $this->add_loan_device_gear_dep($code, $userid, $loanid[0], $sub, $datestudy, $row['type'], $subject, $title, $row['id_detail'], $lesson);
                            }
                            if($status){
                                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                                $jsonObj['success'] = true;
                                $this->view->jsonObj = json_encode($jsonObj);
                            }else{
                                $jsonObj['msg'] = "Quá trình ghi dữ liệu bị gián đoạn, kiểm tra lại các module liên quan: Mượn trả thiết bị; Mượn trả đồ dùng; Đăng ký sử dụng phòng chức năng";
                                $jsonObj['success'] = true;
                                $this->view->jsonObj = json_encode($jsonObj);
                            }
                        }else{
                            $jsonObj['msg'] = "Ghi dữ liệu thành công";
                            $jsonObj['success'] = true;
                            $this->view->jsonObj = json_encode($jsonObj);  
                        }  
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
        $datadc = json_decode($_REQUEST['datadc'], true);
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
                        $this->analysis_loan($code, $datadc); // phan tich du lieu truoc khi thuc hien thao tac muon thiet bi do dung, phong chuc nang
                        if(count($datadc) > 0 ){
                            $status = true;
                            foreach($datadc as $row){
                                $loanid = explode(".", $row['id']);
                                $sub = (count($loanid) > 2) ? $loanid[1] : 0;
                                $status = $this->add_loan_device_gear_dep($code, $userid, $loanid[0], $sub, $datestudy, $row['type'], $subject, $title, $row['id_detail'], $lesson);
                            }
                            if($status){
                                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                                $jsonObj['success'] = true;
                                $this->view->jsonObj = json_encode($jsonObj);
                            }else{
                                $jsonObj['msg'] = "Quá trình ghi dữ liệu bị gián đoạn, kiểm tra lại các module liên quan: Mượn trả thiết bị; Mượn trả đồ dùng; Đăng ký sử dụng phòng chức năng";
                                $jsonObj['success'] = true;
                                $this->view->jsonObj = json_encode($jsonObj);
                            }
                        }else{
                            $jsonObj['msg'] = "Ghi dữ liệu thành công";
                            $jsonObj['success'] = true;
                            $this->view->jsonObj = json_encode($jsonObj);  
                        }   
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
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = $jsonObj;
        $detail = $this->model->get_device_gear_loan($jsonObj[0]['code']);
        $this->view->detail = $detail;
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
        $jsonObj = $this->model->get_data_gear_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('calendars/list_gear_page');
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function list_dep(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $date = $this->_Convert->convertDate($_REQUEST['date']);
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_dep($keyword, $date, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('calendars/list_dep');
    }

    function list_dep_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $date = $this->_Convert->convertDate($_REQUEST['date']);
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_dep_total($keyword, $date);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('calendars/list_dep_page');
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    function add_loan_device_gear_dep($code, $userid, $id, $sub, $date, $type, $subject, $title, $id_detail, $lesson){
        if($type == 1){ // them moi muon thiet bi
            // kiem tra xem ton tai ma phieu chua
            if($this->model->check_code_loan_device($code) > 0){ // da ton tai
                // thuc hien cap  nhat noi dung cho phieu
                $data = array("user_id" => $userid, "user_loan" => $userid, "date_loan" => $date, "notes" => "",
                                "content" => 'Phục vụ công tác giảng dạy môn '.$this->_Data->return_title_subject($subject).": ".$title,
                                "create_at" => date("Y-m-d H:i:s"));
                $temp = $this->model->updateObj_device($code, $data);
                if($temp){
                    if($id_detail == 0){ // thao tac them moi
                        $data_ct = array("code" => $code, "device_id" => $id, "sub_device" => $sub, "status" => 0,
                                        "date_return" => '');
                        $tmp = $this->model->addObj_device_detail($data_ct);
                        return ($tmp) ? true : false;
                    }else{
                        $data_ct = array("device_id" =>$id, "sub_device" => $sub);
                        $tmp = $this->model->updateObj_device_detail($id_detail, $data_ct);
                        return ($tmp) ? true : false;
                    }
                }else{
                    return false;
                }
            }else{ // chua to tai thi tien hanh tao moi 
                // thuc hien tao ban ghi moi vaf them cac ban ghi chi tiet
                $data = array("code" => $code, "user_id" => $userid, "user_loan" => $userid,  "date_loan" => $date,
                                "date_return" => $date, "content" => 'Phục vụ công tác giảng dạy 
                                môn '.$this->_Data->return_title_subject($subject).": ".$title, "notes" => '', "status" => 0,
                                "create_at" => date("Y-m-d H:i:s"));
                $temp = $this->model->addObj_device($data);
                if($temp){
                    $datact = array("code" => $code, "device_id" => $id, "sub_device" => $sub, "status" => 0,
                                    "date_return" => '');
                    $tmp = $this->model->addObj_device_detail($datact);
                    return ($tmp) ? true : false;
                }else{
                    return false;
                }
            }
        }elseif($type == 2){ // them moi muon do dung
            // kiem rta xem ton tai phieu chua
            if($this->model->check_code_loan_gear($code) > 0){ // da ton tai phieu
                // cap nhat noi dun cho ban ghi cu
                $data = array("user_id" => $userid, "user_loan" => $userid, "date_loan" => $date,
                                "content" => 'Phục vụ công tác giảng dạy môn '.$this->_Data->return_title_subject($subject).": ".$title, 
                                "notes" => '', "create_at" => date("Y-m-d H:i:s"));
                $temp = $this->model->updateObj_gear($code, $data);
                if($temp){
                    if($id_detail == 0){ // thao tac them moi ban ghi
                        $data_ct = array("code" => $code, "utensils_id" => $id, "sub_utensils" => $sub, "status" => 0,
                                        "date_return" => '');
                        $tmp = $this->model->addObj_gear_detail($data_ct);
                        return ($tmp) ? true : false;
                    }else{ // cap nhat ban ghi da ton tai
                        $data_ct = array("utensils_id" => $id, "sub_utensils" => $sub);
                        $tmp = $this->model->updateObj_gear_detail($id_detail, $data_ct);
                        return ($tmp) ? true : false;
                    }
                }else{
                    return false;
                }
            }else{ // chua ton tai thi tien hanh tao moi ban ghi
                $data = array("code" => $code, "user_id" => $userid, "user_loan" => $userid, "date_loan" => $date,
                                "date_return" => $date, "content" => 'Phục vụ công tác giảng dạy 
                                môn '.$this->_Data->return_title_subject($subject).": ".$title, "notes" => '', "status" => 0,
                                "create_at" => date("Y-m-d H:i:s"));
                $temp = $this->model->addObj_gear($data);
                if($temp){
                    $datact = array("code" => $code, "utensils_id" => $id, "sub_utensils" => $sub, "status" => 0,
                                    "date_return" => '');
                    $tmp = $this->model->addObj_gear_detail($datact);
                    return ($tmp) ? true : false;
                }else{
                    return false;
                }
            }
        }else{ // them moi dang ky su dung phong chuc nang
            //kiem tra xem co ton tai ma phieu chua
            if($this->model->check_code_loan_dep($code) > 0){ // da ton tai phieu
                // thuc hien cap nhat du lieu
                $data = array("user_id" => $userid, "user_loan" => $userid, "date_loan" => $date, "date_return" => $date,
                                "department_id" => $id, "lesson" => $lesson, "content" => '', "create_at" => date("Y-m-d H:i:s"));
                $temp = $this->model->updateObj_department($code, $data);
                return ($temp) ? true : false;
            }else{
                $data = array("code" => $code, "user_id" => $userid, "user_loan" => $userid, "date_loan" => $date, "date_return" => $date,
                                "department_id" => $id, "lesson" => $lesson, "content" => '', "create_at" => date("Y-m-d H:i:s"),
                                "status" => 0);
                $temp = $this->model->addObj_department($data);
                return ($temp) ? true : false;
            }
        }
    }

    function analysis_loan($code, $data_object){
        $status = true;
        if(count($data_object) > 0){ // ton tai du lieu muon tra do dung thiet bi phong chuc nang
            $device = 0; $gear = 0 ; $dep = 0; $arr_loan = [];
            foreach($data_object as $row){
                $device = ($row['type'] == 1) ? $device + 1 : $device + 0;
                $gear = ($row['type'] == 2) ? $gear + 1 : $gear + 0;
                $dep = ($row['type'] == 3) ? $dep + 1 : $dep + 0;
                array_push($arr_loan, $row['id']);
            }
            if($device == 0){ // thuc hien xoa ban ghi thiet bi neu khong muon
                $this->model->delObj_device_loan($code);
            }
            if($gear == 0){ // thuc hien xoa ban ghi do dung neu khong muon
                $this->model->delObj_gear_loan($code);
            }
            if($dep == 0){ // thuc hien xoa b an ghi phong chuc nang neu khong dang ky
                $this->model->delObj_department_loan($code);
            }
            //phan tich du lieu vao va du lieu trong csdl
            $json = $this->model->get_device_gear_dep_loan($code);
            if(count($json) > 0){
                foreach($json as $items){
                    $array_parent[] = $items['id'];
                }
                $data = array_diff($array_parent, $arr_loan);
                foreach($data as $rows){
                    $id = explode(".", $rows);
                    if($id > 2){ // thiet bi, do  dung
                        if($id[2] == 1){ // thiet bi
                            $this->model->delObj_device_detail($code, $id[0], $id[1]);
                        }else{ // do dung
                            $this->model->delObj_gear_detail($code, $id[0], $id[1]);
                        }
                    }else{ // phong chuc nang
                        $this->model->delObj_department_loan_update($code, $id[0]);
                    }
                }
            }
        }else{
            $this->model->delObj_device_loan($code); $this->model->delObj_gear_loan($code);
            $this->model->delObj_department_loan($code);
        }
    }
}
?>
