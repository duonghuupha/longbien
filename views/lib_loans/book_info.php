<?php
$item = $this->jsonObj;
if($item['success']){
    echo "
    <b>Tiêu đề:</b> ".$item['title']."<br/>
    <b>Quyển số:</b> ".$item['sub_book']."<br/>
    <b>Danh mục:</b> ".$item['cate']."<br/>
    <b>NXB:</b> ".$item['manu']."<br/>
    ";
}else{
    echo "<b><i>".$item['msg']."</i></b>";
}
?>