
<title>Trường THCS Long Biên - Quận Long Biên</title>
<link rel="shortcut icon" href="<?php echo URL ?>/styles/images/Logo.png" />
<body onload="print()">
<?php
if(count($_SESSION['code_dep']) != 0){
    foreach($_SESSION['code_dep'] as $row){
        $detail = $this->_Data->return_info_device($row['id']);
        $this->_Convert->generateBarcode_device($data = array('sku'=> $detail[0]['code'].'.'.$row['sub']), 'barcode');
        $title_file = $detail[0]['code'].'_'.$row['sub'];
        for($i = 1; $i <= $row['qty']; $i++){
?>
<div class="item">
    <img src="<?php echo URL.'/qrcode_device/qrcode?data='.base64_encode($detail[0]['code']."-".$row['sub'].'_6') ?>"
    width="200"/>
    <img src="<?php echo URL.'/public/assets/barcode/'.$title_file.'.png' ?>" width="190" height="50"/>
    <span><?php echo $detail[0]['code'].'.'.$row['sub'] ?></span>
    <div>
        <?php
        echo "<img src='".URL."/styles/images/giao_duc.jpg'/>";
        ?>
        <span>
            <i>Trường THCS Long Biên</i>
            <i><?php echo $detail[0]['title'].' - '.$row['sub'] ?></i>
        </span>
    </div>
</div>
<?php
        }
    }
}else{
    echo "Không có bản ghi nào được chọn";
}
?>
<style>
.item{float:left;width:200px;height:350px;overflow:hidden;border:1px solid #ccc;margin-right:3px;margin-bottom:3px;text-align:center}
.item div{float:left;width:100%;overflow:hidden}
.item>span{float:left;width:100%;font-size:14px;padding-top:5px;font-weight:700;letter-spacing:5px;margin-bottom:10px;}
.item div>img{float:left;width:50px}
.item div>span{float:left;width:150px}
.item div>span>i{font-size:12px;float:left;width:100%}
.item div>span>i:nth-child(1){font-weight:bold}
</style>
</body>