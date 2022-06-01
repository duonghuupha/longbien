<?php
class Index_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function check_login($username, $password){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE username = '$username'
                                    AND password = '$password' AND active = 1");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_data($username, $password){
        $query = $this->db->query("SELECT * FROM tbl_users WHERE username = '$username'
                                    AND password = '$password' AND active = 1");
        return $query->fetchAll();
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    function get_total_seller_of_day($date){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_sellers WHERE DATE_FORMAT(date_seller, '%Y-%m-%d') = '$date'");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function get_total_seller(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_sellers");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function get_total_customer(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_customers");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function get_total_doanhthu(){
        $query = $this->db->query("SELECT SUM(total_price) AS Total FROM tbl_sellers");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function get_total_sanpham_seller(){
        
    }
}
?>