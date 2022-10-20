<?php
$jsonObj = $this->jsonObj;
?>
<div class="row">
    <div class="col-xs-6">
        <div class="form-group">
            <label for="form-field-username">
                <b>Mã phân bổ:</b> <?php echo $jsonObj[0]['code'] ?>
            </label>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label for="form-field-username">
                <b>Năm học:</b> <?php echo $jsonObj[0]['namhoc'] ?>
            </label>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label for="form-field-username">
                <b>Phòng:</b> <?php echo $jsonObj[0]['physical'] ?>
            </label>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label for="form-field-username">
                <b>Cập nhật lần cuối:</b> <?php echo date("H:i:s d-m-Y", strtotime($jsonObj[0]['create_at'])) ?>
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
                    <th class="text-center" style="width:80px">Mã phân bổ</th>
                    <th class="text-left" style="width:350px">Tiêu đề</th>
                    <th class="text-center">Số con </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach($this->detail as $row){
                    $i++;
                    $class = ($i%2 == 0) ? 'even' : 'odd';
                ?>
                <tr role="row" class="<?php echo $class ?>">
                    <td class="text-center"><?php echo $i ?></td>
                    <td class="text-center"><?php echo $row['code'] ?></td>
                    <td class="text-left"><?php echo $row['title'] ?></td>
                    <td class="text-center"><?php echo $row['sub_device'] ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>