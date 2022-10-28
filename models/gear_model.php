<?php
class Gear_model extends Model{
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

    function dupliObj($id, $code){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils WHERE code = $code");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils WHERE code = $code
                                        AND id != $id");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function addObj($data){
        $query = $this->insert("tbl_utensils", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_utensils", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_utensils", "id = $id");
        return $query;
    }
////////////////////////////////////////////////////////////////////////////////////////
    function get_info($id){
        $query = $this->db->query("SELECT id, code, title, content, image, stock, cate_id, create_at,
                                (SELECT tbldm_utensils.title FROM tbldm_utensils WHERE tbldm_utensils.id= cate_id)
                                AS category FROM tbl_utensils WHERE id = $id");
        return $query->fetchAll();
    }

    function getFetObj_tmp($userid, $q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils WHERE status = 99
                                    AND title LIKE '%$q%' AND user_id = $userid");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title, content, image, stock, cate_id, create_at,
                                (SELECT tbldm_utensils.title FROM tbldm_utensils WHERE tbldm_utensils.id= cate_id)
                                AS category FROM tbl_utensils WHERE status = 99 AND title LIKE '%$q%' 
                                AND user_id = $userid ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function delObj_tmp($userid){
        $query = $this->delete("tbl_utensils", "status = 99 AND user_id = $userid");
        return $query;
    }

    function check_dupli_code(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils GROUP BY code HAVING Total > 1");
        $row = $query->fetchAll();
        return count($row);
    }

    function updateObj_all($userid){
        $query = $this->db->query("UPDATE tbl_utensils SET status = 0 WHERE status = 99 AND user_id = $userid");
        return $query;
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    function return_total_temp($userid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils WHERE status = 99 AND user_id = $userid");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
}
?>