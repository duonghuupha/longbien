<?php
class Personal extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
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
                    $this->_Convert->generateBarcode($data = array('sku'=> $code), 'teacher');
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
        $info = $this->model->get_info($id);
        $barcode = $info[0]['code']; $avatar = $info[0]['avatar'];
        $temp = $this->model->delObj($id);
        if($temp){
            // thực hiện xóa barcode, thẻ và ảnh đại diện
            if(file_exists(DIR_UPLOAD.'/barcode/teacher/'.$barcode.'.png')){
                unlink(DIR_UPLOAD.'/barcode/teacher/'.$barcode.'.png'); // Xóa barcode nhân sự
            }
            if(file_exists(DIR_UPLOAD.'/card/teacher/'.$barcode.'.png')){
                unlink(DIR_UPLOAD.'/card/teacher/'.$barcode.'.png'); // Xóa thẻ nhân sự
            }
            if($avatar != ''){
                if(file_exists(DIR_UPLOAD.'/avatar/'.$avatar)){
                    unlink(DIR_UPLOAD.'/avatar/'.$avatar); // Xóa ảnh đại diện
                }
            }
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

    function save_card(){
        $img = $_REQUEST['imgBase64']; $code = $_REQUEST['code'];
        $img = str_replace("data:image/png;base64,", "", $img);
        $imgr = str_replace(" ", "+", $img);
        $data = base64_decode($img);
        $file = DIR_UPLOAD.'/card/teacher/'.$code.'.png';
        if(file_exists($file)){
            unlink($file);
        }
        $success = file_put_contents($file, $data);
        if($success){
            $jsonObj['msg'] = "Tạo thẻ thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Quá trình tạo thẻ đang gián đoạn, vui lòng thử lại sau";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("personal/save_card");
    }

    function import(){
        require('layouts/header.php');
        $this->view->render("personal/import");
        require('layouts/footer.php');
    }

    function content_tmp(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj_tmp($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('personal/content_tmp');
    }

    function do_import(){
        // xoa het nhung ban ghi tam
        $tmp = $this->model->delObj_temp();
        if($tmp){
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
            for ($i = 4; $i <= $Totalrow; $i++) {
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
                        $phone = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 7){
                        $email = trim($sheet->getCellByColumnAndRow($j, $i)->getValue());
                    }
                }
                $data = array("code" => $code, 'fullname' => $fullname, 'gender' => $gender,
                                'birthday' => $birthday,  'address' => $address, 'phone' => $phone,
                                'email' => $email, 'status' => 99);
                $this->model->addObj($data);
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

    function update_tmp(){
        $id = $_REQUEST['id']; $code = $_REQUEST['code']; $fullname = $_REQUEST['fullname'];
        $gender = $_REQUEST['gender']; $birthday = $this->_Convert->convertDate($_REQUEST['birthday']);
        $phone = $_REQUEST['phone']; $email = $_REQUEST['email']; $address = $_REQUEST['address'];
        if($this->model->dupliObj($id, $code) > 0){
            $jsonObj['msg'] = "Mã nhân sự đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "fullname" => $fullname, "gender" => $gender, "phone" => $phone,
                            "birthday" => $birthday, "email" => $email, "address" => $address);
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
        $this->view->render("personal/update_tmp");
    }

    function update_all(){
        if($this->model->check_dupli_code() > 0){
            $jsonObj['msg']=  "Có nhân sự trùng mã, vui lòng kiểm tra lại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $result = $this->model->get_all_tmp();
            foreach($result as $row){
                $data = array("status" => 1);
                $temp = $this->model->updateObj($row['id'], $data);
                if($temp){
                    $this->_Convert->generateBarcode($data = array('sku'=> $row['code']), 'teacher');
                }
            }
            $jsonObj['msg'] = 'Ghi dữ liệu thành công';
            $jsonObj['success']  = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("personal/update_all");
    }

    function export_card(){
        require('layouts/header.php');
        $this->view->render("personal/export_card");
        require('layouts/footer.php');
    }

    function del_tmp(){
        $temp = $this->model->delObj_temp();
        if($temp){
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("personal/del_tmp");
    }

    function content_card(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('personal/content_card');
    }

    function print_card(){
        require('layouts/header.php');
        $data = $_REQUEST['data']; $data = base64_decode($data);
        $jsonObj = $this->model->get_personel_via_id($data);
        $this->view->jsonObj  = $jsonObj;
        $this->view->render("personal/print_card");
        require('layouts/footer.php');
    }

    function print_print_card(){
        $data = $_REQUEST['data']; $data = base64_decode($data);
        $jsonObj = $this->model->get_personel_via_id($data);
        $zip = new ZipArchive;
        $tmp_file = DIR_UPLOAD.'/card/tmp/the_nhan_su.zip';
        if ($zip->open($tmp_file,  ZipArchive::CREATE)) {
            foreach($jsonObj as $row){
                $zip->addFile(DIR_UPLOAD.'/card/teacher/'.$row['code'].'.png', $this->_Convert->vn2latin($row['code'], true).'.png');
                //$zip->addFile('folder/bootstrap.min.js', 'bootstrap.min.js');
            }
            $zip->close();
            //echo 'Archive created!';
                //header('Content-disposition: attachment; filename=files.zip');
                //header('Content-type: application/zip');
                //readfile($tmp_file);
            $jsonObj['msg'] = "Nén dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        } else {
            $jsonObj['msg'] = "Nén dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("personal/print_print_card");
    }

    function del_card(){
        $dirname = DIR_UPLOAD.'/card/teacher/*';
        if(array_map('unlink', array_filter((array) glob($dirname)))){
            $jsonObj['msg'] = "";
            $jsonObj['success'] = true;
            $this->view->jsonObj=  json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu tạm không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj=  json_encode($jsonObj);
        }
        $this->view->render("personal/del_card");
    }
}
?>
