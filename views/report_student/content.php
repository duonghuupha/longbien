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
            <th class="text-center" style="width:80px">Mã HS</th>
            <th class="">Họ và tên</th>
            <th class="text-center">Giới tính</th>
            <th class="text-center">Ngày sinh</th>
            <th class="text-center">Lớp học</th>
            <th class="text-center">Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd'; 
            if($row['status'] == 1){
                $status = "Đang đi học";
            }elseif($row['status'] = 2){
                $status = "Nghỉ học";
            }elseif($row['status'] == 3){
                $status = "Chuyển trường";
            }else{
                $status = "Ra trường";
            }
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center" id="code_<?php echo $row['id'] ?>"><?php echo $row['code'] ?></td>
            <td>
                <?php echo $row['fullname'] ?><br/>
                <small style="color:gray">Mã định danh: <?php echo $row['code_csdl'] ?></small>
            </td>
            <td class="text-center"><?php echo ($row['gender'] == 1) ? 'Nam' : 'Nữ' ?></td>
            <td class="text-center" id="birthday_<?php echo $row['id'] ?>"><?php echo date("d-m-Y", strtotime($row['birthday'])) ?></td>
            <td class="text-center"><?php echo $row['department'] ?></td>
            <td class="text-center"><?php echo $status ?></td>
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_student', 1);
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