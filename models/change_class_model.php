<?php
class Change_class_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_data_student($q){
        $query = $this->db->query("SELECT id, fullname AS title, CONCAT('MHS: ', code, ' / Ngày sinh: ', 
                                    DATE_FORMAT(birthday, '%d-%m-%Y')) AS content, department_id,
                                    (SELECT title FROM tbldm_department WHERE tbldm_department.id = department_id) AS department,
                                    (SELECT year_id FROM tbldm_department WHERE tbldm_department.id = department_id) AS year_id,
                                    (SELECT title FROM tbldm_years WHERE tbldm_years.id = (SELECT year_id FROM tbldm_department
                                    WHERE tbldm_department.id = department_id)) AS years
                                    FROM tbl_student WHERE status != 99 AND fullname LIKE '%$q%'");
        return $query->fetchAll();
    }

    function addObj($data){
        $query = $this->insert("tbl_student_change_class", $data);
        return $query;
    }

    function getFetObj($offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student_change_class
                                    WHERE year_from_id != 0 AND department_from_id != 0");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, student_id, year_from_id, department_from_id, year_to_id,
                                    department_to_id, create_at, (SELECT title FROM tbldm_years 
                                    WHERE tbldm_years.id = year_from_id) AS year_from, (SELECT title FROM tbldm_years 
                                    WHERE tbldm_years.id = year_to_id) AS year_to, (SELECT title FROM tbldm_department
                                    WHERE tbldm_department.id = department_from_id) AS department_from, (SELECT title FROM tbldm_department
                                    WHERE tbldm_department.id = department_to_id) AS department_to FROM tbl_student_change_class
                                    WHERE year_from_id != 0 AND department_from_id != 0 ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function updateObj_student($id, $data){
        $query = $this->update("tbl_student", $data, "id = $id");
        return $query;
    }

    function check_active_year($id){
        $query = $this->db->query("SELECT COUNT(*) FROM tbldm_years WHERE id = $id AND active = 1");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
}
?>