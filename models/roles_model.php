<?php
class Roles_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_roles");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, link, functions, parent_id, order_position FROM tbl_roles WHERE parent_id = 0
                                    ORDER BY order_position ASC LIMIT $offset, $rows");
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
/////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_parent(){
        $query = $this->db->query("SELECT id, title, parent_id FROM tbl_roles");
        return $query->fetchAll();
    }
}
?>