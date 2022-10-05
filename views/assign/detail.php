<?php
$item = $this->jsonObj; $subject = explode(",", $item[0]['subject']); $department = explode(",", $item[0]['department']);
foreach($subject as $row_subject){
    $array_subject[] = $this->_Data->return_title_subject($row_subject);
}
foreach($department as $row_dep){
    $array_dep[] = $this->_Data->return_title_department($row_dep);
}
?>
<div class="modal-header no-padding">
    <div class="table-header">
        Thông tin chi tiết phân công giáo viên
    </div>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Mã hệ thống:</b> <?php echo $item[0]['code'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Họ và tên giáo viên:</b> <?php echo $item[0]['fullname'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Được phân công dạy môn:</b> <?php echo implode("; ", $array_subject) ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Tại các lớp:</b> <?php echo implode("; ", $array_dep) ?>
                </label>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Trong năm học:</b> <?php echo $item[0]['namhoc'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Cập nhật lần cuối:</b> <?php echo date("H:i:s d-m-Y", strtotime($item[0]['create_at'])) ?>
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