<?php
class Calendars_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){

    }

    function addObj($data){
        $query = $this->insert("tbl_schedule", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_schedule", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_schedule", "id = $id");
        return $query;
    }

    function dupliObj($id, $userid, $lesson, $lessonmain, $subjectid, $departmentid, $date_study){
        return false;
    }
///////////////////////////////////////////////////////////////////////////////////
}
?>