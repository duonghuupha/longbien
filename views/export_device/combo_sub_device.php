<option value="">Lựa chọn thiết bị con</option>
<?php
if($_REQUEST['id'] != 0){
    $sql = new Model(); $jsonObj = $this->jsonObj;
    for($i = 1; $i <= $jsonObj[0]['stock']; $i++){
        $disabled = ($sql->check_exit_sub_device($jsonObj[0]['id'], $i) > 0 || $sql->check_exit_sub_device_loans($jsonObj[0]['id'], $i) > 0) ? 'disabled=""' : '';
    ?>
    <option value="<?php echo $jsonObj[0]['id'].'.'.$i ?>" <?php echo $disabled ?>><?php echo $jsonObj[0]['title'].' - '.$i ?></option>
    <?php
    }
}
?>
