<?php
class Student_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($type, $userid, $q, $code, $codecsdl, $name, $date, $class, $address, $gender, $people, $religion, $yearid, $status, $offset, $rows){
        $result = array();
        if($status == 0){
            $where = "status != 99";
        }else{
            $where = "status = $status";
        }
        if($type == 0){
            $where = $where;
        }else{
            $string = $this->get_department_assign($userid, $yearid);
            if($string != ''){
                $where = $where." AND id IN (SELECT tbl_student_class.student_id FROM tbl_student_class 
                        WHERE tbl_student_class.year_id = $yearid AND FIND_IN_SET(tbl_student_class.department_id, 
                        '$string'))";
            }else{
                $where = $where;
            }
        }
        if($q != '')
            $where = $where." AND fullname LIKE '%$q%'";
        if($code != '')
            $where = $where." AND code LIKE '%$code%'";
        if($codecsdl != '')
            $where = $where." AND code_csdl LIKE '%$codecsdl%'";
        if($name != '')
            $where = $where." AND fullname LIKE '%$name%'";
        if($date != '')
            $where = $where." AND birthday = '$date'";
        if($class != '')
            $where = $where." AND id IN (SELECT student_id FROM tbl_student_class WHERE year_id = $yearid AND department_id = $class)";
        if($address != '')
            $where = $where." AND address LIKE '%$address%'";
        if($gender != 0)
            $where = $where." AND gender = $gender";
        if($people != '')
            $where = $where." AND people_id = $people";
        if($religion != 0)
            $where = $where." AND religion = $religion";
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE $where");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, code_csdl, fullname, gender, birthday, status, image, address, people_id, religion,
                                IF((SELECT COUNT(*) FROM tbl_student_class WHERE student_id = tbl_student.id) > 0,
                                (SELECT title FROM tbldm_department WHERE tbldm_department.id = (SELECT department_id
                                FROM tbl_student_class WHERE tbl_student_class.student_id = tbl_student.id
                                AND year_id = $yearid ORDER BY id DESC LIMIT 0, 1)), 'Chưa xếp lớp') AS department,
                                (SELECT tbldm_people.title FROM tbldm_people WHERE tbldm_people.id = people_id) AS people_text
                                FROM tbl_student WHERE $where ORDER BY fullname ASC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function dupliObj($id, $code){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE code = $code");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE code = $code
                                        AND id != $id");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function dupliObj_csdl($id, $code){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE code_csdl = '$code'");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE code_csdl = '$code'
                                        AND id != $id");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function addObj($data){
        $query = $this->insert("tbl_student", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_student", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_student", "id = $id");
        return $query;
    }

    function addObj_detail($data){
        $query = $this->insert("tbl_student_relation", $data);
        return $query;
    }

    function delObj_detail($code){
        $query = $this->delete("tbl_student_relation", "code = $code");
        return $query;
    }
//////////////////////////////////////////////////////////////////////////////////////////////
    function addObj_student_change_class($data){
        $query = $this->insert("tbl_student_class", $data);
        return $query;
    }

    function get_info($id){
        $query = $this->db->query("SELECT id, code, code_csdl, fullname, gender, birthday, people_id, religion,
                                 address, image, status, (SELECT title FROM tbldm_people 
                                 WHERE tbldm_people.id = people_id) AS people FROM tbl_student WHERE id = $id");
        return $query->fetchAll();
    }

    function get_detail($id, $yearid){
        $query = $this->db->query("SELECT id, code, code_csdl, fullname, gender, birthday, people_id, religion,
                                 address, image, status, (SELECT title FROM tbldm_people 
                                 WHERE tbldm_people.id = people_id) AS people, (SELECT title FROM tbldm_department
                                 WHERE tbldm_department.id = (SELECT department_id FROM tbl_student_class
                                 WHERE student_id = tbl_student.id AND year_id = $yearid)) AS department 
                                 FROM tbl_student WHERE id = $id");
        return $query->fetchAll();
    }

    function get_student_relation($code){
        $query = $this->db->query("SELECT relation, fullname, year, phone, job FROM tbl_student_relation
                                    WHERE code = $code");
        return $query->fetchAll();
    }

    function getFetObj_tmp($userid, $q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE status = 99 AND fullname LIKE '%$q%'
                                    AND user_id = $userid");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, code_csdl, fullname, gender, birthday, status, image, address, people_id, religion,
                                (SELECT title FROM tbldm_department WHERE tbldm_department.id = dep_temp) AS department
                                FROM tbl_student WHERE status = 99 AND fullname LIKE '%$q%' AND user_id = $userid 
                                ORDER BY fullname ASC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function delObj_tmp($userid){
        $query = $this->delete("tbl_student", "status = 99 AND user_id = $userid");
        return $query;
    }

    function check_dupli_code(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student GROUP BY code HAVING Total > 1");
        $row = $query->fetchAll();
        return count($row);
    }

    function check_dupli_code_csdl(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student GROUP BY code_csdl HAVING Total > 1");
        $row = $query->fetchAll();
        return count($row);
    }

    function get_all_tmp(){
        $query = $this->db->query("SELECT * FROM tbl_student WHERE status = 99");
        return $query->fetchAll();
    }

    function get_student_via_id($array){
        $query = $this->db->query("SELECT id, code, image, fullname, birthday, gender FROM tbl_student
                                    WHERE FIND_IN_SET(id, '$array')");
        return $query->fetchAll();
    }

    function ger_id_student_via_code($code){
        $query = $this->db->query("SELECT id FROM tbl_student WHERE code = $code");
        $row = $query->fetchAll();
        return $row[0]["id"];
    }

    function check_exit_record_tmp(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_student WHERE status = 99");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function check_year_active($id){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbldm_years WHERE id = $id AND active = 1");
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
//////////////////////////////////////////////////////////////////////////////////////////////////
    function get_change_class_of_student($id){
        $query = $this->db->query("SELECT id, student_id, year_id_from, department_id_from, year_id_to,
                                    department_id_to, create_at,  content FROM tbl_change_class WHERE student_id = $id
                                    ORDER BY id DESC");
        return $query->fetchAll();
    }

    function get_up_class_of_student($id){
        $query = $this->db->query("SELECT id, student_id, year_id, department_id, create_at FROM tbl_student_class
                                    WHERE student_id = $id ORDER BY id DESC");
        return $query->fetchAll();
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
}
?>