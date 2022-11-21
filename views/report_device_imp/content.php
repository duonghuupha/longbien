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
            <th></th>
            <th class="text-center" style="width:120px">Mã hệ thống</th>
            <th class="text-center">Ngày nhập</th>
            <th class="text-left">Người thực hiện</th>
            <th class="text-left">Nguồn trang thiết bị</th>
            <th class="text-center">Tổng đầu thiết bị</th>
            <th class="text-center">Tổng số lượng thiết bị</th>
            <th class="text-center">Cập nhật lần cuối</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd';
            $detail = $this->_Data->get_detail_import_device($row['code']);
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center">
                <a style="cursor:pointer;" class="ui-sghref" onclick="open_detail(<?php echo $row['id'] ?>)">
                    <span class="ace-icon fa fa-plus center bigger-110 blue" id="button<?php echo $row['id'] ?>"></span>
                </a>
            </td>
            <td class="text-center" id="code_<?php echo $row['id'] ?>"><?php echo $row['code'] ?></td>
            <td class="text-center" id="dateimport_<?php echo $row['id'] ?>"><?php echo date("d-m-Y", strtotime($row['date_import'])) ?></td>
            <td class="text-left"><?php echo $row['fullname'] ?></td>
            <td class="text-left" id="source_<?php echo $row['id'] ?>"><?php echo $row['source'] ?></td>
            <td class="text-center"><?php echo $row['total_device'] ?></td>
            <td class="text-center"><?php echo $row['total_qty'] ?></td>
            <td class="text-center"><?php echo date("H:i:s d-m-Y", strtotime($row['create_at'])) ?></td>
        </tr>
        <tr id="row<?php echo $row['id'] ?>" style="display:none">
            <td colspan="6">
                <table 
                id="dynamic-table" 
                class="table table-striped table-bordered table-hover dataTable no-footer" 
                role="grid"
                aria-describedby="dynamic-table_info">
                    <thead>
                        <tr role="row">
                            <th class="text-center" style="width:120px">Mã thiết bị</th>
                            <th class="text-left">Tên trang thiết bị</th>
                            <th class="text-center">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($detail as $item){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $item['code'] ?></td>
                            <td><?php echo $item['title'] ?></td>
                            <td class="text-center"><?php echo $item['qty'] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_import', 1);
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