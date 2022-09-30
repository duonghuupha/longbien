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
            <th class="text-center" style="width:80px">Mã hóa</th>
            <th class="">Tiêu chuẩn / tiêu chí</th>
            <th class="">Tiêu đề</th>
            <th class="text-center">Người tạo</th>
            <th class="text-center">Cập nhật lần cuối</th>
            <th class="text-center" style="width:70px">Thao tác</th>
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
                <a href="javascript:void(0)" onclick="detail(<?php echo $row['id'] ?>)">
                    <?php echo $row['code_proof'] ?>
                </a>
            </td>
            <td><?php echo "<b><i>".$row['standard']."</i></b><br/>".$row['criteria'] ?></td>
            <td class="">
                <?php 
                    echo $row['title'];
                    if($row['file']  != ''){
                        echo '&nbsp; <i class="fa fa-thumb-tack"></i>';
                    }    
                ?>
            </td>
            <td class="text-center"><?php echo $row['fullname'] ?></td>
            <td class="text-center"><?php echo date("H:i:s d-m-Y", strtotime($row['create_at'])) ?></td>
            <td class="text-center">
                <div class="action-buttons">
                    <?php
                    if($this->_Info[0]['id'] == $row['user_id']){
                        if($this->_Data->check_role_view($this->_Info[0]['id'], $this->_Info[0]['group_role_id'], $this->_Url[0], 2) > 0){
                    ?>
                    <a class="green hidden-480" href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <?php
                        }
                        if($this->_Data->check_role_view($this->_Info[0]['id'], $this->_Info[0]['group_role_id'], $this->_Url[0], 3) > 0){
                    ?>
                    <a class="red hidden-480" href="javascript:void(0)" onclick="del(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                    <?php
                        }
                    }
                    ?>
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