<?php
$jsonObj = $this->_Data->get_data_standard_quanlity($this->id);
$userid = ($_REQUEST['userid'] != '') ? $_REQUEST['userid'] : 0;
foreach($jsonObj as $row){
    $checked = ($userid != 0 && $this->_Data->checked_role_quanlity($userid, $row['id']) > 0) ? 'checked=""' : '';
?>
<div class="col-sm-6">
    <ul id="tree1" class="tree tree-unselectable" role="tree">
        <li class="tree-branch tree-open" role="treeitem" aria-expanded="true">
            <div class="tree-branch-header"> 
                <span class="tree-branch-name"> 
                    <i class="icon-folder ace-icon tree-minus"></i> 
                    <span class="tree-label" style="font-weight:700"><?php echo $row['title'] ?></span> 
                    <input id="role_<?php echo $row['id'] ?>" name="role_" type="checkbox"
                    value="<?php echo $row['id'] ?>" onclick="set_check_main(<?php echo $row['id'] ?>)"
                    data-role="role<?php echo $row['id'] ?>" <?php echo $checked ?>/>
                </span>
            </div>
            <ul class="tree-branch-children" role="group" style="height:150px;overflow:auto">
                <?php
                $json = $this->_Data->get_data_criteria_quanlity($row['id']);
                foreach($json as $item){
                    $checkedsub = ($userid != 0 && $this->_Data->checked_role_quanlity($userid, $row['id'].'_'.$item['id']) > 0) ? 'checked=""' : '';
                ?>
                <li class="tree-item" role="treeitem"> 
                    <span class="tree-item-name"> 
                        <input id="role_<?php echo $row['id'].'_'.$item['id'] ?>" name="role_" 
                        type="checkbox" value="<?php echo $row['id'].'_'.$item['id'] ?>" onclick="set_checked(<?php echo $row['id'].', '.$item['id'] ?>)"
                        data-role="role<?php echo $row['id'] ?>_" <?php echo $checkedsub ?>/>
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