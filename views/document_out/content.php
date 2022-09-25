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
            <th class="">Tiêu đề</th>
            <th class="text-center">Số văn bản</th>
            <th class="text-center">Ngày văn bản</th>
            <th class="text-center">Cập nhật lần cuối</th>
            <th class="text-center" style="width:90px">Thao tác</th>
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
            <td>
                <?php echo $row['title'].'<br/>';?>
                <small style="color:gray">
                    Danh mục văn bản : <?php echo $row['category'] ?>
                    <?php
                    if($row['user_share'] != ''){
                    ?>
                    <i class="fa fa-share-alt blue" aria-hidden="true"></i>
                    <?php
                    }
                    ?>
                </small>
            </td>
            <td class="text-center"><?php echo $row['number_dc'] ?></td>
            <td class="text-center"><?php echo date("d-m-Y",  strtotime($row['date_dc'])) ?></td>
            <td class="text-center"><?php echo date("H:i:s d-m-Y",  strtotime($row['create_at'])) ?></td>
            <td class="text-center">
                <div class="action-buttons">
                    <a class="blue hidden-480" href="javascript:void(0)" onclick="detail(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-search-plus bigger-130"></i>
                    </a>
                    <?php 
                    if($this->_Info[0]['id'] == $row['user_id']){ 
                        if($this->_Data->check_role_view($this->_Info[0]['group_role_id'], $this->_Url[0], 2) > 0){
                    ?>
                    <a class="green hidden-480" href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <?php
                        }
                        if($this->_Data->check_role_view($this->_Info[0]['group_role_id'], $this->_Url[0], 3) > 0){
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_document', 1);
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