<?php
class Weekly extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('weekly/index');
        require('layouts/footer.php');
    }

    function content_user(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_users($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('weekly/content_user');
    }

    function content(){
        $data = ($_REQUEST['data'] != '') ? base64_decode($_REQUEST['data']) : '';
        $datadel = ($_REQUEST['del'] != '') ? explode(",", base64_decode($_REQUEST['del'])) : [];
        $datadelu = ($_REQUEST['delu'] != '') ? explode(",", base64_decode($_REQUEST['delu'])) : [];
        $week = $this->_Convert->daysInWeek($_REQUEST['week']);
        if($data != ''){
            $data = explode(",", $data); $i = 0;
            foreach($week as $row){
                $array[$row] = array("date_work" => $row);
                foreach($data as $item){
                    $json_s = $this->model->get_task_of_user_via_date($item, date("Y-m-d", strtotime($row)), 1);
                    foreach($json_s as $post){
                        //echo "<span id='post_".$post['id']."'>+ ".$post['title']." <a href='javascript:void(0)' style='color:red' onclick='del(".$post['id'].")'><i class='fa fa-trash'></i></i></a><br/></span>";
                        $checked  = (in_array($post['id'], $datadel)) ? '1' : 0;  
                        $checkedu  = (in_array($post['user_main'].'.'.date("Y-m-d", strtotime($row)).'.1', $datadelu)) ? '1' : 0; 
                        $array[$row]['s'][] = array("id" => $post['id'], "title" => $post['title'], "usermain" => $post['usermain'],
                                            "date_work" => $post['date_work'], "checked" => $checked, "user_main" => $post['user_main'],
                                            "checkedu" => $checkedu);
                    }
                    $json_c = $this->model->get_task_of_user_via_date($item, date("Y-m-d", strtotime($row)), 2);
                    foreach($json_c as $postc){
                        //echo "<span id='post_".$post['id']."'>+ ".$post['title']." <a href='javascript:void(0)' style='color:red' onclick='del(".$post['id'].")'><i class='fa fa-trash'></i></i></a><br/></span>";
                        $checkedc  = (in_array($postc['id'], $datadel)) ? '1' : 0;
                        $checkedcu  = (in_array($postc['user_main'].'.'.date("Y-m-d", strtotime($row)).'.2', $datadelu)) ? '1' : 0; 
                        $array[$row]['c'][] = array("id" => $postc['id'], "title" => $postc['title'], "usermain" => $postc['usermain'],
                                            "date_work" => $post['date_work'], "checked" => $checkedc, "user_main" => $postc['user_main'],
                                            "checkedu" => $checkedcu);
                    }
                }
                $_SESSION['tasks'] = $array;
            }
        }else{
            $_SESSION['tasks']= [];
        }
        $this->view->render('weekly/content');
    }

    function export_pdf(){
        $this->view->week = $_REQUEST['week'];
        $this->view->render('weekly/export_pdf');
    }
}
?>
