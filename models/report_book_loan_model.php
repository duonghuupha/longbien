<?php
class Report_book_loan_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_total_content_book($tungay, $denngay, $cate, $manu, $title, $offset, $rows){
        $result = array();
        $where = "DATE_FORMAT(date_loan, '%Y-%m-%d') >= '$tungay' AND DATE_FORMAT(date_loan, '%Y-%m-%d') <= '$denngay'";
        if($cate != 0)
            $where = $where." AND book_id IN (SELECT tbl_book.id FROM tbl_book WHERE tbl_book.cate_id = $cate)";
        if($manu != 0)
            $where = $where." AND book_id IN (SELECT tbl_book.id FROM tbl_book WHERE tbl_book.manu_id = $manu)";
        if($title != '')
            $where = $where." AND book_id IN (SELECT tbl_book.id FROM tbl_book WHERE tbl_book.title LIKE '%$title%')";

        $query = $this->db->query("SELECT COUNT(*) AS Total FROM (SELECT book_id FROM tbl_book_loan WHERE $where
                                    GROUP BY book_id) AS phadh");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT book_id, (SELECT tbl_book.code FROM tbl_book WHERE tbl_book.id = book_id)
                                AS code_book, (SELECT tbl_book.title FROM tbl_book WHERE tbl_book.id = book_id)
                                AS title, COUNT(book_id) AS total, (SELECT title FROM tbldm_book WHERE tbldm_book.id = 
                                (SELECT cate_id FROM tbl_book WHERE tbl_book.id = book_id)) AS category 
                                FROM tbl_book_loan WHERE $where GROUP BY book_id ORDER BY COUNT(book_id) DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
        /*$query = "SELECT book_id, (SELECT tbl_book.code FROM tbl_book WHERE tbl_book.id = book_id)
                                AS code_book, (SELECT tbl_book.title FROM tbl_book WHERE tbl_book.id = book_id)
                                AS title, COUNT(book_id) AS total, (SELECT title FROM tbldm_book WHERE tbldm_book.id = 
                                (SELECT cate_id FROM tbl_book WHERE tbl_book.id = book_id)) AS category 
                                FROM tbl_book_loan WHERE $where GROUP BY book_id ORDER BY COUNT(book_id) DESC LIMIT $offset, $rows";
        return $query;*/
    }
}
?>