<?php
class Lib_loans_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($userid, $q, $offset, $rows){
        $result = array();
        $where = "WHERE (user_create = $userid OR user_id = $userid) AND (book_id IN (SELECT tbl_book.id FROM tbl_book WHERE tbl_book.title LIKE '%$q%'
                    OR tbl_book.author LIKE '%$q%') OR user_id IN (SELECT tbl_users.id FROM tbl_users
                    WHERE tbl_users.hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE tbl_personel.fullname LIKE '%$q%'))
                    OR student_id IN (SELECT tbl_student.id FROM tbl_student WHERE tbl_student.fullname LIKE '%$q%'))";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book_loan $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, student_id, book_id, sub_book, date_loan, date_return,
                                    status, create_at, IF(user_id != 0, (SELECT fullname FROM tbl_personel
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_id)), 
                                    (SELECT fullname FROM tbl_student WHERE tbl_student.id = student_id)) AS fullname, 
                                    (SELECT title FROM tbl_book WHERE tbl_book.id = book_id) AS book FROM tbl_book_loan 
                                    $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_book_loan", $data);
        return $query;
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_book($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book WHERE status = 0
                                    AND stock != 0 AND (title LIKE '%$q%' OR code LIKE '%$q%')");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, stock, code FROM tbl_book WHERE status = 0 AND stock != 0
                                    AND (title LIKE '%$q%' OR code LIKE '%$q%') ORDER BY title ASC
                                    LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_book_total($q){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book WHERE status = 0
                                    AND stock != 0 AND (title LIKE '%$q%' OR code LIKE '%$q%')");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_student($q, $yearid, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE fullname LIKE '%$q%'
                                    AND status = 1");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, fullname, code, birthday, gender, (SELECT title FROM tbldm_department
                                    WHERE tbldm_department.id = (SELECT department_id FROM tbl_student_class
                                    WHERE tbl_student_class.year_id = $yearid AND tbl_student_class.student_id = tbl_student.id))
                                    AS department FROM tbl_student WHERE status = 1 AND fullname LIKE '%$q%' ORDER BY fullname ASC
                                    LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_student_page($q){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE fullname LIKE '%$q%'
                                    AND status = 1");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>