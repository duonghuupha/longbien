<?php
class Up_class extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('up_class/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 10;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render("up_class/content");
    }

    function add(){
        $yearfrom = $this->_Year[0]['id']; $departmentfrom = $_REQUEST['department_from'];
        $yearto = $_REQUEST['year_to']; $departmentto = $_REQUEST['department_to'];
        $student = $this->model->get_all_student_of_class($yearfrom, $departmentfrom);
        //kiem tra  xem  lop da dc len lop chua
        if($this->model->dupliObj_from($yearfrom, $departmentfrom) > 0){
            $jsonObj['msg'] = $this->model->return_title_department($departmentfrom)." của ".$this->_Data->return_title_year($yearfrom)." đã tồn tại dữ liệu chuyển lớp";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            // kiem tra lop chuyen den
            if($this->model->dupliObj_to($yearto, $departmentto) > 0){
                $jsonObj['msg'] = $this->model->return_title_department($departmentto)." của ".$this->_Data->return_title_year($yearto)." đã tồn tại dữ liệu chuyển lớp";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                if(count($student) == 0){
                    $jsonObj['msg'] = "Lớp học không có học sinh nào, không thể lên lớp";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $data = array("year_from" => $yearfrom, "department_from" => $departmentfrom,
                                "year_to" => $yearto, "department_to" => $departmentto,
                                "create_at" => date("Y-m-d H:i:s"));
                    $temp = $this->model->addObj($data); $array = array();
                    if($temp){
                        foreach($student as $row){
                            if($this->model->check_student_up_class($row['student_id'], $yearto) > 0){
                                $detail = $this->model->get_info_student($row['student_id']);
                                $array[] = array("code" => $detail[0]['code'], "fullname" => $detail[0]['fullname'], "error" => "Đã tồn tại phân lớp của học sinh");
                            }else{
                                $data_class = array("student_id" => $row['student_id'], "year_id" => $yearto, "department_id" => $departmentto,
                                                    "create_at" => date("Y-m-d H:i:s"));
                                $tmp = $this->model->addObj_class($data_class);
                                if(!$tmp){
                                    $detail = $this->model->get_info_student($row['student_id']);
                                    $array[] = array("code" => $detail[0]['code'], "fullname" => $detail[0]['fullname'], "error" => "Lên lớp không thành công");
                                }
                            }
                        }
                        if(count($array) > 0){
                            $jsonObj['msg'] = "Một số học sinh chưa được tạo dữ lên lơp, vui lòng xem trong fille đính kèm";
                            $jsonObj['success'] = false;
                            $this->view->jsonObj = json_encode($jsonObj);
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
        $this->view->render("up_class/add");
    }

    function write_txt($array){
        $myfile = fopen(DIR_UPLOAD."/temp/error.txt", "w") or die("Unable to open file!");
        /*$txt = "John Doe\n";
        fwrite($myfile, $txt);
        $txt = "Jane Doe\n";
        fwrite($myfile, $txt);*/
        foreach($array as $row){
            $mytxt = "Mã học sinh: ".$row['code']." - Tên học sinh: ".$row['fllname']." - Lỗi: ".$row['error'];
            fwrite($myfile, $mytxt);
        }
        fclose($myfile);
    }
}
?>