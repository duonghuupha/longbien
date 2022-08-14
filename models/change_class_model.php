<?php
class Change_class_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_data_student($q, $yearid){
        $query = $this->db->query("SELECT id, fullname AS title, CONCAT('MHS: ', code, ' / Ngày sinh: ', 
                                    DATE_FORMAT(birthday, '%d-%m-%Y')) AS content, (SELECT department_id FROM tbl_student_class
                                    WHERE tbl_student_class.student_id = tbl_student.id AND year_id = $yearid) AS department_id,
                                    (SELECT title FROM tbldm_department WHERE tbldm_department.id = (SELECT department_id 
                                    FROM tbl_student_class WHERE tbl_student_class.student_id = tbl_student.id 
                                    AND year_id = $yearid)) AS department FROM tbl_student WHERE status != 99 AND status = 1 
                                    AND fullname LIKE '%$q%' OR code LIKE '%$q%'");
        return $query->fetchAll();
    }

    function addObj($data){
        $query = $this->insert("tbl_change_class", $data);
        return $query;
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_change_class WHERE student_id IN
                                (SELECT tbl_student.id FROM tbl_student WHERE fullname LIKE '%$q%'
                                OR code LIKE '%$q%')");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, student_id, year_id_from, department_id_from, year_id_to,
                                    department_id_to, create_at, (SELECT fullname FROM tbl_student WHERE tbl_student.id =  student_id)
                                    AS fullname, (SELECT title FROM tbldm_years 
                                    WHERE tbldm_years.id = year_id_from) AS year_from, (SELECT title FROM tbldm_years 
                                    WHERE tbldm_years.id = year_id_to) AS year_to, (SELECT title FROM tbldm_department
                                    WHERE tbldm_department.id = department_id_from) AS department_from, (SELECT title FROM tbldm_department
                                    WHERE tbldm_department.id = department_id_to) AS department_to FROM tbl_change_class
                                    WHERE student_id IN (SELECT tbl_student.id FROM tbl_student WHERE fullname LIKE '%$q%'
                                    OR code LIKE '%$q%')ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function updateObj_student($studentid, $yearid, $data){
        $query = $this->update("tbl_student_class", $data, "student_id = $studentid AND year_id = $yearid");
        return $query;
    }
}
?>