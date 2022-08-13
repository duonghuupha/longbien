<?php
class Student_change_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($fullname, $year, $gender, $offset, $rows){
        $result = array();
        $where = "status = 1";
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
}
?>