<?php
class Tasks extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('tasks/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('tasks/content');
    }

    function add(){
        $code = time(); $datework = $this->_Convert->convertDate($_REQUEST['date_work']);
        $timework = $_REQUEST['time_work']; $title = $_REQUEST['title']; $groupid = $_REQUEST['group_id'];
        $content = addslashes($_REQUEST['content']); $datadc = base64_decode($_REQUEST['datadc']);
        $file = ($_FILES['file']['name'] != '') ? $this->_Convert->convert_file($_FILES['file']['name'], 'tasks') : '';
        $usermain = (isset($_REQUEST['user_main_id']) && $_REQUEST['user_main_id'] != '') ? $_REQUEST['user_main_id'] : $this->_Info[0]['id'];
        $status = ($this->_Info[0]['id'] == $usermain) ? 2 : 0;
        $data = array("code" => $code, "title" => $title, "content" => $content, "date_work" => $datework,
                        "time_work" => $timework, "user_id" => $this->_Info[0]['id'], "user_share" => $datadc,
                        "file" => $file, "status" => $status, "create_at" => date("Y-m-d H:i:s"), "group_id" => $groupid,
                        "user_main" => $usermain);
        $temp = $this->model->addObj($data);
        if($temp){
            //  ghi du lieu thong bao
            $user_ar = [];
            if($usermain !=  $this->_Info[0]['id']){
                array_push($user_ar, $usermain);
            }
            if($datadc != ''){
                $user_share = explode(",", $datadc); $user_share = array_filter($user_share);
                array_merge($user_ar, $user_share);
            }
            if(count($user_ar) > 0){
                $id_task = $this->model->get_id_task_by_code($code);
                $this->add_notify($user_ar, "Bạn có công việc mới", URL.'/tasks/detail?id='.$id_task);
            }
            //////////////////////////////////////////////////////////////////////////////
            if($_FILES['file']['name'] != ''){
                $dirname = DIR_UPLOAD.'/tasks/'.$this->_Info[0]['id'];
                if(!file_exists($dirname)){
                    mkdir($dirname, 0777);
                }
                if(move_uploaded_file($_FILES['file']['tmp_name'], $dirname.'/'.$file)){
                    $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                    $jsonObj['msg'] = "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                    $jsonObj['msg'] = "Quá trình tải file gặp vấn đề, thông tin công việc đã được lưu";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }else{
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("tasks/add");
    }

    function update(){
        $id = $_REQUEST['id']; $datework = $this->_Convert->convertDate($_REQUEST['date_work']);
        $timework = $_REQUEST['time_work']; $title = $_REQUEST['title']; $groupid = $_REQUEST['group_id'];
        $content = addslashes($_REQUEST['content']); $datadc = base64_decode($_REQUEST['datadc']); $usermain = $_REQUEST['user_main_id'];
        $file = ($_FILES['file']['name'] != '') ? $this->_Convert->convert_file($_FILES['file']['name'], 'tasks') : $_REQUEST['file_old'];
        $data = array("title" => $title, "content" => $content, "date_work" => $datework, "time_work" => $timework, 
                        "user_id" => $this->_Info[0]['id'], "user_share" => $datadc, "file" => $file, 
                        "create_at" => date("Y-m-d H:i:s"), "group_id" => $groupid, "user_main" => $usermain);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            //  ghi du lieu thong bao
            $json = $this->model->get_info_edit($id);
            $usertask = $json[0]['user_id'].','.$json[0]['user_main'].','.$json[0]['user_share'];
            $usertask = explode(",", $usertask); $usertask =  array_filter($usertask);
            $user_ar = array_diff($usertask, [$this->_Info[0]['id']]);
            if(count($user_ar) > 0){
                $this->add_notify($user_ar, "Cập nhật nội dung công việc", URL.'/tasks/detail?id='.$id);
            }
            if($_FILES['file']['name'] != ''){
                $dirname = DIR_UPLOAD.'/tasks/'.$this->_Info[0]['id'];
                if(!file_exists($dirname)){
                    mkdir($dirname, 0777);
                }
                if(move_uploaded_file($_FILES['file']['tmp_name'], $dirname.'/'.$file)){
                    $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'edit');
                    $jsonObj['msg'] = "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'edit');
                    $jsonObj['msg'] = "Quá trình tải file gặp vấn đề, thông tin công việc đã được lưu";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }else{
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'edit');
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("tasks/update");
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
        $this->view->render("tasks/del");
    }

    function detail(){
        require('layouts/header.php');
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info_edit($id);
        if($jsonObj[0]['status'] == 0 AND $this->_Info[0]['id'] == $jsonObj[0]['user_main']){
            $data = array('status' => 2); 
            $this->model->updateObj($id, $data);
            // cap nhat comment cho cong viec
            $data = array("task_id" => $id, "user_id" => $this->_Info[0]['id'], "file" => "",
                            "content" => "Tiếp nhận công việc", "create_at" => date("Y-m-d H:i:s"));
            $this->model->addObj_C($data);
            $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
        }
        //$comment = $this->model->get_comment_task($id);
        $this->view->jsonObj = $jsonObj;
        //$this->view->comment = $comment;
        $this->view->render('tasks/detail');
        require('layouts/footer.php');
    }

    function list_comment(){
        $rows = 7;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_comment_task($_REQUEST['id'], $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('tasks/list_comment');
    }

    function comment(){
        $id = $_REQUEST['id']; $content = $_REQUEST['content'];
        $file = ($_FILES['file']['name'] != '') ? $this->_Convert->convert_file($_FILES['file']['name'], 'comment_task') : '';
        $data = array("user_id" => $this->_Info[0]['id'], "task_id" => $id, "content" => $content,
                        "file" => $file, "create_at" => date("Y-m-d H:i:s"));
        $temp = $this->model->addObj_C($data);
        if($temp){
            //  ghi du lieu thong bao
            $json = $this->model->get_info_edit($id);
            $usertask = $json[0]['user_id'].','.$json[0]['user_main'].','.$json[0]['user_share'];
            $usertask = explode(",", $usertask); $usertask =  array_filter($usertask);
            $user_ar = array_diff($usertask, [$this->_Info[0]['id']]);
            if(count($user_ar) > 0){
                $this->add_notify($user_ar, "Trao đổi / ý kiến công việc", URL.'/tasks/detail?id='.$id);
            }
            if($_FILES['file']['name'] != ''){
                $dirname = DIR_UPLOAD.'/tasks/'.$this->_Info[0]['id'];
                if(!file_exists($dirname)){
                    mkdir($dirname, 0777);
                }
                if(move_uploaded_file($_FILES['file']['tmp_name'], $dirname.'/'.$file)){
                    $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                    $jsonObj["msg"] = 'Ghi dữ liệu thành công';
                    $jsonObj['success'] = true;
                    $this->view->jsonObj  = json_encode($jsonObj);
                }else{
                    $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                    $jsonObj["msg"] = 'Quá trình tải file gặp vấn đề, Dữ liệu đã được lưu';
                    $jsonObj['success'] = true;
                    $this->view->jsonObj  = json_encode($jsonObj);
                }
            }else{
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                $jsonObj["msg"] = 'Ghi dữ liệu thành công';
                $jsonObj['success'] = true;
                $this->view->jsonObj  = json_encode($jsonObj);
            }
        }else{
            $jsonObj["msg"] = 'Ghi dữ liệu không thành công';
            $jsonObj['success'] = false;
            $this->view->jsonObj  = json_encode($jsonObj);
        }
        $this->view->render("tasks/comment");
    }

    function finish(){
        $id = $_REQUEST['id']; $content = $_REQUEST['content'];
        $file = ($_FILES['file']['name'] != '') ? $this->_Convert->convert_file($_FILES['file']['name'], 'comment_task') : '';
        $data = array("user_id" => $this->_Info[0]['id'], "task_id" => $id, "content" => $content,
                        "file" => $file, "create_at" => date("Y-m-d H:i:s"));
        $temp = $this->model->addObj_C($data);
        if($temp){
             //  ghi du lieu thong bao
             $json = $this->model->get_info_edit($id);
             $usertask = $json[0]['user_id'].','.$json[0]['user_main'].','.$json[0]['user_share'];
             $usertask = explode(",", $usertask); $usertask =  array_filter($usertask);
             $user_ar = array_diff($usertask, [$this->_Info[0]['id']]);
             if(count($user_ar) > 0){
                 $this->add_notify($user_ar, "Trao đổi / ý kiến công việc", URL.'/tasks/detail?id='.$id);
             }
            //cap nhat trang thai cho cong viec
            $data_s = array("status" => 3, "create_at" => date("Y-m-d H:i:s"));
            $this->model->updateObj($id, $data_s);
            if($_FILES['file']['name'] != ''){
                $dirname = DIR_UPLOAD.'/tasks/'.$this->_Info[0]['id'];
                if(!file_exists($dirname)){
                    mkdir($dirname, 0777);
                }
                if(move_uploaded_file($_FILES['file']['tmp_name'], $dirname.'/'.$file)){
                    $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                    $jsonObj["msg"] = 'Ghi dữ liệu thành công';
                    $jsonObj['success'] = true;
                    $this->view->jsonObj  = json_encode($jsonObj);
                }else{
                    $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                    $jsonObj["msg"] = 'Quá trình tải file gặp vấn đề, Dữ liệu đã được lưu';
                    $jsonObj['success'] = true;
                    $this->view->jsonObj  = json_encode($jsonObj);
                }
            }else{
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                $jsonObj["msg"] = 'Ghi dữ liệu thành công';
                $jsonObj['success'] = true;
                $this->view->jsonObj  = json_encode($jsonObj);
            }
        }else{
            $jsonObj["msg"] = 'Ghi dữ liệu không thành công';
            $jsonObj['success'] = false;
            $this->view->jsonObj  = json_encode($jsonObj);
        }
        $this->view->render("tasks/finish");
    }
////////////////////////////////////////////////////////////////////////////////
    function list_user(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_users($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('tasks/list_user');
    }

    function list_user_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->geet_total_Data_user($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('tasks/list_user_page');
    }

    function data_edit(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info_edit($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("tasks/data_edit");
    }

    function add_notify($array, $title, $link){
        foreach($array as $row){
            $this->_Log->save_notify($row, $title, $link, $this->_Info[0]['id']);
        }
    }
}
?>
