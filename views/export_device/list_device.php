<?php
$sql = new Model(); $data = base64_decode($_REQUEST['data']);
?>
<input id="datadc" name="datadc" type="hidden" value="<?php echo $data ?>"/>
<ul>
<?php
if($data != ''){
    $data = explode(",", $data);
    foreach($data as $item){
        $value = explode(".", $item);

?>
    <li id="tb_<?php echo $value[0].'_'.$value[1] ?>">
        <?php echo $sql->return_title_device($value[0]).' - '.$value[1] ?>
        <?php
        if($sql->check_exit_sub_device($value[0], $value[1]) == 0){
        ?>
        |
        <a href="javascript:void(0)" onclick="del_device_selected('<?php echo $item ?>')" style="color:red" title="Xóa">
            <i class="fa fa-trash"></i>
        </a>
        <?php  
        }
        ?>
    </li> 
<?php
    }
}
?>
</ul>