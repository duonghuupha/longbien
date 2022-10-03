<?php
$userid = ($_REQUEST['userid'] != '') ? $_REQUEST['userid'] : 0;
foreach($this->jsonObj as $row){
?>
<div class="col-sm-6">
    <ul id="tree1" class="tree tree-unselectable" role="tree">
        <li class="tree-branch tree-open" role="treeitem" aria-expanded="true">
            <div class="tree-branch-header"> 
                <span class="tree-branch-name"> 
                    <i class="icon-folder ace-icon tree-minus"></i> 
                    <span class="tree-label" style="font-weight:700"><?php echo $row['title'] ?></span>
                </span>
            </div>
            <ul class="tree-branch-children" role="group" style="height:150px;overflow:auto">
                <?php
                $json = $this->_Data->get_all_cate_works_via_group($row['id']);
                foreach($json as $item){
                    $checked = ($userid != 0 && $this->_Data->check_role_works($userid, $item['id']) > 0) ? 'checked=""' : '';
                ?>
                <li class="tree-item" role="treeitem"> 
                    <span class="tree-item-name"> 
                        <input id="role_<?php echo $row['id'].'_'.$item['id'] ?>" name="role_" 
                        type="checkbox" value="<?php echo $item['id'] ?>" <?php echo $checked ?>/>
                        <span class="tree-label"><?php echo $item['title'] ?></span>
                    </span> 
                </li>
                <?php
                }
                ?>
            </ul>
        </li>
    </ul>
</div>
<?php
}
?>