<?php
class Change_device_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_data_device($id){
        $query = $this->db->query("SELECT id, code, device_id, sub_device, (SELECT title FROM tbl_devices
                                    WHERE tbl_devices.id = device_id) AS title FROM tbl_export_detail
                                    WHERE status = 0 AND code  = (SELECT tbl_export.code FROM tbl_export
                                    WHERE tbl_export.physical_id = $id)");
        return $query->fetchAll();  
    }

    function addObj($data){
        $query = $this->insert("tbl_change_device", $data);
        return $query;
    }

    function updateObj_export_detail($physical_from, $data, $device_id, $subdevice){
        $query = $this->update("tbl_export_detail", $data, "device_id = $device_id AND sub_device = $subdevice
                                AND code = (SELECT tbl_export.code FROM tbl_export WHERE tbl_export.physical_id = $physical_from)");
        return $query;
    }

    function addObj_export($data){
        $query = $this->insert("tbl_export",  $data);
        return $query;
    }

    function addObj_export_detail($data){
        $query = $this->insert("tbl_export_detail", $data);
        return $query;
    }

    function check_export_device_physical($physical, $year){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_export WHERE physical_id = $physical");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    
    function get_info_export($physical){
        $query = $this->db->query("SELECT * FROM tbl_export WHERE physical_id = $physical");
        return $query->fetchAll();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_change_device");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, year_id, physical_from_id, physical_to_id,
                                device_id, sub_device, create_at, (SELECT title FROM tbldm_years
                                WHERE tbldm_years.id = year_id) AS namhoc, (SELECT title FROM tbldm_physical_room
                                WHERE tbldm_physical_room.id = physical_from_id) AS physical_from, (SELECT title 
                                FROM tbldm_physical_room WHERE tbldm_physical_room.id = physical_to_id) AS physical_to,
                                (SELECT title FROM tbl_devices WHERE tbl_devices.id = device_id) AS device
                                FROM tbl_change_device  ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }
}
?>