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
                                    WHERE code = $code ORDER BY id DESC");
        return $query->fetchAll();
    }
    function check_exit_sub_device($deviceid, $subdevice){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_export_detail WHERE device_id = $deviceid
                                    AND sub_device = $subdevice");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function return_info_device($id){
        $query = $this->db->query("SELECT code, title FROM tbl_devices WHERE id = $id");
        return $query->fetchAll();
    }
/////////////////////////////////////end cac ham khac ///////////////////////////////////////////////////////////////////////

}

?>
