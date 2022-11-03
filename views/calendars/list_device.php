<?php
$jsonObj = $this->jsonObj;
?>
<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px">#</th>
            <th class="text-center" style="width:80px">Mã TB</th>
            <th class="">Tiêu đề</th>
            <th class="text-center" style="width:80px">Số con(s)</th>
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
            <td class="text-center" id="code_<?php echo $row['id'] ?>"><?php echo $row['code'] ?></td>
            <td id="title_<?php echo $row['id'] ?>"><?php echo $row['title'] ?></td>
            <td class="text-center">
                <select class="form-control select2" style="width:100%" id="device_<?php echo $row['id'] ?>"
                onchange="confirm_device(<?php echo $row['id'] ?>)" data-minimum-results-for-search="Infinity">
                <option value="">Lựa chọn</option>
                <?php
                for($z = 1; $z <= $row['stock']; $z++){
                    if($this->_Data->check_exit_sub_device($row['id'], $z) == 0 
                    && $this->_Data->check_exit_sub_device_loans($row['id'], $z, $this->_Convert->convertDate($_REQUEST['date'])) == 0
                    && $this->_Data->check_exit_sub_device_return($row['id'], $z) != 1){
                        echo '<option value="'.$z.'">'.$z.'</option>';
                    }
                }
                ?>
                </select>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<script>
    $(function(){
        $('.select2').select2();
    })
</script>