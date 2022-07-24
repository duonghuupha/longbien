<?php
$jsonObj = $this->jsonObj;
if($jsonObj[0]['user_share'] != ''){
    $user = explode(",", $jsonObj[0]['user_share']);
    foreach($user as $row){
        $array[] = $this->_Data->get_fullname_users($row);
    }
    $usershare = implode(", ", $array);
}else{
    $usershare = '';
}
?>
<div class="modal-header no-padding">
    <div class="table-header">
        Chi tiết văn bản đi
    </div>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-xs-4">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="form-field-username">
                        <b>Mã văn bản:</b> <?php echo $jsonObj[0]['code'] ?>
                    </label>
                </div>
                <div class="form-group">
                    <label for="form-field-username">
                        <b>Danh mục:</b> <?php echo $jsonObj[0]['category'] ?>
                    </label>
                </div>
                <div class="form-group">
                    <label for="form-field-username">
                        <b>Số văn bản:</b> <?php echo $jsonObj[0]['number_dc'] ?>
                    </label>
                </div>
                <div class="form-group">
                    <label for="form-field-username">
                        <b>Ngày văn bản:</b> <?php echo date("d-m-Y", strtotime($jsonObj[0]['date_dc'])) ?>
                    </label>
                </div>
                <div class="form-group">
                    <label for="form-field-username">
                        <b>Nơi đến:</b> <?php echo $jsonObj[0]['location_to'] ?>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-xs-8" style="border-left:1px solid #000">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="form-field-username">
                        <b>Tiêu đề:</b> <?php echo $jsonObj[0]['title'] ?>
                    </label>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="form-field-username">
                        <b>Trích yếu:</b> <?php echo $jsonObj[0]['content'] ?>
                    </label>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="form-field-username">
                        <b>Tệp văn bản:</b> 
                        <a href="<?php echo URL.'/public/document_out/'.$jsonObj[0]['cate_id'].'/'.$jsonObj[0]['file'] ?>"
                        target="_blank"><?php echo $jsonObj[0]['file'] ?></a>
                    </label>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="form-field-username">
                        <b>Chia sẻ:</b> <?php echo $usershare ?>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
        <i class="ace-icon fa fa-times"></i>
        Đóng
    </button>
</div>