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
            <th class="">Người lập</th>
            <th class="">ên sách</th>
            <th>Lý do</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center">Cập nhật lần cuối</th>
            <th class="text-center" style="width:80px">Thao tác</th>
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
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['title'].' - '.$row['sub_book'] ?></td>
            <td><?php echo $row['content'] ?></td>
            <td class="text-center">
                <?php 
                if($row['status'] == 1){
                    echo '<span class="label label-sm label-danger">Thu hồi</span>';
                }else{
                    echo '<span class="label label-sm label-success">Khôi phục</span>';
                }
                ?>
            </td>
            <td class="text-center">
                <?php
                echo date("H:i:s", strtotime($row['create_at']))."<br/>".date("d-m-Y", strtotime($row['create_at']));
                ?>
            </td>
            <td class="text-center">
                <?php
                if($row['status'] == 1){
                ?>
                <div class="action-buttons">
                    <a class="blue" href="javascript:void(0)" onclick="restore(<?php echo $row['id'] ?>)"
                    title="Khôi phục đồ dùng">
                        <i class="ace-icon fa fa-refresh bigger-130"></i>
                    </a>
                </div>
                <?php
                }
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_return', 1);
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