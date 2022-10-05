<?php
class Assign extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('assign/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('assign/content');
    }

    function add(){
        $code = time(); $userid = $_REQUEST['user_id']; $subject = implode(",", $_REQUEST['subject']);
        $department = implode(",", $_REQUEST['department']); $yearid = $this->_Year[0]['id'];
        if($this->model->dupliObj(0, $userid, $yearid) > 0){
            $jsonObj['msg']  = "Giáo viên này đã có dữ liệu, vui lòng kiểm tra lại";
            $jsonObj['success'] = true;
            $this->view->jsonObj= json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "user_id" => $userid, "subject" => $subject, "year_id" => $yearid,
                            "department" => $department, "create_at" => date("Y-m-d H:i:s"));
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
        $this->view->render('assign/add');
    }

    function update(){
        $id = $_REQUEST['id']; $userid = $_REQUEST['user_id']; $subject = implode(",", $_REQUEST['subject']);
        $department = implode(",", $_REQUEST['department']); $yearid = $this->_Year[0]['id'];
        if($this->model->dupliObj($id, $userid, $yearid) > 0){
            $jsonObj['msg']  = "Giáo viên này đã có dữ liệu, vui lòng kiểm tra lại";
            $jsonObj['success'] = true;
            $this->view->jsonObj= json_encode($jsonObj);
        }else{
            $data = array("user_id" => $userid, "subject" => $subject, "year_id" => $yearid,
                            "department" => $department, "create_at" => date("Y-m-d H:i:s"));
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
        $this->view->render('assign/update');
    }

    function del(){
        $id = $_REQUEST['id'];
        $temp = $this->model->delObj($id);
        if($temp){
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success']  = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success']  = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render('assign/del');
    }
////////////////////////////////////////////////////////////////////////////
    function list_user(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_users($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('assign/list_user');
    }

    function list_user_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_users_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('assign/list_user_page');
    }
/////////////////////////////////////////////////////////////////////////////////////////
    function detail(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("assign/detail");
    }
}
?>