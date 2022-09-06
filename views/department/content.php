<?php
$convert = new Convert(); $jsonObj = $this->jsonObj; $perpage = $this->perpage;
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
            <th class="text-center">Năm học</th>
            <th class="text-center">Khu nhà</th>
            <th class="text-center">Tầng</th>
            <th class="text-center">Tên phòng "vật lý"</th>
            <th class="">Phòng ban / lớp  học</th>
            <th class="text-center">Là lớp học</th>
            <th class="text-center">Cố định</th>
            <th class="text-center" style="width:70px">Thao tác</th>
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
            <td class="text-center"><?php echo $row['namhoc'] ?></td>
            <td class="text-center"><?php echo $khu ?></td>
            <td class="text-center"><?php echo $tang ?></td>
            <td class="text-center"><?php echo $row['physical'] ?></td>
            <td id="title_<?php echo $row['id'] ?>"><?php echo $row['title'] ?></td>
            <td class="text-center">
                <?php
                if($row['class_study'] == 1){
                    echo '<span class="label label-sm label-success">Có</span>';
                }else{
                    echo '<span class="label label-sm label-danger">Không</span>';
                }
                ?>
            </td>
            <td class="text-center">
                <?php
                if($row['is_default'] == 1){
                    echo '<span class="label label-sm label-success">Không</span>';
                }else{
                    echo '<span class="label label-sm label-primary">Có</span>';
                }
                ?>
            </td>
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
            <td id="physicalid_<?php echo $row['id'] ?>" class="hidden"><?php echo $row['physical_id'] ?></td>
            <td id="yearid_<?php echo $row['id'] ?>" class="hidden"><?php echo $row['year_id'] ?></td>
            <td id="study_<?php echo $row['id'] ?>" class="hidden"><?php echo $row['class_study'] ?></td>
            <td id="default_<?php echo $row['id'] ?>" class="hidden"><?php echo $row['is_default'] ?></td>
            <td id="function_<?php echo $row['id'] ?>" class="hidden"><?php echo $row['is_function'] ?></td>
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
            $createlink = $convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_department', 1);
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