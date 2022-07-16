<?php
class Tasks_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_tasks WHERE status != 1
                                    AND title LIKE '%$q%'");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title, content, date_work, time_work, file, status, create_at, user_share,
                                    (SELECT title FROM tbl_task_group WHERE tbl_task_group.id = group_id) AS group_task,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users
                                    WHERE tbl_users.id = user_id))) AS user_create, IF(user_main = 1, 'Administrator', (SELECT fullname FROM tbl_personel 
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_main))) AS usermain 
                                    FROM tbl_tasks WHERE status != 1  AND title LIKE '%$q%' ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_tasks", $data);
        return  $query;
    }

    function  updateObj($id, $data){
        $query = $this->update("tbl_tasks", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_tasks", "id = $id");
        return $query;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_users($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id != 1 AND active = 1
                                    AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE fullname LIKE '%$q%')");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, (SELECT fullname FROM tbl_personel WHERE tbl_personel.id  = hr_id) AS fullname,
                                    (SELECT birthday FROM tbl_personel WHERE tbl_personel.id  = hr_id) AS birthday,
                                    (SELECT gender FROM tbl_personel WHERE tbl_personel.id  = hr_id) AS gender,
                                    (SELECT title FROM tbldm_job WHERE tbldm_job.id = (SELECT job_id FROM tbl_personel
                                    WHERE tbl_personel.id = hr_id)) AS job
                                    FROM tbl_users WHERE id != 1 AND active = 1 AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel 
                                    WHERE fullname LIKE '%$q%')ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function geet_total_Data_user($q){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id != 1 AND active = 1
                                AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE fullname LIKE '%$q%')");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_info_edit($id){
        $query = $this->db->query("SELECT id, code, group_id, title, content, DATE_FORMAT(date_work, '%d-%m-%Y') AS date_work,
                                    time_work, user_share, file, user_main, user_id, create_at, IF(user_main = 1, 'Administrator',
                                    (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                    FROM tbl_users WHERE tbl_users.id = user_main))) AS usermain, IF(user_id = 1, 'Administrator',
                                    (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                    FROM tbl_users WHERE tbl_users.id = user_id))) AS user_create, status FROM tbl_tasks 
                                    WHERE id = $id");
        return $query->fetchAll();
    }

    function addObj_C($data){
        $query = $this->insert("tbl_task_comment", $data);
        return $query;
    }

    function get_comment_task($id, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_task_comment WHERE task_id = $id");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT user_id, content, file, create_at, IF(user_id =  1, 'Administrator', 
                                    (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id 
                                    FROM tbl_users WHERE tbl_users.id = user_id))) AS fullname 
                                    FROM tbl_task_comment WHERE task_id = $id ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_id_task_by_code($code){
        $query = $this->db->query("SELECT id FROM tbl_tasks WHERE code = $code");
        $row = $query->fetchAll();
        return $row[0]['id'];
    }
}
?>