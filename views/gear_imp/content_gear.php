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
            <th class="">Tên thiết bị</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd';
        ?>
        <tr role="row" class="<?php echo $class ?>" ondblclick="selected_gear(<?php echo $row['id'] ?>)"
        style="cursor:pointer">
            <td class="text-center"><?php echo $i ?></td>
            <td id="title_<?php echo $row['id'] ?>"><?php echo $row['title'] ?></td>
            <td class="hidden" id="code_<?php echo $row['id'] ?>"><?php echo $row['code'] ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<div class="row mini">
    <!--<div class="col-xs-12 col-sm-6">
        <div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">
            <?php echo $this->_Convert->return_show_entries($jsonObj['total'], $perpage,  $pages) ?>
        </div>
    </div>-->
    <div class="col-xs-12 col-sm-12">
        <?php
        if($jsonObj['total'] > $perpage){
            $pagination = $this->_Convert->pagination($jsonObj['total'], $pages, $perpage);
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_gear', 1);
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