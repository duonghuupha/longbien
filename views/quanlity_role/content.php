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
            <th class="text-center" style="width:120px">Mã</th>
            <th class="" style="width:200px;">Người dùng</th>
            <th class="">Phân công nhiệm vụ</th>
            <th class="" style="width:200px;">Giai đoạn kiểm định</th>
            <th class="text-center">Quyền truy cập tiêu chí</th>
            <th class="text-center" style="width:120px">Trạng thái</th>
            <th class="text-center" style="width:70px">Thao tác</th>
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
            <td class="text-center"><?php echo $row['code'] ?></td>
            <td id="fullname_<?php echo $row['id'] ?>"><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['job'] ?></td>
            <td><?php echo $row['quanlity'] ?></td>
            <td class="text-center">
                <a href="javascript:void(0)" onclick="detail(<?php echo $row['id'] ?>)">
                    Xem chi tiết quyền truy cập
                </a>
            </td>
            <td class="text-center">
                <?php
                if($row['status'] == 0){
                    echo '<span class="label label-sm label-danger" onclick="change(1, '.$row['id'].')" style="cursor: pointer">Không kích hoạt</span>';
                }else{
                    echo '<span class="label label-sm label-success" onclick="change(0, '.$row['id'].')" style="cursor: pointer">Kích hoạt</span>';
                }
                ?>
            </td>
            <td class="text-center">
                <div class="action-buttons">
                    <a class="green" href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <a class="red" href="javascript:void(0)" onclick="del(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                </div>
            </td>
            <td class="hidden" id="userid_<?php echo $row['id'] ?>"><?php echo $row['user_id'] ?></td>
            <td class="hidden" id="quanlityid_<?php echo $row['id'] ?>"><?php echo $row['quanlity_id'] ?></td>
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_role', 1);
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