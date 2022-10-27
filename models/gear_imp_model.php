<?php
class Gear_imp_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils_imp");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, date_import, source, notes, create_at,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel 
                                    WHERE tbl_personel.id = (SELECT hr_id FROM  tbl_users WHERE tbl_users.id = user_id))) 
                                    AS fullname, (SELECT COUNT(*) FROM tbl_utensils_imp_detail WHERE tbl_utensils_imp_detail.code = tbl_utensils_imp.code)
                                    AS total_gear, (SELECT SUM(quantily) FROM tbl_utensils_imp_detail WHERE tbl_utensils_imp_detail.code = tbl_utensils_imp.code)
                                    AS total_qty FROM tbl_utensils_imp ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_utensils_imp", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_utensils_imp", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_utensils_imp", "id = $id");
        return $query;
    }

    function addObj_detail($data){
        $query = $this->insert("tbl_utensils_imp_detail", $data);
        return $query;
    }

    function delObj_detail($code){
        $query = $this->delete("tbl_utensils_imp_detail", "code = $code");
        return $query;
    }
///////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_utensils($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils WHERE status = 0
                                    AND title LIKE '%$q%'");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, code FROM tbl_utensils WHERE status = 0
                                    AND title LIKE '%$q%' ORDER BY title ASC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function get_info($id){
        $query = $this->db->query("SELECT id, code, user_id, date_import, source, notes, create_at,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel 
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_id))) 
                                    AS fullname FROM tbl_utensils_imp WHERE id = $id");
        return $query->fetchAll();
    }
}
?>