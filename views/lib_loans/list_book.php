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
            <th class="text-center" style="width:80px">Mã sách</th>
            <th class="">Tiêu đề</th>
            <th class="text-center" style="width:100px">Số con(s)</th>
        </tr>
    </thead>
    <tbody id="listPage">
        <?php
        $j = 0;
        foreach($jsonObj['rows'] as $row){
            $j++;
            $class = ($i%2 == 0) ? 'even' : 'odd'; 
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $j ?></td>
            <td class="text-center" id="code_<?php echo $row['id'] ?>"><?php echo $row['code'] ?></td>
            <td id="title_<?php echo $row['id'] ?>"><?php echo $row['title'] ?></td>
            <td class="text-center">
                <select class="form-control select2" style="width:100%" id="book_<?php echo $row['id'] ?>"
                onchange="confirm_book(<?php echo $row['id'] ?>)" data-minimum-results-for-search="Infinity"
                data-placeholder="Lựa chọn">
                <option value="">Lựa chọn</option>
                    <?php
                    for($i = 1; $i <= $row['stock']; $i++){
                        if($this->_Data->check_book_loan($row['id'], $i) == 0){
                            echo '<option value="'.$i.'">'.$i.'</option>';
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