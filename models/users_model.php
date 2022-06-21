<?php
class Users_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id != 1 AND 
                                    (username LIKE '%$q%' OR hr_id IN (SELECT tbl_personel.id FROM tbl_personel
                                    WHERE tbl_personel.fullname LIKE '%$q%'))");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, username, last_login, info_login, hr_id, active,
                                (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = hr_id) AS fullname
                                FROM tbl_users WHERE id != 1 AND (username LIKE '%$q%' OR hr_id IN (SELECT tbl_personel.id FROM tbl_personel
                                WHERE tbl_personel.fullname LIKE '%$q%'))
                                ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function dupliObj($id, $username){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE username = '$username'");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE username = '$username'
                                    AND id != $id");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function addObj($data){
        $query = $this->insert("tbl_users", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_users", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_users", "id = $id");
        return $query;
    }
//////////////////////////////////////////////////////////////////////////////////////////////
    function get_personel($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_personel WHERE status != 99
                                    AND fullname LIKE '%$q%'");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, fullname, gender, birthday, (SELECT title FROM tbldm_level
                                    WHERE tbldm_level.id = level_id) AS level FROM tbl_personel WHERE status != 99
                                    AND fullname LIKE '%$q%' ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_info($id){
        $query = $this->db->query("SELECT id, code, username, hr_id, (SELECT fullname FROM tbl_personel
                                    WHERE tbl_personel.id = hr_id) AS fullname FROM tbl_users WHERE id = $id");
        return $query->fetchAll();
    }
}
?>