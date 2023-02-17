<?php
class Lib_code_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book WHERE status = 0 AND title LIKE '%$q%'
                                    AND type = 1");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title, author, cate_id, manu_id, create_at, stock,
                                    (SELECT tbldm_book.title FROM tbldm_book WHERE tbldm_book.id = cate_id) AS category,
                                    (SELECT tbldm_book_manu.title FROM  tbldm_book_manu WHERE tbldm_book_manu.id = manu_id)
                                    AS manufactory FROM tbl_book WHERE status = 0 AND title LIKE '%$q%' AND type = 1 
                                    ORDER BY id DESC  LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }
///////////////////////////////////////////////////////////////////////////////////////////
    function get_data_cate($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_book WHERE status = 0
                                    AND title LIKE '%$q%'");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title FROM tbldm_book WHERE status = 0
                                    AND title LIKE '%$q%' LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_cate_total($q){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_book WHERE status = 0
                                    AND title LIKE '%$q%'");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
///////////////////////////////////////////////////////////////////////////////////////////
    function get_book_via_cate_id($id){
        $query = $this->db->query("SELECT id, code, title,  stock FROM tbl_book WHERE FIND_IN_SET(cate_id, '$id')
                                    AND status = 0 AND type = 1");
        return $query->fetchAll();
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_manu($q, $offset,  $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_book_manu WHERE title LIKE '%$q%'
                                    AND status = 0");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT  id, title  FROM tbldm_book_manu WHERE title LIKE '%$q%'
                                    AND status = 0 LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_manu_total($q){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_book_manu WHERE title LIKE '%$q%'
                                    AND status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
///////////////////////////////////////////////////////////////////////////////////////////
    function get_book_via_manu_id($id){
        $query = $this->db->query("SELECT id, code, title,  stock FROM tbl_book WHERE FIND_IN_SET(manu_id, '$id')
                                    AND status = 0 AND type = 1");
        return $query->fetchAll();
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_book($q){
        $query = $this->db->query("SELECT id, code, title, stock FROM tbl_book WHERE title LIKE '%$q%'
                                    ORDER BY title DESC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>