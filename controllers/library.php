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
        $title = isset($_REQUEST['t']) ? str_replace("$", " ", $_REQUEST['t']) : '';
        $cate = isset($_REQUEST['c']) ? $_REQUEST['c'] : '';
        $manu = isset($_REQUEST['m']) ? $_REQUEST['m'] : '';
        $author = isset($_REQUEST['a']) ? str_replace("$", " ", $_REQUEST['a']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($title, $cate, $manu, $author, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('library/content');
    }

    function add(){
        $code = $_REQUEST['code']; $manuid = $_REQUEST['manu_id']; $cateid = $_REQUEST['cate_id'];
        $numberpage = $_REQUEST['number_page'];  $author = $_REQUEST['author']; $title = $_REQUEST['title'];
        $content = addslashes($_REQUEST['content']); $type = $_REQUEST['type'];
        $image = ($_FILES['image']['name'] != '') ? $this->_Convert->convert_file($_FILES['image']['name'], 'img_library') : '';
        $yearp = $_REQUEST['year_publish']; $positionp = $_REQUEST['position_publish'];
        $binid = isset($_REQUEST['bin_id']) ? $_REQUEST['bin_id'] : 0; 
        $floor = isset($_REQUEST['floor_id']) ? $_REQUEST['floor_id'] : 0; 
        $stock = $_REQUEST['stock'];
        if($type == 2){
            $file = $this->_Convert->convert_file($_FILES['file']['name'], 'file_library');
        }else{
            $file = '';
        }
        if($this->model->dupliObj(0,$code) > 0){
            $jsonObj['msg'] = "Mã sách đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonOobj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "cate_id" => $cateid, "manu_id" => $manuid, "title" => $title,
                            "content" => $content, "number_page" => $numberpage, "author" => $author,
                            "image" => $image, "type" => $type, "file" => $file, "status" => 0, "stock" => $stock,
                            "user_id" => $this->_Info[0]['id'], "create_at" => date("Y-m-d  H:i:s"),
                            "year_publish" => $yearp, "position_publish" => $positionp, "bin_id" => $binid,
                            "floor_id" => $floor);
            $temp = $this->model->addObj($data);
            if($temp){
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                if($_FILES['image']['name'] != ''){
                    move_uploaded_file($_FILES['image']['tmp_name'], DIR_UPLOAD.'/library/images/'.$image);
                }
                if(isset($_FILES['file']['name'])){
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
        $image = ($_FILES['image']['name'] != '') ? $this->_Convert->convert_file($_FILES['image']['name'], 'img_library') : $_REQUEST['image_old'];
        if($type == 2){
            $file = ($_FILES['file']['name'] != '') ? $this->_Convert->convert_file($_FILES['file']['name'], 'file_library') : $_REQUEST['file_old'];
        }else{
            $file = '';
        }
        $yearp = $_REQUEST['year_publish']; $positionp = $_REQUEST['position_publish'];
        $binid = isset($_REQUEST['bin_id']) ? $_REQUEST['bin_id'] : 0; 
        $floor = isset($_REQUEST['floor_id']) ? $_REQUEST['floor_id'] : 0; 
        $stock = $_REQUEST['stock'];
        if($this->model->dupliObj($id,$code) > 0){
            $jsonObj['msg'] = "Mã sách đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonOobj = json_encode($jsonObj);
        }else{
            $data = array("cate_id" => $cateid, "manu_id" => $manuid, "title" => $title,
                            "content" => $content, "number_page" => $numberpage, "author" => $author,
                            "image" => $image, "type" => $type, "file" => $file, "create_at" => date("Y-m-d  H:i:s"),
                            "year_publish" => $yearp, "position_publish" => $positionp, "bin_id" => $binid,
                            "floor_id" => $floor, 'stock' => $stock);
            $temp = $this->model->updateObj($id, $data);
            if($temp){
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'edit');
                if($_FILES['image']['name'] != ''){
                    move_uploaded_file($_FILES['image']['tmp_name'], DIR_UPLOAD.'/library/images/'.$image);
                }
                if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
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
        $jsonObj  = $this->model->get_info($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("library/detail");
    }
/////////////////////////////////////////////////////////////////////////////////////////////
    function data_edit(){
        $id= $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = json_encode($jsonObj[0]);
        $this->view->render("library/data_edit");
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function content_h(){
        $rows = 10; $id = $_REQUEST['id']; $detail = $this->model->get_info($id);
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        if($detail[0]['type'] == 1){ // sach ruyen thong
            $jsonObj = $this->model->get_data_loan_book($id, $keyword, $offset, $rows);
        }else{
            $jsonObj = $this->model->get_data_read_book($id, $offset, $rows);
        }
        $this->view->jsonObj = $jsonObj; $this->view->type = $detail[0]['type'];
        //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('library/content_h');
    }

    function content_h_page(){
        $rows = 10; $id = $_REQUEST['id']; $detail = $this->model->get_info($id);
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        if($detail[0]['type'] == 1){ // sach ruyen thong
            $jsonObj = $this->model->get_data_loan_book_total($id, $keyword);
        }else{
            $jsonObj=  $this->model->get_data_read_book_total($id, $keyword);
        }
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('library/content_h_page');
    }
}
?>
