<?php
class Works_cate_Model extends Model{
    function __construct(){
        parent::__construct();
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function getFetObj_cate($offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_works");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, create_at, status, group_id, (SELECT tbldm_works_group.title
                                    FROM tbldm_works_group WHERE tbldm_works_group.id = group_id) AS `group` 
                                    FROM tbldm_works ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj_cate($data){
        $query = $this->insert("tbldm_works", $data);
        return $query;
    }

    function updateObj_cate($id, $data){
        $query = $this->update("tbldm_works", $data, "id = $id");
        return $query;
    }

    function delObj_cate($id){
        $query = $this->delete("tbldm_works", "id = $id");
        return $query;
    }
///////////////////////////////////////////////////////////////////////////////////////////////
    function getFetObj_group($offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_works_group");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, create_at, status FROM tbldm_works_group 
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj_group($data){
        $query = $this->insert("tbldm_works_group", $data);
        return $query;
    }

    function updateObj_group($id, $data){
        $query = $this->update("tbldm_works_group", $data, "id = $id");
        return $query;
    }

    function delObj_group($id){
        $query = $this->delete("tbldm_works_group", "id = $id");
        return $query;
    }
}
?>