<?php
$jsonObj = $this->jsonObj; $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;

foreach($jsonObj as $row){
?>
<fieldset>
    <legend style="font-size:13px;font-weight:700">
        <?php echo $row['title'] ?>
        <input id="role<?php echo $row['id'] ?>" name="role<?php echo $row['id'] ?>" type="checkbox"
        value="<?php echo $row['id'] ?>" onclick="set_checked_main(<?php echo $row['id'] ?>)"
        <?php echo ($id != 0 && $this->_Data->checked_role($id, $row['id']) != 0) ? 'checked=""' : '' ?>/>
    </legend>
    <?php
    if(count($this->_Data->get_parent_menu($row['id'])) > 0){
        foreach($this->_Data->get_parent_menu($row['id']) as $item){
    ?>
            <div class="col-sm-4" style="height:150px;overflow:auto">
                <ul id="tree1" class="tree tree-unselectable" role="tree">
                    <li class="tree-branch tree-open" role="treeitem" aria-expanded="true">
                        <div class="tree-branch-header"> 
                            <span class="tree-branch-name"> 
                                <i class="icon-folder ace-icon tree-minus"></i> 
                                <span class="tree-label" style="font-weight:700"><?php echo $item['title'] ?></span> 
                                <input id="role_<?php echo $row['id'].'_'.$item['id'] ?>" name="role_<?php echo $row['id'].'_'.$item['id'] ?>" type="checkbox"
                                value="<?php echo $item['id'] ?>" onclick="set_checked(<?php echo $row['id'].', '.$item['id'] ?>)" data_role="role_<?php echo $row['id'] ?>_"
                                <?php echo ($id != 0 && $this->_Data->checked_role($id, $item['id']) != 0) ? 'checked=""' : '' ?>/>
                            </span>
                        </div>
                        <?php if($item['functions'] != ''){ ?>
                        <ul class="tree-branch-children" role="group">
                            <?php echo $this->_Convert->return_roles($row['id'], $item['id'], $item['functions'], $id) ?>
                        </ul>
                        <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
    <?php
        }
    }else{
        echo $this->_Convert->return_roles_horizontal($row['id'], $row['id'], $row['functions'], $id);
    }
    ?>
</fieldset>
<div class="space-6"></div>
<?php
}
?>