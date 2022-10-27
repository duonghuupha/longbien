<?php
class Devices_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE title LIKE '%$q%'
                                    AND status != 99 AND status != 0");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, origin, year_work, price, cate_id, (SELECT tbldm_equipment.title
                                    FROM tbldm_equipment WHERE tbldm_equipment.id = cate_id) AS category, title
                                    FROM tbl_devices WHERE title LIKE'%$q%' AND status != 99 AND status != 0
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function dupliObj($id, $code){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE code = $code
                                    AND status = 1");
        if($id  > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE code = $code
                                    AND id != $id AND status = 1");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function addObj($data){
        $query = $this->insert("tbl_devices", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_devices", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_devices",  "id = $id");
        return $query;
    }
///////////////////////////////////////////////////////////////////////////////////
    function get_info($id){
        $query = $this->db->query("SELECT id, code, title, cate_id, origin, price, depreciation,
                                    year_work, `image`, `description`, (SELECT tbldm_equipment.title
                                    FROM tbldm_equipment WHERE tbldm_equipment.id = cate_id) AS category
                                    FROM tbl_devices WHERE id = $id");
        return $query->fetchAll();
    }

    function getFetObj_tmp($userid, $q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE title LIKE '%$q%'
                                    AND status = 99 AND user_id = $userid");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, origin, year_work, price, cate_id, (SELECT tbldm_equipment.title
                                    FROM tbldm_equipment WHERE tbldm_equipment.id = cate_id) AS category, title,
                                    stock FROM tbl_devices WHERE title LIKE'%$q%' AND status = 99 
                                    AND user_id = $userid ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function delObj_temp(){
        $query = $this->delete("tbl_devices", "status = 99");
        return $query;
    }

    function check_dupli_code(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices GROUP BY code HAVING Total > 1");
        $row = $query->fetchAll();
        return count($row);
    }

    function update_all_tmp($userid){
        $query = $this->db->query("UPDATE tbl_devices SET status = 1 WHERE status = 99 AND user_id = $userid");
        return $query;
    }

    function return_total_temp($userid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE status = 99 AND user_id = $userid");
        $row = $query->fetchAll();
        return $ro[0]['Total'];
    }
}
?>