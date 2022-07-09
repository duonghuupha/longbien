<option value="">Lựa chọn thiết bị</option>
<?php
$jsonObj = $this->jsonObj;
foreach($jsonObj as $row){
?>
<option value="<?php echo $row['physical_id']?>"><?php echo $row['physical'].' - '.$row['title'] ?></option>
<?php
}
?>