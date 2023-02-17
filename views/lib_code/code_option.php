<title>Trường THCS Long Biên - Quận Long Biên</title>
<body onload="print()">
<?php
$json = $_REQUEST['data']; $json = base64_decode($json); $json = json_decode($json, true);
foreach($json as $row){
    $detail = $this->_Data->get_info_book_pass_id($row['id']);
    foreach(explode(",", $row['selected']) as $item){
        $this->_Convert->generateBarcode_book($data = array('sku'=> $detail[0]['code'].'.'.$item), 'book');
        $title_file = $detail[0]['code'].'_'.$item;
?>
<div class="item">
    <img src="<?php echo URL.'/lib_code/qrcode?data='.base64_encode($detail[0]['code']."-".$item.'_5') ?>" width="200"/>
    <img src="<?php echo URL.'/public/barcode/book/'.$title_file.'.png' ?>" width="190" height="50"/>
    <span><?php echo $detail[0]['code'].'.'.$item ?></span>
    <div>
        <span>
            <i>Trường THCS Long Biên</i>
            <i><?php echo $detail[0]['title'].' - '.$item ?></i>
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