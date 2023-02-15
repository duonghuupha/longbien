<?php
class Cate_book_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj(){
        $query = $this->db->query("SELECT id, title, parent_id, create_at FROM tbldm_book 
                                    WHERE status = 0 ORDER BY id DESC");
        return $query->fetchAll();
    }

    function addObj($data){
        $query = $this->insert("tbldm_book", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbldm_book", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbldm_book", "id = $id");
        return $query;
    }
////////////////////////////////////////////////////////////////////////////////////
    function get_info($id){
        $query = $this->db->query("SELECT * FROM tbldm_book WHERE id = $id");
        return $query->fetchAll();
    }
}
?>