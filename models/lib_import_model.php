<?php
class Lib_import_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book_import");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, user_id, date_import, source, notes, create_at,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel 
                                    WHERE tbl_personel.id = (SELECT hr_id FROM  tbl_users WHERE tbl_users.id = user_id))) 
                                    AS fullname, (SELECT COUNT(*) FROM tbl_book_import_detail WHERE tbl_book_import_detail.code = tbl_book_import.code)
                                    AS total_book, (SELECT SUM(quanlity) FROM tbl_book_import_detail WHERE tbl_book_import_detail.code = tbl_book_import.code)
                                    AS total_qty FROM tbl_book_import ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_book($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book WHERE title LIKE '%$q%'
                                OR author LIKE '%$q%'");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title FROM tbl_book WHERE title LIKE '%$q%'
                                OR author LIKE '%$q%' ORDER BY title ASC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_book_import", $data);
        return $query;
    }

    function addObj_detail($data){
        $query = $this->insert("tbl_book_import_detail", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_book_import", $data, "id  = $id");
        return $query;
    }

    function delObj_detail($code){
        $query = $this->delete("tbl_book_import_detail", "code = $code");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_book_import", "id = $id");
        return $query;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function get_info($id){
        $query = $this->db->query("SELECT id, code, user_id, date_import, source, notes, create_at,
                                    IF(user_id = 1, 'Administrator', (SELECT fullname FROM tbl_personel 
                                    WHERE tbl_personel.id = (SELECT hr_id FROM tbl_users WHERE tbl_users.id = user_id))) 
                                    AS fullname FROM tbl_book_import WHERE id = $id");
        return $query->fetchAll();
    }
}
?>