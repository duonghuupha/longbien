<?php
$jsonObj = $this->jsonObj;
?>
<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Mã</th>
                <th>Họ và tên</th>
                <th class="text-center">Giới tính</th>
                <th class="text-center">Ngày sinh</th>
                <th class="text-center">Trình độ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach($jsonObj['rows'] as $row){
                $i++;
                $class = ($i%2 == 0) ? 'even' : 'odd';
            ?>
            <tr role="row" class="<?php echo $class ?>">
                <td class="text-center"><?php echo $i ?></td>
                <td class="text-center"><?php echo $row['code'] ?></td>
                <td id="title_<?php echo $row['id'] ?>"><?php echo $row['fullname'] ?></td>
                <td class="text-center hidden-480"><?php echo ($row['gender'] == 1) ? "Nam" : "Nữ" ?></td>
                <td class="text-center hidden-480"><?php echo date("d-m-Y", strtotime($row['birthday'])) ?></td>
                <td class="text-center hidden-480"><?php echo $row['level'] ?></td>
                <td class="text-center">
                    <input type="checkbox" id="ck_<?php echo $row['id'] ?>" onclick="confirm_per(<?php echo $row['id'] ?>)"/>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>