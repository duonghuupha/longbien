<?php
class Dashboard_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_total_personel(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_personel WHERE status = 1");
        $row  = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_total_student(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE status = 1");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_total_device(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_devices WHERE status = 1");
        $row = $query->fetchAll();
        return $row[0]['Total'];    
    }

    function get_total_device_stock(){
        $query = $this->db->query("SELECT SUM(stock) AS Total FROM tbl_devices WHERE status = 1");
        $row = $query->fetchAll();
        return $row[0]['Total'];    
    }

    function get_total_utensils(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_utensils WHERE status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];    
    }

    function get_total_utensils_stock(){
        $query = $this->db->query("SELECT SUM(stock) AS Total FROM tbl_utensils WHERE status = 0");
        $row = $query->fetchAll();
        return $row[0]['Total'];    
    }

    function get_total_book($type){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book WHERE status = 0 AND type = $type");
        $row = $query->fetchAll();
        return $row[0]['Total'];    
    }

    function get_total_stock_book($type){
        $query = $this->db->query("SELECT SUM(stock) AS Total FROM tbl_book WHERE status = 0 AND type = $type");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_total_department_class($yearid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_department WHERE year_id = $yearid
                                    AND status = 0 AND class_study = 1");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_total_department_function($yearid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_department WHERE year_id = $yearid
                                    AND status = 0 AND is_function = 2");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////
    function get_percent_gender_student(){
        $query = $this->db->query("SELECT COUNT(*) AS Total, 'Nam' AS title FROM tbl_student WHERE status = 1 AND gender = 1
                                    UNION ALL
                                    SELECT COUNT(*) AS Total, 'Nữ' AS title FROM tbl_student WHERE status = 1 AND gender = 2");
        return $query->fetchAll();
    }

    function get_percent_year_old_student(){
        $query = $this->db->query("SELECT COUNT(*) AS Total, DATE_FORMAT(birthday, '%Y') AS title FROM tbl_student WHERE status = 1 
                                    GROUP BY DATE_FORMAT(birthday, '%Y')");
        return $query->fetchAll();
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    function get_percent_gender_personel(){
        $query = $this->db->query("SELECT COUNT(*) AS Total, 'Nam' AS title FROM tbl_personel WHERE status = 1 AND gender = 1
                                    UNION ALL
                                    SELECT COUNT(*) AS Total, 'Nữ' AS title FROM tbl_personel WHERE status = 1 AND gender = 2");
        return $query->fetchAll();
    }

    function get_percent_level_personel(){
        $query = $this->db->query("SELECT level_id, IF(level_id = 0, 'Chưa rõ', (SELECT title FROM tbldm_level 
                                    WHERE tbldm_level.id = level_id)) AS title, COUNT(*) AS Total FROM tbl_personel 
                                    WHERE status = 1 GROUP BY level_id");
        return $query->fetchAll();
    }

    function get_percent_job_personel(){
        $query = $this->db->query("SELECT job_id, IF(job_id = 0, 'Chưa rõ', (SELECT title FROM tbldm_job 
                                    WHERE tbldm_job.id = job_id)) AS title, COUNT(*) AS Total FROM tbl_personel 
                                    WHERE status = 1 GROUP BY job_id");
        return $query->fetchAll();
    }
///////////////////////////////////////////////////////////////////////////////////////////////
    function get_schedule_today($department, $date){
        if($department == 0){
            $where = "";
        }else{
            $where = " AND department_id = $department";
        }
        $query = $this->db->query("SELECT id, code, lesson, subject_id, department_id, title, (SELECT tbldm_subject.title
                                    FROM tbldm_subject WHERE tbldm_subject.id = subject_id) AS subject, (SELECT tbldm_department.title
                                    FROM tbldm_department WHERE tbldm_department.id = department_id) AS department FROM tbl_schedule
                                    WHERE date_study = '$date' $where ORDER BY id DESC LIMIT 0, 5");
        return $query->fetchAll();
    }
}
?>