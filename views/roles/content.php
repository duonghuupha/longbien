<?php
$jsonObj = $this->jsonObj; $perpage = $this->perpage; $pages = $this->page;
function showCategories($categories, $parent_id, $char = '|---'){
    $convert = new Convert();
    foreach ($categories as $key => $item){
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id){
            echo '
            <tr role="row">
                <td class="text-center"></td>
                <td class="text-left">'.$char.$item['title'].'</td>
                <td class="text-center" id="link_'.$item['id'].'">'.$item['link'].'</td>
                <td class="text-left">'.$convert->return_title_function($item['functions']).'</td>
                <td class="text-center" id="order_'.$item['id'].'">'.$item['order_position'].'</td>
                <td class="text-center">
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="green" href="javascript:void(0)" onclick="edit('.$item['id'].')">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red" href="javascript:void(0)" onclick="del('.$item['id'].')">
                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                        </a>
                    </div>
                </td>
                <td class="hidden" id="function_'.$item['id'].'">'.$item['functions'].'</td>
                <td class="hidden" id="title_'.$item['id'].'">'.$item['title'].'</td>
                <td class="hidden" id="parent_'.$item['id'].'">'.$item['parent_id'].'</td>
            </tr>
            ';
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['id'], $char.'|---');
        }
    }
}
?>
<table 
    id="dynamic-table" 
    class="table table-striped table-bordered table-hover dataTable no-footer" 
    role="grid"
    aria-describedby="dynamic-table_info">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px">#</th>
            <th class="text-left">Tiêu đề</th>
            <th class="text-center">Đường dẫn</th>
            <th class="text-left">Chức năng</th>
            <th class="text-center">Thứ tự</th>
            <th class="text-center" style="width:70px">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
        ?>
        <tr role="row" style="font-weight:700">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-left" id="title_<?php echo $row['id']; ?>"><?php echo $row['title'] ?></td>
            <td class="text-center" id="link_<?php echo $row['id']; ?>"><?php echo $row['link'] ?></td>
            <td class="text-left"><?php echo $this->_Convert->return_title_function($row['functions']) ?></td>
            <td class="text-center" id="order_<?php echo $row['id']; ?>"><?php echo $row['order_position'] ?></td>
            <td class="text-center">
                <div class="hidden-sm hidden-xs action-buttons">
                    <a class="green" href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <a class="red" href="javascript:void(0)" onclick="del(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                </div>
            </td>
            <td class="hidden" id="function_<?php echo $row['id'] ?>"><?php echo $row['functions'] ?></td>
        </tr>
        <?php
            showCategories($this->_Data->get_parent_menu($row['id']), $row['id']);
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