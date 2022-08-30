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
                <img src="<?php echo URL.'/public/library/images/'.$jsonObj[0]['image'] ?>"
                class="img-responsive" width="205" height="205"/>
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
        </div>
        <div class="col-xs-8">
            <div class="col-xs-12">
                <label for="form-field-username">
                    <b>Tiêu đề:</b> <?php echo $jsonObj[0]['title'] ?>
                </label>
            </div>
            <div class="col-xs-12">
                <label for="form-field-username" style="text-align:justify">
                    <b>Tóm tắt nội dung:</b> <?php echo $jsonObj[0]['content'] ?>
                </label>
            </div>
            <div class="col-xs-12">
                <label for="form-field-username">
                    <b>Loại sách:</b> <?php echo ($jsonObj[0]['type'] == 1) ? 'Sách truyền thống' : 'Sách nói, sách điện tử' ?>
                </label>
            </div>
            <?php
            if($jsonObj[0]['type'] == 2){
                $ext = explode(".", $jsonObj[0]['file']); $extension = end($ext);
                if($extension == 'pdf' || $extension == 'PDF'){
            ?>
            <div class="col-sm-12">
                <iframe
                    src="<?php echo URL.'/public/library/file/'.$jsonObj[0]['cate_id'].'/'.$jsonObj[0]['file'] ?>"
                    frameBorder="0"
                    scrolling="auto"
                    height="300px"
                    width="100%"
                ></iframe>
            </div>
            <?php
                }else{
            ?>
            <div class="col-xs-12">
                <label for="form-field-username">
                    <b>Tệp dữ liệu:</b> <a href="<?php echo URL.'/public/library/file/'.$jsonObj[0]['cate_id'].'/'.$jsonObj[0]['file'] ?>" target="_blank"><?php echo $jsonObj[0]['file'] ?></a>
                </label>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
        <i class="ace-icon fa fa-times"></i>
        Đóng
    </button>
</div>