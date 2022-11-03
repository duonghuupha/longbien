<?php
$jsonObj = $this->jsonObj;
$array = ['ĐĐGtx 1', 'ĐĐGtx 2', 'ĐĐGtx 3', 'ĐĐGtx 4', 'ĐĐGgk', 'ĐĐGck'];
?>
<table 
    id="dynamic-table" 
    class="table table-striped table-bordered table-hover dataTable no-footer" 
    role="grid"
    aria-describedby="dynamic-table_info">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px" rowspan="2">#</th>
            <th rowspan="2" style="width:150px">Họ tên học sinh</th>
            <th class="text-center" style="width:80px" rowspan="2">Lớp</th>
            <th class="text-center" colspan="2">Điểm gốc</th>
            <th class="text-center" style="width:100px" rowspan="2">Điểm sửa</th>
            <th class="text-left" rowspan="2" style="width:200px">Lý do sửa</th>
            <th rowspan="2">Người sửa</th>
            <th class="text-center" rowspan="2">Cập nhật lần cuối</th>
            <th rowspan="2" style="width:70px;"></th>
        </tr>
        <tr>
            <th class="text-center">Loại điểm</th>
            <th class="text-center">Điểm</th>
        </tr>
    </thead>
    <tbody id="listPage">
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd'; 
        ?>
        <tr>
            <td class="text-center"><?php echo $i ?></td>
            <td>
                <?php echo $row['fullname'] ?>
            </td>
            <td class="text-center"><?php echo $this->_Data->return_title_department_via_student_id($row['student_id'], $this->_Year[0]['id']) ?></td>
            <td class="text-center"><?php echo $array[$row['type_point'] - 1] ?></td>
            <td class="text-center"><?php echo $row['point_old'] ?></td>
            <td class="text-center"><?php echo $row['point'] ?></td>
            <td class="text-left">
                <a href="<?php echo URL.'/public/student_point/'.$row['file'] ?>" target="_blank">
                    <i class="ace-icon fa fa-search"></i>
                </a>
                <?php echo $row['content'] ?>
            </td>
            <td><?php echo $row['fullname_create'] ?></td>
            <td class="text-center"><?php echo date("H:i:s d-m-Y", strtotime($row['create_at'])) ?></td>
            <td class="text-center">
                <div class="action-buttons">
                    <a class="green" href="javascript:void(0)" onclick="app_point_true(<?php echo $row['id'] ?>)"
                    title="Duyệt sửa điểm">
                        <i class="ace-icon fa fa-check bigger-130"></i>
                    </a>
                    <a class="red" href="javascript:void(0)" onclick="app_point_false(<?php echo $row['id'] ?>)"
                    title="Không duyệt">
                        <i class="ace-icon fa fa-times bigger-130"></i>
                    </a>
                </div>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>