<?php
class Student_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $code, $name, $date, $class, $address, $yearid, $offset, $rows){
        $result = array();
        $where = "status != 99";
        if($q != '')
            $where = $where." AND fullname LIKE '%$q%'";
        if($code != '')
            $where = $where." AND code LIKE '%$code%'";
        if($name != '')
            $where = $where." AND fullname LIKE '%$name%'";
        if($date != '')
            $where = $where." AND birthday = '$date'";
        /*if($class != '')
            $where = $where." AND department_id = $class";*/
        if($address != '')
            $where = $where." AND address LIKE '%$address%'";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, fullname, gender, birthday, status, image, address, people_id, religion,
                                IF((SELECT COUNT(*) FROM tbl_student_change_class WHERE student_id = tbl_student.id) > 0,
                                (SELECT title FROM tbldm_department WHERE tbldm_department.id = (SELECT department_id
                                FROM tbl_student_change_class WHERE tbl_student_change_class.student_id = tbl_student.id
                                AND year_id = $yearid ORDER BY id DESC LIMIT 0, 1)), 'Chưa xếp lớp') AS department
                                FROM tbl_student WHERE $where ORDER BY fullname ASC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function dupliObj($id, $code){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE code = $code");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE code = $code
                                        AND id != $id");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function addObj($data){
        $query = $this->insert("tbl_student", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_student", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_student", "id = $id");
        return $query;
    }

    function addObj_detail($data){
        $query = $this->insert("tbl_student_relation", $data);
        return $query;
    }

    function delObj_detail($code){
        $query = $this->delete("tbl_student_relation", "code = $code");
        return $query;
    }

    function addObj_student_change_class($data){
        $query = $this->insert("tbl_student_change_class", $data);
        return $query;
    }
//////////////////////////////////////////////////////////////////////////////////////////////
    function get_info($id){
        $query = $this->db->query("SELECT id, code, fullname, gender, birthday, people_id, religion,
                                 address, image, status, (SELECT title FROM tbldm_people 
                                 WHERE tbldm_people.id = people_id) AS people FROM tbl_student WHERE id = $id");
        return $query->fetchAll();
    }

    function get_student_relation($code){
        $query = $this->db->query("SELECT relation, fullname, year, phone, job FROM tbl_student_relation
                                    WHERE code = $code");
        return $query->fetchAll();
    }

    function getFetObj_tmp($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE status = 99");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, fullname, gender, birthday, department_id, status, image, address,
                                (SELECT title FROM tbldm_department WHERE tbldm_department.id = department_id) AS department
                                FROM tbl_student WHERE status = 99 ORDER BY fullname ASC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function delObj_tmp(){
        $query = $this->delete("tbl_student", "status = 99");
        return $query;
    }

    function check_dupli_code(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student GROUP BY code HAVING Total > 1");
        $row = $query->fetchAll();
        return count($row);
    }

    function get_all_tmp(){
        $query = $this->db->query("SELECT * FROM tbl_student WHERE status = 99");
        return $query->fetchAll();
    }

    function get_student_via_id($array){
        $query = $this->db->query("SELECT id, code, image, fullname, birthday, gender FROM tbl_student
                                    WHERE FIND_IN_SET(id, '$array')");
        return $query->fetchAll();
    }

    function ger_id_student_via_code($code){
        $query = $this->db->query("SELECT id FROM tbl_student WHERE code = $code");
        $row = $query->fetchAll();
        return $row[0]["id"];
    }

    function check_exit_record_tmp(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE status = 99");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function check_year_active($id){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_years WHERE id = $id AND active = 1");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
}
?>