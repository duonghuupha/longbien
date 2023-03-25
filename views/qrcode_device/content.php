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
            <th class="text_center"></th>
            <th class="text-center" style="width:80px">Mã TB</th>
            <th class="">Tiêu đề</th>
            <th class="text-left" style="width:200px">Danh mục</th>
            <th class="text-center">Xuất sứ</th>
            <th class="text-center">Năm sử dụng</th>
            <th class="text-center">Số con</th>
            <th class="text-center">SL tem</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $j = 0;
        foreach($jsonObj['rows'] as $row){
            $j++;
            $class = ($j%2 == 0) ? 'even' : 'odd'; 
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
            <td class="text-center"><?php echo $j ?></td>
            <td class="text-center">
                <input id="ck_<?php echo $row['id'] ?>" name="ck_<?php echo $row['id'] ?>"
                type="checkbox" value="<?php echo $row['id'] ?>" class="ck_inma"
                onclick="selected_device(<?php echo $row['id'] ?>)"/>
            </td>
            <td class="text-center"><?php echo $row['code'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td class="text-left"><?php echo $danhmuc ?></td>
            <td class="text-center"><?php echo $row['origin'] ?></td>
            <td class="text-center"><?php echo $row['year_work'] ?></td>
            <td class="center">
                <select class="select2" id="device_<?php echo $row['id'] ?>"
                data-minimum-results-for-search="Infinity" data-placeholder="Lựa chọn"
                onchange="set_select_sub_device(<?php echo $row['id'] ?>)">
                    <option value="0">Tất cả</option>
                    <?php
                    for($i = 1; $i  <= $row['stock']; $i++){
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                    ?>
                </select>
            </td>
            <td class="text-center">
                <input id="qty_<?php echo $row['id'] ?>" name="qty_<?php echo $row['id'] ?>"
                value="1" size="1" class="form-control" style="text-align:center"
                onchange="set_qty(<?php echo $row['id'] ?>)"/>
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
<script>
    $(function(){
        $('.select2').select2();
    })
</script>