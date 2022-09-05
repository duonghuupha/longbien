<?php
class Dashboard_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_total_personel(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_personel WHERE status = 1");
        $row  = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_total_student(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE status = 1");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_total_device(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE status = 1");
        $row = $query->fetchAll();
        return $row[0]['Total'];    
    }

    function get_total_utensils(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils WHERE status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];    
    }

    function get_total_book($type){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book WHERE status = 0 AND type = $type");
        $row = $query->fetchAll();
        return $row[0]['Total'];    
    }

    function get_percent_gender_student(){
        $query = $this->db->query("SELECT COUNT(*) AS Total, 'Nam' AS title FROM tbl_student WHERE status = 1 AND gender = 1
                                    UNION ALL
                                    SELECT COUNT(*) AS Total, 'Nữ' AS title FROM tbl_student WHERE status = 1 AND gender = 2");
        return $query->fetchAll();
    }
}
?>