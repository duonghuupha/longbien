<?php
class Report_book_Model extends Model{
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
        $query = $this->db->query("SELECT id, code, title, image, type, author, cate_id, manu_id, content,
                                    number_page, type, file, stock, create_at, user_id, (SELECT tbldm_book.title
                                    FROM tbldm_book WHERE tbldm_book.id = cate_id) AS category, (SELECT tbldm_book_manu.title
                                    FROM tbldm_book_manu WHERE tbldm_book_manu.id = manu_id) AS manufactory FROM tbl_book WHERE $where
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total']= $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function getFetObj_export($t, $c, $m, $a){
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
        $query = $this->db->query("SELECT id, code, title, image, type, author, cate_id, manu_id, content,
                                    number_page, type, file, stock, create_at, user_id, (SELECT tbldm_book.title
                                    FROM tbldm_book WHERE tbldm_book.id = cate_id) AS category, (SELECT tbldm_book_manu.title
                                    FROM tbldm_book_manu WHERE tbldm_book_manu.id = manu_id) AS manufactory FROM tbl_book WHERE $where
                                    ORDER BY id DESC");
        return $query->fetchAll();
    }
}
?>