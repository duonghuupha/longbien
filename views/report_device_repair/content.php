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
            <th class="text-center" style="width:80px">Mã</th>
            <th class="text-center">Ngày lập</th>
            <th class="">Đơn vị thực hiện</th>
            <th class="text-center">SL thiết bị</th>
            <th class="text-center">Cập nhật lần cuối</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd';
            $detail = json_decode($this->_Data->get_detail_repair_device($row['code']), true);
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center">
                <a style="cursor:pointer;" class="ui-sghref" onclick="open_detail(<?php echo $row['id'] ?>)">
                    <span class="ace-icon fa fa-plus center bigger-110 blue" id="button<?php echo $row['id'] ?>"></span>
                </a>
            </td>
            <td class="text-center"><?php echo $row['code'] ?></td>
            <td class="text-center">
                <?php echo date("d-m-Y", strtotime($row['date_repair'])); ?>
            </td>
            <td class=""><?php echo $row['agency'] ?></td>
            <td class="text-center"><?php echo $row['total_repair'] ?></td>
            <td class="text-center">
                <?php echo date("H:i:s d-m-Y", strtotime($row['create_at'])); ?>
            </td>
        </tr>
        <tr id="row<?php echo $row['id'] ?>" style="display:none">
            <td colspan="7">
                <table 
                id="dynamic-table" 
                class="table table-striped table-bordered table-hover dataTable no-footer" 
                role="grid"
                aria-describedby="dynamic-table_info">
                    <thead>
                        <tr role="row">
                            <th class="text-center" style="width:120px">Mã thiết bị</th>
                            <th class="text-left">Tên trang thiết bị</th>
                            <th>Nội dung lỗi</th>
                            <th>Nội dung khắc phục</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($detail as $item){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $item['code_d'] ?></td>
                            <td><?php echo $item['title'] ?></td>
                            <td><?php echo $item['error'] ?></td>
                            <td><?php echo $item['fixed'] ?></td>
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_repair', 1);
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