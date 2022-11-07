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
            <th class="text-center" colspan="2">Mã hóa minh chứng</th>
            <th class="" rowspan="2">Tiêu chuẩn / tiêu chí</th>
            <th class="" rowspan="2">Tiêu đề</th>
            <th class="text-center" rowspan="2">Người tạo</th>
            <th class="text-center" rowspan="2">Cập nhật lần cuối</th>
        </tr>
        <tr>
            <th class="text-center" style="width:80px">Code</th>
            <th class="text-center" style="width:50px">Qrcode</th>
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
            <td class="text-center"><?php echo $row['code_proof'] ?></td>
            <td class="text-center">
                <?php
                    echo  '<img src="'.URL.'/report_proof/qrcode?data='.base64_encode($row['code_proof'].'_1').'&size=50x50"/>';
                ?>
            </td>
            <td><?php echo "<b><i>".$row['standard']."</i></b><br/>".$row['criteria'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td class="text-center"><?php echo $row['fullname'] ?></td>
            <td class="text-center">
                <?php 
                    echo date("H:i:s", strtotime($row['create_at']))."<br/>";
                    echo date("d-m-Y", strtotime($row['create_at']));
                ?>
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_proof', 1);
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