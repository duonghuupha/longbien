<?php
$item = $this->jsonObj;
if($item['success']){
    if($item['type'] == 1){ // thong tin giao vieen
        echo "
        <b>Họ và tên:</b> ".$item['fullname']."<br/>
        <b>Nhiệm vụ:</b> ".$item['job']."
        ";
    }else{ // thong tin hoc sinh
        echo "
        <b>Họ và tên:</b> ".$item['fullname']."<br/>
        <b>Lớp:</b> ".$item['department']."
        ";
    }
}else{
    echo "<b><i>".$item['msg']."</i></b>";
}
?>