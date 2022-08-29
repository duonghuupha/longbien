<?php
class Returns_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_returns_device WHERE physical_id IN (SELECT tbldm_physical_room.id
                                    FROM tbldm_physical_room WHERE tbldm_physical_room.title LIKE '%$q%') OR device_id IN (SELECT tbl_devices.id
                                    FROM tbl_devices WHERE tbl_devices.title LIKE '%$q%')");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, create_at, year_id, physical_id, device_id, sub_device, content,
                                    status, (SELECT title FROM tbldm_physical_room WHERE tbldm_physical_room.id = physical_id)
                                    AS physical, (SELECT title FROM tbldm_department WHERE tbldm_department.physical_id = tbl_returns_device.physical_id
                                    AND tbldm_department.year_id = tbl_returns_device.year_id) AS department, (SELECT title FROM tbl_devices
                                    WHERE tbl_devices.id = device_id) AS device FROM tbl_returns_device WHERE physical_id IN (SELECT tbldm_physical_room.id
                                    FROM tbldm_physical_room WHERE tbldm_physical_room.title LIKE '%$q%') OR device_id IN (SELECT tbl_devices.id
                                    FROM tbl_devices WHERE tbl_devices.title LIKE '%$q%') ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_combo_department($yearid){
        $query = $this->db->query("SELECT id, title, physical_id, (SELECT tbldm_physical_room.title FROM tbldm_physical_room
                                    WHERE tbldm_physical_room.id = physical_id) AS physical FROM tbldm_department
                                    WHERE year_id = $yearid OR is_default = 0");
        return $query->fetchAll();
    }

    function get_combo_device($physicalid){
        $query = $this->db->query("SELECT code, device_id, sub_device, id, status, (SELECT tbl_devices.title 
                                    FROM tbl_devices WHERE tbl_devices.id = device_id) AS title, (SELECT tbl_devices.code 
                                    FROM tbl_devices WHERE tbl_devices.id = device_id) AS code_dv FROM tbl_export_detail
                                    WHERE code = (SELECT tbl_export.code FROM tbl_export WHERE physical_id = $physicalid)
                                    AND status = 0");
        return $query->fetchAll();
    }

    function updateObj_device_export($deviceid, $subdevice, $physicalid, $data){
        $query = $this->update("tbl_export_detail", $data, "device_id = $deviceid AND sub_device = $subdevice
                                AND code = (SELECT tbl_export.code FROM tbl_export WHERE tbl_export.physical_id = $physicalid)");
        return $query;
    }

    function addObj($data){
        $query = $this->insert("tbl_returns_device", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_returns_device", $data, "id = $id");
        return $query;
    }

    function dupliObj($physicalid, $deviceid, $subdevice){
        $query = $this->db->query("SELECT `status` FROM tbl_returns_device WHERE physical_id = $physicalid
                                    AND device_id = $deviceid AND sub_device = $subdevice ORDER BY id DESC
                                    LIMIT 0, 1");
        $row = $query->fetchAll();
        return $row[0]['status'];
    }

    function delObj($id){
        $query = $this->delete("tbl_returns_device", "id = $id");
        return $query;
    }

    function get_info($id){
        $query = $this->db->query("SELECT * FROM tbl_returns_device WHERE id = $id");
        return $query->fetchAll();
    }

    function get_info_returns($id){
        $query = $this->db->query("SELECT id, code, create_at, sub_device, status, content,  IF(user_id = 1, 'Administrator', 
                                    (SELECT tbl_personel.fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id 
                                    FROM tbl_users WHERE tbl_users.id = user_id))) AS fullname, IF(user_id = 1, 'Quản lý trung',
                                    (SELECT tbldm_job.title FROM tbldm_job WHERE tbldm_job.id = (SELECT tbl_personel.job_id
                                    FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE
                                    tbl_users.id= user_id)))) AS job, (SELECT title FROM tbldm_physical_room WHERE
                                    tbldm_physical_room.id = physical_id) AS physical, (SELECT title FROM tbldm_department
                                    WHERE tbldm_department.physical_id = tbl_returns_device.physical_id AND 
                                    tbldm_department.year_id = tbl_returns_device.year_id) AS department, (SELECT title FROM tbl_devices
                                    WHERE tbl_devices.id  = device_id) AS device, (SELECT tbl_devices.code FROM tbl_devices 
                                    WHERE tbl_devices.id  = device_id) AS device_code, (SELECT tbl_export_detail.create_at
                                    FROM tbl_export_detail WHERE tbl_export_detail.device_id = tbl_returns_device.device_id
                                    AND tbl_export_detail.sub_device = tbl_returns_device.sub_device AND tbl_export_detail.status = 0)
                                    AS ngay_phan_bo FROM tbl_returns_device WHERE id = $id");
        return $query->fetchAll();
    }

    function get_info_restore($id){
        $query = $this->db->query("SELECT id, physical_id, device_id, sub_device, (SELECT title FROM tbldm_physical_room 
                                    WHERE tbldm_physical_room.id = physical_id) AS physical, (SELECT title FROM tbldm_department 
                                    WHERE tbldm_department.physical_id = tbl_returns_device.physical_id
                                    AND tbldm_department.year_id = tbl_returns_device.year_id) AS department, 
                                    (SELECT title FROM tbl_devices WHERE tbl_devices.id = device_id) AS device 
                                    FROM tbl_returns_device WHERE id = $id");
        return $query->fetchAll();
    }
}
?>