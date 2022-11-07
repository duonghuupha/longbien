<?php
class Report_proof_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($quan, $stand, $criteria, $code, $title, $offset, $rows){
        $result = array();
        $where = "status = 1";
        if($quan != '')
            $where = $where." AND criteria_id IN (SELECT tbldm_quanlity_criteria.id FROM tbldm_quanlity_criteria
                            WHERE tbldm_quanlity_criteria.standard_id IN (SELECT tbldm_quanlity_standard.id FROM tbldm_quanlity_standard
                            WHERE tbldm_quanlity_standard.quanlity_id = $quan))";
        if($stand != '')
            $where = $where." AND criteria_id IN (SELECT tbldm_quanlity_criteria.id FROM tbldm_quanlity_criteria
                            WHERE tbldm_quanlity_criteria.standard_id = $stand)";
        if($criteria != '')
            $where = $where." AND criteria_id = $criteria";
        if($code != '')
            $where = $where." AND code_proof LIKE '%$code%'";
        if($title != '')
            $where = $where." AND title LIKE '%$title%'";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_proof WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code_proof, criteria_id, title, file, file_link, user_id,
                                    create_at, iF(user_id = 1, 'Administrator', (SELECT fullname 
                                    FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users 
                                    WHERE tbl_users.id = user_id))) AS fullname, (SELECT tbldm_quanlity_criteria.title
                                    FROM tbldm_quanlity_criteria WHERE tbldm_quanlity_criteria.id = criteria_id) AS criteria,
                                    (SELECT tbldm_quanlity_standard.title FROM tbldm_quanlity_standard 
                                    WHERE tbldm_quanlity_standard.id = (SELECT standard_id FROM tbldm_quanlity_criteria
                                    WHERE tbldm_quanlity_criteria.id = criteria_id)) AS `standard` 
                                    FROM tbl_proof WHERE $where");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function getFetObj_export($quan, $stand, $criteria, $code, $title){
        $where = "status = 1";
        if($quan != '')
            $where = $where." AND criteria_id IN (SELECT tbldm_quanlity_criteria.id FROM tbldm_quanlity_criteria
                            WHERE tbldm_quanlity_criteria.standard_id IN (SELECT tbldm_quanlity_standard.id FROM tbldm_quanlity_standard
                            WHERE tbldm_quanlity_standard.quanlity_id = $quan))";
        if($stand != '')
            $where = $where." AND criteria_id IN (SELECT tbldm_quanlity_criteria.id FROM tbldm_quanlity_criteria
                            WHERE tbldm_quanlity_criteria.standard_id = $stand)";
        if($criteria != '')
            $where = $where." AND criteria_id = $criteria";
        if($code != '')
            $where = $where." AND code_proof LIKE '%$code%'";
        if($title != '')
            $where = $where." AND title LIKE '%$title%'";
        $query = $this->db->query("SELECT id, code_proof, criteria_id, title, file, file_link, user_id,
                                    create_at, iF(user_id = 1, 'Administrator', (SELECT fullname 
                                    FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users 
                                    WHERE tbl_users.id = user_id))) AS fullname, (SELECT tbldm_quanlity_criteria.title
                                    FROM tbldm_quanlity_criteria WHERE tbldm_quanlity_criteria.id = criteria_id) AS criteria,
                                    (SELECT tbldm_quanlity_standard.title FROM tbldm_quanlity_standard 
                                    WHERE tbldm_quanlity_standard.id = (SELECT standard_id FROM tbldm_quanlity_criteria
                                    WHERE tbldm_quanlity_criteria.id = criteria_id)) AS `standard` 
                                    FROM tbl_proof WHERE $where");
        return $query->fetchAll();
    }
//////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_combo_quanlity($q){
        $query = $this->db->query("SELECT id, title FROM tbldm_quanlity WHERE status = 1
                                    AND title LIKE '%$q%'");
        return $query->fetchAll();
    }

    function get_data_combo_standard($q, $id){
        $query = $this->db->query("SELECT id, title FROM tbldm_quanlity_standard WHERE quanlity_id = $id
                                    AND title LIKE '%$q%'");
        return $query->fetchAll();
    }

    function get_data_combo_criteria($q, $id){
        $query = $this->db->query("SELECT id, title FROM tbldm_quanlity_criteria WHERE standard_id = $id
                                    AND title LIKE '%$q%'");
        return $query->fetchAll();
    }
}
?>