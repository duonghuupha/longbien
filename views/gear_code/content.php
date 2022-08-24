<?php
$jsonObj = $this->jsonObj; $perpage = $this->perpage; $pages = $this->page; $data = base64_decode($_REQUEST['data']);
$array = explode(",", $data);
if(count($array) > 0){
    foreach($array as $item){
        $post = explode(".", $item);
        $ext[] = $post[0];
    }
}else{
    $ext = [];
}
$datadc = $ext;
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
        set_check(this.value);
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
            <th class="text_center" style="width:50px"></th>
            <th class="text-center" style="width:120px">Mã đồ dùng</th>
            <th class="" style="width:350px;">Tiêu đề</th>
            <th class="text-center">Danh mục</th>
            <th class="text-center" style="width:100px">Số  lượng tem</th>
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
                <input id="ck_<?php echo $row['id'] ?>" name="checkbox_utensils"
                type="checkbox" value="<?php echo $row['id'] ?>" class="ck_inma"
                onclick="unchecked_utensils(<?php echo $row['id'] ?>)"
                <?php echo (in_array($row['id'], $datadc) ? 'checked=""' : '') ?>/>
            </td>
            <td class="text-center"><?php echo $row['code'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td class="text-center"><?php echo $row['category'] ?></td>
            <td class="text-center">
                <input id="qty_<?php echo $row['id'] ?>" name="qty_<?php echo $row['id'] ?>"
                value="1" class="form-control" size="2" style="text-align:center"/>
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