<?php
class Student_point_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetOb($offset, $rows){

    }

    function addObj($data){
        $query = $this->insert("tbl_student_point", $data);
        return $query;
    }

    function updateObj($id, $data){

    }

    function delObj($id){
        $query = $this->delete("tbl_student_point", "id = $id");
        return $query;
    }
}
?>