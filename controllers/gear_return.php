<?php
class Gear_return extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('gear_return/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $title = isset($_REQUEST['title']) ? str_replace("$", " ", $_REQUEST['title']) : '';
        $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : 0;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($title, $status, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('gear_return/content');
    }

    function add(){
        $code = time(); $userid= $this->_Info[0]['id']; $utensilsid= $_REQUEST['utensils_id'];
        $sub= $_REQUEST['sub_utensils']; $content = $_REQUEST['content'];
        if($this->model->dupliObj($utensilsid, $sub) == 1){
            $jsonObj['msg'] = "Đồ dùngđã bị thu hồi, không thể thu hồi tiếp";
            $jsonObj['success'] = false;
            $this->view->jsonObj= json_encode($jsonObj);
        }else{
            $data = array("code" => $code,  "user_id" =>$userid, "utensils_id" => $utensilsid, "sub_utensils" =>$sub,
                            "content" => $content, "status" =>  1, "create_at" => date("Y-m-d H:i:s"));
            $temp = $this->model->addObj($data);
            if($temp){
                $jsonObj['msg']   = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj= json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj= json_encode($jsonObj);
            }
        }
        $this->view->render("gear_return/add");
    }

    function list_gear(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_gear($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('gear_return/list_gear');
    }

    function list_gear_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_date_gear_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('gear_return/list_gear_page');
    }

    function data_edit(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info_return($id);
        $this->view->jsonObj = json_encode($jsonObj[0]);
        $this->view->render("gear_return/data_edit");
    }

    function restore(){
        $code = time(); $userid= $this->_Info[0]['id']; $utensilsid= $_REQUEST['utensils_id'];
        $sub= $_REQUEST['sub_utensils']; $content = $_REQUEST['content'];
        if($this->model->dupliObj($utensilsid, $sub) == 2){
            $jsonObj['msg'] = "Đồ dùng đang được kích hoạt, không thể khôi phục được";
            $jsonObj['success'] = false;
            $this->view->jsonObj= json_encode($jsonObj);
        }else{
            $data = array("code" => $code,  "user_id" =>$userid, "utensils_id" => $utensilsid, "sub_utensils" =>$sub,
                            "content" => $content, "status" =>  2, "create_at" => date("Y-m-d H:i:s"));
            $temp = $this->model->addObj($data);
            if($temp){
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj= json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj= json_encode($jsonObj);
            }
        }
        $this->view->render("gear_return/restore");
    }
}
?>
