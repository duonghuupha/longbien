<?php
class Index extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        /*Session::init();
        $logged = Session::get('loggedIn');
        if($logged == false){
            Session::destroy();
            header ('Location: '.URL.'/index/login');
            exit;
        }else{*/
            require('layouts/header.php');
            $this->view->render('index/index');
            require('layouts/footer.php');
        //}
    }

    function login(){
        $this->view->render("index/login");
    }

    function do_login(){
        $username = $_REQUEST['username'];
        $password = sha1($_REQUEST['password']);
        if($this->model->check_login($username, $password) > 0){
            Session::init();
            Session::set('loggedIn', true);
            $_SESSION['data'] = $this->model->get_data($username, $password);
            $jsonObj['msg'] = "Đăng nhập thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
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
}
?>
