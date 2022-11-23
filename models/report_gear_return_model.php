<?php
class Report_gear_return_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($fromdate, $todate, $title, $status, $offset, $rows){
        $result = array();
        $where = "utensils_id IN (SELECT tbl_utensils.id FROM tbl_utensils WHERE tbl_utensils.title LIKE '%$title%')";
        if($status != 0)
            $where = $where." AND status = $status";
        if($fromdate != '' && $toddate != 0)
            $where = $where." AND DATE_FORMAT(create_at, '%Y-%m-%d') >= '$fromdate' AND DATE_FORMAT(create_at, '%Y-%m-%d') <= '$todate'";

        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils_return WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, utensils_id, sub_utensils, content, status, create_at,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel 
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_id))) 
                                    AS fullname, (SELECT title FROM tbl_utensils WHERE tbl_utensils.id = utensils_id) AS title
                                    FROM tbl_utensils_return WHERE $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function getFetObj_export($fromdate, $todate, $title, $status){
        $result = array();
        $where = "utensils_id IN (SELECT tbl_utensils.id FROM tbl_utensils WHERE tbl_utensils.title LIKE '%$title%')";
        if($status != 0)
            $where = $where." AND status = $status";
        if($fromdate != '' && $toddate != 0)
            $where = $where." AND DATE_FORMAT(create_at, '%Y-%m-%d') >= '$fromdate' AND DATE_FORMAT(create_at, '%Y-%m-%d') <= '$todate'";
            
        $query = $this->db->query("SELECT id, code, user_id, utensils_id, sub_utensils, content, status, create_at,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel 
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_id))) 
                                    AS fullname, (SELECT title FROM tbl_utensils WHERE tbl_utensils.id = utensils_id) AS title
                                    FROM tbl_utensils_return WHERE $where ORDER BY id DESC");
        return $query->fetchAll();
    }
}
?>