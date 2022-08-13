<?php
class Student_change_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($fullname, $year, $gender, $yearid, $offset, $rows){
        $result = array();
        $where = "status = 1 AND id NOT IN (SELECT student_id FROM tbl_student_class WHERE year_id = $yearid)";
        if($fullname != '')
            $where = $where." AND fullname LIKE '%$fullname%'";
        if($year != '')
            $where = $where." AND DATE_FORMAT(birthday, '%Y') = $year";
        if($gender != 0)
            $where = $where." AND gender = $gender";
        
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, fullname, birthday, gender FROM tbl_student
                                    WHERE $where ORDER BY fullname ASC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function getFetObj_check($data, $offset, $rows){
        $result = array(); $str_data = base64_decode($data);
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE FIND_IN_SET(id, '$str_data')");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, fullname, birthday, gender FROM tbl_student
                                    WHERE FIND_IN_SET(id, '$str_data') ORDER BY fullname ASC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_student_class", $data);
        return $query;
    }

    function getFetObj_class($yearid, $classid, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student_class
                                    WHERE  year_id = $yearid AND department_id = $classid");
        $row  = $query->fetchAll();
        $query = $this->db->query("SELECT id, year_id, department_id, student_id, create_at,
                                    (SELECT code FROM tbl_student WHERE tbl_student.id = student_id) AS code,
                                    (SELECT fullname FROM tbl_student WHERE tbl_student.id = student_id) AS fullname,
                                    (SELECT birthday FROM tbl_student WHERE tbl_student.id = student_id) AS birthday,
                                    (SELECT gender FROM tbl_student WHERE tbl_student.id = student_id) AS gender,
                                    (SELECT title FROM tbldm_department WHERE tbldm_department.id = department_id) AS department
                                    FROM tbl_student_class WHERE year_id = $yearid AND department_id = $classid
                                    ORDER BY (SELECT fullname FROM tbl_student WHERE tbl_student.id = student_id) ASC 
                                    LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }
///////////////////////////////////////////////////////////////////////////////////////////////
    function get_info_student($id){
        $query = $this->db->query("SELECT code, fullname FROM tbl_student WHERE id = $id");
        return $query->fetchAll();
    }
}
?>