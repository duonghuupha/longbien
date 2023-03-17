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
        <tr role="row" class="<?php echo $class ?>" ondblclick="selected_device(<?php echo $row['id'] ?>)"
        style="cursor:pointer">
            <td class="text-center"><?php echo $i ?></td>
            <td id="title_<?php echo $row['id'] ?>"><?php echo $row['title'].' - '.$row['sub_device'] ?></td>
            <td class="hidden" id="sub_<?php echo $row['id'] ?>"><?php echo $row['sub_device'] ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<div class="row mini">
    <div class="col-xs-12 col-sm-12">
        <?php
        if($jsonObj['total'] > $perpage){
            $pagination = $this->_Convert->pagination($jsonObj['total'], $pages, $perpage);
            $createlink = $this->_Convert->createLinks_parameter_other($jsonObj['total'], $perpage, $pagination['number'], 'view_page_device', $_REQUEST['id'], 1);
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