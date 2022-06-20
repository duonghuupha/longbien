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
            <th class="text-center" style="width:80px">Mã TB</th>
            <th class="">Tiêu đề</th>
            <th class="text-center hidden-480">Danh mục</th>
            <th class="text-center hidden-480">Xuất sứ</th>
            <th class="text-center hidden-480">Năm sử dụng</th>
            <th class="text-right hidden-480">Nguyên giá</th>
            <th class="text-center hidden-480">Tồn kho</th>
            <th class="text-center hidden-480">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd'; 
            $style_code = ($sql->check_dupli_code_device($row['code']) > 1) ? "style='color:red;font-weight:700'" : "";
            if($row['cate_id'] == 0){
                if($row['price'] >= 10000000){
                    $danhmuc = "Tài sản cố định";
                }else{
                    $danhmuc = "Công cụ dụng cụ";
                }
            }else{
                $danhmuc = $row['category'];
            }
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center" <?php echo $style_code ?>><?php echo $row['code'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td class="text-center hidden-480"><?php echo $danhmuc ?></td>
            <td class="text-center hidden-480"><?php echo $row['origin'] ?></td>
            <td class="text-center hidden-480"><?php echo $row['year_work'] ?></td>
            <td class="text-right hidden-480"><?php echo number_format($row['price']) ?></td>
            <td class="text-center hidden-480"><?php echo number_format($row['stock']) ?></td>
            <td class="text-center hidden-480">
                <div class="action-buttons">
                    <a class="blue hidden-480" href="javascript:void(0)" onclick="detail(<?php echo $row['id'] ?>)">
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
            $createlink = $convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_devices', 1);
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