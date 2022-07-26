<?php
class Library extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('library/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('library/content');
    }

    function add(){
        $code = $_REQUEST['code']; $manuid = $_REQUEST['manu_id']; $cateid = $_REQUEST['cate_id'];
        $numberpage = $_REQUEST['number_page'];  $author = $_REQUEST['author']; $title = $_REQUEST['title'];
        $content = addslashes($_REQUEST['content']); $type = $_REQUEST['type'];
        $stock = ($type == 1) ? $_REQUEST['stock'] : 0;
        $image = ($_FILES['image']['name'] != '') ? $this->_Convert->convert_file($_FILES['image']['name'], 'img_library') : '';
        $file = ($_FILES['file']['name'] != '') ? $this->_Convert->convert_file($_FILES['file']['name'], 'file_library') : '';
        if($this->model->dupliObj(0,$code) > 0){
            $jsonObj['msg'] = "Mã sách đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonOobj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "cate_id" => $cateid, "manu_id" => $manuid, "title" => $title,
                            "content" => $content, "number_page" => $numberpage, "author" => $author,
                            "image" => $image, "type" => $type, "file" => $file, "status" => 0,
                            "user_id" => $this->_Info[0]['id'], "create_at" => date("Y-m-d  H:i:s"),
                            "stock" =>  $stock);
            $temp = $this->model->addObj($data);
            if($temp){
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                if($_FILES['image']['name'] != ''){
                    move_uploaded_file($_FILES['image']['tmp_name'], DIR_UPLOAD.'/library/images/'.$image);
                }
                if($_FILES['file']['name'] != ''){
                    $dirname = DIR_UPLOAD.'/library/file/'.$cateid;
                    if(!file_exists($dirname)){
                        mkdir($dirname, 0777);
                    }
                    move_uploaded_file($_FILES['file']['tmp_name'], $dirname.'/'.$file);
                }
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render('library/add');
    }

    function update(){
        $id = $_REQUEST['id'];
        $code = $_REQUEST['code']; $manuid = $_REQUEST['manu_id']; $cateid = $_REQUEST['cate_id'];
        $numberpage = $_REQUEST['number_page'];  $author = $_REQUEST['author']; $title = $_REQUEST['title'];
        $content = addslashes($_REQUEST['content']); $type = $_REQUEST['type'];
        $stock = ($type == 1) ? $_REQUEST['stock'] : 0;
        $image = ($_FILES['image']['name'] != '') ? $this->_Convert->convert_file($_FILES['image']['name'], 'img_library') : $_REQUEST['image_old'];
        $file = ($_FILES['file']['name'] != '') ? $this->_Convert->convert_file($_FILES['file']['name'], 'file_library') : $_REQUEST['file_old'];
        if($this->model->dupliObj($id,$code) > 0){
            $jsonObj['msg'] = "Mã sách đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonOobj = json_encode($jsonObj);
        }else{
            $data = array("cate_id" => $cateid, "manu_id" => $manuid, "title" => $title,
                            "content" => $content, "number_page" => $numberpage, "author" => $author,
                            "image" => $image, "type" => $type, "file" => $file, "create_at" => date("Y-m-d  H:i:s"),
                            "stock" =>  $stock);
            $temp = $this->model->updateObj($id, $data);
            if($temp){
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'edit');
                if($_FILES['image']['name'] != ''){
                    move_uploaded_file($_FILES['image']['tmp_name'], DIR_UPLOAD.'/library/images/'.$image);
                }
                if($_FILES['file']['name'] != ''){
                    $dirname = DIR_UPLOAD.'/library/file/'.$cateid;
                    if(!file_exists($dirname)){
                        mkdir($dirname, 0777);
                    }
                    move_uploaded_file($_FILES['file']['tmp_name'], $dirname.'/'.$file);
                }
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render('library/update');
    }

    function del(){
        $id = $_REQUEST['id']; $data = array("status" =>  1);
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
        $this->view->render('library/del');
    }

    function detail(){
        $id = $_REQUEST['id'];
        $this->view->render("library/detail");
    }
/////////////////////////////////////////////////////////////////////////////////////////////
    function data_edit(){
        $id= $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = json_encode($jsonObj[0]);
        $this->view->render("library/data_edit");
    }
}
?>
