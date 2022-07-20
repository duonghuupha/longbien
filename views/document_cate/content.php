<?php
$jsonObj = $this->jsonObj; $perpage = $this->perpage; $pages = $this->page;
function parent($parentid, $char = ''){
    $sql = new Model(); $html = '';
    $query = $sql->get_parent_document_cate($parentid);
    if(count($query) > 0 && $parentid != 0){
        $html .= "<i>".$query[0]['title']."</i>".$char;
        //$html .=  $query[0]['title'].' => ';
        parent($query[0]['parent_id'], $char .= ' <i class="fa fa-arrow-right"></i> ');
    }
    echo $html;
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
            <th>Danh mục cha</th>
            <th class="">Tiêu đề</th>
            <th class="text-center">Cập nhật lần cuối</th>
            <th class="text-center">Thao tác</th>
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
                <?php 
                if($row['parent_id'] == 0){
                    echo "<i>Là danh mục gốc</i>";
                }else{
                    parent($row['parent_id']);
                }
                ?>
            </td>
            <td id="<?php echo 'title_'.$row['id'] ?>"><?php echo $row['title'] ?></td>
            <td class="text-center"><?php echo date("H:i:s d-m-Y",  strtotime($row['create_at'])) ?></td>
            <td class="text-center">
                <div class="action-buttons">
                    <a class="green hidden-480" href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <a class="red hidden-480" href="javascript:void(0)" onclick="del(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                </div>
            </td>
            <td class="hidden" id="parentid_<?php echo $row['id'] ?>"><?php echo $row['parent_id'] ?></td>
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