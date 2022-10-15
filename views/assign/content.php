<?php
$jsonObj = $this->jsonObj; $perpage = $this->perpage; $pages = $this->page;
function return_detail_assign($code){
    $sql = new Model();
    $json = $sql->get_all_assign_detail_via_code($code);
    $html = '['; $i = 0;
    foreach($json as $row){
        $i++;
        $array []= '{"id": '.$i.', "subject_id": "'.$row['subject_id'].'", "department_id": "'.$row['department'].'", "subject": "'.$row['subject'].'", "department": "'.return_department_title_assign($row['department']).'"}';
    }
    $html .= implode(",", $array);
    $html .= ']';
    return $html;
}
function return_department_title_assign($string){
    $str = explode(",", $string); $sql = new Model();
    foreach($str as $row){
        $array[] = $sql->return_title_department($row);
    }
    return implode(", ", $array);
}
function return_total_department_selected($code){
    $sql = new Model(); $arr = [];
    $json_dep = $sql->get_all_assign_detail_via_code($code);
    foreach($json_dep as $item){
        $items = explode(",", $item['department']);
        foreach($items as $row){
            array_push($arr, $row);
        }
    }
    $arr_total = array_filter(array_unique($arr));
    return count($arr_total);
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
            <th class="text-center" style="width:80px">Mã</th>
            <th class="text-left">Giáo viên</th>
            <th class="text-left">Môn học</th>
            <th class="text-left">Lớp học</th>
            <th class="text-center">Năm học</th>
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

        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center">
                <?php echo "<a href='javascript:void(0)' onclick='detail(".$row['id'].")'>".$row['code']."</a>" ?>
            </td>
            <td class="text-left" id="name_<?php echo $row['id'] ?>"><?php echo $row['fullname'] ?></td>
            <td class="text-left"><?php echo "Có ".$row['total_subject']." môn học được chọn" ?></td>
            <td class="text-left"><?php echo "Có ".return_total_department_selected($row['code'])." lớp học được chọn" ?></td>
            <td class="text-center"><?php echo $row['namhoc'] ?></td>
            <td class="text-center"><?php echo date("H:i:s d-m-Y", strtotime($row['create_at'])) ?></td>
            <td class="text-center">
                <div class="action-buttons">
                    <?php
                    if($this->_Data->check_role_view($this->_Info[0]['id'], $this->_Info[0]['group_role_id'], $this->_Url[0], 2) > 0){                    
                    ?>
                    <a class="green" href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <?php
                    }
                    if($this->_Data->check_role_view($this->_Info[0]['id'], $this->_Info[0]['group_role_id'], $this->_Url[0], 3) > 0){
                    ?>
                    <a class="red" href="javascript:void(0)" onclick="del(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                    <?php
                    }
                    ?>
                </div>
            </td>
            <td class="hidden" id="userid_<?php echo $row['id'] ?>"><?php echo $row['user_id'] ?></td>
            <td class="hidden" id="code_<?php echo $row['id'] ?>"><?php echo $row['code'] ?></td>
            <td class="hidden" id="detail_<?php echo $row['id'] ?>"><?php echo return_detail_assign($row['code']) ?></td>
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_assign', 1);
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