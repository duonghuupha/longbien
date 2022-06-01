<?php
class Model {
    function __construct() {
		$this->db = new Database();
	}

    // them moi du lieu
    function insert($table, $array){
        $cols = array();
        $bind = array();
        foreach($array as $key => $value){
            $cols[] = $key;
            $bind[] = "'".$value."'";
        }
        $query = $this->db->query("INSERT INTO ".$table." (".implode(",", $cols).") VALUES (".implode(",", $bind).")");
        return $query;
    }

    // cap nhat du lieu
    function update($table, $array, $where){
        $set = array();
        foreach($array as $key => $value){
            $set[] = $key." = '".$value."'";
        }
        $query = $this->db->query("UPDATE ".$table." SET ".implode(",", $set)." WHERE ".$where);
        return $query;
    }

    // xoa du lieu
    function delete($table, $where = ''){
        if($where == ''){
            $query = $this->db->query("DELETE FROM ".$table);
        }else{
        $query = $this->db->query("DELETE FROM ".$table." WHERE ".$where);
        }
        return $query;
    }
///////////////////////////// cac ham khac //////////////////////////////////////////////////////////////////////////////////
    function get_data_seller_via_date($date){
        $query = $this->db->query("SELECT id_product, exp_price, qty, (SELECT imp_price FROM 
                                    tbl_sanpham WHERE tbl_sanpham.id = id_product) AS imp_price
                                    FROM tbl_sellers_detail WHERE code IN (SELECT tbl_sellers.code
                                    FROM tbl_sellers WHERE tbl_sellers.date_seller = '$date')");
        return $query->fetchAll();
    }
    function get_data_seller_via_code($code){
        $query = $this->db->query("SELECT id_product, qty, exp_price, discount, (SELECT title FROM tbl_sanpham
                                    WHERE tbl_sanpham.id = id_product) AS title FROM tbl_sellers_detail WHERE code = '$code'");
        return $query->fetchAll();
    }
    function get_data_thu_via_date($date, $method){
        $query = $this->db->query("SELECT SUM(price) AS tongthu FROM tbl_thu WHERE date_thu = '$date'
                                    AND code_seller IN (SELECT tbl_sellers.code FROM tbl_sellers WHERE method = $method)");
        $row = $query->fetchAll();
        return $row[0]['tongthu'];
    }
/////////////////////////////////////end cac ham khac ///////////////////////////////////////////////////////////////////////

}

?>
