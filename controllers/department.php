<?php
class Department extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('department/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('department/content');
    }

    function add(){
        $title = $_REQUEST['title'];
        $namhocid = $_REQUEST['year_id'];
        $vatly = $_REQUEST['physical_id']; $classstudy = (isset($_REQUEST['class_study'])) ? 1 : 0;
        $default = (isset($_REQUEST['is_default'])) ? 1 : 0;
        $data = array('title' => $title, "year_id" => $namhocid, 'physical_id' => $vatly, 
                        'class_study' => $classstudy, 'is_default' => $default, 'user_id' => $this->_Info[0]['id'],
                        "status" => 0, "create_at" => date("Y-m-d H:i:s"));
        if($this->model->check_exit(0, $namhocid, $vatly) > 0){
            $jsonObj['msg'] = "Phòng 'vật lý' này trong năm học này đã được sắp xếp";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $temp = $this->model->addObj($data);
            if($temp){
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render("department/add");
    }

    function update(){
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $namhocid = $_REQUEST['year_id'];
        $vatly = $_REQUEST['physical_id']; $classstudy = (isset($_REQUEST['class_study'])) ? 1 : 0;
        $default = (isset($_REQUEST['is_default'])) ? 1 : 0;
        $data = array('title' => $title, "year_id" => $namhocid, 'physical_id' => $vatly, 
                        'class_study' => $classstudy, 'is_default' => $default, 'user_id' => $this->_Info[0]['id'],
                        "create_at" => date("Y-m-d H:i:s"));
        if($this->model->check_exit($id, $namhocid, $vatly) > 0){
            $jsonObj['msg'] = "Phòng 'vật lý' này trong năm học này đã được sắp xếp";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $temp = $this->model->updateObj($id, $data);
            if($temp){
                $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'edit');
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render("department/update");
    }

    function del(){
        $id = $_REQUEST['id']; $data = array("status" => 1);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'del');
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("department/del");
    }

    function list_department(){
        $jsonObj = $this->model->get_all_class_study($_REQUEST['id']);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("department/list_department");
    }

    function copy(){
        $yearfrom = $_REQUEST['year_from']; $yearto = $_REQUEST['year_to'];
        $departmentid = implode(",", $_REQUEST['department_id']);
        $list_physical_old = $this->model->get_all_class_study_physical($departmentid);
        foreach ($list_physical_old as $row) {
            $physicalid[] = $row['physical_id'];
        }
        if($this->model->check_exit_department_copy($yearto, implode(",", $physicalid)) > 0){
            $jsonObj['msg'] = "Trong danh sách dữ liệu copy đã tồn tại một lớp học có trong năm học ".$this->_Data->return_title_year($yearto);
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            foreach($list_physical_old as $item){
                $data = array("year_id" => $yearto, "physical_id" => $item['physical_id'], "title" => $item['title'],
                                "class_study" => $item['class_study'], "is_default" => $item['is_default'],
                                'user_id' => $this->_Info[0]['id'], "status" => 0, "create_at" => date("Y-m-d H:i:s"));
                $this->model->addObj($data);
            }
            $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'copy');
            $jsonObj['msg'] = "Copy dữ  liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("department/copy");
    }
}
?>
