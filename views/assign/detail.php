<?php
$item = $this->jsonObj;
$json = $this->_Data->get_all_assign_detail_via_code($item[0]['code']);
function return_department_title_assign($string){
    $str = explode(",", $string); $sql = new Model();
    foreach($str as $row){
        $array[] = $sql->return_title_department($row);
    }
    return implode("; ", $array);
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
                    <b>Được phân công dạy:</b>
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
                            <th class="text-center" style="width:150px">Môn học</th>
                            <th class="">Lớp học</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach($json as $row){
                            $i++;
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td class="text-center"><?php echo $row['subject'] ?></td>
                            <td><?php echo return_department_title_assign($row['department']) ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="space-10"></div>
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