<?php
$item = $this->jsonObj;
?>
<div class="modal-header no-padding">
    <div class="table-header">
        Thông tin trang thiết bị
    </div>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                <div class="text-center">
                    <?php
                    if($item[0]['image'] == ''){
                    ?>
                    <img src="<?php echo URL.'/styles/images/noimg.jpg' ?>" alt="" 
                    width="150" height="150" style="border:2px solid #ccc;border-radius:5px;"/>
                    <?php
                    }else{
                    ?>
                    <img src="<?php echo URL.'/public/assets/'.$item[0]['image'] ?>" alt="" 
                    width="150" height="150" style="border:2px solid #ccc;border-radius:5px;"/>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Mã thiết bị:</b> <?php echo $item[0]['code'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Tiêu đề:</b> <?php echo $item[0]['title'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Danh mục:</b> <?php echo ($item[0]['cate_id'] == 0) ? "Tài sản cố định" : $item[0]['category'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Xuất sứ:</b> <?php echo $item[0]['origin'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Nguyên giá:</b> <?php echo number_format($item[0]['price']) ?>
                </label>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Khấu hao (%):</b> <?php echo $item[0]['depreciation'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Năm đưa vào sử dụng:</b> <?php echo $item[0]['year_work'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Mô tả / Thông số kỹ thuật:</b> <?php echo $item[0]['description'] ?>
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