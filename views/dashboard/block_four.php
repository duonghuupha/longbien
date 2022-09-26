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
        foreach($this->jsonObj as $row){
        ?>
        <tr>
            <td class="text-center"><?php echo $row['lesson'] ?></td>
            <td class="text-center"><?php echo $row['subject'] ?></td>
            <td class="text-center"><?php echo $row['department'] ?></td>
            <td><?php echo $row['title'] ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>