<?php
class Gear_code_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils WHERE status = 0 AND title LIKE '%$q%'");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title, image, cate_id, content, create_at, stock,
                                    (SELECT tbldm_utensils.title FROM tbldm_utensils WHERE tbldm_utensils.id = cate_id) AS category,
                                    FROM tbl_utensils WHERE status = 0 AND title LIKE '%$q%' ORDER BY id DESC  LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }
}
?>