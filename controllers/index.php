<?php
class Index extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('index/index');
        require('layouts/footer.php');
    }

    function login(){
        $this->view->render("index/login");
    }

    function do_login(){
        $username = $_REQUEST['username']; 
        $password = sha1($_REQUEST['password']);
        if($this->model->check_login($username, $password) > 0){
            // kiem tra xem co nam hoc duoc kich hoat khongs
            if($this->model->check_year_active() > 0){
                // tao token va cap nhat trang thai dang nhap
                $token = sha1(time()); $ipaddress = $_SERVER['REMOTE_ADDR'];
                $info = $_SERVER['HTTP_USER_AGENT'];
                $data = array('token' => $token, 'last_login' => date("Y-m-d H:i:s"), 
                                'info_login' => $ipaddress.'-'.$info);
                $temp = $this->model->updateLogin($username, $password, $data);
                if($temp){
                    Session::init();
                    Session::set('loggedIn', true);
                    $_SESSION['data'] = $this->model->get_data($username, $password);
                    $_SESSION['year'] = $this->model->get_year_active();
                    $jsonObj['msg'] = "Đăng nhập thành công";
                    $jsonObj['token'] = $token;
                    $jsonObj['success'] = true;
                    $jsonObj['is_change'] = $_SESSION['data'][0]['is_change'];
                    $jsonObj['user_id'] = $_SESSION['data'][0]['id'];
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $jsonObj['msg'] = 'Đăng nhập không thành công';
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }else{
                $jsonObj['msg'] = 'Chưa có năm học nào được kích hoạt. Vui lòng liên hệ Ban quản trị để biết thêm chi tiết';
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Thông tin đăng nhập không chính xác";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("index/do_login");
    }

    function logout(){
        session_start();
        //Session::destroy();
        session_destroy();
        header('Location: '.URL.'/index/login');
        exit;
    }

    function captcha(){
        $this->view->render("index/captcha");
    }

    function change_year(){
        $yearid = $_REQUEST['year_change_id'];
        $_SESSION['year'] = $this->model->get_year_via_id($yearid);
        $jsonObj['msg'] = "Thay đổi năm học thành công";
        $jsonObj['success'] = true;
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("index/change_year");
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////
    function percent_student(){
        $this->view->render("index/percent_student");
    }
}
?>
