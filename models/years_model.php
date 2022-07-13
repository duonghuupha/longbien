<?php
class Years_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_years WHERE status = 0");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, active FROM tbldm_years WHERE status = 0 
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbldm_years", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbldm_years", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbldm_years", "id = $id");
        return $query;
    }
////////////////////////////////////////////////////////////////////////////////////
    function get_info($id){
        $query = $this->db->query("SELECT * FROM tbldm_years WHERE id = $id");
        return $query->fetchAll();
    }

    function updateObj_all($data){
        $query = $this->db->query("UPDATE tbldm_years SET active = 0");
        return $query;
    }

    function check_active($id){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_years WHERE active = 1 AND id = $id");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
}
?>