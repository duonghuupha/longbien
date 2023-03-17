<?php
class Qrcode_device_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE title LIKE '%$q%'
                                    AND status != 99 AND status = 1 AND stock != 0");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, origin, year_work, price, cate_id, (SELECT tbldm_equipment.title
                                    FROM tbldm_equipment WHERE tbldm_equipment.id = cate_id) AS category, title, stock
                                    FROM tbl_devices WHERE title LIKE'%$q%' AND status != 99 AND status = 1 AND stock != 0
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    function get_device_by_dep($id){
        $query = $this->db->query("SELECT device_id AS id, sub_device, (SELECT title FROM tbl_devices WHERE tbl_devices.id = device_id)
                                    AS title, (SELECT tbl_devices.code FROM tbl_devices WHERE tbl_devices.id = device_id)
                                    AS code_d FROM tbl_export_detail WHERE status !=  2 AND code = (SELECT code FROM tbl_export
                                    WHERE tbl_export.physical_id = (SELECT tbldm_department.physical_id FROM tbldm_department
                                    WHERE tbldm_department.id = $id))");
        return $query->fetchAll();
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    function get_combo_device($q){
        $query = $this->db->query("SELECT id, title, code FROM tbl_devices WHERE status = 1
                                    AND title LIKE '%$q%'");
        return $query->fetchAll();
    }  

    function get_info_device($id){
        $query = $this->db->query("SELECT id, title, code, stock FROM tbl_devices WHERE id = $id");
        return $query->fetchAll();
    }
}
?>