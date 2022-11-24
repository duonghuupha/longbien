<?php
class Report_dep_loan_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($fromdate, $todate, $fullname, $lesson, $dep, $offset, $rows){
        $where = "user_loan IN (SELECT tbl_users.id FROM tbl_users WHERE hr_id IN (SELECT tbl_personel.id
                        FROM tbl_personel WHERE tbl_personel.fullname LIKE '%$fullname%'))";
        if($fromdate != '' && $todate != '')
            $where = $where." AND DATE_FORMAT(date_loan, '%Y-%m-%d') >= '$fromdate' AND DATE_FORMAT(date_loan, '%Y-%m-%d') <= '$todate'";
        if($dep != '')
            $where = $where." AND department_id = $dep";
        if($lesson != 0)
            $where = $where." AND lesson = $lesson";
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

    function getFetObj_export($fromdate, $todate, $fullname, $lesson, $dep){
        $where = "user_loan IN (SELECT tbl_users.id FROM tbl_users WHERE hr_id IN (SELECT tbl_personel.id
                        FROM tbl_personel WHERE tbl_personel.fullname LIKE '%$fullname%'))";
        if($fromdate != '' && $todate != '')
            $where = $where." AND DATE_FORMAT(date_loan, '%Y-%m-%d') >= '$fromdate' AND DATE_FORMAT(date_loan, '%Y-%m-%d') <= '$todate'";
        if($dep != '')
            $where = $where." AND department_id = $dep";
        if($lesson != 0)
            $where = $where." AND lesson = $lesson";
        $result = array();

        $query = $this->db->query("SELECT id, code, user_id, user_loan, date_loan, date_return,
                                    department_id, lesson, content, status, create_at,
                                    (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT  hr_id
                                    FROM tbl_users WHERE tbl_users.id = user_loan)) AS fullname_loan,
                                    (SELECT title FROM  tbldm_department WHERE tbldm_department.id = department_id)
                                    AS department  FROM tbl_department_loan WHERE $where ORDER BY id DESC");
        return $query->fetchAll();
    }

    function get_combo_dep_function(){
        $query = $this->db->query("SELECT id, title FROM tbldm_department WHERE status = 0 AND is_function = 2");
        return $query->fetchAll();
    }
}
?>