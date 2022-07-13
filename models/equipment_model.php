<?php
class Equipment_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_equipment WHERE status = 0");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, create_at FROM tbldm_equipment WHERE status = 0 
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbldm_equipment", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbldm_equipment", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbldm_equipment", "id = $id");
        return $query;
    }
////////////////////////////////////////////////////////////////////////////////////
    function get_info($id){
        $query = $this->db->query("SELECT * FROM tbldm_equipment WHERE id = $id");
        return $query->fetchAll();
    }
}
?>