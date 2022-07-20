<?php
class Document_cate_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_document WHERE status = 0
                                    AND title LIKE '%$q%'");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, parent_id, title, user_id, create_at FROM tbldm_document
                                    WHERE status = 0 AND title LIKE '%$q%' ORDER BY id DESC 
                                    LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows']  = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbldm_document", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbldm_document", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbldm_document", "id = $id");
        return $query;
    }
}
?>