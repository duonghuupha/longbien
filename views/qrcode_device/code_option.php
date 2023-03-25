
<title>Trường THCS Long Biên - Quận Long Biên</title>
<link rel="shortcut icon" href="<?php echo URL ?>/styles/images/Logo.png" />
<body>
<?php
function return_array($array, $type){
    if($type == 1){
        return explode(",", $array);
    }else{
        return explode("-", $array);
    }
}
if(count($_SESSION['code_option']) != 0){
    foreach($_SESSION['code_option'] as $row){
        $selected = return_array($row['selected'], $row['type']);
        if($row['type'] == 1){ // in theo ma nhap vao
            for($i = 0; $i < count($selected); $i++){
                $this->_Convert->generateBarcode_device($data = array('sku'=> $row['code'].'.'.$selected[$i]), 'barcode');
                $title_file = $row['code'].'_'.$selected[$i];
?>
<div class="item">
    <img src="<?php echo URL.'/qrcode_device/qrcode?data='.base64_encode($row['code']."-".$selected[$i].'_6') ?>"
    width="200"/>
    <img src="<?php echo URL.'/public/assets/barcode/'.$title_file.'.png' ?>" width="190" height="50"/>
    <span><?php echo $row['code'].'.'.$selected[$i] ?></span>
    <div>
        <?php
        echo "<img src='".URL."/styles/images/giao_duc.jpg'/>";
        ?>
        <span>
            <i>Trường THCS Long Biên</i>
            <i><?php echo $row['title'].' - '.$selected[$i] ?></i>
        </span>
    </div>
</div>
<?php
            }
        }else{ // in tu ma den ma
            for($i = $selected[0]; $i <= $selected[1]; $i++){
                $this->_Convert->generateBarcode_device($data = array('sku'=> $row['code'].'.'.$i), 'barcode');
                $title_file = $row['code'].'_'.$i;
?>
<div class="item">
    <img src="<?php echo URL.'/qrcode_device/qrcode?data='.base64_encode($row['code']."-".$i.'_6') ?>"
    width="200"/>
    <img src="<?php echo URL.'/public/assets/barcode/'.$title_file.'.png' ?>" width="190" height="50"/>
    <span><?php echo $row['code'].'.'.$i ?></span>
    <div>
        <?php
        echo "<img src='".URL."/styles/images/giao_duc.jpg'/>";
        ?>
        <span>
            <i>Trường THCS Long Biên</i>
            <i><?php echo $row['title'].' - '.$i ?></i>
        </span>
    </div>
</div>
<?php
            }
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