<?php
class Floor_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_floor WHERE status = 0");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, bin_id, (SELECT tbldm_bin.title FROM tbldm_bin
                                    WHERE tbldm_bin.id = bin_id) AS bin FROM tbldm_floor WHERE status = 0 
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbldm_floor", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbldm_floor", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbldm_floor", "id = $id");
        return $query;
    }
////////////////////////////////////////////////////////////////////////////////////
    function get_info($id){
        $query = $this->db->query("SELECT * FROM tbldm_floor WHERE id = $id");
        return $query->fetchAll();
    }
}
?>