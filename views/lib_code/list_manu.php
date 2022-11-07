<?php
$jsonObj = $this->jsonObj;
?>
<table 
    id="dynamic-table" 
    class="table table-striped table-bordered table-hover dataTable no-footer" 
    role="grid"
    aria-describedby="dynamic-table_info">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px">#</th>
            <th class="">Tiêu đề</th>
            <th class="text-center" style="width:50px"></th>
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
            <td><?php echo $row['title'] ?></td>
            <td class="text-center">
                <input id="ckmanu_<?php echo $row['id'] ?>" name="ckmanu_<?php echo $row['id'] ?>"
                type="checkbox" value="<?php echo $row['id'] ?>" onclick="confirm_manu(<?php echo $row['id'] ?>)"/>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>