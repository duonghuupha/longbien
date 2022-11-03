<?php
class Student_point extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('student_point/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['fullname']) ? str_replace("$", " ", $_REQUEST['fullname']) : '';
        $department = isset($_REQUEST['department']) ? $_REQUEST['department'] : '';
        $subject = isset($_REQUEST['subject']) ? $_REQUEST['subject'] : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $type = $this->model->check_user_is_teacher($this->_Info[0]['id']);
        $jsonObj = $this->model->getFetObj($type, $this->_Info[0]['id'], $keyword, $subject, $department, $this->_Year[0]['id'], $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('student_point/content');
    }

    function add(){
        $code = time(); $studentid = $_REQUEST['studentid']; $userid = $this->_Info[0]['id'];
        $subjectid = $_REQUEST['subjectid']; $type_point = $_REQUEST['type_point'];
        $point = $_REQUEST['point']; $yearid = $this->_Year[0]['id']; $semester = $_REQUEST['semesterid'];
        $createat = date("Y-m-d H:i:s");
        // kiem tra userid co quyen cap nhat diem  khong
        if($this->model->check_role_update_point($userid, $yearid, $subjectid, $studentid) == 0){
            $jsonObj['msg'] = "Bạn không có quyền cập nhật điểm cho học sinh này";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            if($this->model->dupliObj($studentid, $type_point, $yearid, $semester, $subjectid) > 0){
                $jsonObj['msg'] = "Học sinh đã tồn tại điểm cho môn học này";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $data = array("code" => $code, "student_id" => $studentid, "user_id" => $userid, "subject_id" => $subjectid,
                                "type_point" => $type_point, "point" => $point, "year_id" => $yearid, "semester" => $semester,
                                "create_at" => $createat);
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
        $this->view->render('student_point/add');
    }

    function update(){ // tao du lieu sua diem
        $studentid = $_REQUEST['studentid']; $userid = $this->_Info[0]['id']; $code = time();
        $subjectid = $_REQUEST['subjectid']; $type_point = $_REQUEST['type_point'];
        $point = $_REQUEST['point']; $yearid = $this->_Year[0]['id']; $semester = $_REQUEST['semesterid'];
        $createat = date("Y-m-d H:i:s"); $content = $_REQUEST['content'];
        $file = isset($_FILES['image']['name']) ? $this->_Convert->convert_file($_FILES['image']['name'], 'change_point') : '';
        $detail = $this->model->get_info_point($studentid, $this->_Year[0]['id'], $type_point, $subjectid, $semester);
        // kiem tra xem user co quyen su diem khong
        if($userid != $detail[0]['user_id']){
            $jsonObj['msg'] = "Bạn không có quyền sửa điểm cho học sinh này";
            $jsonObj['success'] =  false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            if($type_point <= 4){ // dc cap nhat diem truc tiep
                $data = array("code" => $code, "point_id" => $detail[0]['id'], "user_id" => $userid, "point" => $point,
                                "status" => 1, "user_app" => $userid, "content" => $content, "create_at" => date("Y-m-d H:i:s"),
                                "file" => '');
                $temp = $this->model->addObj_change($data);
                if($temp){
                    $data_u = array("point" => $point);
                    $this->model->updateObj($detail[0]['id'], $data_u);
                    $jsonObj['msg'] = 'Ghi dữ liệu thành công';
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $jsonObj['msg'] = 'Ghi dữ liệu không thành công';
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }else{
                $data = array("code" => $code, "point_id" => $detail[0]['id'], "user_id" => $userid, "point" => $point,
                                "status" => 0, "user_app" => 0, "content" => $content, "create_at" => date("Y-m-d H:i:s"),
                                "file" => $file);
                $temp = $this->model->addObj_change($data);
                if($temp){
                    if(move_uploaded_file($_FILES['image']['tmp_name'], DIR_UPLOAD.'/student_point/'.$file)){
                        $jsonObj['msg'] = 'Ghi dữ liệu thành công. Điểm sẽ được cập nhật sau khi Ban giám hiệu duyệt';
                        $jsonObj['success'] = true;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }else{
                        $jsonObj['msg'] = 'Ghi dữ liệu thành công. Minh chứng chưa được cập nhật, vui lòng thử lại';
                        $jsonObj['success'] = false;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }
                }else{
                    $jsonObj['msg'] = 'Ghi dữ liệu không thành công';
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }
        }
        $this->view->render('student_point/update');
    }

    function app_point(){
        $id = $_REQUEST['id']; $type = $_REQUEST['type'];
        $data = array("status" => $type, "user_app" =>  $this->_Info[0]['id'], "create_at" => date("Y-m-d H:i:s"));
        if($type == 1){ // duyet diem
            $temp = $this->model->updateObj_change_point($id, $data);
            if($temp){
                $detail = $this->model->get_info_change_point($id);
                $datact = array("point" => $detail[0]['point']);
                $this->model->updateObj_point($id, $datact);
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{ // khong duyet diem
            $temp = $this->model->updateObj_change_point($id, $data);
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
        $this->view->render('student_point/app_point');
    }
////////////////////////////////////////////////////////////////////////////////////////////
    function info(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id, $this->_Year[0]['id']);
        $this->view->jsonObj = $jsonObj;
        $this->view->render('student_point/info');
    }

    function point_of_student(){
        $this->view->render('student_point/point_of_student');
    }

    function check_exit_point(){
        $student = $_REQUEST['studentid']; $semester = $_REQUEST['semester']; $subject = $_REQUEST['subject'];
        $typepoint = $_REQUEST['typepoint'];
        $total = $this->model->dupliObj($student, $typepoint, $this->_Year[0]['id'], $semester, $subject);
        $this->view->total = $total;
        $this->view->render("student_point/check_exit_point");
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function list_app(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_point_app($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('student_point/list_app');
    }

    function list_app_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_point_app_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('student_point/list_app_page');
    }
}
?>
