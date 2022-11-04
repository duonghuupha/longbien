<?php
class Works extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('works/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 5;
        $group = isset($_REQUEST['group']) ? $_REQUEST['group'] : '';
        $cate = (isset($_REQUEST['works']) && $_REQUEST['works']  != 'null') ? $_REQUEST['works'] : '';
        $title = isset($_REQUEST['title']) ? str_replace("$", " ", $_REQUEST['title']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($group, $cate, $title, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('works/content');
    }

    function add(){
        $code   = time(); $works = $_REQUEST['datadc']; $title = $_REQUEST['title'];
        $content = addslashes($_REQUEST['content']); $userid = $this->_Info[0]['id'];
        $createat = date("Y-m-d H:i:s"); $status = 1; $docid = $_REQUEST['doc_id'];
        $file = isset($_FILES['file']['name']) ? $this->_Convert->convert_file($_FILES['file']['name'], 'works') : '';
        $data = array("code" => $code, "works_id" => $works, "title" => $title, "content" => $content,
                        "file" => $file, "user_id" => $userid, "create_at" => $createat,
                        "status" => $status, "file_link" => $docid);
        $temp = $this->model->addObj($data);
        if($temp){
            if(isset($_FILES['file']['name'])){
                if(move_uploaded_file($_FILES['file']['tmp_name'], DIR_UPLOAD.'/works/'.$file)){
                    $jsonObj['msg'] = "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $jsonObj['msg'] = "Thông tin hồ sơ đã được lưu, quá trình tải file bị lỗi";
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
        $this->view->render('works/add');
    }

    function update(){
        $id = $_REQUEST['id']; $works = $_REQUEST['datadc']; $title = $_REQUEST['title'];
        $content = addslashes($_REQUEST['content']); $createat = date("Y-m-d H:i:s");
        $docid = $_REQUEST['doc_id'];
        $file = ($_FILES['file']['name'] != '' && isset($_FILES['file']['name'])) ? $this->_Convert->convert_file($_FILES['file']['name'], 'works') : $_REQUEST['fileold'];
        $data = array("works_id" => $works, "title" => $title, "content" => $content,
                        "file" => $file, "create_at" => $createat, "file_link" => $docid);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            if($_FILES['file']['name'] != '' && isset($_FILES['file']['name'])){
                if(move_uploaded_file($_FILES['file']['tmp_name'], DIR_UPLOAD.'/works/'.$file)){
                    $jsonObj['msg'] = "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $jsonObj['msg'] = "Thông tin hồ sơ đã được lưu, quá trình tải file bị lỗi";
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
        $this->view->render('works/update');
    }

    function del(){
        $id = $_REQUEST['id'];
        $data = array('status' => 0);
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
        $this->view->render('works/del');
    }

    function data_edit(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = json_encode($jsonObj[0]);
        $this->view->render("works/data_edit");
    }

    function detail(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("works/detail");
    }
///////////////////////////////////////////////////////////////////////////////////
    function list_works(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_works($keyword, $this->_Info[0]['id'], $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('works/list_works');
    }

    function list_works_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_works_total($keyword, $this->_Info[0]['id']);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('works/list_works_page');
    }
////////////////////////////////////////////////////////////////////////////////////////
    function list_doc(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_document($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render("works/list_doc");
    }

    function list_doc_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_document_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('works/list_doc_page');
    }
}
?>