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
    <div class="col-xs-12">
        <div class="form-group">
            <label for="form-field-username">
                <b>Danh sách trang thiết bị / đồ dùng cần cho bài học:</b>
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
                            <th class="text-center" style="width:80px">Mã</th>
                            <th class="">Tên trang thiết bị / đồ dùng</th>
                            <th class="text-center">Số phụ</th>
                            <th class="text-center">Lọai</th>
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
                            <td class="text-center"><?php echo $row['code_cal'] ?></td>
                            <td><?php echo $row['title'] ?></td>
                            <td class="text-center"><?php echo $row['sub'] ?></td>
                            <td class="text-center">
                                <?php
                                echo ($row['type'] == 1) ? 'Thiết bị' : ($row['type'] == 2) ? 'Đồ dùng' : 'Phòng chức năng';
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
</div>