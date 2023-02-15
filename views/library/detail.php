<?php
$jsonObj = $this->jsonObj;
?>
<div class="modal-header no-padding">
    <div class="table-header">
        Thông tin sách
    </div>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-xs-4" style="border-right:1px solid #000">
            <div class="col-xs-12">
                <?php
                if($jsonObj[0]['image'] != ''){
                ?>
                <img src="<?php echo URL.'/public/library/images/'.$jsonObj[0]['image'] ?>"
                class="img-responsive" width="205" height="205"/>
                <?php
                }else{
                ?>
                <img src="<?php echo URL.'/styles/images/noimg.jpg' ?>"
                class="img-responsive" width="205" height="205"/>
                <?php
                }
                ?>
            </div>
            <div class="col-xs-12">
                <label for="form-field-username">
                    <b>Mã sách:</b> <?php echo $jsonObj[0]['code'] ?>
                </label>
            </div>
            <div class="col-xs-12">
                <label for="form-field-username">
                    <b>Nhà xuất bản:</b> <?php echo $jsonObj[0]['manuafactory'] ?>
                </label>
            </div>
            <div class="col-xs-12">
                <label for="form-field-username">
                    <b>Danh mục:</b> <?php echo $jsonObj[0]['category'] ?>
                </label>
            </div>
            <div class="col-xs-12">
                <label for="form-field-username">
                    <b>Số trang:</b> <?php echo $jsonObj[0]['number_page'] ?>
                </label>
            </div>
            <div class="col-xs-12">
                <label for="form-field-username">
                    <b>Tác giả:</b> <?php echo $jsonObj[0]['author'] ?>
                </label>
            </div>
            <div class="col-xs-12">
                <label for="form-field-username">
                    <b>Giá tiền:</b> <?php echo number_format($jsonObj[0]['price']) ?>
                </label>
            </div>
        </div>
        <div class="col-xs-8">
            <div class="col-xs-12">
                <label for="form-field-username">
                    <b>Loại sách:</b> <?php echo ($jsonObj[0]['type'] == 1) ? 'Sách truyền thống' : 'Sách nói, sách điện tử' ?>
                </label>
            </div>
            <div class="col-xs-6">
                <label for="form-field-username">
                    <b>Năm xuất bản:</b> <?php echo $jsonObj[0]['year_publish'] ?>
                </label>
            </div>
            <div class="col-xs-6">
                <label for="form-field-username">
                    <b>Nơi xuất bản:</b> <?php echo $jsonObj[0]['position_publish'] ?>
                </label>
            </div>
            <div class="col-xs-12">
                <label for="form-field-username">
                    <b>Môn / Loại:</b> <?php echo $jsonObj[0]['subject'] ?>
                </label>
            </div>
            <div class="col-xs-12">
                <label for="form-field-username">
                    <b>Tiêu đề:</b> <?php echo $jsonObj[0]['title'] ?>
                </label>
            </div>
            <div class="col-xs-12">
                <label for="form-field-username" style="text-align:justify">
                    <b>Tóm tắt nội dung:</b>
                </label>
                <div style="text-align:justify;max-height:230px;overflow:auto;padding:0 10px 0 0;">
                    <?php echo $jsonObj[0]['content'] ?>
                </div>
            </div>
            <?php
            if($jsonObj[0]['type'] == 2){
            ?>
            <div class="col-xs-12">
                <label for="form-field-username">
                    <b>Tệp dữ liệu:</b> <a href="<?php echo URL.'/public/library/file/'.$jsonObj[0]['cate_id'].'/'.$jsonObj[0]['file'] ?>" target="_blank"><?php echo $jsonObj[0]['file'] ?></a>
                </label>
            </div>
            <?php
            }
            ?>
            <div class="col-xs-12">
                <div class="space-4"></div>
            </div>
            <div class="col-xs-12">
                <label for="form-field-username">
                    <b>Lượt đọc / mượn:</b> 
                    <a href="javascript:void(0)" onclick="detail_read(<?php echo $jsonObj[0]['id'] ?>, '<?php echo $jsonObj[0]['title'] ?>')">
                        <?php echo number_format($jsonObj[0]['total_read']) ?> lần
                    </a>
                </label>
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