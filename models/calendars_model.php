<?php
class Calendars_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_schedule");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, user_create, lesson, lesson_export, subject_id, title, department_id,
                                    date_study, create_at, (SELECT tbldm_subject.title FROM tbldm_subject WHERE tbldm_subject.id = subject_id) 
                                    AS `subject`, (SELECT tbldm_department.title FROM tbldm_department WHERE tbldm_department.id = department_id)
                                    AS department, (SELECT fullname FROM tbl_personel WHERE tbl_personel. id = (SELECT  hr_id FROM tbl_users
                                    WHERE tbl_users.id = user_id)) AS fullname, (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                    FROM tbl_users WHERE tbl_users.id = user_create)) AS fullname_create FROM tbl_schedule ORDER BY id DESC 
                                    LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_schedule", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_schedule", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_schedule", "id = $id");
        return $query;
    }

    function dupliObj($id, $lesson, $departmentid, $date_study){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_schedule WHERE lesson = $lesson AND department_id = $departmentid
                                    AND date_study = '$date_study'");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_schedule WHERE lesson = $lesson AND department_id = $departmentid
                                        AND date_study = '$date_study' AND id != $id");
        } 
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function dupliObj_lessonmain($id, $lessonmain, $subjectid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_schedule WHERE subject_id = $subjectid AND lesson_export = $lessonmain");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_schedule WHERE subject_id = $subjectid AND lesson_export = $lessonmain
                                        AND id != $id");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
///////////////////////////////////////////////////////////////////////////////////
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

    function get_combo_subject($userid){
        $query = $this->db->query("SELECT id, title FROM tbldm_subject WHERE FIND_IN_SET(id, (SELECT `subject` FROM tbl_personel
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = $userid)))");
        return $query->fetchAll();
    }

    function get_title_deparmentt($id){
        $query = $ths->db->query("SELECT title FROM tbtldm_department WHERE id = $id");
        $row = $query->fetchAll();
        return $row[0]['title'];
    }

    function get_info($id){
        $query = $this->db->query("SELECT id, code, user_id, user_create, lesson, lesson_export, subject_id, title, department_id,
                                    DATE_FORMAT(date_study, '%d-%m-%Y') AS date_study, create_at, (SELECT tbldm_subject.title FROM tbldm_subject WHERE tbldm_subject.id = subject_id) 
                                    AS `subject`, (SELECT tbldm_department.title FROM tbldm_department WHERE tbldm_department.id = department_id)
                                    AS department, (SELECT fullname FROM tbl_personel WHERE tbl_personel. id = (SELECT  hr_id FROM tbl_users
                                    WHERE tbl_users.id = user_id)) AS fullname, (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                    FROM tbl_users WHERE tbl_users.id = user_create)) AS fullname_create FROM tbl_schedule WHERE id = $id");
        return $query->fetchAll();
    }
}
?>