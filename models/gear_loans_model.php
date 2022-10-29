<?php
class Gear_loans_Model extends Model{
    function __construct(){
        parent::__construct();
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
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

    function get_data_users_total($q){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id != 1 AND active = 1
                                AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE fullname LIKE '%$q%')");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_gear($q, $offset, $rows){
        $result = array();
        $query= $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils WHERE title LIKE '%$q%' AND status = 0
                                AND stock != 0");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title, content, image, cate_id, stock, (SELECT tbldm_utensils.title
                                    FROM tbldm_utensils WHERE tbldm_utensils.id = cate_id) AS category FROM tbl_utensils WHERE status = 0
                                    AND title LIKE '%$q%' AND stock != 0 ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_date_gear_total($q){
        $query= $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils WHERE title LIKE '%$q%' AND status = 0
                                    AND stock != 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////
    function addObj($data){
        $query = $this->insert("tbl_utensils_loan", $data);
        return $query;
    }

    function addObj_detail($data){
        $query = $this->insert("tbl_utensils_loan_detail", $data);
        return $query;
    }

    function dupliObj($utensilsid, $subutensils){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils_loan_detail WHERE utensils_id = $utensilsid
                                    AND sub_utensils = $subutensils AND status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function getFetObj($name, $title, $dateloan, $datereturn, $offset, $rows){
        $result = array();
        $where = "user_loan IN (SELECT tbl_users.id FROM tbl_users WHERE tbl_users.hr_id IN (SELECT tbl_personel.id
                FROM tbl_personel WHERE tbl_personel.fullname LIKE '%$name%'))";
        if($title != '')
            $where = $where." AND code IN (SELECT tbl_utensils_loan_detail.code FROM tbl_utensils_loan_detail WHERE tbl_utensils_loan_detail.utensils_id
                            IN (SELECT tbl_utensils.id FROM tbl_utensils WHERE tbl_utensils.title LIKE '%$title%'))";
        if($dateloan != '')
            $where = $where." AND DATE_FORMAT(date_loan, '%Y-%m-%d') = '$dateloan'";
        if($datereturn  != '')
            $where = $where." AND DATE_FORMAT(date_return, '%Y-%m-%d') = '$datereturn'";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils_loan WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, user_loan, date_loan, date_return, content, notes, `status`,
                                    create_at, (SELECT COUNT(*) FROM tbl_utensils_loan_detail 
                                    WHERE tbl_utensils_loan_detail.code = tbl_utensils_loan.code) AS qty,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id 
                                    FROM tbl_users WHERE tbl_users.id = user_id))) AS fullname_create,
                                    IF(user_loan = 1, 'Administrator', (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id 
                                    FROM tbl_users WHERE tbl_users.id = user_loan))) AS fullname_loan
                                    FROM tbl_utensils_loan WHERE $where ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_info($id){
        $query = $this->db->query("SELECT id, code, user_loan, DATE_FORMAT(date_loan, '%d-%m-%Y') AS date_loan, 
                                    DATE_FORMAT(date_return, '%d-%m-%Y') AS date_return, content, notes, create_at,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel
                                    WHERE tbl_personel.id = (SELECT tbl_users.hr_id FROM tbl_users WHERE tbl_users.id = user_id))) AS create_name,
                                    (SELECT fullname FROM tbl_personel WHERE tbl_personel.id = (SELECT hr_id
                                    FROM tbl_users WHERE tbl_users.id = user_loan)) AS fullname FROM tbl_utensils_loan 
                                    WHERE id = $id");
        return $query->fetchAll();
    }

    function get_gear_selected($code){
        $query = $this->db->query("SELECT id, code, utensils_id, sub_utensils, date_return, status,
                                    (SELECT title FROM tbl_utensils WHERE tbl_utensils.id = utensils_id) AS title,
                                    (SELECT tbl_utensils.code FROM tbl_utensils WHERE tbl_utensils.id = utensils_id) 
                                    AS code_utensils FROM tbl_utensils_loan_detail WHERE code = $code");
        return $query->fetchAll();
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_utensils_loan", $data, "id = $id");
        return  $query;
    }

    function updateObj_detail($data, $code, $utensilsid, $subutensils){
        $query = $this->update("tbl_utensils_loan_detail", $data, "code = $code AND utensils_id = $utensilsid 
                                AND sub_utensils = $subutensils");
        return $query;
    }

    function check_return_all_utensils($code){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils_loan_detail WHERE code = $code
                                    AND status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_info_utensils($code){
        $query= $this->db->query("SELECT id, code, title FROM tbl_utensils WHERE code = $code");
        return $query->fetchAll();
    }

    function check_utensils_loan($code, $sub, $date){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils_loan_detail WHERE sub_utensils = $sub
                                AND status = 0 AND utensils_id = (SELECT tbl_utensils.id FROM tbl_utensils
                                WHERE tbl_utensils.code = $code) AND code = (SELECT tbl_utensils_loan.code
                                FROM tbl_utensils_loan WHERE tbl_utensils_loan.date_loan = '$date')");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function check_utensils_return($code, $sub){
        $query = $this->db->query("SELECT `status` FROM tbl_utensils_return WHERE utensils_id = (SELECT tbl_utensils.id
                                    FROM tbl_utensils WHERE tbl_utensils.code = $code) AND sub_utensils = $sub 
                                    ORDER BY id DESC LIMIT 0, 1");
        $row = $query->fetchAll();
        if(count($row) > 0){
            return $row[0]['status'];
        }else{
            return 3;
        }
    }

    function updateObj_detail_via_code($code, $data){
        $query = $this->update("tbl_utensils_loan_detail", $data, "code = $code");
        return $query;
    }
}
?>