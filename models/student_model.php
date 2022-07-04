<?php
class Student_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE status != 99");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, fullname, gender, birthday, department_id, status, image, address,
                                (SELECT title FROM tbldm_department WHERE tbldm_department.id = department_id) AS department
                                FROM tbl_student WHERE status != 99 ORDER BY fullname ASC LIMIT $offset, $rows");
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
        $query = $this->db->query("SELECT * FROM tbl_student WHERE id = $id");
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

}
?>