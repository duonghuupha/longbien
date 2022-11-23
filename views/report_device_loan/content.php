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
            <th class="text-center">Ngày mượn</th>
            <th class="">Người mượn</th>
            <th class="text-center">Ngày dự kiến trả</th>
            <th class="text-center">Số lượng</th>
            <th class="text-center">Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd';
            $detail = $this->_Data->get_device_selected_report($row['code']);
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
                <?php 
                    echo date("H:i:s d-m-Y", strtotime($row['date_loan']));
                ?>
            </td>
            <td><?php echo $row['fullname_loan'] ?></td>
            <td class="text-center">
                <?php 
                    echo date("H:i:s d-m-Y", strtotime($row['date_return']));
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
                }
                ?>
            </td>
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
                            <th class="text-center">Số con</th>
                            <th class="text-left">Tên trang thiết bị</th>
                            <th class="text-center">Ngày trả</th>
                            <th class="text-center">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($detail as $item){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $item['code_d'] ?></td>
                            <td class="text-center"><?php echo $item['sub_device'] ?></td>
                            <td><?php echo $item['title'] ?></td>
                            <td class="text-center"><?php echo date("d-m-Y",  strtotime($item['date_return'])) ?></td>
                            <td class="text-center"><?php echo ($item['status'] == 1) ? 'Đã trả' : 'Chưa trả' ?></td>
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_loan', 1);
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