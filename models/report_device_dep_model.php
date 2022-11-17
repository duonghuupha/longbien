<?php
class Report_device_dep_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_title_department($id){
        $query = $this->db->query("SELECT CONCAT(title, ' :: ', (SELECT tbldm_physical_room.title
                                    FROM tbldm_physical_room WHERE tbldm_physical_room.id = physical_id))
                                    AS title FROM  tbldm_department WHERE id = $id");
        $row = $query->fetchAll();
        return $row[0]['title'];
    }

    function getFetObj($id, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_export_detail WHERE status = 0
                                    AND code = (SELECT tbl_export.code FROM tbl_export WHERE physical_id
                                    = (SELECT tbldm_department.physical_id FROM tbldm_department 
                                    WHERE tbldm_department.id = $id))");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT device_id, sub_device, (SELECT title FROM tbl_devices WHERE tbl_devices.id = device_id) AS title, 
                                    (SELECT tbl_devices.code FROM tbl_devices WHERE tbl_devices.id = device_id) AS code_d,
                                    (SELECT tbl_devices.year_work FROM tbl_devices WHERE tbl_devices.id = device_id) AS year_work,
                                    (SELECT tbl_devices.cate_id FROM tbl_devices WHERE tbl_devices.id = device_id) AS cate_id,
                                    (SELECT tbldm_equipment.title FROM tbldm_equipment WHERE tbldm_equipment.id = (SELECT tbl_devices.cate_id 
                                    FROM tbl_devices WHERE tbl_devices.id = device_id)) AS category, (SELECT tbl_devices.price FROM tbl_devices 
                                    WHERE tbl_devices.id = device_id) AS price FROM tbl_export_detail WHERE status = 0 AND 
                                    code = (SELECT tbl_export.code FROM tbl_export WHERE physical_id = (SELECT tbldm_department.physical_id 
                                    FROM tbldm_department WHERE tbldm_department.id = $id)) LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function getFetObj_export($id){
        $query = $this->db->query("SELECT device_id, sub_device, (SELECT title FROM tbl_devices WHERE tbl_devices.id = device_id) AS title, 
                                    (SELECT tbl_devices.code FROM tbl_devices WHERE tbl_devices.id = device_id) AS code_d,
                                    (SELECT tbl_devices.year_work FROM tbl_devices WHERE tbl_devices.id = device_id) AS year_work,
                                    (SELECT tbl_devices.cate_id FROM tbl_devices WHERE tbl_devices.id = device_id) AS cate_id,
                                    (SELECT tbldm_equipment.title FROM tbldm_equipment WHERE tbldm_equipment.id = (SELECT tbl_devices.cate_id 
                                    FROM tbl_devices WHERE tbl_devices.id = device_id)) AS category, (SELECT tbl_devices.price FROM tbl_devices 
                                    WHERE tbl_devices.id = device_id) AS price FROM tbl_export_detail WHERE status = 0 AND 
                                    code = (SELECT tbl_export.code FROM tbl_export WHERE physical_id = (SELECT tbldm_department.physical_id 
                                    FROM tbldm_department WHERE tbldm_department.id = $id))");
        return $query->fetchAll();
    }
}
?>