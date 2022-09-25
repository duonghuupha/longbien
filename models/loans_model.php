<?php
class Loans_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($userid, $q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_loans WHERE (user_id = $userid OR user_loan = $userid) AND user_loan IN (SELECT tbl_users.id FROM tbl_users
                                    WHERE tbl_users.hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE tbl_personel.fullname LIKE '%$q%'))
                                    OR code IN (SELECT tbl_loans_detail.code FROM tbl_loans_detail WHERE tbl_loans_detail.device_id IN (SELECT tbl_devices.id
                                    FROM tbl_devices WHERE tbl_devices.title LIKE '%$q%'))");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, user_loan, date_loan, date_return, content,
                                    notes, status, create_at, IF(user_id = 1, 'Administrator', (SELECT fullname 
                                    FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users 
                                    WHERE tbl_users.id = user_id))) AS fullname_create, IF(user_loan = 1,  'Administrator',
                                    (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users
                                    WHERE tbl_users.id = user_loan))) AS fullname_loan, (SELECT COUNT(*) FROM tbl_loans_detail
                                    WHERE tbl_loans_detail.code = tbl_loans.code) AS qty
                                    FROM tbl_loans WHERE (user_id = $userid OR user_loan = $userid) AND  user_loan IN (SELECT tbl_users.id FROM tbl_users
                                    WHERE tbl_users.hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE tbl_personel.fullname LIKE '%$q%'))
                                    OR code IN (SELECT tbl_loans_detail.code FROM tbl_loans_detail WHERE tbl_loans_detail.device_id IN (SELECT tbl_devices.id
                                    FROM tbl_devices WHERE tbl_devices.title LIKE '%$q%')) ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function dupliObj($deviceid, $subdevice){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_loans_detail WHERE device_id = $deviceid
                                    AND sub_device = $subdevice AND status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
        
    }

    function addObj($data){
        $query = $this->insert("tbl_loans", $data);
        return $query;
    }

    function addObj_detail($data){
        $query = $this->insert("tbl_loans_detail", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_loans", $data, "id = $id");
        return $query;
    }

    function updateObj_via_code($code, $data){
        $query = $this->update("tbl_loans", $data, "code = $code");
        return $query;
    }

    function updateObj_detail($data, $code, $deviceid, $subdevice){
        $query = $this->update("tbl_loans_detail", $data, "code = $code AND device_id = $deviceid AND sub_device = $subdevice");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_loans", "id = $id");
        return $query;
    }

    function updateObj_detail_via_code($code, $data){
        $query = $this->update("tbl_loans_detail", $data, "code = $code");
        return $query;
    }
///////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_device($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE status = 1 AND title LIKE '%$q%' 
                                    AND id NOT IN (SELECT device_id FROM tbl_export_detail 
                                    GROUP BY device_id HAVING (COUNT(*) - (SELECT tbl_devices.stock 
                                    FROM tbl_devices WHERE tbl_devices.id = device_id)) >= 0)
                                    AND id NOT IN (SELECT device_id FROM tbl_loans_detail GROUP BY device_id HAVING
                                    (COUNT(*) - (SELECT tbl_devices.stock FROM tbl_devices WHERE tbl_devices.id = device_id)) > 0)");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, code, stock FROM tbl_devices WHERE status = 1 AND title LIKE '%$q%'
                                    AND id NOT IN (SELECT device_id FROM tbl_export_detail 
                                    GROUP BY device_id HAVING (COUNT(*) - (SELECT tbl_devices.stock 
                                    FROM tbl_devices WHERE tbl_devices.id = device_id)) >= 0)
                                    AND id NOT IN (SELECT device_id FROM tbl_loans_detail GROUP BY device_id HAVING
                                    (COUNT(*) - (SELECT tbl_devices.stock FROM tbl_devices WHERE tbl_devices.id = device_id)) > 0)
                                    ORDER BY title ASC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_total_data_device($q){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE status = 1 AND title LIKE '%$q%' 
                                    AND id NOT IN (SELECT device_id FROM tbl_export_detail 
                                    GROUP BY device_id HAVING (COUNT(*) - (SELECT tbl_devices.stock 
                                    FROM tbl_devices WHERE tbl_devices.id = device_id)) >= 0)
                                    AND id NOT IN (SELECT device_id FROM tbl_loans_detail GROUP BY device_id HAVING
                                    (COUNT(*) - (SELECT tbl_devices.stock FROM tbl_devices WHERE tbl_devices.id = device_id)) > 0)");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_data_users($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id != 1 AND active = 1
                                    AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE fullname LIKE '%$q%')");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, (SELECT fullname FROM tbl_personel WHERE tbl_personel.id  = hr_id) AS fullname,
                                    (SELECT birthday FROM tbl_personel WHERE tbl_personel.id  = hr_id) AS birthday,
                                    (SELECT gender FROM tbl_personel WHERE tbl_personel.id  = hr_id) AS gender,
                                    (SELECT title FROM tbldm_job WHERE tbldm_job.id = (SELECT job_id FROM tbl_personel
                                    WHERE tbl_personel.id = hr_id)) AS job
                                    FROM tbl_users WHERE id != 1 AND active = 1 AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel 
                                    WHERE fullname LIKE '%$q%')ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function geet_total_Data_user($q){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id != 1 AND active = 1
                                AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE fullname LIKE '%$q%')");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_info($id){
        $query = $this->db->query("SELECT id, code, user_loan, DATE_FORMAT(date_loan, '%d-%m-%Y') AS date_loan, 
                                    DATE_FORMAT(date_return, '%d-%m-%Y') AS date_return, content, notes,
                                    (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                    FROM tbl_users WHERE tbl_users.id = user_loan)) AS fullname,  create_at,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel 
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_loan))) AS create_name
                                    FROM tbl_loans WHERE id = $id");
        return $query->fetchAll();
    }

    function get_device_selected($code){
        $query = $this->db->query("SELECT id, code, device_id, sub_device, date_return, status,
                                    (SELECT title FROM tbl_devices WHERE tbl_devices.id = device_id) AS title,
                                    (SELECT tbl_devices.code FROM tbl_devices WHERE tbl_devices.id = device_id) 
                                    AS code_device FROM tbl_loans_detail WHERE code = $code");
        return $query->fetchAll();
    }

    function check_return_all_device($code){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_loans_detail WHERE code = $code
                                    AND status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_detail_loans_via_device($devicecode, $subdevice){
        $query = $this->db->query("SELECT id, code, status, date_return, device_id, sub_device FROM tbl_loans_detail
                                    WHERE status = 0 AND sub_device = $subdevice AND device_id = (SELECT tbl_devices.id
                                    FROM tbl_devices WHERE tbl_devices.code = $devicecode)");
        return $query->fetchAll();
    }
}
?>