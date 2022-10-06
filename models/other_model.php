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
        $query = $this->db->query("SELECT id, title FROM tbldm_quanlity WHERE status = 1");
        return $query->fetchAll();
    }

    function get_combo_standard($id){
        $query = $this->db->query("SELECT id, title FROM tbldm_quanlity_standard WHERE quanlity_id = $id");
        return $query->fetchAll();
    }

    function get_combo_tieu_chuan(){
        $query = $this->db->query("SELECT id, title FROM tbldm_quanlity_standard WHERE quanlity_id = (SELECT tbldm_quanlity.id
                                    FROM tbldm_quanlity WHERE tbldm_quanlity.status = 1)");
        return $query->fetchAll();
    }

    function get_combo_criteria($id){
        $query = $this->db->query("SELECT id, title FROM tbldm_quanlity_criteria WHERE standard_id = $id");
        return $query->fetchAll();
    }

    function get_combo_works_group(){
        $query = $this->db->query("SELECT id, title FROM tbldm_works_group WHERE status = 1");
        return $query->fetchAll();
    }

    function get_combo_works_cate($id){
        $query = $this->db->query("SELECT id, title FROM tbldm_works WHERE group_id = $id AND status =1");
        return $query->fetchAll();
    }

    function get_combo_subject_via_user_id($type, $userid, $yearid){
        if($type == 0){
            $query = $this->db->query("SELECT id, title FROM tbldm_subject WHERE status = 0 
                                        AND set_point = 1");
        }else{
            $query = $this->db->query("SELECT id, title FROM tbldm_subject WHERE status = 0 
                                        AND set_point = 1 AND FIND_IN_SET(tbldm_subject.id, (SELECT tbl_assign.subject
                                        FROM tbl_assign WHERE tbl_assign.user_id = $userid AND year_id = $yearid))");
        }
        return $query->fetchAll();
    }

    function get_combo_department_user($type, $userid, $yearid){
        if($type == 0){
            $query = $this->db->query("SELECT id, title FROM tbldm_department WHERE year_id = $yearid
                                        AND status = 0 AND class_study = 1");
        }else{
            $query = $this->db->query("SELECT id, title FROM tbldm_department WHERE year_id = $yearid AND class_study = 1
                                        AND status = 0 AND FIND_IN_SET(tbldm_department.id, (SELECT tbl_assign.department
                                        FROM tbl_assign WHERE tbl_assign.user_id = $userid AND year_id = $yearid))");
        }
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

    function check_user_is_teacher($userid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id = $userid
                                    AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE tbl_personel.job_id = (SELECT tbldm_job.id
                                    FROM tbldm_job WHERE tbldm_job.is_teacher = 1 AND tbldm_job.status = 0))");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
}
?>