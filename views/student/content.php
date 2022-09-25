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
            <th class="text-center" style="width:80px">Mã HS</th>
            <th class="">Họ và tên</th>
            <th class="text-center">Giới tính</th>
            <th class="text-center">Ngày sinh</th>
            <th class="text-center">Lớp học</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd'; 
            if($row['status'] == 1){
                $status = "Đang đi học";
            }elseif($row['status'] = 2){
                $status = "Nghỉ học";
            }else{
                $status = "Chuyển trường";
            }
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center" id="code_<?php echo $row['id'] ?>"><?php echo $row['code'] ?></td>
            <td id="fullname_<?php echo $row['id'] ?>"><?php echo $row['fullname'] ?></td>
            <td class="text-center"><?php echo ($row['gender'] == 1) ? 'Nam' : 'Nữ' ?></td>
            <td class="text-center" id="birthday_<?php echo $row['id'] ?>"><?php echo date("d-m-Y", strtotime($row['birthday'])) ?></td>
            <td class="text-center"><?php echo $row['department'] ?></td>
            <td class="text-center"><?php echo $status ?></td>
            <td class="text-center">
                <div class="action-buttons">
                    <a class="blue" href="javascript:void(0)" onclick="detail(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-search-plus bigger-130"></i>
                    </a>
                    <?php
                    if($this->_Data->check_role_view($this->_Info[0]['group_role_id'], $this->_Url[0], 2) > 0){
                    ?>
                    <a class="green" href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <?php
                    }
                    if($this->_Data->check_role_view($this->_Info[0]['group_role_id'], $this->_Url[0], 3) > 0){
                    ?>
                    <a class="red " href="javascript:void(0)" onclick="del(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                    <?php
                    }
                    ?>
                </div>
            </td>
            <td class="hidden" id="gender_<?php echo $row['id'] ?>"><?php echo $row['gender'] ?></td>
            <td class="hidden" id="department_<?php echo $row['id'] ?>"><?php echo $row['department_id'] ?></td>
            <td class="hidden" id="status_<?php echo $row['id'] ?>"><?php echo $row['status'] ?></td>
            <td class="hidden" id="image_<?php echo $row['id'] ?>"><?php echo $row['image'] ?></td>
            <td class="hidden" id="address_<?php echo $row['id'] ?>"><?php echo $row['address'] ?></td>
            <td class="hidden" id="people_<?php echo $row['id'] ?>"><?php echo $row['people_id'] ?></td>
            <td class="hidden" id="religion_<?php echo $row['id'] ?>"><?php echo $row['religion'] ?></td>
            <td class="hidden" id="datadc_<?php echo $row['id'] ?>"><?php echo $this->_Data->get_relation_via_code($row['code']) ?></td>
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_student', 1);
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