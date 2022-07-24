<?php
class Cate_book_manu_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_book_manu WHERE status = 0");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, create_at FROM tbldm_book_manu WHERE status = 0 
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbldm_book_manu", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbldm_book_manu", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbldm_book_manu", "id = $id");
        return $query;
    }
////////////////////////////////////////////////////////////////////////////////////
    function get_info($id){
        $query = $this->db->query("SELECT * FROM tbldm_book_manu WHERE id = $id");
        return $query->fetchAll();
    }
}
?>