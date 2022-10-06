<?php $item = $this->jsonObj; ?>
<div class="col-xs-12">
    <div class="form-group">
        <label for="form-field-username">
            Mã học sinh: <?php echo $item[0]['code'] ?>
        </label>
    </div>
</div>
<div class="col-xs-12">
    <div class="form-group">
        <label for="form-field-username">
            Họ và tên: <?php echo $item[0]['fullname'] ?>
        </label>
    </div>
</div>
<div class="col-xs-12">
    <div class="form-group">
        <label for="form-field-username">
            Ngày sinh: <?php echo date("d-m-Y", strtotime($item[0]['birthday']))?>
        </label>
    </div>
</div>
<div class="col-xs-12">
    <div class="form-group">
        <label for="form-field-username">
            Lớp học: <?php echo $item[0]['department'] ?>
        </label>
    </div>
</div>
<div class="col-xs-12">
    <div class="form-group">
        <label for="form-field-username">
            Năm học: <?php echo $this->_Year[0]['title'] ?>
        </label>
    </div>
</div>
<div class="col-xs-12">
    <div class="form-group">
        <label for="form-field-username">
            Học kỳ: <?php echo $_REQUEST['seme'] ?>
        </label>
    </div>
</div>
<div class="col-xs-12">
    <div class="form-group">
        <label for="form-field-username">
            Môn học: <?php echo $this->_Data->return_title_subject($_REQUEST['subject']) ?>
        </label>
    </div>
</div>