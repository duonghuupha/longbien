<?php
class Up_class_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_up_class");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id,  year_from, department_from, year_to, department_to,
                                    create_at, (SELECT title FROM tbldm_years WHERE  tbldm_years.id = year_from)
                                    AS yearfrom, (SELECT title FROM  tbldm_years WHERE tbldm_years.id = year_to)
                                    AS yearto, (SELECT title FROM tbldm_department WHERE tbldm_department.id = department_from)
                                    AS departmentfrom, (SELECT title FROM tbldm_department WHERE tbldm_department.id  = department_to)
                                    AS departmentto FROM tbl_up_class ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_up_class", $data);
        return $query;
    }

    function get_all_student_of_class($yearid, $departmentid){
        $query = $this->db->query("SELECT student_id FROM tbl_student_class WHERE year_id = $yearid
                                    AND department_id = $departmentid");
        return $query->fetchAll();
    }

    function dupliObj_from($yearfrom, $departmentfrom){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_up_class WHERE year_from = $yearfrom
                                    AND department_from = $departmentfrom");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function dupliObj_to($yearto, $departmentto){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_up_class WHERE year_to = $yearto
                                    AND department_to = $departmentto");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function return_title_department($id){
        $query = $this->db->query("SELECT title FROM tbldm_department WHERE id = $id");
        $row = $query->fetchAll();
        return $row[0]['title'];
    }

    function check_student_up_class($student, $yearid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student_class WHERE student_id = $student
                                    AND year_id = $yearid");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_info_student($id){
        $query = $this->db->query("SELECT * FROM tbl_student WHERE id = $id");
        return $query->fetchAll();
    }

    function addObj_class($data){
        $query = $this->insert("tbl_student_class", $data);
        return $query;
    }
}
?>