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
            <th class="">Nhóm hồ sơ</th>
            <th class="">Tiêu đề</th>
            <th class="text-center">Cập nhật lần cuối</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center" style="width:70px">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i % 2 == 0) ? 'even' : 'odd'; 
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td><?php echo $row['group'] ?></td>
            <td id="titlecate_<?php echo $row['id'] ?>"><?php echo $row['title'] ?></td>
            <td class="text-center"><?php echo date("H:i:s d-m-Y", strtotime($row['create_at'])) ?></td>
            <td class="text-center">
                <?php
                if($row['status'] == 0){
                    echo '<span class="label label-sm label-danger" style="cursor:pointer" onclick="change_cate(1, '.$row['id'].')">Không kích hoạt</span>';
                }else{
                    echo '<span class="label label-sm label-success" style="cursor:pointer"onclick="change_cate(0, '.$row['id'].')">Kích hoạt</span>';
                }
                ?>
            </td>
            <td class="text-center">
                <div class="hidden-sm hidden-xs action-buttons">
                    <a class="green" href="javascript:void(0)" onclick="edit_cate(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <a class="red" href="javascript:void(0)" onclick="del_cate(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                </div>
            </td>
            <td class="hidden" id="groupid_<?php echo $row['id'] ?>"><?php echo $row['group_id'] ?></td>
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_cate', 1);
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