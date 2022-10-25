<?php
class Dep_loan extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('dep_loan/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $name = isset($_REQUEST['name']) ? str_replace("$", " ", $_REQUEST['name']) : '';
        $dep = isset($_REQUEST['dep']) ? str_replace("$", " ", $_REQUEST['dep']) : '';
        $date = isset($_REQUEST['date']) ? $this->_Convert->convertDate($_REQUEST['date']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($name, $date, $dep, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('dep_loan/content');
    }

    function add(){
        $code = time(); $userid = $this->_Info[0]['id']; $userloan = $_REQUEST['user_loan'];
        $dateloan = $this->_Convert->convertDate($_REQUEST['date_loan']);
        $datereturn = $dateloan; $department_id = $_REQUEST['department_id'];
        $lesson = $_REQUEST['lesson']; $content = $_REQUEST['content'];
        $status = 0; $create_at = date("Y-m-d H:i:s");
        if($dateloan < date("Y-m-d")){
            $jsonObj['msg'] = "Ngày đăng ký không thể nhỏ hơn ngày hiện tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            if($this->model->dupliObj(0, $department_id, $dateloan, $lesson) > 0){
                $jsonObj['msg'] = "Vào tiết học ".$lesson." ngày ".$dateloan." ".$this->_Data->return_title_department($department_id)." đã được đăng ký";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $data = array("code" => $code, "user_id" => $userid, "user_loan" => $userloan, "date_loan" => $dateloan,
                                "date_return" => $datereturn, "department_id" => $department_id, "lesson" => $lesson,
                                "content" => $content, "status" => $status, "create_at" => $create_at);
                $temp = $this->model->addObj($data);
                if($temp){
                    $jsonObj['msg']= "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $jsonObj['msg']= "Ghi dữ liệu không thành công";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }
        }
        $this->view->render("dep_loan/add");
    }

    function update(){
        $id = $_REQUEST['id'];
        $userid = $this->_Info[0]['id']; $userloan = $_REQUEST['user_loan'];
        $dateloan = $this->_Convert->convertDate($_REQUEST['date_loan']);
        $datereturn = $dateloan; $department_id = $_REQUEST['department_id'];
        $lesson = $_REQUEST['lesson']; $content = $_REQUEST['content'];
        $status = 0; $create_at = date("Y-m-d H:i:s");
        if($dateloan < date("Y-m-d")){
            $jsonObj['msg'] = "Ngày đăng ký không thể nhỏ hơn ngày hiện tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            if($this->model->dupliObj($id, $department_id, $dateloan, $lesson) > 0){
                $jsonObj['msg'] = "Vào tiết học ".$lesson." ngày ".$dateloan." ".$this->_Data->return_title_department($department_id)." đã được đăng ký";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $data = array("user_id" => $userid, "user_loan" => $userloan, "date_loan" => $dateloan,
                                "date_return" => $datereturn, "department_id" => $department_id, "lesson" => $lesson,
                                "content" => $content, "status" => $status, "create_at" => $create_at);
                $temp = $this->model->updateObj($id, $data);
                if($temp){
                    $jsonObj['msg']= "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $jsonObj['msg']= "Ghi dữ liệu không thành công";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }
        }
        $this->view->render("dep_loan/update");
    }

    function del(){
        $id = $_REQUEST['id'];
        $temp = $this->model->delObj($id);
        if($temp){
            $jsonObj['msg']= "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg']= "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("dep_loan/del");
    }

    function data_edit(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = json_encode($jsonObj[0]);
        $this->view->render("dep_loan/data_edit");
    }

    function detail(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("dep_loan/detail");
    }
///////////////////////////////////////////////////////////////////////////////////////////
    function list_user(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_users($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('dep_loan/list_user');
    }

    function list_user_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_users_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('dep_loan/list_user_page');
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function list_dep(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $date = $this->_Convert->convertDate($_REQUEST['date']);
        $lesson = $_REQUEST['lesson'];
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_dep($keyword, $date, $lesson, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('dep_loan/list_dep');
    }

    function list_dep_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $date = $this->_Convert->convertDate($_REQUEST['date']);
        $lesson = $_REQUEST['lesson'];
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_dep_total($keyword, $date, $lesson);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('dep_loan/list_dep_page');
    }
}
?>