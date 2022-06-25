<option value="">Lựa chọn thiết bị</option>
<?php
foreach($this->jsonObj as $row){
?>
<option value="<?php echo $row['device_id'].'.'.$row['sub_device'] ?>"><?php echo $row['title'].' - '.$row['sub_device'] ?></option>
<?php
}
?>