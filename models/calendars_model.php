<?php
class Calendars_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($userid, $title, $date, $lesson, $lessonexport, $teacher, $department, $subject, $offset, $rows){
        $result = array();
        $where = "(user_id = $userid OR user_create = $userid) AND title LIKE '%$title%'";
        if($date != '')
            $where = $where." AND date_study = '$date'";
        if($lesson != 0)
            $where = $where." AND lesson = $lesson";
        if($lessonexport != '')
            $where = $where." AND lesson_export = $lessonexport";
        if($teacher != '')
            $where = $where." AND user_id IN (SELECT tbl_users.id FROM tbl_users WHERE tbl_users.hr_id IN (SELECT tbl_personel.id
                    FROM tbl_personel WHERE tbl_personel.fullname LIKE '%$teacher%'))";
        if($department != '')
            $where = $where." AND department_id = $department";
        if($subject != '')
            $where = $where." AND subject_id = $subject";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_schedule WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, user_create, lesson, lesson_export, subject_id, title, department_id,
                                    date_study, create_at, (SELECT tbldm_subject.title FROM tbldm_subject WHERE tbldm_subject.id = subject_id) 
                                    AS `subject`, (SELECT tbldm_department.title FROM tbldm_department WHERE tbldm_department.id = department_id)
                                    AS department, (SELECT fullname FROM tbl_personel WHERE tbl_personel. id = (SELECT  hr_id FROM tbl_users
                                    WHERE tbl_users.id = user_id)) AS fullname, (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                    FROM tbl_users WHERE tbl_users.id = user_create)) AS fullname_create FROM tbl_schedule WHERE $where
                                    ORDER BY id DESC LIMIT $offset, $rows");
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

    function get_info($id){
        $query = $this->db->query("SELECT id, code, user_id, user_create, lesson, lesson_export, subject_id, title, department_id, date_study AS datestudy,
                                DATE_FORMAT(date_study, '%d-%m-%Y') AS date_study, create_at, (SELECT tbldm_subject.title FROM tbldm_subject WHERE tbldm_subject.id = subject_id) 
                                AS `subject`, (SELECT tbldm_department.title FROM tbldm_department WHERE tbldm_department.id = department_id)
                                AS department, (SELECT fullname FROM tbl_personel WHERE tbl_personel. id = (SELECT  hr_id FROM tbl_users
                                WHERE tbl_users.id = user_id)) AS fullname, (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                FROM tbl_users WHERE tbl_users.id = user_create)) AS fullname_create FROM tbl_schedule WHERE id = $id");
        return $query->fetchAll();
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
//////////////////////////////////////////////////////////////////////////////////////////////
    function check_user_is_teacher($userid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id = $userid
                                    AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE tbl_personel.job_id = (SELECT tbldm_job.id
                                    FROM tbldm_job WHERE tbldm_job.is_teacher = 1 AND tbldm_job.status = 0))");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
//////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_device($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE status = 1 AND title LIKE '%$q%' 
                                    AND id NOT IN (SELECT device_id FROM tbl_export_detail 
                                    GROUP BY device_id HAVING (COUNT(*) - (SELECT tbl_devices.stock 
                                    FROM tbl_devices WHERE tbl_devices.id = device_id)) >= 0)
                                    AND id NOT IN (SELECT device_id FROM tbl_loans_detail GROUP BY device_id HAVING
                                    (COUNT(*) - (SELECT tbl_devices.stock FROM tbl_devices WHERE tbl_devices.id = device_id)) > 0)");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, code, stock FROM tbl_devices WHERE status = 1 AND title LIKE '%$q%'
                                    AND id NOT IN (SELECT device_id FROM tbl_export_detail 
                                    GROUP BY device_id HAVING (COUNT(*) - (SELECT tbl_devices.stock 
                                    FROM tbl_devices WHERE tbl_devices.id = device_id)) >= 0)
                                    AND id NOT IN (SELECT device_id FROM tbl_loans_detail GROUP BY device_id HAVING
                                    (COUNT(*) - (SELECT tbl_devices.stock FROM tbl_devices WHERE tbl_devices.id = device_id)) > 0)
                                    ORDER BY title ASC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_device_total($q){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE status = 1 AND title LIKE '%$q%' 
                                    AND id NOT IN (SELECT device_id FROM tbl_export_detail 
                                    GROUP BY device_id HAVING (COUNT(*) - (SELECT tbl_devices.stock 
                                    FROM tbl_devices WHERE tbl_devices.id = device_id)) >= 0)
                                    AND id NOT IN (SELECT device_id FROM tbl_loans_detail GROUP BY device_id HAVING
                                    (COUNT(*) - (SELECT tbl_devices.stock FROM tbl_devices WHERE tbl_devices.id = device_id)) > 0)");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_data_gear($q, $offset, $rows){
        $result = array();
        $query= $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils WHERE title LIKE '%$q%' AND status = 0");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title, content, image, cate_id, stock, (SELECT tbldm_utensils.title
                                    FROM tbldm_utensils WHERE tbldm_utensils.id = cate_id) AS category FROM tbl_utensils WHERE status = 0
                                    AND title LIKE '%$q%' ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_date_gear_total($q){
        $query= $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils WHERE title LIKE '%$q%' AND status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
}
?>