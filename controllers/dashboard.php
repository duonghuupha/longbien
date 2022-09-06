<?php
class Dashboard extends Controller{
    function __construct(){
        parent::__construct();
    }

    function block_one(){
        $this->view->total_per = $this->model->get_total_personel();
        $this->view->total_stu = $this->model->get_total_student();
        $this->view->total_device = $this->model->get_total_device();
        $this->view->total_utensils = $this->model->get_total_utensils();
        $this->view->total_book_old = $this->model->get_total_book(1);
        $this->view->total_book_new = $this->model->get_total_book(2);
        $this->view->render('dashboard/block_one');
    }

    function block_two(){
        $id = $_REQUEST['id'];
        if($id == 1){
            $this->view->jsonObj = $this->model->get_percent_gender_student();
        }else{
            $this->view->jsonObj = [];
        }
        $this->view->render('dashboard/block_two');
    }

    function block_three(){
        $id = $_REQUEST['id'];
        if($id == 1){
            $this->view->jsonObj = $this->model->get_percent_gender_personel();
        }elseif($id == 2){
            $this->view->jsonObj = $this->model->get_percent_level_personel();
        }else{
            $this->view->jsonObj = $this->model->get_percent_job_personel();
        }
        $this->view->render('dashboard/block_three');
    }

    function block_four(){
        $this->view->render('dashboard/block_four');
    }

    function block_five(){
        $this->view->render('dashboard/block_five');
    }
}
?>
