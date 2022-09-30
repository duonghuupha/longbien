<?php
class Proof_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($standard, $criteria, $codeproof, $title, $offset, $rows){
        $result = array();
        $where = "status = 1";
        if($standard != '')
            $where = $where." AND criteria_id IN (SELECT tbldm_quanlity_criteria.id FROM tbldm_quanlity_criteria
                            WHERE tbldm_quanlity_criteria.standard_id = $standard)";
        if($criteria != '')
            $where = $where." AND criteria_id = $criteria";
        if($codeproof != '')
            $where = $where." AND code_proof LIKE '%$codeproof%'";
        if($title != '')
            $where = $where." AND title LIKE '%$title%'";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_proof WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, code_proof, criteria_id, title, file, create_at,
                                    user_id, status, IF(user_id = 1, 'Administrator', (SELECT fullname
                                    FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users
                                    WHERE tbl_users.id = user_id))) AS fullname, (SELECT tbldm_quanlity_criteria.title
                                    FROM tbldm_quanlity_criteria WHERE tbldm_quanlity_criteria.id = criteria_id) AS criteria,
                                    (SELECT tbldm_quanlity_standard.title FROM tbldm_quanlity_standard 
                                    WHERE tbldm_quanlity_standard.id = (SELECT standard_id FROM tbldm_quanlity_criteria
                                    WHERE tbldm_quanlity_criteria.id = criteria_id)) AS `standard` 
                                    FROM tbl_proof WHERE $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_proof", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_proof", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_proof", "id = $id");
        return $query;
    }

    function dupliObj($id, $codeproof){
        $query = $this->db->query("SELECT  COUNT(*) AS Total FROM tbl_proof WHERE code_proof = '$codeproof' AND status = 1");
        if($id > 0){
            $query = $this->db->query("SELECT  COUNT(*) AS Total FROM tbl_proof WHERE code_proof = '$codeproof'
                                        AND id != $id  AND status = 1");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_info($id){
        $query = $this->db->query("SELECT id, code, code_proof, criteria_id, title, `file`, (SELECT tbldm_quanlity_criteria.title
                                    FROM tbldm_quanlity_criteria WHERE tbldm_quanlity_criteria.id = criteria_id) AS criteria, create_at,
                                    (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users
                                    WHERE tbl_users.id = user_id)) AS fullname 
                                    FROM tbl_proof WHERE id = $id");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
//////////////////////////////////////////////////////////////////////////////////////////
    function get_data_criteria($q, $array_id, $offset, $rows){
        $result = array();
        if($array_id != ''){
            $where = "WHERE FIND_IN_SET(id, '$array_id') AND title LIKE '%$q%'";
        }else{
            $where = "WHERE title LIKE '%$q%'";
        }
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_quanlity_criteria $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, quanlity_id, standard_id, (SELECT tbldm_quanlity.title
                                    FROM tbldm_quanlity WHERE tbldm_quanlity.id = quanlity_id) AS quanlity,
                                    (SELECT tbldm_quanlity_standard.title FROM tbldm_quanlity_standard
                                    WHERE tbldm_quanlity_standard.id = standard_id) AS `standard` FROM tbldm_quanlity_criteria
                                    $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_criteria_total($q, $array_id){
        if($array_id != ''){
            $where = "WHERE FIND_IN_SET(id, '$array_id') AND title LIKE '%$q%'";
        }else{
            $where = "WHERE title LIKE '%$q%'";
        }
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_quanlity_criteria $where");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
//////////////////////////////////////////////////////////////////////////////////////////////
    function get_all_criteria_role($userid){
        $query = $this->db->query("SELECT criteria FROM tbl_quanlity_role WHERE user_id = $userid");
        $row = $query->fetchAll();
        return $row[0]['criteria'];
    }
}
?>