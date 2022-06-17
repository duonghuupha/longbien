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
    function check_dupli_code(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_personel GROUP BY code HAVING Total > 1");
        $row = $query->fetchAll();
        return count($row);
    }
/////////////////////////////////////end cac ham khac ///////////////////////////////////////////////////////////////////////

}

?>
