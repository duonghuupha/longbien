<?php
$jsonObj = $this->jsonObj; $perpage = $this->perpage; $pages = $this->page;
?>
<table 
    id="dynamic-table" 
    class="table table-striped table-bordered table-hover dataTable no-footer" 
    role="grid"
    aria-describedby="dynamic-table_info">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px">#</th>
            <th class="text-center" style="width:80px">Mã</th>
            <th class="text-center">Ngày học</th>
            <th class="text-center">Tiết học</th>
            <th class="text-center">Môn học</th>
            <th class="text-center">Lớp học</th>
            <th class="text-center">Tiêt theo <br/>phân bổ C/trình</th>
            <th>Đầu bài dạy</th>
            <th class="text-center" style="width:100px">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd'; 
            $dettail = $this->_Data->get_device_gear_loan($row['code']);
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center">
                <?php echo "<a href='javascript:void()' onclick='detail(".$row['id'].")'>".$row['code']."</a>" ?>
            </td>
            <td class="text-center"><?php echo date("d-m-Y", strtotime($row['date_study'])) ?></td>
            <td class="text-center"><?php echo $row['lesson'] ?></td>
            <td class="text-center"><?php echo $row['subject'] ?></td>
            <td class="text-center"><?php echo $row['department'] ?></td>
            <td class="text-center"><?php echo $row['lesson_export'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td class="text-center">
                <div class="action-buttons">
                    <a class="blue" href="javascript:void(0)" onclick="select_device_gear_de(<?php echo $row['id'] ?>)"
                    title="Đăng ký mượn thiết bị / đồ dùng/ sử dụng phòng chức năng">
                        <i class="ace-icon fa fa-plug bigger-130"></i>
                    </a>
                    <a class="green" href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <a class="red" href="javascript:void(0)" onclick="del(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                </div>
            </td>
            <td class="hidden" id="datadc_<?php echo $row['id'] ?>"><?php echo $dettail ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<div class="row mini">
    <div class="col-xs-12 col-sm-6">
        <div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">
            <?php echo $this->_Convert->return_show_entries($jsonObj['total'], $perpage,  $pages) ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <?php
        if($jsonObj['total'] > $perpage){
            $pagination = $this->_Convert->pagination($jsonObj['total'], $pages, $perpage);
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_task', 1);
        ?>
        <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
            <ul class="pagination">
                <?php echo $createlink ?>
            </ul>
        </div>
        <?php
        }
        ?>
    </div>
</div>