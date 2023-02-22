<?php
$item = $this->jsonObj;
?>
<div class="modal-header no-padding">
    <div class="table-header">
        Chi tiết phiếu mượn - trả sách
    </div>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Mã phiếu:</b> <?php echo $item[0]['code'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Người lập:</b> <?php echo $item[0]['nguoi_tao'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Ngày lập:</b> <?php echo date("H:i:s d-m-Y", strtotime($item[0]['create_at'])) ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Người mượn:</b> <?php echo ($item[0]['user_id'] != 0) ? $item[0]['nguoi_muon'] : $item[0]['hoc_sinh'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Ngày mượn:</b> <?php echo date("H:i:s d-m-Y", strtotime($item[0]['date_loan'])) ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <?php
                    if($item[0]['status'] == 0){
                    ?>
                    <b>Ngày trả dự kiến:</b> <?php echo date("d-m-Y", strtotime($item[0]['date_return'])) ?>
                    <?php
                    }else{
                    ?>
                    <b>Ngày trả:</b> <?php echo date("H:i:s d-m-Y", strtotime($item[0]['date_return'])) ?>
                    <?php
                    }
                    ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Thông tin sách mượn:</b> <?php echo $item[0]['sach'].' - Quyển số: '.$item[0]['sub_book'] ?>
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