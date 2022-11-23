<?php
class Report_gear_imp_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($fromdate, $todate, $source, $offset, $rows){
        $result = array();
        $where = "source LIKE '%$source%'";
        if($fromdate != '' && $todate != '')
            $where = $where." AND date_import >= '$fromdate' AND date_import <= '$todate'";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils_imp WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, date_import, source, notes, create_at,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel 
                                    WHERE tbl_personel.id = (SELECT hr_id FROM  tbl_users WHERE tbl_users.id = user_id))) 
                                    AS fullname, (SELECT COUNT(*) FROM tbl_utensils_imp_detail WHERE tbl_utensils_imp_detail.code = tbl_utensils_imp.code)
                                    AS total_gear, (SELECT SUM(quantily) FROM tbl_utensils_imp_detail WHERE tbl_utensils_imp_detail.code = tbl_utensils_imp.code)
                                    AS total_qty FROM tbl_utensils_imp WHERE $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function getFetObj_export($fromdate, $todate, $source){
        $result = array();
        $where = "source LIKE '%$source%'";
        if($fromdate != '' && $todate != '')
            $where = $where." AND date_import >= '$fromdate' AND date_import <= '$todate'";

        $query = $this->db->query("SELECT id, code, user_id, date_import, source, notes, create_at,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel 
                                    WHERE tbl_personel.id = (SELECT hr_id FROM  tbl_users WHERE tbl_users.id = user_id))) 
                                    AS fullname, (SELECT COUNT(*) FROM tbl_utensils_imp_detail WHERE tbl_utensils_imp_detail.code = tbl_utensils_imp.code)
                                    AS total_gear, (SELECT SUM(quantily) FROM tbl_utensils_imp_detail WHERE tbl_utensils_imp_detail.code = tbl_utensils_imp.code)
                                    AS total_qty FROM tbl_utensils_imp WHERE $where ORDER BY id DESC");
        return $query->fetchAll();
    }
}
?>