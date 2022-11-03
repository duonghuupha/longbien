<?php
$jsonObj = $this->jsonObj;
if($this->type == 1){
?>
<table 
    id="dynamic-table" 
    class="table table-striped table-bordered table-hover dataTable no-footer" 
    role="grid"
    aria-describedby="dynamic-table_info">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px">#</th>
            <th class="text-center" style="width:100px">Mã mượn / trả</th>
            <th class="">Người mượn</th>
            <th class="text-center">Ngày mượn</th>
            <th class="text-center">Ngày trả</th>
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
            <td class="text-center"><?php echo $row['code'] ?></td>
            <td>
                <?php 
                    echo $row['fullname'];
                    if($row['type_loan'] == 1){
                        echo "&nbsp; <i class='ace-icon fa fa-graduation-cap'></i>";
                    }else{
                        echo "&nbsp; <i class='ace-icon fa fa-users'></i>";
                    }
                ?>
            </td>
            <td class="text-center"><?php echo date("d-m-Y", strtotime($row['date_loan'])) ?></td>
            <td class="text-center">
                <?php
                if($row['status'] == 1){
                    echo date("d-m-Y",strtotime($row['date_return']));
                }else{
                    echo "<i>Chưa trả</i>";
                }
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
}else{
?>
<table 
    id="dynamic-table" 
    class="table table-striped table-bordered table-hover dataTable no-footer" 
    role="grid"
    aria-describedby="dynamic-table_info">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px">#</th>
            <th class="text-center">Thời gian đọc</th>
            <th class="text-center">Thông tin máy trạm</th>
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
            <td class="text-center"><?php echo $row['time_read'] ?></td>
            <td class="text-center"><?php echo $row['info_read'] ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
}
?>