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
            <th class="text-center" colspan="3">Mã thiết bị</th>
            <th class="" rowspan="2">Tiêu đề</th>
            <th class="text-center" rowspan="2">Số con</th>
            <th rowspan="2">Danh mục</th>
            <th class="text-center" rowspan="2" style="width:100px">Năm đưa vào sử dụng</th>
        </tr>
        <tr>
            <th class="text-center">Code</th>
            <th class="text-center" style="width:50px">QRcode</th>
            <th class="text-center" style="width:100px">Barcode</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd'; 
            if($row['cate_id'] == 0){
                if($row['price'] >= 10000000){
                    $danhmuc = "Tài sản cố định";
                }else{
                    $danhmuc = "Công cụ dụng cụ";
                }
            }else{
                $danhmuc = $row['category'];
            }
            $title_file = $row['code_d'].'_'.$row['sub_device'];
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center"><?php echo $row['code_d'] ?></td>
            <td class="text-center">
                <?php
                echo  '<img src="'.URL.'/report_device_dep/qrcode?data='.base64_encode($row['code_d']."-".$row['sub_device'].'_6').'" width="50"/>';
                ?>
            </td>
            <td>
                <img src="<?php echo URL.'/public/assets/barcode/'.$title_file.'.png' ?>" width="100" height="40"/>
            </td>
            <td><?php echo $row['title'] ?></td>
            <td class="text-center"><?php echo $row['sub_device'] ?></td>
            <td><?php echo $danhmuc ?></td>
            <td class="text-center"><?php echo $row['year_work'] ?></td>
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_device', 1);
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