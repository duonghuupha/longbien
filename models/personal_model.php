<?php
class Personal_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_personel WHERE fullname LIKE '%$q%' AND status != 99");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, fullname, gender, birthday, level_id, `subject`, phone,
                                    `address`, avatar, `description`, `status`, email, job_id,
                                    (SELECT title FROM tbldm_level WHERE tbldm_level.id = level_id) AS `level`, 
                                    (SELECT title FROM tbldm_job WHERE tbldm_job.id = job_id) AS `job` 
                                    FROM tbl_personel WHERE fullname LIKE '%$q%' AND status != 99 ORDER BY id DESC 
                                    LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_personel", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_personel", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_personel", "id = $id");
        return $query;
    }

    function dupliObj($id, $code){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_personel WHERE code = '$code'");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_personel WHERE code = '$code'
                                        AND id != $id");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
///////////////////////////////////////////////////////////////////////////////////////////////
    function get_info($id){
        $query = $this->db->query("SELECT id, code, fullname, gender, DATE_FORMAT(birthday, '%d-%m-%Y') AS birthday,
                                    level_id, `subject`, phone, `address`, avatar, `description`, `status`, email, job_id,
                                    (SELECT title FROM tbldm_level WHERE tbldm_level.id = level_id) AS `level`, 
                                    (SELECT title FROM tbldm_job WHERE tbldm_job.id = job_id) AS `job` 
                                    FROM tbl_personel WHERE id = $id");
        return $query->fetchAll();
    }

    function return_id_hr_via_code($code){
        $query = $this->db->query("SELECT id FROM tbl_personel WHERE code = $code");
        $row = $query->fetchAll();
        return $row[0]['id'];
    }

    function getFetObj_tmp($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_personel WHERE fullname LIKE '%$q%' AND status = 99");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, fullname, gender, birthday, phone,  email FROM tbl_personel 
                                    WHERE fullname LIKE '%$q%' AND status = 99 ORDER BY id DESC 
                                    LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function delObj_temp(){
        $query = $this->delete("tbl_personel", "status = 99");
        return $query;
    }

    function check_dupli_code(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_personel GROUP BY code HAVING Total > 1");
        $row = $query->fetchAll();
        return count($row);
    }

    function get_all_tmp(){
        $query = $this->db->query("SELECT * FROM tbl_personel WHERE status = 99");
        return $query->fetchAll();
    }

    function get_personel_via_id($array){
        $query = $this->db->query("SELECT id, code, avatar, fullname, (SELECT title FROM tbldm_job
                                    WHERE tbldm_job.id = job_id) AS job FROM tbl_personel
                                    WHERE FIND_IN_SET(id, '$array')");
        return $query->fetchAll();
    }
}
?>