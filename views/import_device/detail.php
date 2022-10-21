<?php $item = $this->jsonObj; ?>
<div class="modal-header no-padding">
    <div class="table-header">
        Thông tin chi tiết phiếu tiếp nhận trang thiết bị
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
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Ngày tiếp nhận:</b> <?php echo $item[0]['fullname'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Nguồn cung cấp:</b> <?php echo $item[0]['source'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Ghi chú:</b> <?php echo $item[0]['notes'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Nội dung tiếp nhận:</b>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="dataTables_wrapper form-inline no-footer">
                <table id="quanhe"
                    class="table table-striped table-bordered table-hover dataTable no-footer"
                    role="grid" aria-describedby="dynamic-table_info">
                    <thead>
                        <tr role="row">
                            <th class="text-center" style="width:50px">#</th>
                            <th class="text-center" style="width:100px">Mã thiết bị</th>
                            <th class="">Tên trang thiết bị</th>
                            <th class="text-center" style="width:100px">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $json = $this->_Data->get_detail_import_detail($item[0]['code']); $i = 0;
                        foreach($json as $row){
                            $i++;
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $i ?></td>
                            <td class="text-center"><?php echo $row['code'] ?></td>
                            <td><?php echo $row['title'] ?></td>
                            <td class="text-center"><?php echo $row['qty'] ?></td>
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
<div class="modal-footer">
    <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
        <i class="ace-icon fa fa-times"></i>
        Đóng
    </button>
</div>