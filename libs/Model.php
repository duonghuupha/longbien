<?php
class Model {
    function __construct() {
		$this->db = new Database();
	}

    // them moi du lieu
    function insert($table, $array){
        $cols = array();
        $bind = array();
        foreach($array as $key => $value){
            $cols[] = $key;
            $bind[] = "'".$value."'";
        }
        $query = $this->db->query("INSERT INTO ".$table." (".implode(",", $cols).") VALUES (".implode(",", $bind).")");
        return $query;
    }

    // cap nhat du lieu
    function update($table, $array, $where){
        $set = array();
        foreach($array as $key => $value){
            $set[] = $key." = '".$value."'";
        }
        $query = $this->db->query("UPDATE ".$table." SET ".implode(",", $set)." WHERE ".$where);
        return $query;
    }

    // xoa du lieu
    function delete($table, $where = ''){
        if($where == ''){
            $query = $this->db->query("DELETE FROM ".$table);
        }else{
        $query = $this->db->query("DELETE FROM ".$table." WHERE ".$where);
        }
        return $query;
    }
///////////////////////////// cac ham khac //////////////////////////////////////////////////////////////////////////////////
    function check_token($token){
        $query = $this->db->query("SELECT last_login FROM tbl_users WHERE token = '$token'");
        return $query->fetchAll();
    }
    function return_title_subject($id){
        $query = $this->db->query("SELECT title FROM tbldm_subject WHERE id = $id");
        $row = $query->fetchAll();
        return $row[0]['title'];
    }
    function check_dupli_code_personel($code){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_personel WHERE code = $code");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function check_dupli_code_device($code){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE code = $code");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function return_fullname_per($hrid){
        $query = $this->db->query("SELECT fullname FROM tbl_personel WHERE id = $hrid");
        $row = $query->fetchAll();
        return $row[0]['fullname'];
    }
    function return_title_device($id){
        $query = $this->db->query("SELECT title FROM tbl_devices WHERE id = $id");
        $row = $query->fetchAll();
        return $row[0]['title'];
    }
    function return_list_device_export($code){
        $query = $this->db->query("SELECT device_id, sub_device, code, status, (SELECT title FROM tbl_devices
                                    WHERE tbl_devices.id = device_id) AS device FROM tbl_export_detail
                                    WHERE code = $code AND status = 0 ORDER BY id DESC");
        return $query->fetchAll();
    }
    function check_exit_sub_device($deviceid, $subdevice){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_export_detail WHERE device_id = $deviceid
                                    AND sub_device = $subdevice AND status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function return_info_device($id){
        $query = $this->db->query("SELECT code, title, stock FROM tbl_devices WHERE id = $id");
        return $query->fetchAll();
    }
    function get_device_selected($code){
        $query = $this->db->query("SELECT CONCAT(device_id, '.', sub_device) AS id, (SELECT title FROM tbl_devices
                                WHERE tbl_devices.id = device_id) AS title, (SELECT tbl_devices.code
                                FROM tbl_devices WHERE tbl_devices.id = device_id) AS code, status,  sub_device
                                FROM tbl_loans_detail WHERE code = $code AND status = 0");
        return json_encode($query->fetchAll(PDO::FETCH_ASSOC));
    }
    function check_exit_sub_device_loans($deviceid, $subdevice){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_loans_detail WHERE device_id = $deviceid
                                    AND sub_device = $subdevice AND status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function return_title_year($id){
        $query = $this->db->query("SELECT title FROM tbldm_years WHERE id = $id");
        $row = $query->fetchAll();
        return $row[0]['title'];
    }
    function get_relation_via_code($code){
        $query = $this->db->query("SELECT code, id, relation, fullname, year, phone, job FROM tbl_student_relation
                                    WHERE code = $code");
        return json_encode($query->fetchAll(PDO::FETCH_ASSOC));
    }
    function get_fullname_users($id){
        $query = $this->db->query("SELECT fullname FROM tbl_personel WHERE id = (SELECT hr_id FROM tbl_users
                                    WHERE tbl_users.id = $id)");
        $row = $query->fetchAll();
        return $row[0]['fullname'];
    }
    function get_parent_document_cate($parentid){
        $query = $this->db->query("SELECT id, title, parent_id FROM tbldm_document WHERE id = $parentid");
        return $query->fetchAll();
    }
    function return_info_book($id){
        $query = $this->db->query("SELECT code, title, stock FROM tbl_book WHERE id = $id");
        return $query->fetchAll();
    }
    function check_book_loan($bookid, $subbook){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book_loan WHERE book_id = $bookid
                                    AND sub_book = $subbook AND status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function return_titlee_job_via_user_id($userid){
        $query = $this->db->query("SELECT title FROM tbldm_job WHERE tbldm_job.id = (SELECT job_id FROM tbl_personel
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = $userid))");
        $row = $query->fetchAll();
        if(count($row) > 0){
            return $row[0]['title'];
        }else{
            return '';
        }
    }

    function return_title_department_via_student_id($student, $yearid){
        $query = $this->db->query("SELECT title FROM tbldm_department WHERE tbldm_department.id = (SELECT department_id
                                FROM tbl_student_class WHERE tbl_student_class.student_id = $student AND year_id = $yearid)");
        $row = $query->fetchAll();
        if(count($row) > 0){
            return $row[0]['title'];
        }else{
            return '';
        }
    }
/////////////////////////////////////end cac ham khac ///////////////////////////////////////////////////////////////////////
}

?>
