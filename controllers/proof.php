<?php
class Proof extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('proof/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('proof/content');
    }

    function add(){
        $code = time(); $criteria = $_REQUEST['criteria_id']; $codeproof = $_REQUEST['code_proof'];
        $title = $_REQUEST['title']; $createat = date("Y-m-d H:i:s"); $status = 1;
        $file = ($_FILES['file']['name'] != '') ? $this->_Convert->convert_file($_FILES['file']['name'],'proof') : '';
        if($this->model->dupliObj(0, $codeproof) > 0){
            $jsonObj['msg'] = "Mã hóa minh chứng đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "code_proof" => $codeproof, "criteria_id" => $criteria,
                            "title" => $title, "file" => $file, "create_at" => $createat,
                            "user_id" => $this->_Info[0]['id'], "status" => $status);
            $temp = $this->model->addObj($data);
            if($temp){
                if($_FILES['file']['name'] != ''){
                    // kiem tra xem co ton tai folder khong
                    $dirname = DIR_UPLOAD.'/proof_quanlity/'.$criteria;
                    if(!file_exists($dirname)){
                        mkdir($dirname, 0777);
                    }
                    if(move_uploaded_file($_FILES['file']['tmp_name'], $dirname.'/'.$file)){
                        $jsonObj['msg'] = "Ghi dữ liệu thành công";
                        $jsonObj['success'] = true;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }else{
                        $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                        $jsonObj['success'] = false;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }
                }else{
                    $jsonObj['msg'] = "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render('proof/add');
    }

    function update(){
        $id = $_REQUEST['id']; $criteria = $_REQUEST['criteria_id']; $codeproof = $_REQUEST['code_proof'];
        $title = $_REQUEST['title']; $createat = date("Y-m-d H:i:s");
        $file = ($_FILES['file']['name'] != '') ? $this->_Convert->convert_file($_FILES['file']['name'],'proof') : $_REQUEST['file_old'];
        if($this->model->dupliObj($id, $codeproof) > 0){
            $jsonObj['msg'] = "Mã hóa minh chứng đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("code_proof" => $codeproof, "criteria_id" => $criteria,
                            "title" => $title, "file" => $file, "create_at" => $createat,
                            "user_id" => $this->_Info[0]['id']);
            $temp = $this->model->updateObj($id, $data);
            if($temp){
                if($_FILES['file']['name'] != ''){
                    // kiem tra xem co ton tai folder khong
                    $dirname = DIR_UPLOAD.'/proof_quanlity/'.$criteria;
                    if(!file_exists($dirname)){
                        mkdir($dirname, 0777);
                    }
                    if(move_uploaded_file($_FILES['file']['tmp_name'], $dirname.'/'.$file)){
                        $jsonObj['msg'] = "Ghi dữ liệu thành công";
                        $jsonObj['success'] = true;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }else{
                        $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                        $jsonObj['success'] = false;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }
                }else{
                    $jsonObj['msg'] = "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render('proof/update');
    }

    function del(){
        $id = $_REQUEST['id']; $info = $this->model->get_info($id);
        $file = $info[0]['file']; $criteria = $info[0]['criteria_id'];
        $temp = $this->model->delObj($id);
        if($temp){
            unlink(DIR_UPLOAD.'/proof_quanlity/'.$criteria.'/'.$file);
            $jsonObj['msg'] =  "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] =  "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render('proof/del');
    }

    function data_edit(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = json_encode($jsonObj[0]);
        $this->view->render('proof/data_edit');
    }

    function detail(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render('proof/detail');
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function list_criteria(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        if($this->_Info[0]['id'] == 1){ // la quan tri vien
            $array_id = '';
        }else{ // la nguoi dung dc phan quyen
            $criteria = $this->model->get_all_criteria_role($this->_Info[0]['id']);
            $criteria = explode(",", $criteria); $array = [];
            foreach($criteria as $item){    
                $role = explode("_", $item);
                if(count($role) > 1){
                    $array[] = $role[1];
                }
            }
            $array_id = implode(",", $array);
        }
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_criteria($keyword, $array_id, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('proof/list_criteria');
    }

    function list_criteria_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        if($this->_Info[0]['id'] == 1){ // la quan tri vien
            $array_id = '';
        }else{ // la nguoi dung dc phan quyen
            $criteria = $this->model->get_all_criteria_role($this->_Info[0]['id']);
            $criteria = explode(",", $criteria); $array = [];
            foreach($criteria as $item){    
                $role = explode("_", $item);
                if(count($role) > 1){
                    $array[] = $role[1];
                }
            }
            $array_id = implode(",", $array);
        }
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_criteria_total($keyword, $array_id);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('proof/list_criteria_page');
    }
}
?>