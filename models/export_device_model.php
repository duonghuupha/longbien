<?php
class Export_device_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_export");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, year_id, physical_id, create_at, (SELECT title
                                    FROM tbldm_years WHERE tbldm_years.id = year_id) AS namhoc,
                                    (SELECT title FROM tbldm_physical_room WHERE tbldm_physical_room.id = physical_id) AS physical 
                                    FROM tbl_export ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_combo_device(){
        $query = $this->db->query("SELECT id, title FROM tbl_devices");
        return $query->fetchAll();
    }    

    function get_info_device($id){
        $query = $this->db->query("SELECT id, title, stock FROM tbl_devices WHERE id = $id");
        return $query->fetchAll();
    }

    function dupliObj($id, $physical){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_export WHERE physical_id = $physical");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_export WHERE physical_id = $physical
                                        AND id != $id");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function addObj($data){
        $query = $this->insert("tbl_export", $data);
        return $query;
    }

    function addObj_detail($data){
        $query = $this->insert("tbl_export_detail", $data);
        return $query;
    }
}
?>