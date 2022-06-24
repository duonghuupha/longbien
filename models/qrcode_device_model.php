<?php
class Qrcode_device_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE title LIKE '%$q%'
                                    AND status != 99");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, origin, year_work, price, cate_id, (SELECT tbldm_equipment.title
                                    FROM tbldm_equipment WHERE tbldm_equipment.id = cate_id) AS category, title, stock
                                    FROM tbl_devices WHERE title LIKE'%$q%' AND status != 99 
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }
}
?>