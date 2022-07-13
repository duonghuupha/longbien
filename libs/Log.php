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
                        "imp" => "Nhập  dữ liệu từ file");
        return $array[$type];
    }
}
?>