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
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
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
            $data_global = array("code" => $code, "fullname" => $fullname, "gender" => $gender, "birthday" => $birthday,
                            "address" => $address, "department_id" => $department, "image" => $image,
                            "status" => $status);
            $temp = $this->model->addObj($data_global);
            if($temp){
                // cap nhat thong tin quan he
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
        $id = $_REQUEST['id']; $imageold = $_REQUEST['image_old'];
        $code = $_REQUEST['code']; $fullname = $_REQUEST['fullname']; $gender = $_REQUEST['gender'];
        $birthday = $this->_Convert->convertDate($_REQUEST['birthday']);
        $address = $_REQUEST['address']; $department = $_REQUEST['department_id'];
        $image = ($_FILES['image']['name'] != '') ? $this->_Convert->convert_img($_FILES['image']['name'], $code) : $imageold; 
        $status = $_REQUEST['status']; $datadc = json_decode($_REQUEST['datadc'], true);
        if($this->model->dupliObj($id, $code) > 0){
            $jsonObj['msg'] = "Mã học sinh đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj= json_encode($jsonObj);
        }else{
            $data_global = array("fullname" => $fullname, "gender" => $gender, "birthday" => $birthday,
                            "address" => $address, "department_id" => $department, "image" => $image,
                            "status" => $status);
            $temp = $this->model->updateObj($id, $data_global);
            if($temp){
                $this->model->delObj_detail($code);
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
        $this->view->render("student/update");
    }

    function del(){
        $id = $_REQUEST['id'];
        $info = $this->model->get_info($id);
        $temp = $this->model->delObj($id);
        if($temp){
            unlink(DIR_UPLOAD.'/barcode/student/'.$info[0]['code'].'.png');
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("student/del");
    }
///////////////////////////////////////////////////////////////////////////////////////////////
    function import(){
        require('layouts/header.php');
        $this->view->render('student/import');
        require('layouts/footer.php');
    }

    function content_tmp(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj_tmp($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('student/content_tmp');
    }

    function do_import(){
        // xoa het nhung ban ghi tam
        $tmp = $this->model->delObj_tmp();
        if($tmp){
            $department = $_REQUEST['department_id'];
            $file = $_FILES['file_tmp']['tmp_name'];
            $objFile = PHPExcel_IOFactory::identify($file);
            $objData = PHPExcel_IOFactory::createReader($objFile);
            $objData->setReadDataOnly(true);
            $objPHPExcel = $objData->load($file);
            $sheet = $objPHPExcel->setActiveSheetIndex(0);
            $Totalrow = $sheet->getHighestRow();
            $LastColumn = $sheet->getHighestColumn();
            $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
            $data = [];
            for ($i = 5; $i <= $Totalrow; $i++) {
                for ($j = 1; $j < $TotalCol; $j++) {
                    //$data[$i - 2][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();;
                    if($j == 1){
                        $code = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 2){
                        $fullname = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 3){
                        $gender = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 4){
                        $birthday = $this->_Convert->convertDate($sheet->getCellByColumnAndRow($j, $i)->getValue());
                    }elseif($j == 5){
                        $address = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 6){
                        $namefa = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 7){
                        $yearfa = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 8){
                        $phonefa = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 9){
                        $jobfa = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 10){
                        $namemo = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 11){
                        $yearmo = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 12){
                        $phonemo = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 13){
                        $jobmo = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }
                }
                $data = array("code" => $code, 'fullname' => $fullname, 'gender' => $gender, 'department_id' => $department,
                                'birthday' => $birthday,  'address' => $address, 'status' => 99);
                $this->model->addObj($data);
                if($namefa != ''){
                    $data_fa = array("code" => $code, "relation" => 'Bố', "fullname" => $namefa, 'year' => $yearfa, 'phone' => $phonefa, 'job' => $jobfa);
                    $this->model->addObj_detail($data_fa);
                }
                if($namemo != ''){
                    $data_mo = array("code" => $code, "relation" => 'Mẹ', "fullname" => $namemo, 'year' => $yearmo, 'phone' => $phonemo, 'job' => $jobmo);
                    $this->model->addObj_detail($data_mo);
                }
            }
            $jsonObj['msg'] = "Import dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Import dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render('personal/do_import');
    }

    function del_all(){
        $temp = $this->model->delObj_tmp();
        if($temp){
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("student/del_all");
    }

    function update_tmp(){
        $id = $_REQUEST['id'];
        $code = $_REQUEST['code']; $fullname = $_REQUEST['fullname']; $gender = $_REQUEST['gender'];
        $birthday = $this->_Convert->convertDate($_REQUEST['birthday']);
        $address = $_REQUEST['address'];
        $image = ($_FILES['image']['name'] != '') ? $this->_Convert->convert_img($_FILES['image']['name'], $code) : ''; 
        $datadc = json_decode($_REQUEST['datadc'], true);
        if($this->model->dupliObj($id, $code) > 0){
            $jsonObj['msg'] = "Mã học sinh đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj= json_encode($jsonObj);
        }else{
            $data_global = array("fullname" => $fullname, "gender" => $gender, "birthday" => $birthday,
                            "address" => $address, "image" => $image);
            $temp = $this->model->updateObj($id, $data_global);
            if($temp){
                $this->model->delObj_detail($code);
                foreach ($datadc as $row) {
                    $data_relation = array("code" => $code, "relation" => $row['relation'], "fullname" => $row['fullname'],
                                            "year" => $row['year'], "phone" => $row['phone'], "job" => $row['job']);
                    $this->model->addObj_detail($data_relation);
                }
                if($_FILES['image']['name'] != ''){
                    if(move_uploaded_file($_FILES['image']['tmp_name'], DIR_UPLOAD.'/student/'.$image)){
                        //$this->_Convert->generateBarcode($data = array('sku'=> $code), 'student');
                        $jsonObj['msg'] = "Ghi dữ liệu thành công";
                        $jsonObj['success'] = true;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }else{
                        //$this->_Convert->generateBarcode($data = array('sku'=> $code), 'student');
                        $jsonObj['msg'] = "Quá trình tải ảnh lên bị gián đoạn, dữ liệu học sinh đã được lưu";
                        $jsonObj['success'] = true;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }
                }else{
                    //$this->_Convert->generateBarcode($data = array('sku'=> $code), 'student');
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
        $this->view->render("student/update_tmp");
    }

    function del_tmp(){
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
        $this->view->render("student/del_tmp");
    }

    function update_all(){
        if($this->model->check_dupli_code() > 0){
            $jsonObj['msg']=  "Có học sinh trùng mã, vui lòng kiểm tra lại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $result = $this->model->get_all_tmp();
            foreach($result as $row){
                $data = array("status" => 1);
                $temp = $this->model->updateObj($row['id'], $data);
                if($temp){
                    $this->_Convert->generateBarcode($data = array('sku'=> $row['code']), 'student');
                }
            }
            $jsonObj['msg'] = 'Ghi dữ liệu thành công';
            $jsonObj['success']  = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("student/update_all");
    }
}
?>
