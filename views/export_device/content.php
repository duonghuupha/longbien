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
            <th class="text-center" style="width:80px">Mã phân bổ</th>
            <th class="text-center" style="width:150px">Năm học</th>
            <th class="text-center hidden-480">Phòng </th>
            <th class="text-center hidden-480">Cập nhật lần cuối</th>
            <th class="text-center hidden-480">Thiết bị được phân bổ</th>
            <th class="text-center" style="width:80px">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd';
            $device = $sql->return_list_device_export($row['code']);
            $z = 0;
            if(count($device) > 0){
                foreach($device as $item){
                    $z++;
                    $array[$i][] = '* '.$item['device'].' - '.$item['sub_device'];
                    if($z == 2){
                        $array[$i][] = "<a href='javascript:void(0)' onclick='detail(".$row['id'].")'>Xem thêm</a>";
                        break;
                    }
                }
                foreach($device as $items){
                    $tbdc[$i][] = $items['device_id'].'.'.$items['sub_device'];
                }
            }else{
                $array[$i] = [];
                $tbdc[$i] = [];
            }

            
            if(count($array[$i]) != 0){
                $thietbi = implode("<br/>", $array[$i]);
            }else{
                $thietbi = "<i>Thiết bị thuộc phòng ban đã bị thu hồi hoặc luân chuyển đến phòng ban khác vì lý do khách quan</i>";
            }
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center" id="code_<?php echo $row['id'] ?>"><?php echo $row['code'] ?></td>
            <td class="text-center"><?php echo $row['namhoc'] ?></td>
            <td class="text-center" id="physicaltitle_<?php echo $row['id'] ?>"><?php echo $row['physical'] ?></td>
            <td class="text-center"><?php echo date("d-m-Y H:i:s", strtotime($row['create_at'])) ?></td>
            <td class="text-left"><?php echo $thietbi ?></td>
            <td class="text-center">
                <div class="action-buttons">
                    <a class="green" href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <a class="blue" href="javascript:void(0)" onclick="update(<?php echo $row['id'] ?>)"
                    title="Phân bổ nhiều thiết bị cùng loại một lúc" data-rel="tooltip">
                        <i class="ace-icon fa fa-refresh bigger-130"></i>
                    </a>
                </div>
            </td>
            <td class="hidden" id="physical_<?php echo $row['id'] ?>"><?php echo $row['physical_id'] ?></td>
            <td class="hidden" id="tbdc_<?php echo $row['id'] ?>"><?php echo implode(",", $tbdc[$i]) ?></td>
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
            $createlink = $convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_export_device', 1);
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