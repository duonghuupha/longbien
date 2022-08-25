<?php
class Gear_return_model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_data_gear($q, $offset, $rows){
        $result = array();
        $query= $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils WHERE title LIKE '%$q%' AND status = 0");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title, content, image, cate_id, stock, (SELECT tbldm_utensils.title
                                    FROM tbldm_utensils WHERE tbldm_utensils.id = cate_id) AS category FROM tbl_utensils WHERE status = 0
                                    AND title LIKE '%$q%' ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_date_gear_total($q){
        $query= $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils WHERE title LIKE '%$q%' AND status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function addObj($data){
        $query  = $this->insert("tbl_utensils_return",  $data);
        return $query;
    }

    function  delObj($id){
        $query = $this->delete("tb_utensils_return", "id = $id");
        return $query;
    }

    function dupliObj($utensilsid, $subutensils){
        $query  = $this->db->query("SELECT `status` FROM tbl_utensils_return WHERE utensils_id = $utensilsid
                                    AND sub_utensils = $subutensils ORDER BY id DESC LIMIT 0, 1");
        $row = $query->fetchAll();
        if(count($row)  > 0){
            return $row[0]['status'];
        }else{
            return 3;
        }
    }

    function getFetObj($title, $status, $offset, $rows){
        $result = array();
        $where = "utensils_id IN (SELECT tbl_utensils.id FROM tbl_utensils WHERE tbl_utensils.title LIKE '%$title%')";
        if($status != 0)
            $where = $where." AND status = $status";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils_return WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, utensils_id, sub_utensils, content, status, create_at,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel 
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_id))) 
                                    AS fullname, (SELECT title FROM tbl_utensils WHERE tbl_utensils.id = utensils_id) AS title
                                    FROM tbl_utensils_return WHERE $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_info_return($id){
        $query = $this->db->query("SELECT id, code, user_id, utensils_id, sub_utensils, content, status, create_at,
                                (SELECT tbl_utensils.code FROM tbl_utensils WHERE tbl_utensils.id = utensils_id) AS code_utensils,
                                (SELECT tbl_utensils.title FROM tbl_utensils WHERE tbl_utensils.id = utensils_id) AS title
                                FROM tbl_utensils_return WHERE id = $id");
        return $query->fetchAll();
    }
}
?>