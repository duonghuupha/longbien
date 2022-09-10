<?php
$item = $this->jsonObj;
?>
<div class="row">
    <div class="col-xs-6">
        <div class="form-group">
            <label for="form-field-username">
                <b>Mã báo giảng:</b> <?php echo $item[0]['code'] ?>
            </label>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label for="form-field-username">
                <b>Giáo viên:</b> <?php echo $item[0]['fullname'] ?>
            </label>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label for="form-field-username">
                <b>Ngày học:</b> <?php echo $item[0]['date_study'] ?>
            </label>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label for="form-field-username">
                <b>Tiết thứ:</b> <?php echo $item[0]['lesson'] ?>
            </label>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label for="form-field-username">
                <b>Môn học:</b> <?php echo $item[0]['subject'] ?>
            </label>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label for="form-field-username">
                <b>Lớp học:</b> <?php echo $item[0]['department'] ?>
            </label>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label for="form-field-username">
                <b>Tiết học theo PP chương trình:</b> <?php echo $item[0]['lesson_export'] ?>
            </label>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <label for="form-field-username">
                <b>Đầu bài dạy:</b> <?php echo $item[0]['title'] ?>
            </label>
        </div>
    </div>
    </div>