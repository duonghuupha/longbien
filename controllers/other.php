<?php
class Other extends Controller{
    function __construct(){
        parent::__construct();
    }

    function combo_years(){
        $jsonObj= $this->model->get_combo_years();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_years");
    }

    function combo_physical(){
        $keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : '';
        $jsonObj= $this->model->get_combo_phhysical($keyword);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("other/combo_physical");
    }

    function combo_level(){
        $keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : ''; 
        $jsonObj= $this->model->get_combo_level($keyword);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("other/combo_level");
    }

    function combo_subject(){
        $keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : ''; 
        $jsonObj= $this->model->get_combo_subject($keyword);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("other/combo_subject");
    }

    function combo_subject_point(){
        $jsonObj= $this->model->get_combo_subject_point();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_subject_point");
    }

    function combo_job(){
        $keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : ''; 
        $jsonObj= $this->model->get_combo_job($keyword);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("other/combo_job");
    }

    function combo_equipment(){
        $keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : '';
        $jsonObj= $this->model->get_combo_equipment($keyword);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("other/combo_equipment");
    }

    function combo_department(){
        $jsonObj= $this->model->get_combo_department($_REQUEST['yearid']);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_department");
    }

    function info_personel_scan(){
        $code = $_REQUEST['code'];
        $jsonObj = $this->model->get_info_personel_via_code($code);
        $this->view->jsonObj = json_encode($jsonObj[0]);
        $this->view->render("other/info_personel_scan");
    }

    function info_device_scan(){
        $code_device = explode(".",  $_REQUEST['code']);  $code_device = array_filter(array_unique($code_device));
        if(count($code_device) > 1){
            $info = $this->model->get_info_device_pass_code_scan($code_device[0]);
            // kiem tra xem thiet bi co ton tai khong
            if($this->_Data->check_exit_sub_device($info[0]['id'], $code_device[1]) > 0
            || $this->_Data->check_exit_sub_device_loans($info[0]['id'], $code_device[1]) > 0
            || $this->_Data->check_exit_sub_device_return($info[0]['id'], $code_device[1]) == 1){
                $jsonObj['total'] = 0;
                $jsonObj['record'] = [];
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $json = $this->model->get_info_device_via_code($code_device[0], $code_device[1]);
                $jsonObj['record'] = $json[0];
                $jsonObj['total'] = 1;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['total'] = 0;
            $jsonObj['record'] = [];
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("other/info_device_scan");
    }

    function info_export_device_scan(){
        $code_device = explode(".", $_REQUEST['code']);
        $info = $this->model->get_info_export_device_scan($code_device[0], $code_device[1]);
        if(count($info) > 0){
            $jsonObj['msg'] ="Load dữ liệu thành công";
            $jsonObj['success'] = true;
            $jsonObj['physicalid'] = $info[0]['physical_id'];
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] ="Không tồn tại thiết phân bổ";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("other/info_export_device_scan");
    }

    function combo_task_group(){
        $keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : ''; 
        $jsonObj = $this->model->get_combo_task_group($_REQUEST['userid'], $keyword);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("other/combo_task_group");
    }

    function combo_document_cate(){
        $jsonObj = $this->model->get_combo_document_cate();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_document_cate");
    }

    function combo_book_cate(){
        $jsonObj = $this->model->get_combo_book_cate();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_book_cate");
    }

    function combo_book_manu(){
        $jsonObj = $this->model->get_combo_book_manu();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_book_manu");
    }

    function combo_people(){
        $keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : ''; 
        $jsonObj = $this->model->get_combo_people($keyword);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("other/combo_people");
    }

    function combo_utensils(){
        $jsonObj = $this->model->get_combo_utensils();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_utensils");
    }

    function combo_quanlity(){
        $jsonObj= $this->model->get_combo_quanlity();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_quanlity");
    }

    function combo_standard(){
        $jsonObj= $this->model->get_combo_standard($_REQUEST['id']);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_standard");
    }

    function combo_tieu_chuan(){
        $jsonObj= $this->model->get_combo_tieu_chuan();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_tieu_chuan");
    }

    function combo_criteria(){
        $jsonObj= $this->model->get_combo_criteria($_REQUEST['id']);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_criteria");
    }

    function combo_works_group(){
        $jsonObj = $this->model->get_combo_works_group();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_works_group");
    }

    function combo_works_cate(){
        $jsonObj = $this->model->get_combo_works_cate($_REQUEST['id']);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_works_cate");
    }

    function combo_subject_point_no_null(){
        $jsonObj= $this->model->get_combo_subject_point();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_subject_point_no_null");
    }

    function combo_department_no_null(){
        $jsonObj= $this->model->get_combo_department($_REQUEST['yearid']);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_department_no_null");
    }

    function combo_subject_user(){
        $userid = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : $this->_Info[0]['id']; 
        $yearid = $this->_Year[0]['id']; 
        $keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : ''; 
        $type = $this->model->check_user_is_teacher($userid);
        $jsonObj = $this->model->get_combo_subject_via_user_id($type, $userid, $yearid, $keyword);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("other/combo_subject_user");
    }

    function combo_department_user(){
        $userid = (isset($_REQUEST['userid'])) ? $_REQUEST['userid'] : $this->_Info[0]['id']; 
        $yearid = $this->_Year[0]['id']; $subjectid = $_REQUEST['id'];
        $keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : ''; 
        $type = $this->model->check_user_is_teacher($userid);
        $jsonObj = $this->model->get_combo_department_user($type, $userid, $yearid, $subjectid, $keyword);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("other/combo_department_user");
    }
}
?>
