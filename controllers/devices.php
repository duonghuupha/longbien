<?php
class Devices extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('devices/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('devices/content');
    }

    function add(){
        $code = $_REQUEST['code']; $title = $_REQUEST['title']; $cateid = $_REQUEST['cate_id'];
        $origin = $_REQUEST['origin']; $price = str_replace(",", "", $_REQUEST['price']); 
        $depreciation = $_REQUEST['depreciation']; $yearwork = $_REQUEST['year_work']; 
        $image = $_FILES['image']['name']; $description = $_REQUEST['description'];
        if($this->model->dupliObj(0, $code) > 0){
            $jsonObj['msg'] = "Mã thiết bị đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "title" => $title, "cate_id" => $cateid, "origin" => $origin,
                            "price" => $price, "depreciation" => $depreciation, "year_work" => $yearwork,
                            "image" => $image, "description" => $description, 'status' => 1);
            $temp = $this->model->addObj($data);
            if($temp){
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                if($_FILES['image']['name'] != ''){
                    if(move_uploaded_file($_FILES['image']['tmp_name'], DIR_UPLOAD.'/assets/images/'.$image)){
                        $jsonObj['msg'] = "Ghi dữ liệu thành công";
                        $jsonObj['success'] = true;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }else{
                        $jsonObj['msg'] = "Ghi dữ liệu thành công, hình ảnh chưa được đẩy lên, vui lòng cập nhật lại ảnh";
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
            $this->view->render("devices/add");
        }
    }

    function update(){
        $id = $_REQUEST['id'];
        $code = $_REQUEST['code']; $title = $_REQUEST['title']; $cateid = $_REQUEST['cate_id'];
        $origin = $_REQUEST['origin']; $price = str_replace(",", "", $_REQUEST['price']); 
        $depreciation = $_REQUEST['depreciation']; $yearwork = $_REQUEST['year_work']; 
        $image = ($_FILES['image']['name'] != '') ? $_FILES['image']['name'] : $_REQUEST['image_old']; 
        $description = $_REQUEST['description'];
        if($this->model->dupliObj($id, $code) > 0){
            $jsonObj['msg'] = "Mã thiết bị đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "title" => $title, "cate_id" => $cateid, "origin" => $origin,
                            "price" => $price, "depreciation" => $depreciation, "year_work" => $yearwork,
                            "image" => $image, "description" => $description);
            $temp = $this->model->updateObj($id, $data);
            if($temp){
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'edit');
                if($_FILES['image']['name'] != ''){
                    if(move_uploaded_file($_FILES['image']['tmp_name'], DIR_UPLOAD.'/assets/images/'.$image)){
                        $jsonObj['msg'] = "Ghi dữ liệu thành công";
                        $jsonObj['success'] = true;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }else{
                        $jsonObj['msg'] = "Ghi dữ liệu thành công, hình ảnh chưa được đẩy lên, vui lòng cập nhật lại ảnh";
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
            $this->view->render("devices/update");
        }
    }

    function del(){
        $id = $_REQUEST['id']; $data = array("status" => 0);
        $info = $this->model->get_info($id); $image = $info[0]['image'];
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'del');
            // thực hiện xóa barcode, thẻ và ảnh đại diện
            if($image != ''){
                if(file_exists(DIR_UPLOAD.'/assets/'.$image)){
                    unlink(DIR_UPLOAD.'/assets/'.$image); // Xóa ảnh đại diện
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
        $this->view->render("devices/del");
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    function data_edit(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = json_encode($jsonObj[0]);
        $this->view->render("devices/data_edit");
    }  

    function form_info(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render('devices/form_info');
    }

    function import(){
        require('layouts/header.php');
        $this->view->render('devices/import');
        require('layouts/footer.php');
    }

    function content_tmp(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj_tmp($this->_Info[0]['id'], $keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('devices/content_tmp');
    }

    function do_import(){
        // xoa het nhung ban ghi tam
        $tmp = $this->model->delObj_temp($this->_Info[0]['id']);
        if($tmp){
            $file = $_FILES['file_asset']['tmp_name'];
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
                        $title = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 3){
                        $origin = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 4){
                        $year_work = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 5){
                        $price = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 6){
                        $depreciation = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 7){
                        $description = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }
                }
                $data = array("code" => $code, 'title' => $title, 'origin' => $origin,
                                'year_work' => $year_work,  'price' => $price, 'depreciation' => $depreciation,
                                'description' => $description, 'status' => 99, "stock" => 0,
                                'user_id' => $this->_Info[0]['id']);
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
        $this->view->render('devices/do_import');
    }

    function del_tmp(){
        $temp = $this->model->delObj_temp($this->_Info[0]['id']);
        if($temp){
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("devices/del_tmp");
    }

    function update_tmp(){
        $id = $_REQUEST['id'];
        $code = $_REQUEST['code']; $title = $_REQUEST['title'];
        $origin = $_REQUEST['origin']; $price = str_replace(",", "", $_REQUEST['price']); 
        $depreciation = $_REQUEST['depreciation']; $yearwork = $_REQUEST['year_work']; 
        $description = $_REQUEST['description'];
        if($this->model->dupliObj($id, $code) > 0){
            $jsonObj['msg'] = "Mã thiết bị đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "title" => $title, "origin" => $origin,
                            "price" => $price, "depreciation" => $depreciation,
                            "year_work" => $yearwork, "description" => $description);
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
        $this->view->render("devices/update_tmp");
    }

    function update_all(){
        if($this->model->return_total_temp($this->_Info[0]['id']) == 0){
            $jsonObj['msg']=  "Không có bản ghi nào được chọn";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            if($this->model->check_dupli_code() > 0){
                $jsonObj['msg']=  "Có thiết bị trùng mã, vui lòng kiểm tra lại";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $temp = $this->model->update_all_tmp($this->_Info[0]['id']);
                if($temp){
                    $jsonObj['msg'] = 'Ghi dữ liệu thành công';
                    $jsonObj['success']  = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $jsonObj['msg'] = 'Ghi dữ liệu không thành công';
                    $jsonObj['success']  = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }
        }
        $this->view->render("personal/update_all");
    }
}
?>
