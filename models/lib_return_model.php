<?php
class Lib_return_Model extends Model{
    function __construct(){
        parent::__construct();
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

    function addObj($data){
        $query = $this->insert("tbl_book_return", $data);
        return $query;
    }

    function dupliObj($bookid, $subbook){
        $query = $this->db->query("SELECT `status` FROM tbl_book_return WHERE  book_id = $bookid
                                    AND sub_book  = $subbook ORDER BY id DESC LIMIT 0,  1");
        $row = $query->fetchAll();
        if(count($row) > 0){
            return $row[0]['status'];
        }else{
            return 3;
        }
    }

    function getFetObj($title, $status, $offset, $rows){
        $result = array();
        $where = "book_id IN (SELECT tbl_book.id FROM tbl_book WHERE tbl_book.title LIKE '%$title%')";
        if($status != 0)
            $where = $where." AND status = $status";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book_return WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, book_id, sub_book, content, create_at, status,
                                (SELECT title FROM tbl_book WHERE tbl_book.id = book_id) AS title,
                                IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel 
                                WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_id))) 
                                AS fullname FROM tbl_book_return WHERE $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }
}
?>