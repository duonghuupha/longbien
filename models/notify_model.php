<?php
class Notify_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($userid, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_notify WHERE user_read = $userid");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, user_id, user_read, readed, title, link, create_at, 
                                IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel 
                                WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_id))) 
                                AS user_create FROM tbl_notify WHERE user_read = $userid ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_total_notify_unread($userid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_notify WHERE user_read = $userid   
                                    AND readed = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_data_notify_modal($userid){
        $query = $this->db->query("SELECT id, title, link, create_at, IF(user_id = 1, 'Administrator',  (SELECT fullname FROM tbl_personel
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_id)))
                                    AS fullname FROM tbl_notify WHERE user_read = $userid AND readed = 0
                                    ORDER BY id DESC LIMIT 0,  5");
        return $query->fetchAll();
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_notify", $data, "id = $id");
        return $query;
    }

    function get_link_notify($id){
        $query = $this->db->query("SELECT link FROM tbl_notify WHERE id = $id");
        $row = $query->fetchAll();
        return $row[0]['link'];
    }

    function delObj($id){
        $query = $this->delete("tbl_notify", "id = $id");
        return $query;
    }
}
?>