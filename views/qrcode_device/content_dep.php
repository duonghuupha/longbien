<table 
    id="dynamic-table" 
    class="table table-striped table-bordered table-hover dataTable no-footer" 
    role="grid"
    aria-describedby="dynamic-table_info">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px">#</th>
            <th class="text-center">
                <input id="ck_dep" name="ck_dep" type="checkbox"/>
            </th>
            <th class="text-center" style="width:80px">Mã TB</th>
            <th class="">Tiêu đề</th>
            <th class="text-center">Số con</th>
            <th class="text-center">SL tem</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($this->jsonObj as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd';
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center">
                <input id="ck_dep_<?php echo $row['id'] ?>" name="ck__dep_<?php echo $row['id'] ?>" class="ck_dep_single"
                type="checkbox" value="<?php echo $row['id'].'_'.$row['sub_device'] ?>" />
            </td>
            <td class="text-center"><?php echo $row['code_d'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td class="text-center" id="sub_<?php echo $row['id'].'_'.$row['sub_device'] ?>"><?php echo $row['sub_device'] ?></td>
            <td class="text-center">
                <input id="qty_dep_<?php echo $row['id'].'_'.$row['sub_device'] ?>" name="qty_dep_<?php echo $row['id'] ?>"
                value="1" size="1" class="form-control" style="text-align:center"/>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<script type="text/javascript">
$(function(){
    $('#ck_dep').change(function(){
        if(this.checked){
            $('.ck_dep_single').each(function(){
                this.checked = true;
            });
        }else{
            $('.ck_dep_single').each(function(){
                this.checked = false;
            });
        }
    });
    $('.ck_dep_single').click(function(){
        if($(this).is(":checked")){
            var isAllchecked = 0;
            $('.ck_dep_single').each(function(){
                if(!this.checked)
                    isAllchecked = 1;
            });
            if(isAllchecked == 0){
                $('#ck_dep').prop('checked', true);
            }
        }else{
            $('#ck_dep').prop('checked', false);
        }
    });
}); 
</script>