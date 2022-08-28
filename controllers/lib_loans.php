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
        $jsonObj = $this->model->getFetObj($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_loans/content');
    }

    function per_stu_info(){
        $code = base64_decode($_REQUEST['code']);
        if(strlen($code) == 10 || strlen($code) == 12){
            if(strlen($code) == 10){ // giao vien
                $detail = $this->model->get_info_per($code);
                if(count($detail) > 0){
                    $jsonObj['type'] = 1;
                    $jsonObj['success'] = true;
                    $jsonObj['fullname'] = $detail[0]['fullname'];
                    $jsonObj['job'] = $detail[0]['job'];
                }else{
                    $jsonObj['msg'] = "Giáo viên chưa có tài khoản";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = $jsonObj;
                }
            }else{ // hoc sinh
                $detail = $this->model->get_info_student($code, $this->_Year[0]['id']);
                $jsonObj['type'] = 2;
                $jsonObj['success'] = true;
                $jsonObj['fullname'] = $detail[0]['fullname'];
                $jsonObj['department'] = $detail[0]['department'];
            }
            $this->view->jsonObj = $jsonObj;
        }else{
            $jsonObj['msg'] = "Mã giáo viên học sinh không chính xác";
            $jsonObj['success'] = false;
            $this->view->jsonObj = $jsonObj;
        }
        $this->view->render("lib_loans/per_stu_info");
    }

    function book_info(){
        $code = base64_decode($_REQUEST['code']);
        $code = explode(".", $code);
        if(count($code) > 1){
            // kiem tra xem sach da duoc tra chua
            if($this->model->check_book_returned($code[0], $code[1]) > 0){
                $jsonObj['msg'] = "Sách này đã có người mượn chưa trả, bạn không thể mượn";
                $jsonObj['success'] = false;
                $this->view->jsonObj = $jsonObj;
            }else{
                // kiem tra xem sach co bi thu hoi khong
                if($this->model->check_restore_book_via_code($code[0], $code[1]) == 1){
                    $jsonObj['msg'] = "Sách đã bị thu hồi không thể mượn";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = $jsonObj;
                }else{
                    $detail = $this->model->get_info_book($code[0]);
                    if(count($detail) > 0){
                        $jsonObj['success'] = true;
                        $jsonObj['title'] = $detail[0]['title'];
                        $jsonObj['cate'] = $detail[0]['category'];
                        $jsonObj['manu'] = $detail[0]['manufactory'];
                        $jsonObj['sub_book'] = $code[1];
                        $this->view->jsonObj = $jsonObj;
                    }else{
                        $jsonObj['msg'] = 'Thông tin sách không tồn tại';
                        $jsonObj['success'] = false;
                        $this->view->jsonObj = $jsonObj;
                    }
                }
            }
        }else{
            $jsonObj['msg'] = "Mã sách không chính xác";
            $jsonObj['success'] = false;
            $this->view->jsonObj = $jsonObj;
        }
        $this->view->render("lib_loans/book_info");
    }

    function add(){
        $codeperstu = $_REQUEST['per_stu_code'];  $codebook = $_REQUEST['book_code'];
        $code = time(); $codebook = explode(".", $codebook);
        if(strlen($codeperstu) == 10 || strlen($codeperstu) == 12){
            $detail_book = $this->model->get_info_book($codebook[0]);
            if(count($detail_book) > 0){
                if($this->model->check_book_returned($codebook[0], $codebook[1]) > 0){
                    $jsonObj['msg'] = "Sách này đã có người mượn chưa trả, bạn không thể mượn";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    if(strlen($codeperstu) == 10){ // giao vien
                        $detail = $this->model->get_info_per($codeperstu);
                        $userid = $detail[0]['id']; $studentid = 0;
                    }else{ // hoc sinh
                        $detail = $this->model->get_info_student($codeperstu);
                        $userid = 0; $studentid = $detail[0]['id'];
                    }
                    $book_id = $detail_book[0]['id']; $subbook = $codebook[1];
                    $data = array("code" => $code, "user_id" => $userid, "student_id" => $studentid,
                                    "book_id" => $book_id, "sub_book" => $subbook, "date_loan" => date("Y-m-d H:i:s"),
                                    "date_return" => '', "status" => 0, "create_at" => date("Y-m-d H:i:s"));
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
            }else{
                $jsonObj['msg'] = "Mã sách không tồn tại";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Mã học sinh / giáo viên không chính xác";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("lib_loans/add");
    }

    function add_modal(){
        $userid = $_REQUEST['user_id']; $studentid = $_REQUEST['student_id'];
        $code = time(); $book = $_REQUEST['book_id']; $book = explode(".", $book);
        $bookid = $book[0]; $subbook = $book[1];
        if($this->model->check_book_returned_via_id($bookid, $subbook) > 0){
            $jsonObj['msg'] = "Sách này đã có người mượn chưa trả, bạn không thể mượn";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("code" => $code, "user_id" => $userid, "student_id" => $studentid,
                            "book_id" => $bookid, "sub_book" => $subbook, "date_loan" => date("Y-m-d H:i:s"),
                            "date_return" => '', "status" => 0, "create_at" => date("Y-m-d H:i:s"));
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
        $this->view->render("lib_loans/add_modal");
    }

    function check_return(){
        $code = base64_decode($_REQUEST['code']);
        $code = explode(".", $code);
        if($this->model->check_book_returned($code[0], $code[1]) > 0){
            $jsonObj['msg'] = "Sách chưa được trả, bạn có muốn trả sách";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = '';
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("lib_loans/check_return");
    }

    function return(){
        $code = base64_decode($_REQUEST['code']); $code = explode(".", $code);
        $detail_book = $this->model->get_info_book($code[0]);
        $data = array("status" => 1, "date_return" => date("Y-m-d H:i:s"));
        $temp = $this->model->return_book($data, $detail_book[0]['id'], $code[1]);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("lib_loans/return");
    }

    function update(){
        $id = $_REQUEST['id'];
        $data = array("status" => 1, "date_return" => date("Y-m-d H:i:s"));
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("lib_loans/update");
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function list_user(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_users($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_loans/list_user');
    }

    function list_user_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->geet_total_Data_user($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_loans/list_user_page');
    }

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
        $jsonObj = $this->model->get_data_student_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('lib_loans/list_student_page');
    }

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
}
?>
