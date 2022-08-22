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
            <th class="text-center" style="width:70px">Hình ảnh</th>
            <th class="text-center" style="width:120px">Mã đồ dùng</th>
            <th class="" style="width:350px;">Tiêu đề</th>
            <th class="text-center hidden-480">Danh mục</th>
            <th class="text-center">Thao tác</th>
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
            <td class="text-center">
                <?php
                if($row['image'] != ''){
                    echo "<img src='".URL."/public/utensils/images/".$row['image']."' width='50' height='50' style='border-radius:50%'/>";
                }else{
                    echo "<img src='".URL."/styles/images/noimg.jpg' width='50' height='50' style='border-radius:50%'/>";
                }
                ?>
            </td>
            <td class="text-center"><?php echo $row['code'] ?></td>
            <td>
                <?php echo $row['title'] ?><br/>
                <small style="color:gray">
                    <?php echo "Cập nhật lần cuối: ".date("H:i:s d-m-Y", strtotime($row['create_at'])) ?>
                </small>
            </td>
            <td class="text-center"><?php echo $row['category'] ?></td>
            <td class="text-center">
                <div class="action-buttons">
                    <a class="blue" href="javascript:void(0)" onclick="detail(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-search-plus bigger-130"></i>
                    </a>
                    <a class="green" href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <a class="red" href="javascript:void(0)" onclick="del(<?php echo $row['id'] ?>)">
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
            <?php echo $this->_Convert->return_show_entries($jsonObj['total'], $perpage,  $pages) ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <?php
        if($jsonObj['total'] > $perpage){
            $pagination = $this->_Convert->pagination($jsonObj['total'], $pages, $perpage);
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_gear', 1);
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