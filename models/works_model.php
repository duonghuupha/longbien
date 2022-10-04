<?php
class Works_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_works WHERE status = 1");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, works_id, title, content, file, user_id, create_at, status,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                    FROM tbl_users WHERE tbl_users.id = user_id))) AS fullname
                                    FROM tbl_works WHERE status = 1 ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_works", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_works", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_works", "id = $id");
        return $query;
    }

    function get_info($id){
        $query = $this->db->query("SELECT id, code, title, works_id, content, file, user_id, create_at, status,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel 
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_id)))
                                    AS fullname FROM tbl_works WHERE id = $id");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
//////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_works($q, $userid, $offset, $rows){
        $result = array();
        $where = "title LIKE '%$q%' AND status = 1";
        if($userid == 1){
            $where = $where;
        }else{
            $where = $where." AND FIND_IN_SET(id, (SELECT tbl_works_role.works 
                            FROM tbl_works_role WHERE tbl_works_role.user_id = $userid))";
        }
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_works WHERE $where");
        $row = $query->fetchAll();
        $query= $this->db->query("SELECT id, group_id, title, (SELECT tbldm_works_group.title FROM tbldm_works_group
                                WHERE tbldm_works_group.id = group_id) AS `group` FROM tbldm_works WHERE $where");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_works_total($q, $userid){
        $where = "title LIKE '%$q%' AND  status = 1";
        if($userid == 1){
            $where = $where;
        }else{
            $where = $where." AND FIND_IN_SET(id, (SELECT tbl_works_role.works 
                            FROM tbl_works_role WHERE tbl_works_role.user_id = $userid))";
        }
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_works WHERE $where");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
}
?>