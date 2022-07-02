<?php
class Other_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_combo_years(){
        $query = $this->db->query("SELECT id, title, active FROM tbldm_years");
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

    function get_combo_equipment(){
        $query = $this->db->query("SELECT id, title FROM tbldm_equipment");
        return $query->fetchAll();
    }

    function get_info_personel_via_code($code){
        $query = $this->db->query("SELECT id, fullname, (SELECT tbl_users.id FROM tbl_users
                                WHERE tbl_users.hr_id = tbl_personel.id) AS user_id FROM tbl_personel
                                WHERE code = $code");
        return $query->fetchAll();
    }

    function get_info_device_via_code($code, $subdevice){
        $query = $this->db->query("SELECT CONCAT(id, '.', $subdevice) AS id, code, title, status, $subdevice AS sub_device 
                                    FROM tbl_devices WHERE code = $code");
        return $query->fetchAll();
    }

    function get_combo_department($yearid){
        $query = $this->db->query("SELECT id, title FROM tbldm_department WHERE year_id = $yearid
                                    AND class_study = 1");
        return $query->fetchAll();
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    function get_info_device_pass_code($code){
        $query = $this->db->query("SELECT id, code, title, stock FROM tbl_devices WHERE code = $code");
        return $query->fetchAll();
    }
}
?>