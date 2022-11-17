<?php
class Report_device_imp_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($fromdate, $todate, $source, $offset,  $rows){
        $result = array();
        $where = "source LIKE '%$source%'";
        if($fromdate != '' && $todate != '')
            $where = $where." AND date_import >= '$todate' AND date_import <= '$fromdate'";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_device_import WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, date_import, user_id, source, notes, create_at, IF(user_id = 1, 
                                'Administrator', (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id 
                                FROM tbl_users WHERE tbl_users.id = user_id))) AS fullname, (SELECT COUNT(*) 
                                FROM tbl_device_import_detail WHERE tbl_device_import_detail.code = tbl_device_import.code) 
                                AS total_device, (SELECT SUM(quantily) FROM tbl_device_import_detail WHERE tbl_device_import_detail.code = tbl_device_import.code) 
                                AS total_qty FROM tbl_device_import  WHERE $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function getFetObj_export($fromdate, $todate, $source){
        $where = "source LIKE '%$source%'";
        if($fromdate != '' && $todate != '')
            $where = $where." AND date_import >= '$todate' AND date_import <= '$fromdate'";
       
        $query = $this->db->query("SELECT id, code, date_import, user_id, source, notes, create_at, IF(user_id = 1, 
                                'Administrator', (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id 
                                FROM tbl_users WHERE tbl_users.id = user_id))) AS fullname, (SELECT COUNT(*) 
                                FROM tbl_device_import_detail WHERE tbl_device_import_detail.code = tbl_device_import.code) 
                                AS total_device, (SELECT SUM(quantily) FROM tbl_device_import_detail WHERE tbl_device_import_detail.code = tbl_device_import.code) 
                                AS total_qty FROM tbl_device_import  WHERE $where ORDER BY id DESC");
        return $query->fetchAll();
    }
}
?>