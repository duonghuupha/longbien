<?php
class Report_document_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_data_in($tungay, $denngay, $cate, $offset, $rows){
        $result = array();
        $where = "status = 0 AND date_in >= '$tungay' AND date_in <= '$denngay'";
        if($cate != '')
            $where = $where." AND cate_id = $cate";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_document_in WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, cate_id, number_in, date_in, number_dc, date_dc, title, content, user_share,
                                    create_at FROM tbl_document_in WHERE $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_out($tungay, $denngay, $cate, $offset, $rows){
        $result = array();
    }

    function get_data_in_export($tungay, $denngay, $cate){
        $result = array();
        $where = "status = 0 AND date_in >= '$tungay' AND date_in <= '$denngay'";
        if($cate != '')
            $where = $where." AND cate_id = $cate";
        $query = $this->db->query("SELECT id, code, cate_id, number_in, date_in, number_dc, date_dc, title, content, user_share,
                                    create_at FROM tbl_document_in WHERE $where ORDER BY id DESC");
        return $query->fetchAll();
    }
}