<option value="">Lựa chọn môn học</option>
<?php
$jsonObj = $this->jsonObj;
foreach($jsonObj as $row){
    $selected = (isset($_REQUEST['id']) && $_REQUEST['id'] == $row['id']) ? 'selected="selected"' : '';
?>
<option value="<?php echo $row['id'] ?>" <?php echo $selected ?>><?php echo $row['title'] ?></option>
<?php
}
?>