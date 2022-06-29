<?php
class Other extends Controller{
    private $_Data;
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
        $this->_Data = new Model();
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

    function info_personel_scan(){
        $code = $_REQUEST['code'];
        $jsonObj = $this->model->get_info_personel_via_code($code);
        $this->view->jsonObj = json_encode($jsonObj[0]);
        $this->view->render("other/info_personel_scan");
    }

    function info_device_scan(){
        $code_device = explode(".",  $_REQUEST['code']); 
        $info = $this->model->get_info_device_pass_code($code_device[0]);
        // kiem tra xem thiet bi co ton tai khong
        if($this->_Data->check_exit_sub_device($info[0]['id'], $code_device[1]) > 0
        || $this->_Data->check_exit_sub_device_loans($info[0]['id'], $code_device[1]) > 0){
            $jsonObj['total'] = 0;
            $jsonObj['record'] = [];
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $json = $this->model->get_info_device_via_code($code_device[0], $code_device[1]);
            $jsonObj['record'] = $json[0];
            $jsonObj['total'] = 1;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("other/info_device_scan");
    }
}
?>
