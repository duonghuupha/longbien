<?php
$convert = new Convert(); $jsonObj = $this->jsonObj; $perpage = $this->perpage;
$pages = $this->page; $sql = new Model();
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
            <th class="text-center">Ngày tạo</th>
            <th class="text-center">Phòng ban/Lớp học</th>
            <th class="text-left">Thiết bị</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center" style="width:80px">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd';
            $detail = $sql->get_device_selected($row['code']);
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center"><?php echo $row['code'] ?></td>
            <td class="text-center">
                <?php 
                    echo date("H:i:s d-m-Y", strtotime($row['create_at']));
                ?>
            </td>
            <td class="text-center"><?php echo $row['physical'].' - '.$row['department'] ?></td>
            <td class="text-left"><?php echo $row['device'].'-'.$row['sub_device'] ?></td>
            <td class="text-center">
                <?php
                if($row['status'] == 0){
                    echo '<span class="label label-sm label-warning">Chưa duyệt</span>';
                }elseif($row['status'] == 1){
                    echo '<span class="label label-sm label-success">Đã duyệt</span>';
                }elseif($row['status'] == 2){
                    echo '<span class="label label-sm label-danger">Từ chối</span>';
                }
                ?>
            </td>
            <td class="text-center">
                <div class="action-buttons">
                    <a class="blue" href="javascript:void(0)" onclick="detail(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-search-plus bigger-130"></i>
                    </a>
                    <?php
                    if($row['status'] == 0){
                    ?>
                    <a class="red" href="javascript:void(0)" onclick="del(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-trash bigger-130"></i>
                    </a>
                    <?php
                    }
                    ?>
                </div>
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
            <?php echo $convert->return_show_entries($jsonObj['total'], $perpage,  $pages) ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <?php
        if($jsonObj['total'] > $perpage){
            $pagination = $convert->pagination($jsonObj['total'], $pages, $perpage);
            $createlink = $convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_return', 1);
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