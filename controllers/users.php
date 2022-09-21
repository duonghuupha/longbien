<?php
class Users extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('users/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('users/content');
    }

    function add(){
        $code = time(); $hrid = $_REQUEST['hr_id']; $username = $_REQUEST['username'];
        $password = $_REQUEST['password']; $repass = $_REQUEST['repass'];
        if($this->model->dupliObj(0, $username) > 0){
            $jsonObj['msg'] = "Tên đăng nhập đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            if($this->model->dupliObj_hr(0, $hrid) > 0){
                $jsonObj['msg'] = "Nhân sự này đã được tạo thông tin đăng nhập";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $data = array('code' => $code, 'username' => $username, 'password' => sha1($password),
                                'active' => 1, 'hr_id' => $hrid);
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
        $this->view->render('users/add');
    }

    function update(){
        $hrid = $_REQUEST['hrid']; $username = $_REQUEST['username'];
        $id = $_REQUEST['id'];
        if($this->model->dupliObj($id, $username) > 0){
            $jsonObj['msg'] = "Tên đăng nhập đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            if($this->model->dupliObj_hr($id, $hrid) > 0){
                $jsonObj['msg'] = "Nhân sự này đã được tạo thông tin đăng nhập";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $data = array('username' => $username, 'hr_id' => $hrid);
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
        $this->view->render('users/update');
    }

    function del(){
        $id = $_REQUEST['id']; $data = array("active" => 2);
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
        $this->view->render('users/del');
    }
////////////////////////////////////////////////////////////////////////////////////////
    function list_personel(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_personel($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj;//$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('users/list_personel');
    }

    function list_personel_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_personel_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('users/list_personel_page');
    }

    function change_pass(){
        $id = $_REQUEST['id'];
        $data = array('password' => sha1('abcd1234'));
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $jsonObj['msg'] = "Đặt lại mật khẩu thành công. Mật khẩu mới là: abcd1234";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Đặt lại mật khẩu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render('users/change_pass');
    }

    function combo_role(){
        $jsonObj = $this->model->get_combo_role();
        $this->view->jsonObj = $jsonObj;
        $this->view->render('users/combo_role');
    }
}
?>
