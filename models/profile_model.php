<?php
class Profile_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_info_user($id){
        $query = $this->db->query("SELECT id, code, fullname, gender, DATE_FORMAT(birthday, '%d-%m-%Y') AS birthday,
                                    level_id, `subject`, phone, `address`, avatar, `description`, `status`, email, job_id,
                                    (SELECT title FROM tbldm_level WHERE tbldm_level.id = level_id) AS `level`, 
                                    (SELECT title FROM tbldm_job WHERE tbldm_job.id = job_id) AS `job` 
                                    FROM tbl_personel WHERE id = $id");
        return $query->fetchAll();
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_users",  $data, "id  = $id");
        return $query;
    }

}
?>