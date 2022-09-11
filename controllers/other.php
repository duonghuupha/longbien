<?php
class Other extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function combo_years(){
        $jsonObj= $this->model->get_combo_years();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_years");
    }

    function combo_physical(){
        $jsonObj= $this->model->get_combo_phhysical();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_physical");
    }

    function combo_level(){
        $jsonObj= $this->model->get_combo_level();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_level");
    }

    function combo_subject(){
        $jsonObj= $this->model->get_combo_subject();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_subject");
    }

    function combo_subject_point(){
        $jsonObj= $this->model->get_combo_subject_point();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_subject_point");
    }

    function combo_job(){
        $jsonObj= $this->model->get_combo_job();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_job");
    }

    function combo_equipment(){
        $jsonObj= $this->model->get_combo_equipment();
        $this->view->jsonObj = $jsonObj;
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
        $jsonObj = $this->model->get_combo_task_group($_REQUEST['userid']);
        $this->view->jsonObj = $jsonObj;
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
        $jsonObj = $this->model->get_combo_people();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_people");
    }

    function combo_utensils(){
        $jsonObj = $this->model->get_combo_utensils();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_utensils");
    }
}
?>
