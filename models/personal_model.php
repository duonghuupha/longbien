<?php
class Personal_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_personel WHERE fullname LIKE '%$q%'");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, fullname, gender, birthday, level_id, `subject`, phone,
                                    `address`, avatar, `description`, `status`, email, job_id,
                                    (SELECT title FROM tbldm_level WHERE tbldm_level.id = level_id) AS `level`, 
                                    (SELECT title FROM tbldm_job WHERE tbldm_job.id = job_id) AS `job` 
                                    FROM tbl_personel WHERE fullname LIKE '%$q%' ORDER BY id DESC 
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
}
?>