<?php
$total = $this->total; $perpage = $this->perpage; $pages = $this->page;
if($total > $perpage){
    $pagination = $this->_Convert->pagination($total, $pages, $perpage);
    $createlink = $this->_Convert->createLinks($total, $perpage, $pagination['number'], 'view_page_users', 1);
?>
<ul class="pagination pull-right no-margin">
    <?php echo $createlink ?>
</ul>
<?php
}
?>