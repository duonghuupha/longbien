<?php
class Repair_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($date, $agency, $device, $offset, $rows){
        $result = array();
        $where = "agency LIKE '%$agency%'";
        if($date != '')
            $where = $where." AND date_repair = '$date'";
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

    function addObj($data){
        $query = $this->insert("tbl_device_repair", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_device_repair", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_device_repair", "id = $id");
        return $query;
    }

    function addObj_detail($data){
        $query = $this->insert("tbl_device_repair_detail", $data);
        return $query;
    }

    function delObj_detail($code){
        $query = $this->delete("tbl_device_repair_detail", "code = $code");
        return $query;
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_device_dep($q, $id, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_export_detail WHERE status = 0 
                                    AND code  = (SELECT tbl_export.code  FROM tbl_export WHERE tbl_export.physical_id = $id) 
                                    AND device_id IN (SELECT tbl_devices.id FROM tbl_devices WHERE tbl_devices.title LIKE '%$q%')");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT (SELECT title FROM tbl_devices WHERE tbl_devices.id = device_id) 
                                AS title, device_id AS id, sub_device FROM tbl_export_detail WHERE status = 0 
                                AND code  = (SELECT tbl_export.code FROM tbl_export WHERE tbl_export.physical_id = $id) 
                                AND device_id IN (SELECT tbl_devices.id FROM tbl_devices WHERE tbl_devices.title LIKE '%$q%')");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    function get_info($id){
        $query = $this->db->query("SELECT id, code, DATE_FORMAT(date_repair, '%d-%m-%Y') AS date_repair, 
                                agency, file_bb, user_id, create_at FROM tbl_device_repair WHERE id = $id");
        return $query->fetchAll();
    }

    function get_detail_repair_device($code){
        $query = $this->db->query("SELECT device_id AS id, sub_device AS sub, content_error AS error, 
                                content_repair AS fixed, CONCAT((SELECT title FROM tbl_devices 
                                WHERE tbl_devices.id = device_id)) AS title  FROM tbl_device_repair_detail 
                                WHERE code = $code");
        return $query->fetchAll();
    }
}
?>