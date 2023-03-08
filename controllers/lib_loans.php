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

    function update(){
        $id = $_REQUEST['id']; $status = 1; $datereturn = date("Y-m-d H:i:s");
        $data = array("status" => $status, "date_return" => $datereturn);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $jsonObj['msg'] = "Trả sách thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Trả sách không  thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("lib_loans/update");
    }

    function detail(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_info_book_loan($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render("lib_loans/detail");
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
////////////////////////////////////////////////////////////////////////////////////////////////////
    function check_exit_book_pass_code(){
        $code = $_REQUEST['code']; $code = explode(".", $code);
        if(count($code) == 2){
            if($this->model->check_exit_code_book($code[0]) >= 0){// ton tai thong tin sach
                if($this->model->check_exit_code_book($code[0]) == 0){ // sach chua co ton kho
                    $jsonObj['msg'] = "Sách chưa được nhập kho";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{ // ton tai sach da nhap kho
                    if($code[1] > $this->model->check_exit_code_book($code[0])){ // so con co ton tai khong
                        $jsonObj['msg'] = "Số đặc biệt của sách không tồn tại";
                        $jsonObj['success'] = false;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }else{
                        $detail = $this->model->get_info_book($code[0]);
                        // kiem tra sach co bi thu hoi khong
                        if($this->_Data->check_restore_book($detail[0]['id'], $code[1]) == 1){
                            $jsonObj['msg'] = "Sách đã bị thu hồi, không thể mượn";
                            $jsonObj['success'] = false;
                            $this->view->jsonObj = json_encode($jsonObj);
                        }else{
                            // kiem tra tra sach
                            if($this->model->check_return_book($detail[0]['id'], $code[1]) > 0){
                                $jsonObj['msg'] = "Sách chưa được trả";
                                $jsonObj['success'] = false;
                                $this->view->jsonObj = json_encode($jsonObj);
                            }else{
                                $jsonObj['msg'] = "";
                                $jsonObj['success'] = true;
                                $jsonObj['data'] = array("code" => $code[0], "title" => $detail[0]['title'], "sub" => $code[1], 
                                                    "id" => $detail[0]['id']);
                                $this->view->jsonObj = json_encode($jsonObj);
                            }
                        }
                    }
                }
            }else{ // khong ton tai thong tin sach
                $jsonObj['msg'] = "Mã sách không đúng";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Định dạng mã không chính xác";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("lib_loans/check_exit_book_pass_code");
    }
//////////////////////////////////////////////////////////////////////////////////////////////////
    function check_exit_per_stu_pass_code(){
        $code = $_REQUEST['code'];
        if(strlen($code) == 10){ // personel
            $detail = $this->model->get_info_per($code);
            if(count($detail) > 0){
                $jsonObj['msg'] = "";
                $jsonObj['success'] = true;
                $jsonObj['type'] = 1;
                $jsonObj['data'] = array("id" => $detail[0]['id_per'], "code" => $detail[0]['code'],
                                    "fullname" => $detail[0]['fullname'], "job" => $detail[0]['job']);
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Mã CBGVNV không chính xác hoặc không tồn tại thông tin";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{ // student
            $detail = $this->model->get_info_student($code, $this->_Year[0]['id']);
            if(count($detail) > 0){
                $jsonObj['msg'] = "";
                $jsonObj['success'] = true;
                $jsonObj['type'] = 2;
                $jsonObj['data'] = array("id" => $detail[0]['id'], "code" => $detail[0]['code'],
                                    "fullname" => $detail[0]['fullname'], "department" => $detail[0]['department']);
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Mã học sinh không chính xác hoặc không tồn tại thông tin";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render("lib_loans/check_exit_per_stu_pass_code");
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////
    function add_scan(){
        $book = $_REQUEST['book_id']; $stuid = $_REQUEST['stu_id']; $perid = $_REQUEST['per_id'];
        $code = time(); $dateloan = date("Y-m-d H:i:s"); $datereturn = date("Y-m-d");
        $status = 0; $book = explode(".", $book);
        $data = array("code" => $code, "user_create" => $this->_Info[0]['id'], 'user_id' => $perid,
                        "student_id" => $stuid, "date_loan" => $dateloan, "date_return" => $datereturn,
                        "status" => $status, "create_at" => date("Y-m-d H:i:s"), "book_id" => $book[0],
                        "sub_book" => $book[1]);
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
        $this->view->render("lib_loans/add_scan");
    }
////////////////////////////////////////////////////////////////////////////////////////////////////
    function return_quick(){
        $code = $_REQUEST['data']; $code = explode(".", $code);
        if(count($code) == 2){
            if($this->model->check_exit_code_book($code[0]) >= 0){// ton tai thong tin sach
                if($this->model->check_exit_code_book($code[0]) == 0){ // sach chua co ton kho
                    $jsonObj['msg'] = "Sách chưa được nhập kho";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{ // ton tai sach da nhap kho
                    if($code[1] > $this->model->check_exit_code_book($code[0])){ // so con co ton tai khong
                        $jsonObj['msg'] = "Số đặc biệt của sách không tồn tại";
                        $jsonObj['success'] = false;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }else{
                        $detail = $this->model->get_info_book($code[0]);
                        // kiem tra sach co bi thu hoi khong
                        if($this->_Data->check_restore_book($detail[0]['id'], $code[1]) == 1){
                            $jsonObj['msg'] = "Sách đã bị thu hồi, không thể mượn";
                            $jsonObj['success'] = false;
                            $this->view->jsonObj = json_encode($jsonObj);
                        }else{
                            // kiem tra tra sach
                            if($this->model->check_returned_book($detail[0]['id'], $code[1]) > 0){
                                $jsonObj['msg'] = "Sách đã được trả";
                                $jsonObj['success'] = false;
                                $this->view->jsonObj = json_encode($jsonObj);
                            }else{
                                $data = array("status" => 1, "date_return" => date("Y-m-d H:i:s"));
                                $temp = $this->model->updateObj_pass_option($detail[0]['id'], $code[1], 0, $data);
                                if($temp){
                                    $jsonObj['msg'] = "Trả sách thành công";
                                    $jsonObj['success'] = true;
                                    $this->view->jsonObj = json_encode($jsonObj);
                                }else{
                                    $jsonObj['msg'] = "Trả sách không  thành công";
                                    $jsonObj['success'] = false;
                                    $this->view->jsonObj = json_encode($jsonObj);
                                }
                            }
                        }
                    }
                }
            }else{ // khong ton tai thong tin sach
                $jsonObj['msg'] = "Mã sách không đúng";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Định dạng mã không chính xác";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("lib_loans/return_quick");
    }
}
?>
