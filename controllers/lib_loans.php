<?php
class Lib_loans extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('lib_loans/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($this->_Info[0]['id'], $keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_loans/content');
    }

    function add(){
        $code = time(); $user_create = $this->_Info[0]['id']; $userid = $_REQUEST['user_loan'];
        $studentid = $_REQUEST['student_loan']; $status = 0; $create_at = date("Y-m-d H:i:s");
        $dateloan = $this->_Convert->convertDate($_REQUEST['date_loan']).' '.date("H:i:s");
        $datereturn = $this->_Convert->convertDate($_REQUEST['date_return']);
        $datadc = json_decode($_REQUEST['datadc'], true); $bookid = 0; $sub = 0;
        foreach($datadc as $row){
            $bookid = $row['id']; $sub = $row['sub'];
        }
        // kiem tra sach da duoc tra chua
        if($this->model->check_return_book($bookid, $sub) > 0){
            $jsonObj['msg'] = "Sách chưa được trả bạn không thể mượn";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "user_create" => $user_create, "user_id" => $userid, "student_id" => $studentid,
                            "date_loan" => $dateloan, "date_return" => $datereturn, "book_id" => $bookid, "sub_book" => $sub,
                            "status" => $status, "create_at" => $create_at);
            $temp = $this->model->addObj($data);
            if($temp){
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu không thành công";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render('lib_loans/add');
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////
    function list_book(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_book($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_loans/list_book');
    }

    function list_book_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_book_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_loans/list_book_page');
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////
    function list_student(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_student($keyword, $this->_Year[0]['id'], $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_loans/list_student');
    }

    function list_student_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_student_page($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_loans/list_student_page');
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////
    function list_personel(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_personel($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_loans/list_personel');
    }

    function list_personel_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_personel_page($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_loans/list_personel_page');
    }
}
?>
