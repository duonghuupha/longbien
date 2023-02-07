<?php
class Bin_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_bin");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title  FROM tbldm_bin ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbldm_bin", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbldm_bin", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbldm_bin", "id = $id");
        return $query;
    }
////////////////////////////////////////////////////////////////////////////////////
    function get_info($id){
        $query = $this->db->query("SELECT * FROM tbldm_bin WHERE id = $id");
        return $query->fetchAll();
    }
}
?>