<?php
class Report_personel_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_data($gender, $level, $job, $subject, $offset, $rows){
        $result = array();
        $where = "status = 1";
        if($gender != 0)
            $where = $where." AND gender = $gender";
        if($level != '')
            $where = $where." AND level_id = $level";
        if($job != '')
            $where = $where." AND job_id = $job";
        if($subject != '')
            $where = $where." AND FIND_IN_SET($subject, subject)";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_personel WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, fullname, gender, birthday, job_id, level_id, `subject`, phone, email, address,
                                    (SELECT title FROM tbldm_level WHERE tbldm_level.id = level_id) AS level,
                                    (SELECT title FROM tbldm_job WHERE tbldm_job.id = job_id) AS job
                                    FROM tbl_personel WHERE $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_export($gender, $level, $job, $subject){
        $where = "status = 1";
        if($gender != 0)
            $where = $where." AND gender = $gender";
        if($level != '')
            $where = $where." AND level_id = $level";
        if($job != '')
            $where = $where." AND job_id = $job";
        if($subject != '')
            $where = $where." AND FIND_IN_SET($subject, subject)";
        $query  = $this->db->query("SELECT id, code, fullname, IF(gender = 1, 'Nam', 'Nữ') AS gender, birthday, job_id, level_id, `subject`, phone, email, address,
                                    (SELECT title FROM tbldm_level WHERE tbldm_level.id = level_id) AS level,
                                    (SELECT title FROM tbldm_job WHERE tbldm_job.id = job_id) AS job
                                    FROM tbl_personel WHERE $where ORDER BY fullname ASC");
        return $query->fetchAll();
    }
}