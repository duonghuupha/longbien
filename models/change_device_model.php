<?php
class Change_device_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_data_device($id, $q){
        $query = $this->db->query("SELECT CONCAT((SELECT title FROM tbl_devices WHERE tbl_devices.id = device_id), 
                                    ' - ', sub_device) AS title, CONCAT(device_id, '.', sub_device)
                                    AS id FROM tbl_export_detail WHERE status = 0 AND code  = (SELECT tbl_export.code 
                                    FROM tbl_export WHERE tbl_export.physical_id = $id) AND device_id IN
                                    (SELECT tbl_devices.id FROM tbl_devices WHERE tbl_devices.title LIKE '%$q%')");
        return $query->fetchAll();  
    }

    function addObj($data){
        $query = $this->insert("tbl_change_device", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_change_device", $data, "id = $id");
        return  $query;
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
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_change_device WHERE physical_from_id IN (SELECT tbldm_physical_room.id
                                FROM tbldm_physical_room WHERE tbldm_physical_room.title LIKE '%$q%') OR physical_to_id IN (SELECT tbldm_physical_room.id
                                FROM tbldm_physical_room WHERE tbldm_physical_room.title LIKE '%$q%') OR device_id IN (SELECT tbl_devices.id
                                FROM tbl_devices WHERE tbl_devices.title LIKE '%$q%')");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, year_id, physical_from_id, physical_to_id, status, user_id,
                                device_id, sub_device, create_at, content, (SELECT title FROM tbldm_years
                                WHERE tbldm_years.id = year_id) AS namhoc, (SELECT title FROM tbldm_physical_room
                                WHERE tbldm_physical_room.id = physical_from_id) AS physical_from, (SELECT title 
                                FROM tbldm_physical_room WHERE tbldm_physical_room.id = physical_to_id) AS physical_to,
                                (SELECT title FROM tbl_devices WHERE tbl_devices.id = device_id) AS device,
                                IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                FROM tbl_users WHERE tbl_users.id = user_id))) AS fullname, IF(user_app = 1, 'Administrator', (SELECT fullname 
                                FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_app))) AS fullname_app
                                FROM tbl_change_device WHERE physical_from_id IN (SELECT tbldm_physical_room.id
                                FROM tbldm_physical_room WHERE tbldm_physical_room.title LIKE '%$q%') OR physical_to_id IN (SELECT tbldm_physical_room.id
                                FROM tbldm_physical_room WHERE tbldm_physical_room.title LIKE '%$q%') OR device_id IN (SELECT tbl_devices.id
                                FROM tbl_devices WHERE tbl_devices.title LIKE '%$q%') ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_info($id){
        $query = $this->db->query("SELECT id, code, year_id, physical_from_id, physical_to_id, status, user_id,
                                device_id, sub_device, create_at, content, (SELECT title FROM tbldm_years
                                WHERE tbldm_years.id = year_id) AS namhoc, (SELECT title FROM tbldm_physical_room
                                WHERE tbldm_physical_room.id = physical_from_id) AS physical_from, (SELECT title 
                                FROM tbldm_physical_room WHERE tbldm_physical_room.id = physical_to_id) AS physical_to,
                                (SELECT title FROM tbl_devices WHERE tbl_devices.id = device_id) AS device,
                                (SELECT tbl_devices.code FROM tbl_devices WHERE tbl_devices.id = device_id) AS device_code,
                                IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                FROM tbl_users WHERE tbl_users.id = user_id))) AS fullname, IF(user_app = 1, 'Administrator', (SELECT fullname 
                                FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_app))) AS fullname_app,
                                IF(user_id = 1, 'Quản lý chung', (SELECT title FROM tbldm_job WHERE tbldm_job.id = (SELECT job_id FROM tbl_personel
                                WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_id)))) AS job,
                                (SELECT tbl_export_detail.create_at FROM tbl_export_detail WHERE tbl_export_detail.device_id = tbl_change_device.device_id
                                AND tbl_export_detail.sub_device = tbl_change_device.sub_device AND tbl_export_detail.status = 0) AS ngay_phan_bo
                                FROM tbl_change_device WHERE id = $id");
        return $query->fetchAll();
    }
}
?>