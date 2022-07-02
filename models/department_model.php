<?php
class Department_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_department WHERE title LIKE '%$q%'");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, year_id, physical_id, (SELECT tbldm_years.title
                                FROM tbldm_years WHERE tbldm_years.id = year_id) AS namhoc,
                                (SELECT tbldm_physical_room.title FROM tbldm_physical_room
                                WHERE tbldm_physical_room.id = physical_id) AS physical,
                                (SELECT tbldm_physical_room.region FROM tbldm_physical_room
                                WHERE tbldm_physical_room.id = physical_id) AS region,
                                (SELECT tbldm_physical_room.floor FROM tbldm_physical_room
                                WHERE tbldm_physical_room.id = physical_id) AS `floor`, class_study, is_default
                                FROM tbldm_department WHERE title LIKE '%$q%' ORDER BY id DESC 
                                LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbldm_department", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbldm_department", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbldm_department", "id = $id");
        return $query;
    }
////////////////////////////////////////////////////////////////////////////////////
    function get_info($id){
        $query = $this->db->query("SELECT * FROM tbldm_department WHERE id = $id");
        return $query->fetchAll();
    }

    function check_exit($id, $yearid, $physicalid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_department WHERE year_id = $yearid
                                    AND physical_id = $physicalid");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_department WHERE year_id = $yearid
                                    AND physical_id = $physicalid AND id != $id");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_all_class_study($yearid){
        $query = $this->db->query("SELECT id, title FROM tbldm_department WHERE year_id = $yearid
                                    AND is_default = 1");
        return $query->fetchAll();
    }

    function get_all_class_study_physical($list){
        $query = $this->db->query("SELECT id, physical_id, title, class_study, is_default FROM tbldm_department
                                    WHERE FIND_IN_SET(id, '$list')");
        return $query->fetchAll();
    }

    function check_exit_department_copy($yearid, $list){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_department WHERE year_id = $yearid 
                                    AND FIND_IN_SET(physical_id, '$list')");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
}
?>