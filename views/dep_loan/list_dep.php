<?php
$jsonObj = $this->jsonObj;
?>
<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px">#</th>
            <th class="">Tên phòng chức năng</th>
            <th class="text-center" style="width:80px"></th>
        </tr>
    </thead>
    <tbody id="listPage">
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd'; 
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td id="title_<?php echo $row['id'] ?>"><?php echo $row['title'] ?></td>
            <td class="text-center">
                <input id="ck_<?php echo $row['id'] ?>" name="ck_<?php echo $row['id'] ?>" type="checkbox"
                value="<?php echo $row['id'] ?>" onchange="confirm_dep(<?php echo $row['id'] ?>)"/>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>