<?php
class Profile extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');

        $this->view->jsonObj = $this->model->get_info_user($this->_Info[0]['hr_id']);

        $this->view->render('profile/index');
        require('layouts/footer.php');
    }

    function update_password(){
        require('layouts/header.php');
        $this->view->render('profile/update_password');
        require('layouts/footer.php');
    }

    function update(){
        $user_id = $this->_Info[0]['id'];
        $passold = $_REQUEST['pass_old']; $passnew= $_REQUEST['pass_new'];
        $repass = $_REQUEST['re_pass'];
        // kiem tra voi mat khau cu
        if(sha1($passold) != $this->_Info[0]['password']){
            $jsonObj['msg'] = "Mật khẩu hiện tại không chính xác";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            // kiem tra do dai cua mat khau
            if(strlen($passnew) < 8){
                $jsonObj['msg'] = "Mật khẩu phải có độ dài >= 8 ký tự";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                // kiem tra xac nhan mat khau
                if(sha1($passnew) != sha1($repass)){
                    $jsonObj['msg'] = "Xác nhận mật khẩu không chính xác";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    if($passold == $passnew){
                        $jsonObj['msg'] = "Mật khẩu mới không được giống mật khẩu hiện tại";
                        $jsonObj['success'] = false;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }else{
                        $data = array("password" => sha1($passnew), 'is_change' => 1);
                        $temp = $this->model->updateObj($user_id, $data);
                        if($temp){
                            $jsonObj['msg'] = "Ghi dữ   liệu thành công";
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
        }
        $this->view->render("profile/update");
    }
}
?>