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
            <th class="">Người mượn</th>
            <th class="text-center">Ngày dự kiến trả</th>
            <th class="text-center">Số lượng</th>
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
            $detail = $this->_Data->get_gear_selected($row['code']);
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center"><?php echo $row['code'] ?></td>
            <td>
                <?php echo $row['fullname_create'] ?><br/>
                <small>
                    Ngày lập: <?php echo date("H:i:s d-m-Y", strtotime($row['create_at'])) ?>
                </small>
            </td>
            <td>
                <?php echo $row['fullname_loan'] ?><br/>
                <small>
                    Ngày mượn: <?php echo date("H:i:s d-m-Y", strtotime($row['date_loan'])) ?>
                </small>
            </td>
            <td class="text-center">
                <?php 
                    echo date("H:i:s", strtotime($row['date_return']))."<br/>";
                    echo date("d-m-Y", strtotime($row['date_return']));
                ?>
            </td>
            <td class="text-center"><?php echo $row['qty'] ?></td>
            <td class="text-center">
                <?php
                if($row['status'] == 0){
                    echo '<span class="label label-sm label-danger">Chưa trả</span>';
                }elseif($row['status'] == 1){
                    echo '<span class="label label-sm label-success">Đã trả</span>';
                }elseif($row['status'] == 2){
                    echo '<span class="label label-sm label-warning">Trả một phần</span>';
                }elseif($row['status'] == 3){
                    echo '<span class="label label-sm label-primary">Đặt trước</span>';
                }
                ?>
            </td>
            <td class="text-center">
                <div class="action-buttons">
                    <a class="blue" href="javascript:void(0)" onclick="detail(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-search-plus bigger-130"></i>
                    </a>
                    <?php
                    if($row['status'] == 0|| $row['status'] == 2){
                    ?>
                    <a class="green hidden-480" href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)"
                    title="Lập phiếu trả">
                        <i class="ace-icon fa fa-refresh bigger-130"></i>
                    </a>
                    <?php
                    }
                    ?>
                </div>
            </td>
            <td class="hidden" id="detail_<?php echo $row['id'] ?>"><?php echo $detail ?></td>
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_loans', 1);
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