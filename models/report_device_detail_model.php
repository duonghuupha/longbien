<?php
class Report_device_detail_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_data_device($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE status = 1 AND title LIKE '%$q%' 
                                    AND stock != 0");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, code, stock FROM tbl_devices WHERE status = 1 AND title LIKE '%$q%'
                                    AND stock != 0 ORDER BY title ASC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_info_device($id){
        $query = $this->db->query("SELECT id, code, title, cate_id, origin, price, description, year_work,
                                    (SELECT tbldm_equipment.title FROM tbldm_equipment WHERE tbldm_equipment.id = cate_id)
                                    AS category FROM tbl_devices WHERE id = $id");
        return $query->fetchAll();
    }

    function get_info_export_detail($id, $sub){
        $query = $this->db->query("SELECT id, code, device_id, sub_device, create_at, (SELECT title FROM tbldm_years
                                    WHERE tbldm_years.id = (SELECT year_id FROM tbl_export WHERE tbl_export.code = tbl_export_detail.code))
                                    AS nam_hoc, (SELECT title FROM tbldm_physical_room WHERE tbldm_physical_room. id = (SELECT physical_id
                                    FROM tbl_export WHERE tbl_export.code  = tbl_export_detail.code)) AS physical, (SELECT title FROM tbldm_department
                                    WHERE tbldm_department.physical_id = (SELECT physical_id FROM tbl_export WHERE tbl_export.code = tbl_export_detail.code)
                                    AND tbldm_department.year_id  = (SELECT year_id FROM tbl_export WHERE tbl_export.code  = tbl_export_detail.code))
                                    AS department FROM tbl_export_detail
                                    WHERE device_id = $id AND sub_device = $sub ORDER BY id ASC LIMIT 0, 1");
        return $query->fetchAll();
    }

    function get_info_change_device($id, $sub){
        $query = $this->db->query("SELECT id, code, year_id, physical_from_id, physical_to_id, device_id, sub_device, content,
                                    create_at, (SELECT title FROM tbldm_years WHERE tbldm_years.id = year_id) AS nam_hoc,
                                    (SELECT title FROM tbldm_physical_room WHERE tbldm_physical_room.id = physical_from_id) AS physical_from,
                                    (SELECT title FROM tbldm_physical_room WHERE tbldm_physical_room.id = physical_to_id) AS physical_to,
                                    (SELECT title FROM tbldm_department WHERE tbldm_department.physical_id = tbl_change_device.physical_from_id
                                    AND tbldm_department.year_id = tbl_change_device.year_id) AS department_from,
                                    (SELECT title FROM tbldm_department WHERE tbldm_department.physical_id = tbl_change_device.physical_to_id
                                    AND tbldm_department.year_id = tbl_change_device.year_id) AS department_to
                                    FROM tbl_change_device WHERE device_id = $id AND sub_device = $sub AND status = 1
                                    ORDER BY id ASC");
        return $query->fetchAll();
    }

    function get_info_repair_device($id, $sub){
        $query = $this->db->query("SELECT code, device_id, sub_device, content_error, content_repair,
                                (SELECT date_repair FROM tbl_device_repair WHERE tbl_device_repair.code
                                = tbl_device_repair_detail.code) AS date_repair, (SELECT agency 
                                FROM tbl_device_repair WHERE tbl_device_repair.code = tbl_device_repair_detail.code) 
                                AS agency FROM tbl_device_repair_detail WHERE device_id = $id AND sub_device = $sub
                                ORDER BY id ASC");
        return $query->fetchAll();
    }
}
?>