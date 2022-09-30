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
        $query = $this->db->query("SELECT id, title, create_at, `status` FROM tbldm_quanlity
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

    function updateObj_all_quanlity(){
        $query = $this->db->query("UPDATE tbldm_quanlity SET status = 0");
        return $query;
    }
//////////////////////////// tieu chuan////////////////////////////////////////////////////////
    function getFetObj_standard($offset,  $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_quanlity_standard");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, quanlity_id, title, (SELECT tbldm_quanlity.title
                                    FROM tbldm_quanlity WHERE tbldm_quanlity.id = quanlity_id) AS quanlity 
                                    FROM tbldm_quanlity_standard ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj_standard($data){
        $query = $this->insert("tbldm_quanlity_standard", $data);
        return $query;
    }

    function updateObj_standard($id, $data){
        $query = $this->update("tbldm_quanlity_standard", $data, "id = $id");
        return $query;
    }

    function delObj_standard($id){
        $query = $this->delete("tbldm_quanlity_standard", "id = $id");
        return $query;
    }
///////////////////////// tieu chi ////////////////////////////////////////////////////////////
    function getFetObj_criteria($offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_quanlity_criteria");
        $row= $query->fetchAll();
        $query = $this->db->query("SELECT id, quanlity_id, standard_id, title, (SELECT tbldm_quanlity.title
                                    FROM tbldm_quanlity WHERE tbldm_quanlity.id = quanlity_id) AS quanlity,
                                    (SELECT tbldm_quanlity_standard.title FROM tbldm_quanlity_standard
                                    WHERE tbldm_quanlity_standard.id = standard_id) AS `standard`
                                    FROM tbldm_quanlity_criteria ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj_criteria($data){
        $query = $this->insert("tbldm_quanlity_criteria", $data);
        return $query;
    }

    function updateObj_criteria($id, $data){
        $query = $this->update("tbldm_quanlity_criteria", $data, "id = $id");
        return $query;
    }

    function delObj_criteria($id){
        $query = $this->delete("tbldm_quanlity_criteria", "id = $id");
        return $query;
    }
///////////////////// phan quyen tieu chi/////////////////////////////////////////////////////
    
}
?>