<?php
class Report_device_repair_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($fromdate, $todate, $agency, $device, $offset, $rows){
        $result = array();
        $where = "agency LIKE '%$agency%'";
        if($fromdate != '' && $todate != '')
            $where = $where." AND date_repair >= '$fromdate' AND date_repair <= '$todate'";
        if($device != '')
            $where = $where." AND code IN (SELECT tbl_device_repair_detail.code FROM tbl_device_repair_detail
                            WHERE tbl_device_repair_detail.device_id IN (SELECT tbl_devices.id FROM tbl_devices 
                            WHERE tbl_devices.title LIKE '%$device%'))";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_device_repair WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, date_repair, file_bb, user_id, create_at, agency,
                                    (SELECT COUNT(*) FROM tbl_device_repair_detail WHERE tbl_device_repair_detail.code
                                    = tbl_device_repair.code) AS total_repair FROM tbl_device_repair WHERE $where 
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function getFetObj_export($fromdate, $todate, $agency, $device){
        $where = "agency LIKE '%$agency%'";
        if($fromdate != '' && $todate != '')
            $where = $where." AND date_repair >= '$fromdate' AND date_repair <= '$todate'";
        if($device != '')
            $where = $where." AND code IN (SELECT tbl_device_repair_detail.code FROM tbl_device_repair_detail
                            WHERE tbl_device_repair_detail.device_id IN (SELECT tbl_devices.id FROM tbl_devices 
                            WHERE tbl_devices.title LIKE '%$device%'))";
        
        $query = $this->db->query("SELECT id, code, date_repair, file_bb, user_id, create_at, agency,
                                    (SELECT COUNT(*) FROM tbl_device_repair_detail WHERE tbl_device_repair_detail.code
                                    = tbl_device_repair.code) AS total_repair FROM tbl_device_repair WHERE $where 
                                    ORDER BY id DESC");
        return $query->fetchAll();
    }
}
?>