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
            <th class="text-center" style="width:100px">Mã thiết bị</th>
            <th class="">Tên thiết bị</th>
            <th class="text-center" style="width:100px">Số con</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="listPage">
        <?php
        for($i = 1; $i <= $jsonObj[0]['stock']; $i++){
            // kiem tra xem so con da duoc phan bo, thu hoi, muon hay chua
            if($this->_Data->check_exit_sub_device($jsonObj[0]['id'], $i) > 0 
            || $this->_Data->check_exit_sub_device_loans($jsonObj[0]['id'], $i, date('Y-m-d')) > 0
            || $this->_Data->check_exit_sub_device_return($jsonObj[0]['id'], $i) == 1){
            
            }else{
        ?>
        <tr>
            <td class="text-center"><?php echo $jsonObj[0]['code'] ?></td>
            <td><?php echo $jsonObj[0]['title'] ?></td>
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center">
                <input id="ck_<?php echo $i ?>" name="ck_<?php echo $i ?>" type="checkbox"
                value="<?php echo $i ?>" onclick="confirm_checked(<?php echo $i ?>)"/>
            </td>
        </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>