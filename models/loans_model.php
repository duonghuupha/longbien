<?php
class Loans_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_loans");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, user_loan date_loan, date_return, content,
                                    notes, status, create_at FROM tbl_loans ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_loans", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_loans", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_loans", "id = $id");
        return $query;
    }
///////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_device($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE title LIKE '%$q%' 
                                    AND id NOT IN (SELECT device_id FROM tbl_export_detail 
                                    GROUP BY device_id HAVING (COUNT(*) - (SELECT tbl_devices.stock 
                                    FROM tbl_devices WHERE tbl_devices.id = device_id)) >= 0)");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, code  FROM tbl_devices WHERE title LIKE '%$q%'
                                    AND id NOT IN (SELECT device_id FROM tbl_export_detail 
                                    GROUP BY device_id HAVING (COUNT(*) - (SELECT tbl_devices.stock 
                                    FROM tbl_devices WHERE tbl_devices.id = device_id)) >= 0)");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_device(){
        $query = $this->db->query("SELECT id, title, stock, code FROM tbl_devices");
        return $query->fetchAll();
    }

    function empty_table_tmp(){
        $query = $this->db->query("TRUNCATE TABLE tbl_devices_temp;");
        return $query;
    }

    function addObj_device_temp($data){
        $query = $this->insert("tbl_devices_temp", $data);
        return $query;
    }
}
?>