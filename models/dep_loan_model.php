<?php
class Dep_loan_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($name, $date, $dep, $offset, $rows){
        $where = "status = 0";
        if($name != '')
            $where = $where." AND user_loan IN (SELECT tbl_users.id FROM tbl_users WHERE hr_id IN (SELECT tbl_personel.id
                            FROM tbl_personel WHERE tbl_personel.fullname LIKE '%$name%'))";
        if($date != '')
            $where = $where." AND DATE_FORMAT(date_loan, '%Y-%m-%d') = '$date'";
        if($dep != '')
            $where = $where." AND department_id IN (SELECT tbldm_department.id FROM tbldm_department
                            WHERE tbldm_department.title LIKE '%$q%')";
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_department_loan WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, user_loan, date_loan, date_return,
                                    department_id, lesson, content, status, create_at,
                                    (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT  hr_id
                                    FROM tbl_users WHERE tbl_users.id = user_loan)) AS fullname_loan,
                                    (SELECT title FROM  tbldm_department WHERE tbldm_department.id = department_id)
                                    AS department  FROM tbl_department_loan WHERE $where ORDER BY id DESC 
                                    LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_department_loan", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_department_loan", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_department_loan", "id = $id");
        return $query;
    }

    function dupliObj($id, $department, $dateloan, $leson){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_department_loan WHERE lesson = $leson
                                    AND department_id = $department AND date_loan = '$dateloan'");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_department_loan WHERE lesson = $leson
                                    AND department_id = $department AND date_loan = '$dateloan' AND id != $id");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_info($id){
        $query = $this->db->query("SELECT id, code, user_id, user_loan, DATE_FORMAT(date_loan, '%d-%m-%Y') AS date_loan,
                                    department_id, lesson, content, (SELECT title FROM tbldm_department
                                    WHERE tbldm_department.id = department_id) AS department, (SELECT fullname FROM tbl_personel
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_loan))
                                    AS fullname FROM tbl_department_loan WHERE id = $id");
        return $query->fetchAll();
    }
//////////////////////////////////////////////////////////////////////////////////////////////////
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
////////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_dep($q, $date, $lesson, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_department WHERE status = 0
                                    AND is_function = 2 AND id NOT IN (SELECT tbl_department_loan.department_id
                                    FROM tbl_department_loan WHERE DATE_FORMAT(date_loan, '%Y-%m-%d') = '$date'
                                    AND tbl_department_loan.lesson = $lesson)");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title FROM tbldm_department WHERE status = 0 
                                    AND is_function = 2 AND id NOT IN (SELECT tbl_department_loan.department_id
                                    FROM tbl_department_loan WHERE DATE_FORMAT(date_loan, '%Y-%m-%d') = '$date'
                                    AND tbl_department_loan.lesson = $lesson) ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_dep_total($q, $date, $lesson){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_department WHERE status = 0
                                AND is_function = 2 AND id NOT IN (SELECT tbl_department_loan.department_id
                                FROM tbl_department_loan WHERE DATE_FORMAT(date_loan, '%Y-%m-%d') = '$date'
                                AND tbl_department_loan.lesson = $lesson)");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
}
?>