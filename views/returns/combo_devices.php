<option value="">Lựa chọn thiết bị</option>
<?php
$jsonObj = $this->jsonObj; 
foreach($jsonObj as $row){
    $id = $row['device_id'].'.'.$row['sub_device'];
    $code = $row['code_dv'].'.'.$row['sub_device'];
    $selected = (isset($_REQUEST['id']) && $_REQUEST['id'] == $id) ? 'selected=""' : '';
?>
<option value="<?php echo $id ?>" <?php echo $selected ?>><?php echo $row['title'].'-'.$row['sub_device'] ?></option>
<?php
}
?>