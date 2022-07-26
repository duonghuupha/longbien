<?php
class  Library_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book WHERE status = 0");
        $row= $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title, image, type, author, cate_id, manu_id, content,
                                    number_page, type, file, stock, create_at, user_id, (SELECT tbldm_book.title
                                    FROM tbldm_book WHERE tbldm_book.id = cate_id) AS category, (SELECT tbldm_book_manu.title
                                    FROM tbldm_book_manu WHERE tbldm_book_manu.id = manu_id) AS manufactory FROM tbl_book WHERE status = 0
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total']= $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function dupliObj($id, $code){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book WHERE code = $code AND status = 0");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_book WHERE code = $code AND status = 0
                                        AND id != $id");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function addObj($data){
        $query = $this->insert("tbl_book", $data);
        return  $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_book", $data, "id = $id");
        return $query;
    }

    function get_info($id){
        $query = $this->db->query("SELECT id, code, cate_id, manu_id, title, content, number_page, author,
                                    image, type, file, status, stock FROM tbl_book WHERE id =  $id");
        return $query->fetchAll();
    }
}
?>