<?php
class Student extends Controller{
    private $_Convert;
    function __construct(){
        parent::__construct();
        $this->_Convert = new Convert();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('student/index');
        require('layouts/footer.php');
    }

    function content(){
        $this->view->render('student/content');
    }

    function add(){
        $code = $_REQUEST['code']; $fullname = $_REQUEST['fullname']; $gender = $_REQUEST['gender'];
        $birthday = $this->_Convert->convertDate($_REQUEST['birthday']);
        $address = $_REQUEST['address']; $department = $_REQUEST['department_id'];
        $image = ($_FILES['image']['name'] != '') ? $this->_Convert->convert_img($_FILES['image']['name'], $code) : ''; 
        $status = $_REQUEST['status']; $datadc = json_decode($_REQUEST['datadc'], true);
        if($this->model->dupliObj(0, $code) > 0){
            $jsonObj['msg'] = "Mã học sinh đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj= json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "fullname" => $fullname, "gender" => $gender, "birthday" => $birthday,
                            "address" => $address, "department_id" => $department, "image" => $image,
                            "status" => $status);
            $temp = $this->model->addObj($data);
            if($temp){
                foreach ($datadc as $row) {
                    $data_relation = array("code" => $code, "relation" => $row['relation'], "fullname" => $row['fullname'],
                                            "year" => $row['year'], "phone" => $row['phone'], "job" => $row['job']);
                    $this->model->addObj_detail($data_relation);
                }
                if($_FILES['image']['name'] != ''){
                    if(move_uploaded_file($_FILES['image']['tmp_name'], DIR_UPLOAD.'/student/'.$image)){
                        $this->_Convert->generateBarcode($data = array('sku'=> $code), 'student');
                        $jsonObj['msg'] = "Ghi dữ liệu thành công";
                        $jsonObj['success'] = true;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }else{
                        $this->_Convert->generateBarcode($data = array('sku'=> $code), 'student');
                        $jsonObj['msg'] = "Quá trình tải ảnh lên bị gián đoạn, dữ liệu học sinh đã được lưu";
                        $jsonObj['success'] = true;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }
                }else{
                    $this->_Convert->generateBarcode($data = array('sku'=> $code), 'student');
                    $jsonObj['msg'] = "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render("student/add");
    }

    function update(){

    }

    function del(){
        
    }
}
?>
