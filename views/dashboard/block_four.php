<table class="table table-bordered table-striped">
    <thead class="thin-border-bottom">
        <tr>
            <th class="text-center">Tiết</th>
            <th class="text-center">Môn</th>
            <th class="text-center">Lớp</th>
            <th>Đầu bài dạy</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for($i = 1; $i <= 5; $i++){
        ?>
        <tr>
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center"><?php echo 'Toán' ?></td>
            <td class="text-center"><?php echo 'Lớp 6A1' ?></td>
            <td><?php echo 'Định lý Pitago' ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>