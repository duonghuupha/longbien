<title>Trường THCS Long Biên - Quận Long Biên</title>
<body onload="print()">
<?php
$jsonObj = $this->jsonObj;
foreach($jsonObj as $row){
    for($z = 1; $z <= $row['stock']; $z++){
        $this->_Convert->generateBarcode_book($data = array('sku'=> $row['code'].'.'.$z), 'book');
        $title_file = $row['code'].'_'.$z;
?>
<div class="item">
    <img src="<?php echo URL.'/lib_code/qrcode?data='.base64_encode($row['code']."-".$z.'_5') ?>" width="200"/>
    <img src="<?php echo URL.'/public/barcode/book/'.$title_file.'.png' ?>" width="190" height="50"/>
    <span><?php echo $row['code'].'.'.$z ?></span>
    <div>
        <span>
            <i>Trường THCS Long Biên</i>
            <i><?php echo $row['title'].' - '.$z ?></i>
        </span>
    </div>
</div>
<?php
    }
}
?>
<style>
.item{float:left;width:200px;height:350px;overflow:hidden;border:1px solid #ccc;margin-right:3px;margin-bottom:3px;text-align:center}
.item div{float:left;width:100%;overflow:hidden}
.item>span{float:left;width:100%;font-size:14px;padding-top:5px;font-weight:700;letter-spacing:5px;margin-bottom:10px;}
.item div>span{float:left;width:100%}
.item div>span>i{font-size:12px;float:left;width:100%}
.item div>span>i:nth-child(1){font-weight:bold}
</style>
</body>