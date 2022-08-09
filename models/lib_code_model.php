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
        $query = $this->db->query("SELECT id, code, title, author, cate_id, manu_id, create_at,
                                    (SELECT tbldm_book.title FROM tbldm_book WHERE tbldm_book.id = cate_id) AS category,
                                    (SELECT tbldm_book_manu.title FROM  tbldm_book_manu WHERE tbldm_book_manu.id = manu_id)
                                    AS manufactory FROM tbl_book WHERE status = 0 AND title LIKE '%$q%' AND type = 1 
                                    ORDER BY id DESC  LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }
}
?>