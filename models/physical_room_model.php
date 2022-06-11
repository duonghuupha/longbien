<?php
class Physical_room_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_physical_room WHERE title LIKE '%$q%'");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, region, `floor` FROM tbldm_physical_room WHERE title LIKE '%$q%'
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbldm_physical_room", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbldm_physical_room", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbldm_physical_room", "id = $id");
        return $query;
    }
////////////////////////////////////////////////////////////////////////////////////
    function get_info($id){
        $query = $this->db->query("SELECT * FROM tbldm_physical_room WHERE id = $id");
        return $query->fetchAll();
    }
}
?>