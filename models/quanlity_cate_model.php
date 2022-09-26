<?php
class Quanlity_cate_Model extends Model{
    function __construct(){
        parent::__construct();
    }

//////////////////////// giai doan//////////////////////////////////////////////////////////////////////
    function getFetObj_quanlity($offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_quanlity");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, create_at FROM tbldm_quanlity
                                    ORDER BY id DESC  LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj_quanlity($data){
        $query = $this->insert("tbldm_quanlity", $data);
        return $query;
    }

    function updateObj_quanlity($id, $data){
        $query = $this->update("tbldm_quanlity", $data, "id = $id");
        return $query;
    }

    function delObj_quanlity($id){
        $query = $this->delete("tbldm_quanlity", "id = $id");
        return $query;
    }

    function get_info_quanlity($id){
        $query = $this->db->query("SELECT * FROM tbldm_quanlity WHERE id = $id");
        return $query->fetchAll();
    }

}
?>