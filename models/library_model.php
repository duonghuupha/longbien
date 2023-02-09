<?php
class  Library_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($t, $c, $m, $a, $offset, $rows){
        $where = "status = 0";
        if($t != '')
            $where = $where." AND title LIKE '%$t%'";
        if($c != '')
            $where = $where." AND cate_id = $c";
        if($m != '')
            $where = $where." AND manu_id = $m";
        if($a != '')
            $where = $where." AND author LIKE '%$a%'";
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book WHERE $where");
        $row= $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title, image, type, author, cate_id, manu_id, content, year_publish,
                                    number_page, type, file, stock, create_at, user_id, position_publish, (SELECT tbldm_book.title
                                    FROM tbldm_book WHERE tbldm_book.id = cate_id) AS category, (SELECT tbldm_book_manu.title
                                    FROM tbldm_book_manu WHERE tbldm_book_manu.id = manu_id) AS manufactory,
                                    (SELECT tbldm_bin.title FROM tbldm_bin WHERE tbldm_bin.id = bin_id) AS bin,
                                    (SELECT tbldm_floor.title FROM tbldm_floor WHERE tbldm_floor.id = floor_id) AS floor
                                    FROM tbl_book WHERE $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total']= $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function dupliObj($id, $code){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book WHERE code = $code AND status = 0");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book WHERE code = $code AND status = 0
                                        AND id != $id");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function addObj($data){
        $query = $this->insert("tbl_book", $data);
        return  $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_book", $data, "id = $id");
        return $query;
    }

    function get_info($id){
        $query = $this->db->query("SELECT id, code, cate_id, manu_id, title, content, number_page, author,
                                    image, type, file, status, stock, year_publish, position_publish, bin_id, floor_id,
                                    (SELECT tbldm_bin.title FROM tbldm_bin WHERE tbldm_bin.id = bin_id) AS bin,
                                    (SELECT tbldm_floor.title FROM tbldm_floor WHERE tbldm_floor.id = floor_id) AS floor,
                                    (SELECT tbldm_book_manu.title FROM tbldm_book_manu WHERE tbldm_book_manu.id = manu_id) AS manuafactory,
                                    (SELECT tbldm_book.title FROM tbldm_book WHERE tbldm_book.id = cate_id) AS category,
                                    IF(type = 1, (SELECT COUNT(*) FROM tbl_book_loan WHERE tbl_book_loan.id = tbl_book.id),
                                    (SELECT COUNT(*) FROM tbl_book_read WHERE tbl_book_read.book_id = tbl_book.id))
                                    AS total_read FROM tbl_book WHERE id =  $id");
        return $query->fetchAll();
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_loan_book($id, $q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book_loan WHERE book_id = $id
                                    AND (user_id IN (SELECT tbl_users.id FROM tbl_users WHERE tbl_users.hr_id
                                    = (SELECT tbl_personel.id FROM tbl_personel WHERE tbl_personel.fullname LIKE '%$q%'))
                                    OR student_id IN (SELECT tbl_student.id FROM tbl_student WHERE tbl_student.fullname LIKE '%$q%'))");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT sub_book, date_loan, date_return, code, user_id, student_id, status,
                                IF(user_id = 0, (SELECT fullname FROM tbl_student WHERE tbl_student.id = student_id),
                                (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users
                                WHERE tbl_users.id = user_id))) AS fullname, IF(user_id = 0, 1, 2) AS type_loan FROM tbl_book_loan WHERE book_id = $id
                                AND (user_id IN (SELECT tbl_users.id FROM tbl_users WHERE tbl_users.hr_id
                                = (SELECT tbl_personel.id FROM tbl_personel WHERE tbl_personel.fullname LIKE '%$q%'))
                                OR student_id IN (SELECT tbl_student.id FROM tbl_student WHERE tbl_student.fullname LIKE '%$q%'))
                                ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_loan_book_total($id, $q){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book_loan WHERE book_id = $id
                                    AND (user_id IN (SELECT tbl_users.id FROM tbl_users WHERE tbl_users.hr_id
                                    = (SELECT tbl_personel.id FROM tbl_personel WHERE tbl_personel.fullname LIKE '%$q%'))
                                    OR student_id IN (SELECT tbl_student.id FROM tbl_student WHERE tbl_student.fullname LIKE '%$q%'))");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_data_read_book($id, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book_read WHERE book_id = $id");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, time_read, info_read FROM tbl_book_read WHERE book_id = $id  
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }   

    function get_data_read_book_total($id){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book_read WHERE book_id = $id");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }   
}
?>