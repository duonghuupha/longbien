<?php
$jsonObj = $this->jsonObj; $perpage = $this->perpage; $pages = $this->page;
foreach($jsonObj['rows'] as $row){
?>
<div class="checkbox">
    <label>
        <input name="form-field-checkbox" type="checkbox" class="ace" id="ckuser_<?php echo $row['id'] ?>"
        value="<?php echo $row['id'] ?>" onclick="selected_user(<?php echo $row['id'] ?>)">
        <span class="lbl"> <?php echo $row['fullname'] ?></span>
    </label>
</div>
<?php
}
?>
<div class="row mini">
    <div class="col-xs-12 col-sm-12">
        <?php
        if($jsonObj['total'] > $perpage){
            $pagination = $this->_Convert->pagination($jsonObj['total'], $pages, $perpage);
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_users', 1);
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