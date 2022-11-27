<?php
class Report_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_info_menu_report($url){
        $query = $this->db->query("SELECT * FROM tbl_roles WHERE link = '$url'");
        return $query->fetchAll();
    }

    function get_report_user($userid, $id){
        if($userid == 1){
            $query = $this->db->query("SELECT id, title, icon, link FROM tbl_roles WHERE parent_id = $id
                                    ORDER BY order_position ASC");
        }else{
            $query = $this->db->query("SELECT id, title, icon, link FROM tbl_roles WHERE FIND_IN_SET(id,
                                    (SELECT roles FROM tbl_group_role WHERE tbl_group_role.id = (SELECT group_role_id
                                    FROM tbl_users WHERE tbl_users.id = $userid))) AND parent_id = $id
                                    ORDER BY order_position ASC");
        }
        return $query->fetchAll();
    }
}
?>