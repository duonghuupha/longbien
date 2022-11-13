<?php
class Report_student_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $code, $codecsdl, $name, $date, $class, $address, $gender, $people, $religion, $yearid, $status, $offset, $rows){
        $result = array();
        if($status == 0){
            $where = "status != 99";
        }else{
            $where = "status = $status";
        }
        if($q != '')
            $where = $where." AND fullname LIKE '%$q%'";
        if($code != '')
            $where = $where." AND code LIKE '%$code%'";
        if($codecsdl != '')
            $where = $where." AND code_csdl LIKE '%$codecsdl%'";
        if($name != '')
            $where = $where." AND fullname LIKE '%$name%'";
        if($date != '')
            $where = $where." AND birthday = '$date'";
        if($class != '')
            $where = $where." AND id IN (SELECT student_id FROM tbl_student_class WHERE year_id = $yearid AND department_id = $class)";
        if($address != '')
            $where = $where." AND address LIKE '%$address%'";
        if($gender != 0)
            $where = $where." AND gender = $gender";
        if($people != '')
            $where = $where." AND people_id = $people";
        if($religion != 0)
            $where = $where." AND religion = $religion";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, code_csdl, fullname, gender, birthday, status, image, address, people_id, religion,
                                IF((SELECT COUNT(*) FROM tbl_student_class WHERE student_id = tbl_student.id) > 0,
                                (SELECT title FROM tbldm_department WHERE tbldm_department.id = (SELECT department_id
                                FROM tbl_student_class WHERE tbl_student_class.student_id = tbl_student.id
                                AND year_id = $yearid ORDER BY id DESC LIMIT 0, 1)), 'Chưa xếp lớp') AS department,
                                (SELECT tbldm_people.title FROM tbldm_people WHERE tbldm_people.id = people_id) AS people_text
                                FROM tbl_student WHERE $where ORDER BY fullname ASC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function getFetObj_export($q, $code, $codecsdl, $name, $date, $class, $address, $gender, $people, $religion, $yearid, $status){
        $result = array();
        if($status == 0){
            $where = "status != 99";
        }else{
            $where = "status = $status";
        }
        if($q != '')
            $where = $where." AND fullname LIKE '%$q%'";
        if($code != '')
            $where = $where." AND code LIKE '%$code%'";
        if($codecsdl != '')
            $where = $where." AND code_csdl LIKE '%$codecsdl%'";
        if($name != '')
            $where = $where." AND fullname LIKE '%$name%'";
        if($date != '')
            $where = $where." AND birthday = '$date'";
        if($class != '')
            $where = $where." AND id IN (SELECT student_id FROM tbl_student_class WHERE year_id = $yearid AND department_id = $class)";
        if($address != '')
            $where = $where." AND address LIKE '%$address%'";
        if($gender != 0)
            $where = $where." AND gender = $gender";
        if($people != '')
            $where = $where." AND people_id = $people";
        if($religion != 0)
            $where = $where." AND religion = $religion";
        $query = $this->db->query("SELECT id, code, code_csdl, fullname, gender, birthday, status, image, address, people_id, religion,
                                IF((SELECT COUNT(*) FROM tbl_student_class WHERE student_id = tbl_student.id) > 0,
                                (SELECT title FROM tbldm_department WHERE tbldm_department.id = (SELECT department_id
                                FROM tbl_student_class WHERE tbl_student_class.student_id = tbl_student.id
                                AND year_id = $yearid ORDER BY id DESC LIMIT 0, 1)), 'Chưa xếp lớp') AS department,
                                (SELECT tbldm_people.title FROM tbldm_people WHERE tbldm_people.id = people_id) AS people_text
                                FROM tbl_student WHERE $where ORDER BY fullname ASC");
        return $query->fetchAll();
    }
}
?>