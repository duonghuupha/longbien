<?php
class Weekly_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_data_users($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id != 1 AND active = 1
                                    AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE fullname LIKE '%$q%')");
        $row  = $query->fetchAll();
        $query = $this->db->query("SELECT id, (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = hr_id)
                                    AS fullname FROM tbl_users WHERE id != 1 AND active = 1
                                    AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE fullname LIKE '%$q%')
                                    ORDER BY username ASC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_task_of_user_via_date($userid, $date, $time){
        $query = $this->db->query("SELECT id, title, IF(user_main = 1, 'Administrator', (SELECT fullname
                                    FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users
                                    WHERE tbl_users.id = user_main))) AS usermain, date_work, user_main FROM tbl_tasks 
                                    WHERE date_work = '$date' AND time_work = $time AND user_main = $userid
                                    ORDER BY id DESC");
        return $query->fetchAll();
    }
}
?>