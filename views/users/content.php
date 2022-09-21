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
            <th class="text-center" style="width:80px">Mã</th>
            <th class="">Tên đăng nhập</th>
            <th class="text-center">Họ tên nhân sự</th>
            <th class="text-center">Đăng nhập lần cuối</th>
            <th class="text-center" style="width:250px">Thông tin đăng nhập</th>
            <th class="text-center">Trạng thái</th>
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
            <td class="text-center"><?php echo $row['code'] ?></td>
            <td id="username_<?php echo $row['id'] ?>"><?php echo $row['username'] ?></td>
            <td class="text-center" id="fullname_<?php echo $row['id'] ?>"><?php echo $row['fullname'] ?></td>
            <td class="text-center"><?php echo $row['last_login'] ?></td>
            <td class="text-center"><?php echo $row['info_login'] ?></td>
            <td class="text-center">
                <?php
                if($row['active'] == 1){
                    echo '<span class="label label-sm label-success">Đang hoạt động</span>';
                }else{
                    echo '<span class="label label-sm label-danger">Không hoạt động</span>';
                }
                ?>
            </td>
            <td class="text-center">
                <div class="action-buttons">
                    <a class="green" href="javascript:void(0)" onclick="re_pass(<?php echo $row['id'] ?>)"
                    title="Đặt lại mật khẩu">
                        <i class="ace-icon fa fa-refresh bigger-130"></i>
                    </a>
                    <a class="blue" href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <a class="red" href="javascript:void(0)" onclick="del(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                </div>
            </td>
            <td class="hidden" id="hrid_<?php echo $row['id'] ?>"><?php echo $row['hr_id'] ?></td>
            <td class="hidden" id="group_<?php echo $row['id'] ?>"><?php echo $row['group_role_id'] ?></td>
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
            $createlink = $convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_users', 1);
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