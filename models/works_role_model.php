<?php
class Works_role_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_works_role WHERE user_id IN (SELECT tbl_users.id
                                    FROM tbl_users WHERE tbl_users.hr_id IN (SELECT tbl_personel.id FROM tbl_personel
                                    WHERE tbl_personel.fullname LIKE '%$q%'))");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, works, status, create_at, (SELECT fullname
                                    FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users
                                    WHERE tbl_users.id = user_id)) AS fullname, (SELECT tbldm_job.title FROM tbldm_job 
                                    WHERE tbldm_job.id = (SELECT tbl_personel.job_id FROM tbl_personel 
                                    WHERE tbl_personel.id = (SELECT tbl_users.hr_id FROM tbl_users 
                                    WHERE tbl_users.id = tbl_works_role.user_id))) AS job FROM tbl_works_role
                                    WHERE user_id IN (SELECT tbl_users.id FROM tbl_users WHERE tbl_users.hr_id IN 
                                    (SELECT tbl_personel.id FROM tbl_personel WHERE tbl_personel.fullname LIKE '%$q%'))
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_works_role", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_works_role", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_works_role", "id = $id");
        return $query;
    }

    function dupliObj($id, $userid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_works_role WHERE user_id = $userid");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_works_role WHERE user_id = $userid
                                        AND id != $id");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
//////////////////////////////////////////////////////////////////////////////////////////
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

    function get_data_users_total($q){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id != 1 AND active = 1
                                AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE fullname LIKE '%$q%')");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
//////////////////////////////////////////////////////////////////////////////////////////////
    function get_all_works_group(){
        $query = $this->db->query("SELECT id, title FROM tbldm_works_group WHERE status = 1");
        return $query->fetchAll();
    }
}
?>