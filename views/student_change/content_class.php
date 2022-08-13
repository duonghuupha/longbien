<?php
$jsonObj = $this->jsonObj; $perpage = $this->perpage; $pages = $this->page;
?>
<table style="font-size:12px;"
    id="dynamic-table" 
    class="table table-striped table-bordered table-hover dataTable no-footer" 
    role="grid"
    aria-describedby="dynamic-table_info">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px">#</th>
            <th class="text-center" style="width:140px">Mã học sinh</th>
            <th class="text-left" style="width:150px">Họ và tên</th>
            <th class="text-center" style="width:150px">Ngày sinh</th>
            <th class="text-center" style="width:150px">Giới tính</th>
            <th class="text-center" style="width:150px">Lớp học</th>
            <th class="text-center" style="width:150px">Cập nhật<br/>lần cuối</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
        ?>
        <tr onclick="check_row(<?php echo $row['id'] ?>)">
            <td class="text-center"><?php echo $i; ?></td>
            <td class="text-center"><?php echo $row['code'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td class="text-center"><?php echo date("d-m-Y", strtotime($row['birthday'])) ?></td>
            <td class="text-center">
                <?php echo ($row['gender'] == 1) ? 'Nam' : 'Nữ' ?>
            </td>
            <td class="text-center"><?php echo $row['department'] ?></td>
            <td class="text-center">
                <?php
                    echo date("H:i:s", strtotime($row['create_at']))."<br/>";
                    echo date("d-m-Y", strtotime($row['create_at']));
                ?>
            </td>
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_student_class', 1);
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