<?php
class Roles_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_roles");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, link, functions FROM tbl_roles ORDER BY id DESC
                                    LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_roles", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_roles", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_roles", "id = $id");
        return $query;
    }
}
?>