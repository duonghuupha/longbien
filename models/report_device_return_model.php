<?php
class Report_device_return_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($fromdate, $todate, $dep, $title, $status, $offset, $rows){
        $result = array();
        $where = "device_id IN (SELECT tbl_devices.id FROM tbl_devices WHERE tbl_devices.title LIKE '%$title%')";
        if($fromdate != 0 && $todate != '')
            $where = $where." AND DATE_FORMAT(create_at, '%Y-%m-%d') >= '$fromdate' AND DATE_FORMAT(create_at, '%Y-%m-%d') <= '$todate'";
        if($dep != '')
            $where = $where." AND physical_id = $dep";
        if($status != 0){
            if($status == 1){ // kho phuc
                $condition = " AND status = 3";
            }else{
                $condition = " AND status != 3";
            }
        }else{
            $condition = '';
        }
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_returns_device WHERE $where $condition");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, create_at, year_id, physical_id, device_id, sub_device, content,
                                    status, (SELECT title FROM tbldm_physical_room WHERE tbldm_physical_room.id = physical_id)
                                    AS physical, (SELECT title FROM tbldm_department WHERE tbldm_department.physical_id = tbl_returns_device.physical_id
                                    AND tbldm_department.year_id = tbl_returns_device.year_id) AS department, (SELECT title FROM tbl_devices
                                    WHERE tbl_devices.id = device_id) AS device FROM tbl_returns_device WHERE $where $condition
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function getFetObj_export($fromdate, $todate, $dep, $title, $status){
        $result = array();
        $where = "device_id IN (SELECT tbl_devices.id FROM tbl_devices WHERE tbl_devices.title LIKE '%$title%')";
        if($fromdate != 0 && $todate != '')
            $where = $where." AND DATE_FORMAT(create_at, '%Y-%m-%d') >= '$fromdate' AND DATE_FORMAT(create_at, '%Y-%m-%d') <= '$todate'";
        if($dep != '')
            $where = $where." AND physical_id = $dep";
        if($status != 0){
            if($status == 1){ // kho phuc
                $condition = " AND status = 3";
            }else{
                $condition = " AND status != 3";
            }
        }else{
            $condition = '';
        }
        $query = $this->db->query("SELECT id, code, create_at, year_id, physical_id, device_id, sub_device, content,
                                    status, (SELECT title FROM tbldm_physical_room WHERE tbldm_physical_room.id = physical_id)
                                    AS physical, (SELECT title FROM tbldm_department WHERE tbldm_department.physical_id = tbl_returns_device.physical_id
                                    AND tbldm_department.year_id = tbl_returns_device.year_id) AS department, (SELECT title FROM tbl_devices
                                    WHERE tbl_devices.id = device_id) AS device FROM tbl_returns_device WHERE $where $condition
                                    ORDER BY id DESC");
        return $query->fetchAll();
    }

    function get_combo_department($yearid){
        $query = $this->db->query("SELECT id, title, physical_id, (SELECT tbldm_physical_room.title FROM tbldm_physical_room
                                    WHERE tbldm_physical_room.id = physical_id) AS physical FROM tbldm_department
                                    WHERE year_id = $yearid OR is_default = 0");
        return $query->fetchAll();
    }
}
?>