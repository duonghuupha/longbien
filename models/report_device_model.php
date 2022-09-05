<?php
class Report_device_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_data($type, $cate, $offset, $rows){
        $result = array();
        $where = "status = 1";
        if($type == 0){
            $where = $where;
        }elseif($type == 1){// tai san
            $where = $where." AND price >= 10000000";
        }else{
            $where = $where." AND price < 10000000";
        }
        if($cate != '')
            $where = $where." AND cate_id = $cate";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title, cate_id, origin, price, depreciation, year_work, stock,
                                    (SELECT tbldm_equipment.title FROM tbldm_equipment WHERE tbldm_equipment.id = cate_id) AS category 
                                    FROM tbl_devices WHERE $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_export($type, $cate){
        $result = array();
        $where = "status = 1";
        if($type == 0){
            $where = $where;
        }elseif($type == 1){// tai san
            $where = $where." AND price >= 10000000";
        }else{
            $where = $where." AND price < 10000000";
        }
        if($cate != '')
            $where = $where." AND cate_id = $cate";
        $query = $this->db->query("SELECT id, code, title, cate_id, origin, price, depreciation, year_work, stock,
                                    (SELECT tbldm_equipment.title FROM tbldm_equipment WHERE tbldm_equipment.id = cate_id) AS category 
                                    FROM tbl_devices WHERE $where ORDER BY id DESC");
        return $query->fetchAll();
    }
}