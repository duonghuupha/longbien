<?php
class Report_gear_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($title, $code, $cate, $offset, $rows){
        $result = array();
        $where = "status = 0";
        if($title != '')
            $where = $where." AND title LIKE '%$title%'";
        if($code != '')
            $where = $where." AND code LIKE '%$code%'";
        if($cate != '')
            $where = $where." AND cate_id = $cate";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title, content, image, stock, cate_id, create_at,
                                (SELECT tbldm_utensils.title FROM tbldm_utensils WHERE tbldm_utensils.id= cate_id)
                                AS category FROM tbl_utensils WHERE $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function getFetObj_export($title, $code, $cate){
        $result = array();
        $where = "status = 0";
        if($title != '')
            $where = $where." AND title LIKE '%$title%'";
        if($code != '')
            $where = $where." AND code LIKE '%$code%'";
        if($cate != '')
            $where = $where." AND cate_id = $cate";
        $query = $this->db->query("SELECT id, code, title, content, image, stock, cate_id, create_at,
                                (SELECT tbldm_utensils.title FROM tbldm_utensils WHERE tbldm_utensils.id= cate_id)
                                AS category FROM tbl_utensils WHERE $where ORDER BY id DESC");
        return $query->fetchAll();
    }
}
?>