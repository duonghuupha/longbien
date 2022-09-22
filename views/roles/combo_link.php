<option value="">Lựa chọn đường dẫn</option>
<option value="#">#</option>
<?php
$path = DIR_BASIC.'/controllers';
$files = array_diff(scandir($path), array(".", ".."));
foreach($files as $row){
    $link = explode(".", $row);
    echo "<option value='".$link[0]."'>".$link[0]."</option>";
}
?>