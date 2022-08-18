<?php
class Log{
    /**
     * Luu du lieu lich tsu thao tac
     */
    function save_log($time, $userid, $type){
        $myfile = 'h_log.txt';
        // kiem tra ton tai file log
        if(!file_exists('./'.$myfile)){
            $myfile = fopen('./'.$myfile, "w");
        }else{
            $myfile = fopen('./'.$myfile, "a");
        }
        $txt = $time.'/'.$userid.'/'.$this->render_action($type).'/'.$_REQUEST['url']."\n";
        fwrite($myfile, $txt);
        fclose($myfile);
    }

    function render_action($type){
        $array = array("add" => "Thêm mới dữ liệu", "edit" => "Cập nhật dữ liệu", "del" => "Xóa dữ liệu",
                        "imp" => "Nhập  dữ liệu từ file", "copy" => "Copy dữ liệu");
        return $array[$type];
    }

    function save_notify($userread, $title, $link, $userid){
        $sql = new Model();
        $data = array("user_id" => $userid, "user_read" => $userread, "readed" => "",
                        "title" => $title, "link" => $link, "create_at" => date("Y-m-d H:i:s"));
        $sql->insert("tbl_notify", $data);
    }
}
?>