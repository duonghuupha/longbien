<?php
class Group_task_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($userid, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_task_group WHERE user_id = $userid AND status = 0");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, create_at FROM tbl_task_group WHERE user_id = $userid AND status = 0
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_task_group", $data);
        return  $query;
    }

    function  updateObj($id, $data){
        $query = $this->update("tbl_task_group", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_task_group", "id = $id");
        return $query;
    }
}
?>