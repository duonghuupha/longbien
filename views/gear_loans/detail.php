<?php
$item = $this->jsonObj;
?>
<div class="modal-header no-padding">
    <div class="table-header">
        Chi tiết phiếu mượn - trả đồ dùng
    </div>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-xs-4">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Mã phiếu:</b> <?php echo $item[0]['code'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Người lập:</b> <?php echo $item[0]['create_name'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Ngày lập:</b> <?php echo date("H:i:s d-m-Y", strtotime($item[0]['create_at'])) ?>
                </label>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Người mượn:</b> <?php echo $item[0]['fullname'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Ngày mượn:</b> <?php echo date("d-m-Y", strtotime($item[0]['date_loan'])) ?>
                </label>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Ngày trả dự kiến:</b> <?php echo date("d-m-Y", strtotime($item[0]['date_return'])) ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Nội dung:</b> <?php echo $item[0]['content'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <table 
            id="dynamic-table" 
            class="table table-striped table-bordered table-hover dataTable no-footer" 
            role="grid"
            aria-describedby="dynamic-table_info">
                <thead>
                    <tr role="row">
                        <th class="text-center" style="width:20px">#</th>
                        <th class="text-center" style="width:80px">Mã</th>
                        <th class="">Tên trang thiết bị</th>
                        <th class="text-center">Số phụ</th>
                        <th class="text-center">Ngày trả</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i= 0;
                    foreach($this->detail as $row){
                        $i++;
                    ?>
                    <tr>
                        <td class="text-center"><?php $i ?></td>
                        <td class="text-center"><?php echo $row['code_utensils'] ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td class="text-center"><?php echo $row['sub_utensils'] ?></td>
                        <td class="text-center">
                            <?php
                            if($row['status'] == 1){
                                echo date("d-m-Y", strtotime($row['date_return']));
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
        <i class="ace-icon fa fa-times"></i>
        Đóng
    </button>
</div>