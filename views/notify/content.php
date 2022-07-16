<?php
$jsonObj = $this->jsonObj; $perpage = $this->perpage; $pages = $this->page;
?>
<script>
$(function(){
    var $chkboxes = $('.ck_inma');
    var lastChecked = null;
    $chkboxes.click(function(e){
        if(!lastChecked){
            lastChecked = this;
            return;
        }
        if(e.shiftKey){
            var start = $chkboxes.index(this);
            var end = $chkboxes.index(lastChecked);
            $chkboxes.slice(Math.min(start, end), Math.max(start, end) + 1).prop('checked', lastChecked.checked);
        }
        lastChecked = this;
    });
});
</script>
<table 
    id="dynamic-table" 
    class="table table-striped table-bordered table-hover dataTable no-footer" 
    role="grid"
    aria-describedby="dynamic-table_info">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px">#</th>
            <th class="text_center"></th>
            <th class="text-center" style="width:120px">Người tạo</th>
            <th class="">Nội dung</th>
            <th class="text-center">Đường dẫn</th>
            <th class="text-center">Ngày tạo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd';
            $style = ($row['readed'] == 0) ? 'style="font-weight:700"' : '';
        ?>
        <tr role="row" class="<?php echo $class ?>" <?php echo $style ?>>
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center">
                <input id="ck_<?php echo $row['id'] ?>" name="ck_<?php echo $row['id'] ?>"
                type="checkbox" value="<?php echo $row['id'] ?>" class="ck_inma"/>
            </td>
            <td class="text-center"><?php echo $row['user_create'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo '<a href="javascript:void(0)" onclick="reject_link('.$row['id'].')">'.$row['link'].'</a>' ?></td>
            <td class="text-center"><?php echo date("H:i:s d-m-Y", strtotime($row['create_at'])) ?></td>
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_notify', 1);
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