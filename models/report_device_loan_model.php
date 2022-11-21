<?php
class Report_device_loan_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($fromloan, $toloan, $fromreturn, $toreturn, $fullname, $title, $offset, $rows){
        $result = array();
        $where = "user_loan IN (SELECT tbl_users.id FROM tbl_users WHERE tbl_users.hr_id IN (SELECT tbl_personel.id
                FROM tbl_personel WHERE tbl_personel.fullname LIKE '%$fullname%'))";
        if($fromloan != '' && $toloan != '')
            $where = $where." AND DATE_FORMAT(date_loan, '%Y-%m-%d') >= '$fromloan' AND DATE_FORMAT(date_loan, '%Y-%m-%d') <= '$toloan'";
        if($fromreturn != '' && $toreturn != '')
            $where = $where." AND DATE_FORMAT(date_return, '%Y-%m-%d') >= '$fromreturn' AND DATE_FORMAT(date_return, '%Y-%m-%d') <= '$toreturn'";
        if($title != '')
            $where = $where." code IN (SELECT tbl_loans_detail.code FROM tbl_loans_detail WHERE tbl_loans_detail.device_id IN (SELECT tbl_devices.id
                    FROM tbl_devices  WHERE  tbl_devices.title LIKE '%$title%'))";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_loans WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, user_loan, date_loan, date_return, content, status,
                                    (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users
                                    WHERE tbl_users.id  = user_loan)) AS fullname_loan, (SELECT COUNT(*) FROM tbl_loans_detail
                                    WHERE tbl_loans_detail.code = tbl_loans.code) AS qty
                                    FROM tbl_loans WHERE $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function getFetObj_export($fromloan, $toloan, $fromreturn, $toreturn, $fullname, $title){
        $where = "user_loan IN (SELECT tbl_users.id FROM tbl_users WHERE tbl_users.hr_id IN (SELECT tbl_personel.id
                FROM tbl_personel WHERE tbl_personel.fullname LIKE '%$fullname%'))";
        if($fromloan != '' && $toloan != '')
            $where = $where." AND DATE_FORMAT(date_loan, '%Y-%m-%d') >= '$fromloan' AND DATE_FORMAT(date_loan, '%Y-%m-%d') <= '$toloan'";
        if($fromreturn != '' && $toreturn != '')
            $where = $where." AND DATE_FORMAT(date_return, '%Y-%m-%d') >= '$fromreturn' AND DATE_FORMAT(date_return, '%Y-%m-%d') <= '$toreturn'";
        if($title != '')
            $where = $where." code IN (SELECT tbl_loans_detail.code FROM tbl_loans_detail WHERE tbl_loans_detail.device_id IN (SELECT tbl_devices.id
                    FROM tbl_devices  WHERE  tbl_devices.title LIKE '%$title%'))";
       
        $query = $this->db->query("SELECT id, code, user_id, user_loan, date_loan, date_return, content, status,
                                    (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users
                                    WHERE tbl_users.id  = user_loan)) AS fullname_loan, (SELECT COUNT(*) FROM tbl_loans_detail
                                    WHERE tbl_loans_detail.code = tbl_loans.code) AS qty FROM tbl_loans 
                                    WHERE $where ORDER BY id DESC");
        return $query->fetchAll();
    }
}
?>