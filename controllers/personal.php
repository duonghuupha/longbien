<?php
class Personal extends Controller{
    private $_Convert;
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
        $this->_Convert = new  Convert();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('personal/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('personal/content');
    }

    function add(){
        $code = $_REQUEST['code']; $fullname = $_REQUEST['fullname']; $gender = $_REQUEST['gender'];
        $brithday = $this->_Convert->convertDate($_REQUEST['birthday']); $address = $_REQUEST['address'];
        $phone = $_REQUEST['phone']; $email = $_REQUEST['email']; $levelid = $_REQUEST['level_id'];
        $subjectid = implode(",", $_REQUEST['subject_id']); $jobid = $_REQUEST['job_id'];
        $avatar = $_FILES['avatar']['name']; $ghichu = $_REQUEST['description'];
        if($this->model->dupliObj(0, $code) > 0){
            $jsonObj['msg'] = "Mã nhân sự đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "fullname" => $fullname, "gender" => $gender, "birthday" => $brithday,
                            "level_id" => $levelid, "job_id" => $jobid, "subject" => $subjectid, "phone" => $phone,
                            "address" => $address, "avatar" => $avatar, "description" => $ghichu, "status" => 1,
                            "email" =>$email);
            $temp = $this->model->addObj($data);
            if($temp){
                if(move_uploaded_file($_FILES['avatar']['tmp_name'], DIR_UPLOAD.'/avatar/'.$avatar)){
                    $this->_Convert->generateBarcode($data = array('sku'=> $code), 'teacher');
                    $jsonObj['msg'] = "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $this->_Convert->generateBarcode($data = array('sku'=> $code), 'teacher');
                    $jsonObj['msg'] = "Quá trình tải ảnh lên bị gián đoạn, dữ liệu nhân sự đã được lưu";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render("personal/add");
    }

    function update(){
        $id = $_REQUEST['id']; $imgold = $_REQUEST['image_old'];
        $code = $_REQUEST['code']; $fullname = $_REQUEST['fullname']; $gender = $_REQUEST['gender'];
        $brithday = $this->_Convert->convertDate($_REQUEST['birthday']); $address = $_REQUEST['address'];
        $phone = $_REQUEST['phone']; $email = $_REQUEST['email']; $levelid = $_REQUEST['level_id'];
        $subjectid = implode(",", $_REQUEST['subject_id']); $jobid = $_REQUEST['job_id'];
        $avatar = ($_FILES['avatar']['name'] != '') ? $_FILES['avatar']['name'] : $imgold; 
        $ghichu = $_REQUEST['description'];
        if($this->model->dupliObj($id, $code) > 0){
            $jsonObj['msg'] = "Mã nhân sự đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "fullname" => $fullname, "gender" => $gender, "birthday" => $brithday,
                            "level_id" => $levelid, "job_id" => $jobid, "subject" => $subjectid, "phone" => $phone,
                            "address" => $address, "avatar" => $avatar, "description" => $ghichu, "status" => 1,
                            "email" =>$email);
            $temp = $this->model->updateObj($id, $data);
            if($temp){
                if($_FILES['avatar']['name'] != ''){
                    if(move_uploaded_file($_FILES['avatar']['tmp_name'], DIR_UPLOAD.'/avatar/'.$avatar)){
                        $jsonObj['msg'] = "Ghi dữ liệu thành công";
                        $jsonObj['success'] = true;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }else{
                        $jsonObj['msg'] = "Quá trình tải ảnh lên bị gián đoạn, dữ liệu nhân sự đã được lưu";
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
        $this->view->render("personal/update");
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
        $this->view->render("personal/del");
    }
//////////////////////////////////////////////////////////////////////////////////////////
    function data_edit(){
        $jsonObj = $this->model->get_info($_REQUEST['id']);
        $this->view->jsonObj= json_encode($jsonObj[0]);
        $this->view->render("personal/data_edit");
    }

    function form_detail(){
        $jsonObj = $this->model->get_info($_REQUEST['id']);
        $this->view->jsonObj= $jsonObj;
        $this->view->render("personal/form_detail");
    }

    function card(){
        require('layouts/header.php');
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($_REQUEST['id']);
        $this->view->jsonObj= $jsonObj;
        $this->view->render("personal/card");
        require('layouts/footer.php');
    }

    function save_card(){
        $img = $_REQUEST['imgBase64']; $code = $_REQUEST['code'];
        $img = str_replace("data:image/png;base64,", "", $img);
        $imgr = str_replace(" ", "+", $img);
        $data = base64_decode($img);
        $file = DIR_UPLOAD.'/card/teacher/'.$code.'.png';
        $success = file_put_contents($file, $data);
    }
}
?>
