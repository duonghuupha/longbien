<title>Trường THCS Long Biên - Quận Long Biên</title>
<body onload="print()">
<?php
$data = base64_decode($_REQUEST['data']); $data = explode(",", $data);
$sql = new Model(); $convert = new Convert();
foreach($data as $row){
    $value = explode(".", $row); $detail = $sql->return_info_device($value[0]);
    for($i = 1; $i <= $detail[0]['stock']; $i++){
        $convert->generateBarcode_device($data = array('sku'=> $detail[0]['code'].'.'.$i), 'barcode');
        $title_file = $detail[0]['code'].'_'.$i;
?>
<div class="item">
    <img src="<?php echo URL.'/public/assets/barcode/'.$title_file.'.png' ?>" width="190" height="50"/>
    <span><?php echo $detail[0]['code'].'.'.$i ?></span>
    <div>
        <?php
        echo "<img src='".URL."/styles/images/giao_duc.jpg'/>";
        ?>
        <span>
            <i>Trường THCS Long Biên</i>
            <i><?php echo $detail[0]['title'].' - '.$i ?></i>
        </span>
    </div>
</div>
<?php
    }
}
?>
<style>
.item{float:left;width:200px;height:135px;overflow:hidden;border:1px solid #ccc;margin-right:3px;margin-bottom:3px;text-align:center;padding:3px;}
.item>span{float:left;width:100%;font-size:14px;padding-top:5px;font-weight:700;letter-spacing:5px}
.item>div{float:left;width:100%;margin-top:10px;}
.item>div img{float:left;width:50px}
.item>div span{float:left;width:150px;font-size:12px;overflow:hidden}
.item>div span i{float:left;width:100%;line-height:1.5em}
</style>
</body>