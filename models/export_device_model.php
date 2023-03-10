<?php
class Export_device_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_export WHERE physical_id IN (SELECT tbldm_physical_room.id
                                FROM tbldm_physical_room WHERE tbldm_physical_room.title LIKE '%$q%') OR code IN (SELECT tbl_export_detail.code
                                FROM tbl_export_detail WHERE tbl_export_detail.device_id IN (SELECT tbl_devices.id FROM tbl_devices
                                WHERE tbl_devices.title LIKE '%$q%'))");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, year_id, physical_id, create_at, (SELECT title
                                    FROM tbldm_years WHERE tbldm_years.id = year_id) AS namhoc,
                                    (SELECT title FROM tbldm_physical_room WHERE tbldm_physical_room.id = physical_id) AS physical 
                                    FROM tbl_export WHERE physical_id IN (SELECT tbldm_physical_room.id
                                    FROM tbldm_physical_room WHERE tbldm_physical_room.title LIKE '%$q%') OR code IN (SELECT tbl_export_detail.code
                                    FROM tbl_export_detail WHERE tbl_export_detail.device_id IN (SELECT tbl_devices.id FROM tbl_devices
                                    WHERE tbl_devices.title LIKE '%$q%')) ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_combo_device($q){
        $query = $this->db->query("SELECT id, title FROM tbl_devices WHERE status = 1
                                    AND title LIKE '%$q%'");
        return $query->fetchAll();
    }    

    function get_info_device($id){
        $query = $this->db->query("SELECT id, title, stock FROM tbl_devices WHERE id = $id");
        return $query->fetchAll();
    }

    function dupliObj($id, $physical){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_export WHERE physical_id = $physical");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_export WHERE physical_id = $physical
                                        AND id != $id");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function addObj($data){
        $query = $this->insert("tbl_export", $data);
        return $query;
    }

    function addObj_detail($data){
        $query = $this->insert("tbl_export_detail", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_export", $data, "id = $id");
        return $query;
    }

    function delObj_detail($code){
        $query = $this->delete("tbl_export_detail", "code = $code");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_export", "id = $id");
        return $query;
    }

    function get_list_device_export($id){
        $query = $this->db->query("SELECT device_id, sub_device FROM tbl_export_detail WHERE code = (SELECT tbl_export.code
                                    FROM tbl_export WHERE tbl_export.id = $id) AND status = 0");
        return $query->fetchAll();
    }

    function get_info_export($id){
        $query = $this->db->query("SELECT id, code, year_id, physical_id, create_at, (SELECT title
                                    FROM tbldm_years WHERE tbldm_years.id = year_id) AS namhoc,
                                    (SELECT title FROM tbldm_physical_room WHERE tbldm_physical_room.id = physical_id)
                                    AS physical FROM tbl_export WHERE id = $id");
        return $query->fetchAll();
    }

    function get_detail_export_device($code){
        $query = $this->db->query("SELECT code, device_id, sub_device, status, (SELECT title FROM tbl_devices
                                    WHERE tbl_devices.id = device_id) AS title FROM tbl_export_detail 
                                    WHERE code = $code AND status = 0");
        return $query->fetchAll();
    }
///////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_device_pass_id($id){
        $query = $this->db->query("SELECT id, code, title, stock FROM tbl_devices WHERE id = $id");
        return $query->fetchAll();
    }
}
?>