<?php
class Other_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_combo_years(){
        $query = $this->db->query("SELECT id, title, active FROM tbldm_years WHERE status = 0");
        return $query->fetchAll();
    }

    function get_combo_phhysical(){
        $query = $this->db->query("SELECT id, title FROM tbldm_physical_room WHERE status = 0");
        return $query->fetchAll();
    }

    function get_combo_level(){
        $query = $this->db->query("SELECT id, title FROM tbldm_level WHERE status = 0");
        return $query->fetchAll();
    }

    function get_combo_job(){
        $query = $this->db->query("SELECT id, title FROM tbldm_job WHERE status = 0");
        return $query->fetchAll();
    }

    function get_combo_subject(){
        $query = $this->db->query("SELECT id, title FROM tbldm_subject WHERE status = 0");
        return $query->fetchAll();
    }

    function get_combo_subject_point(){
        $query = $this->db->query("SELECT id, title FROM tbldm_subject WHERE status = 0 AND set_point = 1");
        return $query->fetchAll();
    }

    function get_combo_equipment(){
        $query = $this->db->query("SELECT id, title FROM tbldm_equipment WHERE status = 0");
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
                                    AND class_study = 1 AND status = 0");
        return $query->fetchAll();
    }

    function get_combo_task_group($userid){
        $query = $this->db->query("SELECT id, title FROM tbl_task_group WHERE user_id = $userid");
        return $query->fetchAll();
    }

    function get_combo_document_cate(){
        $query = $this->db->query("SELECT id, title, parent_id FROM tbldm_document WHERE status = 0");
        return $query->fetchAll();
    }

    function get_combo_book_cate(){
        $query = $this->db->query("SELECT id, title FROM tbldm_book WHERE status = 0");
        return $query->fetchAll();
    }

    function get_combo_book_manu(){
        $query = $this->db->query("SELECT id, title FROM tbldm_book_manu WHERE status = 0");
        return $query->fetchAll();
    }

    function get_combo_people(){
        $query = $this->db->query("SELECT id, title FROM tbldm_people");
        return $query->fetchAll();
    }

    function get_combo_utensils(){
        $query = $this->db->query("SELECT id, title FROM tbldm_utensils WHERE status = 0");
        return $query->fetchAll();
    }
    
    function get_combo_quanlity(){
        $query = $this->db->query("SELECT id, title FROM tbldm_quanlity");
        return $query->fetchAll();
    }

    function get_combo_standard($id){
        $query = $this->db->query("SELECT id, title FROM tbldm_quanlity_standard WHERE quanlity_id = $id");
        return $query->fetchAll();
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    function get_info_device_pass_code_scan($code){
        $query = $this->db->query("SELECT id, code, title, stock FROM tbl_devices WHERE code = $code");
        return $query->fetchAll();
    }

    function get_info_export_device_scan($devicecode, $subdevice){
        $query = $this->db->query("SELECT physical_id, code FROM tbl_export WHERE code = (SELECT tbl_export_detail.code
                                FROM tbl_export_detail WHERE device_id = (SELECT tbl_devices.id FROM tbl_devices
                                WHERE tbl_devices.code = $devicecode) AND sub_device = $subdevice AND status = 0)");
        return $query->fetchAll();
    }
}
?>