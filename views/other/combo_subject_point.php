<option value="">Lựa chọn môn học</option>
<?php
$jsonObj = $this->jsonObj;
foreach($jsonObj as $row){
?>
<option value="<?php echo $row['id'] ?>"><?php echo $row['title'] ?></option>
<?php
}
?>