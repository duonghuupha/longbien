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
            <th class="text-center" style="width:80px">Mã nhân sự</th>
            <th class="">Họ và tên</th>
            <th class="text-center hidden-480">Giới tinh</th>
            <th class="text-center hidden-480">Ngày sinh</th>
            <th class="text-center hidden-480">Điện thoại</th>
            <th class="text-center hidden-480">Email</th>
            <th class="text-center" style="width:100px">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd'; 
            $style_code = ($sql->check_dupli_code_personel($row['code']) > 1) ? "style='color:red;font-weight:700'" : "";
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center" <?php echo $style_code ?>><?php echo $row['code'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td class="text-center hidden-480"><?php echo ($row['gender'] == 1) ? "Nam" : "Nữ" ?></td>
            <td class="text-center hidden-480"><?php echo date("d-m-Y", strtotime($row['birthday'])) ?></td>
            <td class="text-center hidden-480"><?php echo $row['phone'] ?></td>
            <td class="text-center hidden-480">
                <?php 
                if($convert->emailValid($row['email']) == 1){
                    echo $row['email'];
                }else{
                    echo "<b style='color:red'>".$row['email']."</b>";
                }
                ?>
            </td>
            <td class="text-center">
                <div class="action-buttons">
                    <a class="blue" href="javascript:void(0)" onclick="detail(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-search-plus bigger-130"></i>
                    </a>
                    <a class="green hidden-480" href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <a class="red hidden-480" href="javascript:void(0)" onclick="del(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                </div>
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
            $createlink = $convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_personal_tmp', 1);
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