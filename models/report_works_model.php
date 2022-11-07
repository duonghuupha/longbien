<?php
class Report_works_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($group, $cate, $title, $offset, $rows){
        $result = array();
        $where = "status = 1";
        if($group != '')
            $where = $where." AND works_id IN (SELECT tbldm_works.id FROM tbldm_works WHERE tbldm_works.group_id = $group)";
        if($cate != '')
            $where = $where."AND FIND_IN_SET($cate, works_id)";
        if($title != '')
            $where = $where." AND title LIKE '%$title%'";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_works WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, works_id, title, content, file, user_id, create_at, status,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                    FROM tbl_users WHERE tbl_users.id = user_id))) AS fullname, file_link
                                    FROM tbl_works WHERE $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function getFetObj_export($group, $cate, $title){
        $where = "status = 1";
        if($group != '')
            $where = $where." AND works_id IN (SELECT tbldm_works.id FROM tbldm_works WHERE tbldm_works.group_id = $group)";
        if($cate != '')
            $where = $where."AND FIND_IN_SET($cate, works_id)";
        if($title != '')
            $where = $where." AND title LIKE '%$title%'";
        $query = $this->db->query("SELECT id, code, works_id, title, content, file, user_id, create_at, status,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                    FROM tbl_users WHERE tbl_users.id = user_id))) AS fullname, file_link
                                    FROM tbl_works WHERE $where ORDER BY id DESC");
        return $query->fetchAll();
    }
}
?>