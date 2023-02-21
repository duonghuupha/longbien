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
            <th class="text-center" style="width:80px">Mã HS</th>
            <th class="">Tên học sinh</th>
            <th class="text-center" style="width:100px">Ngày sinh</th>
            <th class="text-center" style="width:100px">Giới tính</th>
            <th class="text-center" style="width:100px">Lớp học</th>
            <th></th>
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
            <td id="fullname_<?php echo $row['id'] ?>"><?php echo $row['fullname'] ?></td>
            <td class="text-center"><?php echo date("d-m-Y", strtotime($row['birthday'])) ?></td>
            <td class="text-center"><?php echo ($row['gender'] == 1) ? 'Nam' : 'Nữ' ?></td>
            <td class="text-center"><?php echo $row['department'] ?></td>
            <td class="text-center">
                <input id="ckhs_<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>" type="checkbox"
                onclick="confirm_student(<?php echo $row['id'] ?>)"/>
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