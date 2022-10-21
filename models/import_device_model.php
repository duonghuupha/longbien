<?php
class Import_device_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_device_import");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, date_import, user_id, source, notes, create_at, date_import AS dateimport,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_id)))
                                    AS fullname, (SELECT COUNT(*) FROM tbl_device_import_detail WHERE tbl_device_import_detail.code
                                    = tbl_device_import.code) AS total_device, (SELECT SUM(quantily) FROM tbl_device_import_detail
                                    WHERE tbl_device_import_detail.code = tbl_device_import.code) AS total_qty
                                    FROM tbl_device_import ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_device_import", $data);
        return $query;
    }

    function addObj_detail($data){
        $query = $this->insert("tbl_device_import_detail", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_device_import", $data, "id = $id");
        return $query;
    }

    function delObj_detail($code){
        $query = $this->delete("tbl_device_import_detail","code = $code");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_device_import", "id = $id");
        return $query;
    }
////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_device($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE status = 1
                                AND (title LIKE '%$q%' OR code LIKE '%$q%')");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title FROM tbl_devices WHERE status = 1
                                AND (title LIKE '%$q%' OR code LIKE '%$q%') ORDER BY title ASC
                                LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }
//////////////////////////////////////////////////////////////////////////////////////////////////
    function get_info($id){
        $query = $this->db->query("SELECT id, code, date_import, user_id, source, notes, create_at,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_id)))
                                    AS fullname FROM tbl_device_import WHERE id = $id");
        return $query->fetchAll();
    }
}
?>