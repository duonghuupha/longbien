<?php
class Student_point_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($type, $userid, $q, $subject, $department, $yearid, $offset, $rows){
        $result = array();
        if($type == 0){
            $where = "status = 1";
        }else{
            $string = $this->get_department_assign($userid, $yearid);
            if($string != ''){
                $where = "status = 1 AND id IN (SELECT tbl_student_class.student_id FROM tbl_student_class 
                        WHERE tbl_student_class.year_id = $yearid AND FIND_IN_SET(tbl_student_class.department_id, 
                        '$string'))";
            }else{
                $where = $where;
            }
        }
        if($q != '')
            $where = $where." AND fullname LIKE '%$q%'";
        if($subject != '')
            if($type == 0){
                $where = $where;
            }else{
                $where = $where." AND id IN (SELECT student_id FROM tbl_student_class WHERE year_id = $yearid
                                AND FIND_IN_SET(department_id, (SELECT department FROM tbl_assign_detail
                                WHERE tbl_assign_detail.subject_id = $subject AND tbl_assign_detail.code = 
                                (SELECT tbl_assign.code FROM tbl_assign WHERE tbl_assign.user_id = $userid
                                AND year_id = $yearid))))";
            }
        if($department != '')
            $where = $where." AND id IN (SELECT student_id FROM tbl_student_class WHERE year_id = $yearid AND department_id = $department)";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, code_csdl, fullname, gender, birthday, status,
                                IF((SELECT COUNT(*) FROM tbl_student_class WHERE student_id = tbl_student.id) > 0,
                                (SELECT title FROM tbldm_department WHERE tbldm_department.id = (SELECT department_id
                                FROM tbl_student_class WHERE tbl_student_class.student_id = tbl_student.id
                                AND year_id = $yearid ORDER BY id DESC LIMIT 0, 1)), 'Chưa xếp lớp') AS department
                                FROM tbl_student WHERE $where ORDER BY fullname ASC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_student_point", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_student_point", $data, "id = $id");
        return $query;
    }

    function addObj_change($data){
        $query = $this->insert("tbl_change_point", $data);
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_student_point", "id = $id");
        return $query;
    }

    function dupliObj($studentid, $typepoint, $yearid, $semester, $subjectid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student_point WHERE student_id = $studentid
                                    AND subject_id = $subjectid AND type_point  = $typepoint AND year_id = $yearid
                                    AND semester = $semester");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function check_role_update_point($userid, $yearid, $subjectid, $studentid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_assign_detail WHERE subject_id = $subjectid
                                    AND FIND_IN_SET((SELECT department_id FROM tbl_student_class WHERE tbl_student_class.student_id = $studentid
                                    AND tbl_student_class.year_id = $yearid), department) AND code = (SELECT tbl_assign.code
                                    FROM tbl_assign WHERE tbl_assign.user_id = $userid AND tbl_assign.year_id = $yearid)");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
///////////////////////////////////////////////////////////////////////////////////////////////
    function check_user_is_teacher($userid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id = $userid
                                    AND hr_id IN (SELECT tbl_personel.id FROM tbl_personel WHERE tbl_personel.job_id = (SELECT tbldm_job.id
                                    FROM tbldm_job WHERE tbldm_job.is_teacher = 1 AND tbldm_job.status = 0))");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_department_assign($userid, $yearid){
        $query = $this->db->query("SELECT department FROM tbl_assign_detail WHERE tbl_assign_detail.code = (SELECT tbl_assign.code 
                                    FROM tbl_assign WHERE tbl_assign.user_id = $userid AND tbl_assign.year_id = $yearid)");
        $result = $query->fetchAll();
        if(count($result) > 0){ $arr = [];
            foreach($result as $item){
                $items = explode(",", $item['department']);
                foreach($items as $row){
                    array_push($arr, $row);
                }
            }
            $arr_total = array_filter(array_unique($arr));
            return implode(",", $arr_total);
        }else{
            return '';
        }
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function get_info($id, $yearid){
        $query = $this->db->query("SELECT id, code, fullname, code_csdl, birthday, (SELECT title FROM tbldm_department 
                                    WHERE tbldm_department.id = (SELECT department_id FROM tbl_student_class 
                                    WHERE tbl_student_class.student_id = tbl_student.id AND year_id = $yearid 
                                    ORDER BY id DESC LIMIT 0, 1)) AS department FROM tbl_student WHERE id = $id");
        return $query->fetchAll();
    }

    function get_info_point($studentid, $yearid, $typepoint, $subject, $semester){
        $query = $this->db->query("SELECT * FROM tbl_student_point WHERE student_id = $studentid
                                    AND year_id = $yearid AND type_point = $typepoint AND subject_id = $subject
                                    AND semester = $semester");
        return $query->fetchAll();
    }
//////////////////////////////////////////////////////////////////////////////////////////////
    function check_user_update_point($userid, $subjecid, $departmentid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl");
    }
}
?>