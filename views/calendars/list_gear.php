<?php
$jsonObj = $this->jsonObj;
?>
<div class="tableFixHead">
    <table role="grid" aria-describedby="dynamic-table_info">
        <thead>
            <tr role="row">
                <th class="text-center" style="width:20px">#</th>
                <th class="text-center" style="width:120px">Mã đồ dùng</th>
                <th class="" style="width:350px;">Tiêu đề</th>
                <th class="text-center" style="width:150px;">Danh mục</th>
                <th class="text-center" style="width:100px">Số con (s)</th>
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
                <td class="text-center" id="code_<?php echo $row['id'] ?>"><?php echo $row['code'] ?></td>
                <td id="title_<?php echo $row['id'] ?>"><?php echo $row['title'] ?></td>
                <td class="text-center"><?php echo $row['category'] ?></td>
                <td class="text-center">
                    <select class="form-control select2" style="width:100%" id="gear_<?php echo $row['id'] ?>"
                    onchange="confirm_gear(<?php echo $row['id'] ?>)" data-placeholder=""
                    data-minimum-results-for-search="Infinity">
                    <option value=""></option>
                    <?php
                    for($z = 1; $z <= $row['stock']; $z++){
                        if($this->_Data->check_gear_loan($row['id'], $z) == 0
                        && $this->_Data->check_gear_return($row['id'], $z) != 1){
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
</div>
<script>
    $(function(){
        $('.select2').select2();
    })
</script>