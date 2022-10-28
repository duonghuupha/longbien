<?php
class Gear extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('gear/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $title = isset($_REQUEST['title']) ? str_replace("$", " ", $_REQUEST['title']) : '';
        $code = isset($_REQUEST['code']) ? $_REQUEST['code'] : '';
        $cate = isset($_REQUEST['cate']) ? $_REQUEST['cate'] : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($title, $code, $cate, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('gear/content');
    }

    function add(){
        $code = $_REQUEST['code']; $title = $_REQUEST['title']; $cateid = $_REQUEST['cate_id'];
        $image = ($_FILES['image']['name'] != '') ? $this->_Convert->convert_file($_FILES['image']['name'], $code) : '';
        $content = addslashes($_REQUEST['content']); $stock = $_REQUEST['stock'];
        if($this->model->dupliObj(0, $code) > 0){
            $jsonObj['msg'] = "Mã đồ dùng đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "title" => $title, "cate_id" => $cateid, "image" => $image,
                            "content" => $content, "stock" => $stock, "status" => 0, "create_at" => date("Y-m-d H:i:s"));
            $temp = $this->model->addObj($data);
            if($temp){
                if($_FILES['image']['name'] != ''){
                    if(move_uploaded_file($_FILES['image']['tmp_name'], DIR_UPLOAD.'/utensils/images/'.$image)){
                        $jsonObj['msg'] = "Ghi dữ liệu thành công";
                        $jsonObj['success'] = true;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }else{
                        $jsonObj['msg'] = "Ghi dữ liệu thành công, hình ảnh chưa được cập nhật";
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
        $this->view->render("gear/add");
    }

    function update(){
        $id = $_REQUEST['id'];
        $code = $_REQUEST['code']; $title = $_REQUEST['title']; $cateid = $_REQUEST['cate_id'];
        $image = ($_FILES['image']['name'] != '') ? $this->_Convert->convert_file($_FILES['image']['name'], $code) : $_REQUEST['image_old'];
        $content = addslashes($_REQUEST['content']); $stock = $_REQUEST['stock'];
        if($this->model->dupliObj($id, $code) > 0){
            $jsonObj['msg'] = "Mã đồ dùng đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("title" => $title, "cate_id" => $cateid, "image" => $image,
                            "content" => $content, "stock" => $stock, "create_at" => date("Y-m-d H:i:s"));
            $temp = $this->model->updateObj($id, $data);
            if($temp){
                if($_FILES['image']['name'] != ''){
                    if(move_uploaded_file($_FILES['image']['tmp_name'], DIR_UPLOAD.'/utensils/images/'.$image)){
                        $jsonObj['msg'] = "Ghi dữ liệu thành công";
                        $jsonObj['success'] = true;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }else{
                        $jsonObj['msg'] = "Ghi dữ liệu thành công, hình ảnh chưa được cập nhật";
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
        $this->view->render("gear/update");
    }

    function del(){
        $id = $_REQUEST['id']; $data = array("status" => 1);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("gear/del");
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    function data_edit(){
        $jsonObj = $this->model->get_info($_REQUEST['id']);
        $this->view->jsonObj  = json_encode($jsonObj[0]);
        $this->view->render("gear/data_edit");
    }

    function detail(){
        $jsonObj = $this->model->get_info($_REQUEST['id']);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("gear/detail");
    }

    function import(){
        require('layouts/header.php');
        $this->view->render('gear/import');
        require('layouts/footer.php');
    }

    function content_tmp(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj_tmp($this->_Info[0]['id'], $keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('gear/content_tmp');
    } 

    function do_import(){
        // xoa het nhung ban ghi tam
        $tmp = $this->model->delObj_tmp();
        if($tmp){
            $file = $_FILES['file_gear']['tmp_name'];
            $cate = $_REQUEST['cate_imp'];
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
                        $title = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 3){
                        $content = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }elseif($j == 4){
                        $stock = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }
                }
                $data = array("code" => $code, 'title' => $title, 'cate_id' => $cate,
                                'content' => $content,  'stock' => $stock,
                                'create_at' => date("Y-m-d H:i:s"), 'status' => 99,
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
        $this->view->render('gear/do_import');
    }

    function update_all(){
        if($this->model->check_dupli_code() > 0){
            $jsonObj['msg']=  "Có đồ dùng trùng mã, vui lòng kiểm tra lại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $temp = $this->model->updateObj_all($this->_Info[0]['id']);
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
        $this->view->render("gear/update_all");
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
        $this->view->render("gear/del_tmp");
    }

    function del_all(){
        $temp = $this->model->delObj_tmp($this->_Info[0]['id']);
        if($temp){
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("gear/del_all");
    }
}
?>
