<?php
class Report_device_change_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($from, $to, $title, $offset, $rows){
        $result = array();
        $where = "device_id IN (SELECT tbl_devices.id FROM tbl_devices WHERE tbl_devices.title LIKE '%$title%')";
        if($from != '')
            $where = $where." AND physical_from_id = $from";
        if($to != '')
            $where = $where." AND physical_to_id = $to";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_change_device WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, year_id, physical_from_id, physical_to_id,
                                device_id, sub_device, create_at, (SELECT title FROM tbldm_years
                                WHERE tbldm_years.id = year_id) AS namhoc, (SELECT title FROM tbldm_physical_room
                                WHERE tbldm_physical_room.id = physical_from_id) AS physical_from, (SELECT title 
                                FROM tbldm_physical_room WHERE tbldm_physical_room.id = physical_to_id) AS physical_to,
                                (SELECT title FROM tbl_devices WHERE tbl_devices.id = device_id) AS device
                                FROM tbl_change_device WHERE $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function getFetObj_export($from, $to, $title){
        $result = array();
        $where = "device_id IN (SELECT tbl_devices.id FROM tbl_devices WHERE tbl_devices.title LIKE '%$title%')";
        if($from != '')
            $where = $where." AND physical_from_id = $from";
        if($to != '')
            $where = $where." AND physical_to_id = $to";
        $query = $this->db->query("SELECT id, code, year_id, physical_from_id, physical_to_id,
                                device_id, sub_device, create_at, (SELECT title FROM tbldm_years
                                WHERE tbldm_years.id = year_id) AS namhoc, (SELECT title FROM tbldm_physical_room
                                WHERE tbldm_physical_room.id = physical_from_id) AS physical_from, (SELECT title 
                                FROM tbldm_physical_room WHERE tbldm_physical_room.id = physical_to_id) AS physical_to,
                                (SELECT title FROM tbl_devices WHERE tbl_devices.id = device_id) AS device
                                FROM tbl_change_device WHERE $where ORDER BY id DESC");
        return $query->fetchAll();
    }
}
?>