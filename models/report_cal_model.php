<?php
class Report_cal_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($teacher, $fromdate, $todate, $subject, $dep, $lesson, $exp, $title, $offset, $rows){
        $result = array();
        $where = "title LIKE '%$title%'";
        if($teacher != '')
            $where = $where." AND user_id IN (SELECT tbl_users.id FROM tbl_users WHERE tbl_users.hr_id
                    IN (SELECT tbl_personel.id FROM tbl_personel WHERE tbl_personel.fullname LIKE '%$teacher%'))";
        if($fromdate != '' && $todate != '')
            $where = $where." AND date_study >= '$fromdate' AND date_study <= '$todate'";
        if($subject != '')
            $where = $where." AND subject_id = $subject";
        if($dep != '')
            $where = $where." AND department_id = $dep";
        if($lesson != 0)
            $where = $where." AND lesson = $lesson";
        if($exp != '')
            $where = $where." AND lesson_export = $exp";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_schedule WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, user_create, lesson, subject_id, department_id,
                                    lesson_export, date_study, title, create_at, (SELECT fullname FROM tbl_personel
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_id))
                                    AS fullname, (SELECT tbldm_subject.title FROM tbldm_subject WHERE tbldm_subject.id = subject_id)
                                    AS `subject`, (SELECT tbldm_department.title FROM tbldm_department WHERE tbldm_department.id = department_id)
                                    AS department FROM tbl_schedule WHERE $where ORDER BY date_study LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function getFetObj_export($teacher, $fromdate, $todate, $subject, $dep, $lesson, $exp, $title){
        $where = "title LIKE '%$title%'";
        if($teacher != '')
            $where = $where." AND user_id IN (SELECT tbl_users.id FROM tbl_users WHERE tbl_users.hr_id
                    IN (SELECT tbl_personel.id FROM tbl_personel WHERE tbl_personel.fullname LIKE '%$teacher%'))";
        if($fromdate != '' && $todate != '')
            $where = $where." AND date_study >= '$fromdate' AND date_study <= '$todate'";
        if($subject != '')
            $where = $where." AND subject_id = $subject";
        if($dep != '')
            $where = $where." AND department_id = $dep";
        if($lesson != 0)
            $where = $where." AND lesson = $lesson";
        if($exp != '')
            $where = $where." AND lesson_export = $exp";
        $query = $this->db->query("SELECT id, code, user_id, user_create, lesson, subject_id, department_id,
                                    lesson_export, date_study, title, create_at, (SELECT fullname FROM tbl_personel
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_id))
                                    AS fullname, (SELECT tbldm_subject.title FROM tbldm_subject WHERE tbldm_subject.id = subject_id)
                                    AS `subject`, (SELECT tbldm_department.title FROM tbldm_department WHERE tbldm_department.id = department_id)
                                    AS department FROM tbl_schedule WHERE $where ORDER BY date_study");
        return $query->fetchAll();
    }
}
?>