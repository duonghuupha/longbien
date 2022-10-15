<?php
class Assign_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_assign WHERE user_id IN (SELECT tbl_users.id
                                    FROM tbl_users WHERE tbl_users.hr_id IN (SELECT tbl_personel.id FROM tbl_personel
                                    WHERE tbl_personel.fullname LIKE '%$q%'))");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, year_id, create_at, (SELECT COUNT(*) FROM tbl_assign_detail
                                    WHERE tbl_assign_detail.code = tbl_assign.code) AS total_subject,
                                    (SELECT title FROM tbldm_years WHERE tbldm_years.id = year_id) AS namhoc,
                                    (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                    FROM tbl_users WHERE tbl_users.id = user_id)) AS fullname
                                    FROM tbl_assign WHERE user_id IN (SELECT tbl_users.id
                                    FROM tbl_users WHERE tbl_users.hr_id IN (SELECT tbl_personel.id FROM tbl_personel
                                    WHERE tbl_personel.fullname LIKE '%$q%')) ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function dupliObj($id, $userid, $yearid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_assign WHERE user_id = $userid
                                    AND year_id = $yearid");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_assign WHERE user_id = $userid
                                    AND year_id = $yearid AND id != $id");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function addObj($data){
        $query = $this->insert("tbl_assign", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_assign", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("ttbl_assign", "id = $id");
        return $query;
    }

    function addObj_detail($data){
        $query = $this->insert("tbl_assign_detail", $data);
        return $query;
    }

    function delObj_detail($code){
        $query = $this->delete("tbl_assign_detail",  "code = $code");
        return $query;
    }

    function get_info($id){
        $query = $this->db->query("SELECT id, code, user_id, year_id, create_at,
                                    (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                    FROM tbl_users WHERE tbl_users.id = user_id)) As fullname, (SELECT title
                                    FROM tbldm_years WHERE tbldm_years.id = year_id) AS namhoc FROM tbl_assign
                                    WHERE id = $id");
        return $query->fetchAll();
    }
////////////////////////////////////////////////////////////////////////////////////////
    function get_data_users($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id != 1 AND active = 1
                                    AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE fullname LIKE '%$q%'
                                    AND job_id in (SELECT tbldm_job.id  FROM tbldm_job WHERE tbldm_job.is_teacher = 1))");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, (SELECT fullname FROM tbl_personel WHERE tbl_personel.id  = hr_id) AS fullname,
                                    (SELECT birthday FROM tbl_personel WHERE tbl_personel.id  = hr_id) AS birthday,
                                    (SELECT gender FROM tbl_personel WHERE tbl_personel.id  = hr_id) AS gender,
                                    (SELECT title FROM tbldm_job WHERE tbldm_job.id = (SELECT job_id FROM tbl_personel
                                    WHERE tbl_personel.id = hr_id)) AS job FROM tbl_users WHERE id != 1 AND active = 1 AND 
                                    hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE fullname LIKE '%$q%' 
                                    AND job_id in (SELECT tbldm_job.id  FROM tbldm_job WHERE tbldm_job.is_teacher = 1))
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_users_total($q){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id != 1 AND active = 1
                                AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE fullname LIKE '%$q%'
                                AND job_id in (SELECT tbldm_job.id  FROM tbldm_job WHERE tbldm_job.is_teacher = 1))");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_subject($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_subject WHERE set_point = 1
                                    AND status = 0 AND title LIKE '%$q%'");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title FROM tbldm_subject WHERE set_point = 1 AND status = 0
                                    AND title LIKE '%$q%' ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_subject_total($q){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_subject WHERE set_point = 1
                                    AND status = 0 AND title LIKE '%$q%'");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
////////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_department($q, $yearid, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_department WHERE status = 0
                                    AND class_study = 1 AND year_id = $yearid");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title FROM tbldm_department WHERE status = 0 AND class_study = 1
                                    AND year_id = $yearid ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;             
    }

    function get_data_department_total($q, $yearid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_department WHERE status = 0
                                    AND class_study = 1 AND year_id = $yearid");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
}
?>