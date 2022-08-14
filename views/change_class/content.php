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
            <th class="text-center" style="width:20px" rowspan="2">#</th>
            <th class="text-center" style="width:140px" rowspan="2">Ngày luân chuyển</th>
            <th style="width:140px" rowspan="2">Họ và tên</th>
            <th class="text-center" style="width:150px" colspan="2">Từ</th>
            <th class="text-center" style="width:150px" colspan="2">Đến</th>
        </tr>
        <tr>
            <th class="text-center">Năm học</th>
            <th class="text-center">Lớp học</th>
            <th class="text-center">Năm học</th>
            <th class="text-center">Lớp học</th>
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
            <td class="text-center"><?php echo date("d-m-Y H:i:s", strtotime($row['create_at'])) ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td class="text-center"><?php echo $row['year_from'] ?></td>
            <td class="text-center"><?php echo $row['department_from'] ?></td>
            <td class="text-center"><?php echo $row['year_to'] ?></td>
            <td class="text-center"><?php echo $row['department_to'] ?></td>
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_change', 1);
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