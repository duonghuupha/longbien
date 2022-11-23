<?php
class Report_gear_loan_Model extends Model{
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
            $where = $where." code IN (SELECT tbl_utensils_loan_detail.code FROM tbl_utensils_loan_detail WHERE tbl_utensils_loan_detail.device_id IN (SELECT tbl_devices.id
                    FROM tbl_devices  WHERE  tbl_devices.title LIKE '%$title%'))";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils_loan WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, user_loan, date_loan, date_return, content, status,
                                    (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users
                                    WHERE tbl_users.id  = user_loan)) AS fullname_loan, (SELECT COUNT(*) FROM tbl_utensils_loan_detail
                                    WHERE tbl_utensils_loan_detail.code = tbl_utensils_loan.code) AS qty,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                    FROM tbl_users WHERE tbl_users.id = user_id))) AS fullname_create
                                    FROM tbl_utensils_loan WHERE $where ORDER BY id DESC LIMIT $offset, $rows");
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
            $where = $where." code IN (SELECT tbl_utensils_loan_detail.code FROM tbl_utensils_loan_detail WHERE tbl_utensils_loan_detail.device_id IN (SELECT tbl_devices.id
                    FROM tbl_devices  WHERE  tbl_devices.title LIKE '%$title%'))";
       
        $query = $this->db->query("SELECT id, code, user_id, user_loan, date_loan, date_return, content, status,
                                    (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users
                                    WHERE tbl_users.id  = user_loan)) AS fullname_loan, (SELECT COUNT(*) FROM tbl_utensils_loan_detail
                                    WHERE tbl_utensils_loan_detail.code = tbl_utensils_loan.code) AS qty,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                    FROM tbl_users WHERE tbl_users.id = user_id))) AS fullname_create FROM tbl_utensils_loan 
                                    WHERE $where ORDER BY id DESC");
        return $query->fetchAll();
    }
}
?>