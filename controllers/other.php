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
}
?>
