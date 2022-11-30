<?php
class Report_device_detail_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_data_device($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE status = 1 AND title LIKE '%$q%' 
                                    AND stock != 0");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, code, stock FROM tbl_devices WHERE status = 1 AND title LIKE '%$q%'
                                    AND stock != 0 ORDER BY title ASC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }
}
?>