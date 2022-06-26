<?php
class Loans extends Controller{
    private $_Convert;
    private $_Data;
    private $_Year;
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
        $this->_Convert = new Convert();
        $this->_Data = new Model();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('loans/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('loans/content');
    }

    function formadd(){
        require('layouts/header.php');
        $this->view->render('loans/formadd');
        require('layouts/footer.php');
    }

    function add(){
        $this->view->render("loans/add");
    }

    function formedit(){
        require('layouts/header.php');
        $this->view->render('loans/formedit');
        require('layouts/footer.php');
    }

    function update(){
        $this->view->render("loans/update");
    }

    function del(){
        $this->view->render("loans/del");
    }
///////////////////////////////////////////////////////////////////////////////////////////////
    function list_device(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render("loans/list_device");
    }

    function create_tmp(){
        // thuc hien tao bang du lieu tam cua thiet bi
        $tmp = $this->model->empty_table_tmp();
        if($tmp){
            $jsonObj = $this->model->get_device();
            foreach($jsonObj as $row){
                for($i = 1; $i <= $row['stock']; $i++){
                    if($this->_Data->check_exit_sub_device($row['id'], $i) == 0){
                        //echo $row['id'].'-'.$row['title'].'-'.$i.'<br/>';
                        $data = array('title' => $row['title'], "id_global" => $row['id'].'.'.$i, "code" =>  $row['code']);
                        $this->model->addObj_device_temp($data);
                    }
                }
            }
            $jsonObj['msg'] = "";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Quá trình tạo dữ liệu mẫu gặp lỗi. Vui lòng thử lại sau";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("loans/create_tmp");
    }
}
?>
