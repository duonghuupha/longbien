<?php
class Document_out extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('document_out/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $cate = isset($_REQUEST['c']) ? $_REQUEST['c'] : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword, $cate, $this->_Info[0]['id'], $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('document_out/content');
    }

    function add(){
        $code = time(); $cateid = $_REQUEST['cate_id']; $numberdc = $_REQUEST['number_dc'];
        $datedc = $this->_Convert->convertDate($_REQUEST['date_dc']); $title = $_REQUEST['title'];
        $content = $_REQUEST['content']; $location = $_REQUEST['location_to'];
        $userid = $this->_Info[0]['id']; $usershare = base64_decode($_REQUEST['data_user_share']);
        $file = $this->_Convert->convert_file($_FILES['file']['name'], 'document_out');
        if($this->model->dupliObj(0, $numberdc) > 0){
            $jsonObj['msg'] = 'Số văn bản đã tồn tại';
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "cate_id" => $cateid, "number_dc" => $numberdc, "date_dc" => $datedc,
                            "title" => $title, "content" => $content, "file" => $file, "location_to" => $location,
                            "user_id" => $userid, "user_share" => $usershare, "status" => 0,
                            "create_at" => date("Y-m-d H:i:s"));
            $temp = $this->model->addObj($data);
            if($temp){
                //ghi du lieu thong bao cho nguoi dung
                $array_user = trim($usershare); $array_user = explode(",", $array_user);
                array_filter($array_user);
                if(count($array_user)  > 0){
                    $this->add_notify($array_user, "Bạn có văn bản mới: ".$title, URL.'/document_out');
                }
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                $dirname = DIR_UPLOAD.'/document_out/'.$cateid;
                if(!file_exists($dirname)){
                    mkdir($dirname, 0777);
                }
                if(move_uploaded_file($_FILES['file']['tmp_name'], $dirname.'/'.$file)){
                    $jsonObj['msg'] = "Ghi dữ liệu thành công";
                    $jsonObj['success']  = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $jsonObj['msg'] = "Quá trình tải file gặp vấn dề, thông tin văn bản đã được lưu. Vui lòng thử lại sau";
                    $jsonObj['success']  = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                $jsonObj['success']  = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render("document_out/add");
    }

    function update(){
        $id = $_REQUEST['id']; $code = time(); $cateid = $_REQUEST['cate_id']; $numberdc = $_REQUEST['number_dc'];
        $datedc = $this->_Convert->convertDate($_REQUEST['date_dc']); $title = $_REQUEST['title'];
        $content = $_REQUEST['content']; $location = $_REQUEST['location_to'];
        $userid = $this->_Info[0]['id']; $usershare = base64_decode($_REQUEST['data_user_share']);
        $file = ($_FILES['file']['name'] != '') ? $this->_Convert->convert_file($_FILES['file']['name'], 'document_out') : $_REQUEST['file_old'];
        if($this->model->dupliObj($id, $numberdc) > 0){
            $jsonObj['msg'] = 'Số văn bản đã tồn tại';
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "cate_id" => $cateid, "number_dc" => $numberdc, "date_dc" => $datedc,
                            "title" => $title, "content" => $content, "file" => $file, "location_to" => $location,
                            "user_id" => $userid, "user_share" => $usershare, "status" => 0,
                            "create_at" => date("Y-m-d H:i:s"));
            $temp = $this->model->updateObj($id, $data);
            if($temp){
                //ghi du lieu thong bao cho nguoi dung
                $array_user = trim($usershare); $array_user = explode(",", $array_user);
                array_filter($array_user);
                if(count($array_user)  > 0){
                    $this->add_notify($array_user, "Cập nhật nội dung văn bản: ".$title, URL.'/document_out');
                }
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'edit');
                if($_FILES['file']['name'] != ''){
                    $dirname = DIR_UPLOAD.'/document_out/'.$cateid;
                    if(!file_exists($dirname)){
                        mkdir($dirname, 0777);
                    }
                    if(move_uploaded_file($_FILES['file']['tmp_name'], $dirname.'/'.$file)){
                        $jsonObj['msg'] = "Ghi dữ liệu thành công";
                        $jsonObj['success']  = true;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }else{
                        $jsonObj['msg'] = "Quá trình tải file gặp vấn dề, thông tin văn bản đã được lưu. Vui lòng thử lại sau";
                        $jsonObj['success']  = true;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }
                }else{
                    $jsonObj['msg'] = "Ghi dữ liệu thành công";
                    $jsonObj['success']  = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                $jsonObj['success']  = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render("document_out/add");
    }

    function del(){
        $id = $_REQUEST['id']; $data = array("status" => 1);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("document_out/del");
    }

    function detail(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("document_out/detail");
    }
//////////////////////////////////////////////////////////////////////////////////////////////
    function list_user(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_users($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('document_out/list_user');
    }

    function list_user_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->geet_total_Data_user($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('document_out/list_user_page');
    }

    function data_edit(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("document_out/data_edit");
    }

    function add_notify($array, $title, $link){
        foreach($array as $row){
            $this->_Log->save_notify($row, $title, $link, $this->_Info[0]['id']);
        }
    }
}
?>
