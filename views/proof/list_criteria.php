<?php
$jsonObj = $this->jsonObj; //$perpage = $this->perpage; $pages = $this->page;
?>
<table class="table table-striped table-bordered table-hover no-margin-bottom">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Giai đoạn</th>
            <th>Tiêu chuẩn</th>
            <th>Tiêu chí</th>
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
            <td><?php echo $row['quanlity'] ?></td>
            <td><?php echo $row['standard']; ?></td>
            <td id="title_<?php echo $row['id'] ?>"><?php echo $row['title'] ?></td>
            <td class="text-center">
                <input type="checkbox" id="ck_<?php echo $row['id'] ?>" onclick="confirm_criteria(<?php echo $row['id'] ?>)"/>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>