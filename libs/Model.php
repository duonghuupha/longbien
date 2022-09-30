<?php
class Model {
    function __construct() {
		$this->db = new Database();
	}

    // them moi du lieu
    function insert($table, $array){
        $cols = array();
        $bind = array();
        foreach($array as $key => $value){
            $cols[] = $key;
            $bind[] = "'".$value."'";
        }
        $query = $this->db->query("INSERT INTO ".$table." (".implode(",", $cols).") VALUES (".implode(",", $bind).")");
        return $query;
    }

    // cap nhat du lieu
    function update($table, $array, $where){
        $set = array();
        foreach($array as $key => $value){
            $set[] = $key." = '".$value."'";
        }
        $query = $this->db->query("UPDATE ".$table." SET ".implode(",", $set)." WHERE ".$where);
        return $query;
    }

    // xoa du lieu
    function delete($table, $where = ''){
        if($where == ''){
            $query = $this->db->query("DELETE FROM ".$table);
        }else{
        $query = $this->db->query("DELETE FROM ".$table." WHERE ".$where);
        }
        return $query;
    }
///////////////////////////// cac ham khac //////////////////////////////////////////////////////////////////////////////////
    function check_token($token){
        $query = $this->db->query("SELECT last_login FROM tbl_users WHERE token = '$token'");
        return $query->fetchAll();
    }
    function return_title_subject($id){
        $query = $this->db->query("SELECT title FROM tbldm_subject WHERE id = $id");
        $row = $query->fetchAll();
        return $row[0]['title'];
    }
    function check_dupli_code_personel($code){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_personel WHERE code = $code");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function check_dupli_code_device($code){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE code = $code");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function return_fullname_per($hrid){
        $query = $this->db->query("SELECT fullname FROM tbl_personel WHERE id = $hrid");
        $row = $query->fetchAll();
        return $row[0]['fullname'];
    }
    function return_title_device($id){
        $query = $this->db->query("SELECT title FROM tbl_devices WHERE id = $id");
        $row = $query->fetchAll();
        return $row[0]['title'];
    }
    function return_list_device_export($code){
        $query = $this->db->query("SELECT device_id, sub_device, code, status, (SELECT title FROM tbl_devices
                                    WHERE tbl_devices.id = device_id) AS device FROM tbl_export_detail
                                    WHERE code = $code AND status = 0 ORDER BY id DESC");
        return $query->fetchAll();
    }
    function check_exit_sub_device($deviceid, $subdevice){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_export_detail WHERE device_id = $deviceid
                                    AND sub_device = $subdevice AND status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function return_info_device($id){
        $query = $this->db->query("SELECT code, title, stock FROM tbl_devices WHERE id = $id");
        return $query->fetchAll();
    }
    function get_device_selected($code){
        $query = $this->db->query("SELECT CONCAT(device_id, '.', sub_device) AS id, (SELECT title FROM tbl_devices
                                WHERE tbl_devices.id = device_id) AS title, (SELECT tbl_devices.code
                                FROM tbl_devices WHERE tbl_devices.id = device_id) AS code, status,  sub_device
                                FROM tbl_loans_detail WHERE code = $code AND status = 0");
        return json_encode($query->fetchAll(PDO::FETCH_ASSOC));
    }
    function check_exit_sub_device_loans($deviceid, $subdevice){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_loans_detail WHERE device_id = $deviceid
                                    AND sub_device = $subdevice AND status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function return_title_year($id){
        $query = $this->db->query("SELECT title FROM tbldm_years WHERE id = $id");
        $row = $query->fetchAll();
        return $row[0]['title'];
    }
    function get_relation_via_code($code){
        $query = $this->db->query("SELECT code, id, relation, fullname, year, phone, job FROM tbl_student_relation
                                    WHERE code = $code");
        return json_encode($query->fetchAll(PDO::FETCH_ASSOC));
    }
    function get_fullname_users($id){
        $query = $this->db->query("SELECT fullname FROM tbl_personel WHERE id = (SELECT hr_id FROM tbl_users
                                    WHERE tbl_users.id = $id)");
        $row = $query->fetchAll();
        return $row[0]['fullname'];
    }
    function get_parent_document_cate($parentid){
        $query = $this->db->query("SELECT id, title, parent_id FROM tbldm_document WHERE id = $parentid");
        return $query->fetchAll();
    }
    function return_info_book($id){
        $query = $this->db->query("SELECT code, title, stock FROM tbl_book WHERE id = $id");
        return $query->fetchAll();
    }
    function check_book_loan($bookid, $subbook){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book_loan WHERE book_id = $bookid
                                    AND sub_book = $subbook AND status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function return_titlee_job_via_user_id($userid){
        $query = $this->db->query("SELECT title FROM tbldm_job WHERE tbldm_job.id = (SELECT job_id FROM tbl_personel
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = $userid))");
        $row = $query->fetchAll();
        if(count($row) > 0){
            return $row[0]['title'];
        }else{
            return '';
        }
    }
    function return_title_department_via_student_id($student, $yearid){
        $query = $this->db->query("SELECT title FROM tbldm_department WHERE tbldm_department.id = (SELECT department_id
                                FROM tbl_student_class WHERE tbl_student_class.student_id = $student AND year_id = $yearid)");
        $row = $query->fetchAll();
        if(count($row) > 0){
            return $row[0]['title'];
        }else{
            return '';
        }
    }
    function check_dupli_code_gear($code){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils WHERE code = $code");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function return_info_utensils($id){
        $query = $this->db->query("SELECT * FROM tbl_utensils WHERE id = $id");
        return $query->fetchAll();
    }
    function check_gear_loan($gearid, $subgear){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils_loan_detail WHERE utensils_id = $gearid
                                    AND sub_utensils = $subgear AND status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function get_gear_selected($code){
        $query = $this->db->query("SELECT CONCAT(utensils_id, '.', sub_utensils) AS id, (SELECT title FROM tbl_utensils
                                WHERE tbl_utensils.id = utensils_id) AS title, (SELECT tbl_utensils.code
                                FROM tbl_utensils WHERE tbl_utensils.id = utensils_id) AS code, status,  sub_utensils
                                FROM tbl_utensils_loan_detail WHERE code = $code AND status = 0");
        return json_encode($query->fetchAll(PDO::FETCH_ASSOC));
    }
    function check_gear_return($gearid, $subgear){
        $query = $this->db->query("SELECT `status` FROM tbl_utensils_return WHERE utensils_id = $gearid
                                    AND sub_utensils = $subgear ORDER BY id DESC LIMIT 0, 1");
        $row = $query->fetchAll();
        if(count($row) > 0){
            return $row[0]['status'];
        }else{
            return 3;
        }
    }
    function get_all_task_of_user_via_time_work($str_user, $date, $time){
        $query = $this->db->query("SELECT title FROM tbl_tasks WHERE FIND_IN_SET(user_main, '$str_user') AND time_work = $time
                                AND date_work = '$date' AND is_display = 1");
        return $query->fetchAll();
    }
    function get_all_user_main_via_time_work($str_user, $date, $time){
        $query  = $this->db->query("SELECT user_main, (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                    FROM tbl_users WHERE tbl_users.id = user_main)) AS fullname FROM tbl_tasks WHERE FIND_IN_SET(user_main, '$str_user') AND time_work = $time
                                AND date_work = '$date' AND is_display = 1 GROUP BY user_main");
        return $query->fetchAll();
    }
    function check_exit_sub_device_return($deviceid, $subdevice){
        $query = $this->db->query("SELECT `status` FROM tbl_returns_device WHERE device_id = $deviceid
                                    AND sub_device = $subdevice ORDER BY id DESC LIMIT 0, 1");
        $row = $query->fetchAll();
        return $row[0]['status'];
    }
    function check_restore_device($physical, $device, $sub){
        $query = $this->db->query("SELECT `status` FROM tbl_returns_device WHERE physical_id = $physical
                                    AND device_id = $device AND sub_device = $sub ORDER BY id DESC
                                    LIMIT 0, 1");
        $row = $query->fetchAll();
        return $row[0]['status'];
    }
    function check_restore_gear($utensilsid, $subutensils){
        $query  = $this->db->query("SELECT `status` FROM tbl_utensils_return WHERE utensils_id = $utensilsid
                                    AND sub_utensils = $subutensils ORDER BY id DESC LIMIT 0, 1");
        $row = $query->fetchAll();
        return $row[0]['status'];
    }
    function check_restore_book($bookid, $subbook){
        $query  = $this->db->query("SELECT `status` FROM tbl_book_return WHERE book_id = $bookid
                                    AND sub_book = $subbook ORDER BY id DESC LIMIT 0, 1");
        $row = $query->fetchAll();
        return $row[0]['status'];
    }
    function get_lesson_of_department_via_date_study($departmentid, $datestudy, $lesson){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_schedule WHERE department_id = $departmentid AND date_study = '$datestudy'
                                    AND lesson = $lesson");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function get_device_gear_loan($code){
        $query = $this->db->query("SELECT CONCAT(device_id, '.', sub_device) AS id, (SELECT title FROM tbl_devices 
                                    WHERE tbl_devices.id = device_id) AS title, sub_device AS sub, 1 AS type FROM tbl_loans_detail 
                                    WHERE code = $code
                                    UNION ALL
                                    SELECT CONCAT(utensils_id, '.', sub_utensils) AS id, (SELECT title FROM tbl_utensils 
                                    WHERE tbl_utensils.id = utensils_id) AS title, sub_utensils AS sub, 2 AS type FROM tbl_utensils_loan_detail 
                                    WHERE code = $code
                                    UNION  ALL
                                    SELECT department_id AS id, (SELECT title FROM tbldm_department WHERE tbldm_department.id = department_id)
                                    AS title, 0 AS sub, 3 AS type FROM tbl_department_loan WHERE code = $code");
        return json_encode($query->fetchAll(PDO::FETCH_ASSOC));
    }
    function checked_role($id, $role){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_group_role WHERE id = $id
                                    AND FIND_IN_SET('$role', roles)");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function get_parent_menu($id){
        $query = $this->db->query("SELECT id, title, link, functions, parent_id, order_position FROM tbl_roles WHERE parent_id = $id
                                    ORDER BY order_position ASC");
        return $query->fetchAll();
    }
    function get_menu_via_user($grouproleid, $parentid){
        $query = $this->db->query("SELECT id, title, link, functions, parent_id, icon FROM tbl_roles WHERE FIND_IN_SET(tbl_roles.id,
                                (SELECT roles FROM tbl_group_role WHERE tbl_group_role.id = $grouproleid)) AND parent_id = $parentid
                                ORDER BY order_position ASC");
        return $query->fetchAll();
    }
    function return_title_menu($id){
        $query = $this->db->query("SELECT title FROM tbl_roles WHERE id = $id");
        $row = $query->fetchAll();
        return $row[0]['title'];
    }
    function check_role_controller($grouproleid, $link){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_group_role WHERE id = $grouproleid 
                                    AND FIND_IN_SET((SELECT tbl_roles.id FROM tbl_roles 
                                    WHERE tbl_roles.link = '$link'), roles); ");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
    function check_role_view($userid, $grouproleid, $link, $functions){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_group_role WHERE id = $grouproleid 
                                    AND FIND_IN_SET(CONCAT((SELECT tbl_roles.id FROM tbl_roles 
                                    WHERE tbl_roles.link = '$link'), '_', $functions), roles)");
        $row = $query->fetchAll();
        if($userid == 1){
            return 1;
        }else{
            return $row[0]['Total'];
        }
    }
    function get_data_standard_quanlity($id){
        $query = $this->db->query("SELECT id, title FROM tbldm_quanlity_standard WHERE quanlity_id = $id");
        return $query->fetchAll();
    }
    function get_data_criteria_quanlity($id){
        $query = $this->db->query("SELECT id, title FROM tbldm_quanlity_criteria WHERE  standard_id = $id");
        return $query->fetchAll();
    }
    function checked_role_quanlity($userid, $role){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_quanlity_role WHERE user_id = $userid
                                    AND FIND_IN_SET('$role', criteria)");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
/////////////////////////////////////end cac ham khac ///////////////////////////////////////////////////////////////////////
}

?>
