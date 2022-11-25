<?php
$item = $this->jsonObj;
?>
<div class="modal-header no-padding">
    <div class="table-header">
        Chi tiết biên bản sửa chữa - nâng cấp
    </div>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Mã phiếu:</b> <?php echo $item[0]['code'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Ngày thực hiện:</b> <?php echo $item[0]['date_repair'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Đơn vị thực hiện:</b> <?php echo $item[0]['agency'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>File biên bản:</b> 
                    <a href="<?php echo URL.'/public/assets/repair/'.$item[0]['file_bb'] ?>" target="_blank">
                        <?php echo $item[0]['file_bb'] ?>
                    </a>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Danh sách trang thiết bị sửa chữa - nâng cấp:</b>
                </label>
                <div>
                    <table 
                    id="dynamic-table" 
                    class="table table-striped table-bordered table-hover dataTable no-footer" 
                    role="grid"
                    aria-describedby="dynamic-table_info">
                        <thead>
                            <tr role="row">
                                <th class="text-center" style="width:20px">#</th>
                                <th class="text-center">Mã thiết bị</th>
                                <th class="text-center">Số con</th>
                                <th class="">Tên trang thiết bị</th>
                                <th class="text-left">Nội dung lỗi</th>
                                <th class="text-left">Nội dung khắc phục</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach($this->detail as $row){
                                $i++;
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $i ?></td>
                                <td class="text-center"><?php echo $row['code_d'] ?></td>
                                <td class="text-center"><?php echo $row['sub'] ?></td>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $row['error'] ?></td>
                                <td ><?php echo $row['fixed'] ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
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