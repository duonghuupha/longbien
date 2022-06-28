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
}
?>
