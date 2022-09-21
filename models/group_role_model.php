<?php
class Group_role_model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_group_role");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title, roles, status, create_at,  
                                    (SELECT COUNT(*) FROM tbl_users WHERE tbl_users.group_role_id = tbl_group_role.id)
                                    AS total_user FROM tbl_group_role ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_group_role", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_group_role", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_group_role", "id = $id");
        return $query;
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_role(){
        $query = $this->db->query("SELECT id, title, link, functions FROM tbl_roles");
        return $query->fetchAll();
    }

    function check_role_of_user($id){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE group_role_id = $id");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
}
?>