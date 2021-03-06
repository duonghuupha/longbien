<?php
$jsonObj = $this->jsonObj; $perpage = $this->perpage;
$pages = $this->page;
?>
<table 
    id="dynamic-table" 
    class="table table-striped table-bordered table-hover dataTable no-footer" 
    role="grid"
    aria-describedby="dynamic-table_info">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px">#</th>
            <th class="text-center">Khu nhà</th>
            <th class="text-center">Tầng</th>
            <th class="">Tên phòng</th>
            <th class="text-center" style="width:170px">Cập nhật lần cuối</th>
            <th class="text-center" style="width:100px">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i % 2 == 0) ? 'even' : 'odd'; 
            if($row['region'] == 1){
                $khu = "Khu nhà A";
            }elseif($row['region'] ==  2){
                $khu = "Khu nhà B";
            }elseif($row['region'] ==  3){
                $khu = "Khu nhà C";
            }elseif($row['region'] ==  4){
                $khu = "Khu nhà D";
            }elseif($row['region'] ==  5){
                $khu = "Khu nhà E";
            }elseif($row['region'] ==  6){
                $khu = "Khu nhà F";
            }

            if($row['floor'] == 1){
                $tang = "Tầng 1";
            }elseif($row['floor'] ==  2){
                $tang = "Tầng 2";
            }elseif($row['floor'] ==  3){
                $tang = "Tầng 3";
            }elseif($row['floor'] ==  4){
                $tang = "Tầng 4";
            }elseif($row['floor'] ==  5){
                $tang = "Tầng 5";
            }elseif($row['floor'] ==  6){
                $tang = "Tầng 6";
            }
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center"><?php echo $khu ?></td>
            <td class="text-center"><?php echo $tang ?></td>
            <td id="title_<?php echo $row['id'] ?>"><?php echo $row['title'] ?></td>
            <td class="text-center"><?php echo date("H:i:s d-m-Y", strtotime($row['create_at'])) ?></td>
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
            <td id="region_<?php echo $row['id'] ?>" class="hidden"><?php echo $row['region'] ?></td>
            <td id="floor_<?php echo $row['id'] ?>" class="hidden"><?php echo $row['floor'] ?></td>
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_physical', 1);
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