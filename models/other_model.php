<?php
class Other_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_combo_years(){
        $query = $this->db->query("SELECT id, title FROM tbldm_years");
        return $query->fetchAll();
    }

    function get_combo_phhysical(){
        $query = $this->db->query("SELECT id, title FROM tbldm_physical_room");
        return $query->fetchAll();
    }

    function get_combo_level(){
        $query = $this->db->query("SELECT id, title FROM tbldm_level");
        return $query->fetchAll();
    }

    function get_combo_job(){
        $query = $this->db->query("SELECT id, title FROM tbldm_job");
        return $query->fetchAll();
    }

    function get_combo_subject(){
        $query = $this->db->query("SELECT id, title FROM tbldm_subject");
        return $query->fetchAll();
    }
}
?>