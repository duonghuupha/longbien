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
            <th class="text-center" style="width:120px" rowspan="2">Mã hệ thống</th>
            <th class="text-center" colspan="2">Chứng từ</th>
            <th class="text-center" rowspan="2">Phân loại</th>
            <th class="text-left" rowspan="2">Người thực hiện</th>
            <th class="text-left" rowspan="2">Nguồn sách</th>
            <th class="text-center" rowspan="2">Tổng <br/>đầu sách</th>
            <th class="text-center" rowspan="2">Tổng số <br/>lượng sách</th>
            <th class="text-center" rowspan="2">Cập nhật lần cuối</th>
            <th class="text-center" style="width:100px" rowspan="2">Thao tác</th>
        </tr>
        <tr>
            <th class="text-center">Số</th>
            <th class="text-center">Ngày</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd';
            $detail = $this->_Data->get_detail_import_book($row['code']);
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center" id="code_<?php echo $row['id'] ?>"><?php echo $row['code'] ?></td>
            <td class="text-center" id="codeimport_<?php echo $row['id'] ?>">
                <?php echo ($row['code_import'] == '') ? "Nhập nội bộ" : $row['code_import'] ?>
            </td>
            <td class="text-center" id="dateimport_<?php echo $row['id'] ?>"><?php echo date("d-m-Y", strtotime($row['date_import'])) ?></td>
            <td class="text-cener"><?php echo ($row['type_price'] == 2) ? "Mua" : "Phát không" ?></td>
            <td class="text-left"><?php echo $row['fullname'] ?></td>
            <td class="text-left" id="source_<?php echo $row['id'] ?>"><?php echo $row['source'] ?></td>
            <td class="text-center"><?php echo $row['total_book'] ?></td>
            <td class="text-center"><?php echo $row['total_qty'] ?></td>
            <td class="text-center"><?php echo date("H:i:s d-m-Y", strtotime($row['create_at'])) ?></td>
            <td class="text-center">
                <div class="action-buttons">
                    <a class="blue" href="javascript:void(0)" onclick="detail(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-search-plus bigger-130"></i>
                    </a>
                    <a class="green hidden-480" href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <a class="red hidden-480" href="javascript:void(0)" onclick="del(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                </div>
            </td>
            <td class="hidden" id="notes_<?php echo $row['id'] ?>"><?php echo $row['notes'] ?></td>
            <td class="hidden" id="detail_<?php echo $row['id'] ?>"><?php echo json_encode($detail) ?></td>
            <td class="hidden" id="type_<?php echo $row['id'] ?>"><?php echo $row['type_price'] ?></td>
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