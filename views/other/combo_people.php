<option value="">Lựa chọn tỉnh/thành phố</option>
<?php
$jsonObj = $this->jsonObj;
foreach($jsonObj as $row){
    $selected = (isset($_REQUEST['id']) && $_REQUEST['id'] == $row['id']) ? 'selected=""' : '';
?>
<option value="<?php echo $row['id'] ?>" <?php echo $selected ?>><?php echo $row['title'] ?></option>
<?php
}
?>