<title>Trường THCS Long Biên - Quận Long Biên</title>
<body onload="print()">
<?php
if(count($_SESSION['code_gear']) != 0){
    foreach($_SESSION['code_gear'] as $row){
        $detail = $this->_Data->return_info_utensils($row['id']);
        if($row['sub'] == 0){
            for($z = 1; $z <= $detail[0]['stock']; $z++){
                $this->_Convert->generateBarcode_book($data = array('sku'=> $detail[0]['code'].'.'.$z), 'utensils');
                $title_file = $detail[0]['code'].'_'.$z;
                for($i = 1; $i <= $row['qty']; $i++){
?>
<div class="item">
    <img src="<?php echo URL.'/gear_code/qrcode?data='.base64_encode($detail[0]['code']."-".$z.'_7') ?>" width="200"/>
    <img src="<?php echo URL.'/public/barcode/utensils/'.$title_file.'.png' ?>" width="190" height="50"/>
    <span><?php echo $detail[0]['code'].'.'.$z ?></span>
    <div>
        <span>
            <i>Trường THCS Long Biên</i>
            <i><?php echo $detail[0]['title'].' - '.$z ?></i>
        </span>
    </div>
</div>
<?php
                }
            }
        }else{
            $this->_Convert->generateBarcode_book($data = array('sku'=> $detail[0]['code'].'.'.$row['sub']), 'utensils');
            $title_file = $detail[0]['code'].'_'.$row['sub'];
            for($i = 1; $i <= $row['qty']; $i++){
?>
<div class="item">
    <img src="<?php echo URL.'/gear_code/qrcode?data='.base64_encode($detail[0]['code']."-".$row['sub']).'&size=200x200' ?>"/>
    <img src="<?php echo URL.'/public/barcode/utensils/'.$title_file.'.png' ?>" width="190" height="50"/>
    <span><?php echo $detail[0]['code'].'.'.$row['sub'] ?></span>
    <div>
        <span>
            <i>Trường THCS Long Biên</i>
            <i><?php echo $detail[0]['title'].' - '.$row['sub'] ?></i>
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
.item div>span{float:left;width:100%}
.item div>span>i{font-size:12px;float:left;width:100%}
.item div>span>i:nth-child(1){font-weight:bold}
</style>
</body>