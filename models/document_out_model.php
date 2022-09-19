<?php
class  Document_out_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $cate, $userid, $offset, $rows){
        $result = array();
        $where = "status = 0 AND (user_id = $userid OR FIND_IN_SET($userid, user_share))";
        if($q != '')
            $where = $where." AND (title LIKE '%$q%' OR number_dc LIKE '%$q%')";
        if($cate != '')
            $where = $where." AND cate_id = $cate";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_document_out WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, cate_id, number_dc, date_dc, title, content, file,
                                    user_id, user_share, location_to, create_at, (SELECT tbldm_document.title
                                    FROM tbldm_document WHERE tbldm_document.id = cate_id) AS category 
                                    FROM tbl_document_out WHERE $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function dupliObj($id, $number_dc){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_document_out WHERE number_dc = '$number_dc'
                                    AND status = 0");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_document_out WHERE number_dc = '$number_dc'
                                        AND status = 0 AND id != $id");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function addObj($data){
        $query = $this->insert("tbl_document_out", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_document_out", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_document_out", "id = $id");
        return $querry;
    }

    function get_info($id){
        $query = $this->db->query("SELECT id, code, cate_id, number_dc, date_dc, location_to, `type`,
                                title, content, user_share, create_at, `file`, (SELECT tbldm_document.title
                                FROM tbldm_document WHERE tbldm_document.id = cate_id) AS category 
                                FROM  tbl_document_out WHERE id = $id");
        return $query->fetchAll();
    }
////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_users($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id != 1 AND active = 1
                                    AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE fullname LIKE '%$q%')");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, (SELECT fullname FROM tbl_personel WHERE tbl_personel.id  = hr_id) AS fullname,
                                    (SELECT birthday FROM tbl_personel WHERE tbl_personel.id  = hr_id) AS birthday,
                                    (SELECT gender FROM tbl_personel WHERE tbl_personel.id  = hr_id) AS gender,
                                    (SELECT title FROM tbldm_job WHERE tbldm_job.id = (SELECT job_id FROM tbl_personel
                                    WHERE tbl_personel.id = hr_id)) AS job
                                    FROM tbl_users WHERE id != 1 AND active = 1 AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel 
                                    WHERE fullname LIKE '%$q%')ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function geet_total_Data_user($q){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id != 1 AND active = 1
                                AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE fullname LIKE '%$q%')");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_number_dc($type){
        $query = $this->db->query("SELECT number_dc FROM tbl_document_out WHERE type = $type
                                    AND status = 0 ORDER BY id DESC LIMIT 0, 1");
        $row = $query->fetchAll();
        return $row;
    }
}
?>