<?php
class Lib_loans_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $where = "WHERE book_id IN (SELECT tbl_book.id FROM tbl_book WHERE tbl_book.title LIKE '%$q%'
                    OR tbl_book.author LIKE '%$q%') OR user_id IN (SELECT tbl_users.id FROM tbl_users
                    WHERE tbl_users.hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE tbl_personel.fullname LIKE '%$q%'))
                    OR student_id IN (SELECT tbl_student.id FROM tbl_student WHERE tbl_student.fullname LIKE '%$q%')";
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

    function get_info_per($code){
        $query = $this->db->query("SELECT id, (SELECT tbl_personel.code FROM tbl_personel WHERE tbl_personel.id = hr_id) AS code,
                                (SELECT tbl_personel.fullname FROM tbl_personel WHERE tbl_personel.id = hr_id) AS fullname,
                                (SELECT title FROM tbldm_job WHERE tbldm_job.id = (SELECT job_id FROM tbl_personel WHERE tbl_personel.id = hr_id))
                                AS job FROM tbl_users WHERE id != 1 AND hr_id = (SELECT tbl_personel.id FROM tbl_personel
                                WHERE tbl_personel.code = '$code') AND active = 1");
        return $query->fetchAll();
    }

    function get_info_student($code, $yearid){
        $query = $this->db->query("SELECT id, code, fullname, (SELECT title FROM tbldm_department
                                    WHERE tbldm_department.id = (SELECT department_id FROM tbl_student_class
                                    WHERE tbl_student_class.student_id = tbl_student.id AND year_id = $yearid)) AS department
                                    FROM tbl_student WHERE code = '$code' AND status = 1");
        return $query->fetchAll();
    }

    function get_info_book($code){
        $query = $this->db->query("SELECT id, code, title, (SELECT tbldm_book.title FROM tbldm_book
                                WHERE tbldm_book.id = cate_id) AS category, (SELECT tbldm_book_manu.title
                                FROM tbldm_book_manu WHERE tbldm_book_manu.id = manu_id) AS manufactory
                                FROM tbl_book WHERE code = '$code'");
        return $query->fetchAll();
    }

    function addObj($data){
        $query = $this->insert("tbl_book_loan", $data);
        return $query;
    }

    function check_book_returned($code, $subbook){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book_loan WHERE book_id = (SELECT tbl_book.id
                                    FROM tbl_book WHERE tbl_book.code = $code) AND sub_book = $subbook AND status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function check_book_returned_via_id($bookid, $subbook){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book_loan WHERE book_id = $bookid 
                                    AND sub_book = $subbook AND status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function return_book($data, $book_id, $sub_book){
        $query = $this->update("tbl_book_loan", $data, "book_id = $book_id AND sub_book = $sub_book AND status = 0");
        return $query;
    }
    
    function updateObj($id, $data){
        $query = $this->update("tbl_book_loan", $data, "id = $id");
        return $query;
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_users($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id != 1 AND active = 1
                                    AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE fullname LIKE '%$q%')");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, (SELECT fullname FROM tbl_personel WHERE tbl_personel.id  = hr_id) AS fullname,
                                    (SELECT birthday FROM tbl_personel WHERE tbl_personel.id  = hr_id) AS birthday,
                                    (SELECT gender FROM tbl_personel WHERE tbl_personel.id  = hr_id) AS gender,
                                    (SELECT title FROM tbldm_job WHERE tbldm_job.id = (SELECT job_id FROM tbl_personel
                                    WHERE tbl_personel.id = hr_id)) AS job
                                    FROM tbl_users WHERE id != 1 AND active = 1 AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel 
                                    WHERE fullname LIKE '%$q%')ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function geet_total_Data_user($q){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id != 1 AND active = 1
                                AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE fullname LIKE '%$q%')");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_data_student($q, $yearid, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE status = 1
                                    AND fullname LIKE '%$q%'");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, fullname, code, gender, birthday, (SELECT title FROM tbldm_department 
                                    WHERE tbldm_department.id = (SELECT department_id FROM tbl_student_class
                                    WHERE tbl_student_class.student_id = tbl_student.id AND year_id = $yearid)) AS department
                                    FROM tbl_student WHERE status = 1 AND fullname LIKE '%$q%'
                                    ORDER BY fullname ASC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_student_total($q){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE status = 1
                                    AND fullname LIKE '%$q%'");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_data_book($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book WHERE status = 0
                                    AND type = 1 AND title LIKE '%$q%'");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title, cate_id, manu_id, stock, author,
                                    (SELECT tbldm_book.title FROM tbldm_book WHERE tbldm_book.id = cate_id) AS category,
                                    (SELECT tbldm_book_manu.title FROM tbldm_book_manu WHERE tbldm_book_manu.id = manu_id) AS manufactory
                                    FROM tbl_book WHERE status = 0 AND type = 1 AND title LIKE '%$q%'");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_book_total($q){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book WHERE status = 0
                                    AND type = 1 AND title LIKE '%$q%'");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function check_restore_book_via_code($code, $subbook){
        $query  = $this->db->query("SELECT `status` FROM tbl_book_return WHERE book_id = (SELECT tbl_book.id FROM tbl_book
                                    WHERE tbl_book.code = $code) AND sub_book = $subbook ORDER BY id DESC LIMIT 0, 1");
        $row = $query->fetchAll();
        return $row[0]['status'];
    }
}
?>