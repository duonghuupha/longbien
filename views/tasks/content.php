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
            <th class="text-center" style="width:80px">Mã</th>
            <th class="">Tiêu đề công việc</th>
            <th class="text-center">Ngày thực hiện</th>
            <th class="text-center">Người xử lý chính</th>
            <th class="">Người tham gia</th>
            <th class="text-center">Cập nhật lần cuối</th>
            <th class="text-center" style="width:100px">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd';
            if($row['user_share'] != ''){
                $user = explode(",", $row['user_share']);
                $z = 0;
                foreach($user as $item){
                    $z++;
                    $array[$i][] = "* ".$this->_Data->get_fullname_users($item);
                    if($z == 2){
                        if(count($user) - 2 > 0){
                            $array[$i][] = "<i style='font-size:12px;color:gray'>+".(count($user) - 2).' người khác</i>';
                            break;
                        }
                    }
                }
                $user_share = implode("<br/>", $array[$i]);
            }else{
                $user_share = "<i>Không có người tham gia</i>";
            }
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center"><?php echo $row['code'] ?></td>
            <td>
                <?php echo $row['title'] ?><br/>
                <small style="color:gray">
                    Nhóm công việc: <?php echo $row['group_task'] ?><br/>
                    Người tạo: <?php echo $row['user_create'] ?>
                </small>
            </td>
            <td class="text-center">
                <?php 
                echo ($row['time_work'] == 1) ? "Sáng"."<br/>" : "Chiều"."<br/>";
                echo date("d-m-Y", strtotime($row['date_work']));
                ?>
            </td>
            <td class="text-center">
                <?php echo $row['usermain'] ?><br/>
                <?php
                if($row['status']  == 0){
                    echo '<span class="label label-info arrowed-in arrowed-in-right">Công việc mới</span>';
                }elseif($row['status'] == 2){
                    echo '<span class="label label-warning">Đang xử lý</span>';
                }elseif($row['status'] == 3){
                    echo '<span class="label label-success arrowed-in arrowed-in-right">Hoàn thành</span>';
                }
                ?>
            </td>
            <td class=""><?php echo $user_share ?></td>
            <td class="text-center">
                <?php 
                echo date("H:i:s", strtotime($row['create_at']))."<br/>";
                echo date("d-m-Y", strtotime($row['create_at'])) 
                ?>
            </td>
            <td class="text-center">
                <div class="action-buttons">
                    <a class="blue" href="javascript:void(0)" onclick="detail(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-search-plus bigger-130"></i>
                    </a>
                    <?php
                    if($row['status'] == 0){
                    ?>
                    <a class="green hidden-480" href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <a class="red hidden-480" href="javascript:void(0)" onclick="del(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                    <?php
                    }
                    ?>
                </div>
            </td>
            <td class="hidden" id="usershare_<?php echo $row['id'] ?>"><?php echo $row['user_share'] ?></td>
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_tasks', 1);
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