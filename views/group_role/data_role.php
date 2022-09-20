<?php
$jsonObj = $this->jsonObj;
foreach($jsonObj as $row){
?>
<div class="col-sm-4" style="height:150px;overflow:auto">
    <ul id="tree1" class="tree tree-unselectable" role="tree">
        <li class="tree-branch tree-open" role="treeitem" aria-expanded="true">
            <div class="tree-branch-header"> 
                <span class="tree-branch-name"> 
                    <i class="icon-folder ace-icon tree-minus"></i> 
                    <span class="tree-label" style="font-weight:700"><?php echo $row['title'] ?></span> 
                    <input id="role_<?php echo $row['id'] ?>" name="role_<?php echo $row['id'] ?>" type="checkbox"
                    value="<?php echo $row['id'] ?>" onclick="set_checked(<?php echo $row['id'] ?>)"/>
                </span>
            </div>
            <?php if($row['functions'] != ''){ ?>
            <ul class="tree-branch-children" role="group">
                <?php echo $this->_Convert->return_roles($row['id'], $row['functions']) ?>
            </ul>
            <?php
            }
            ?>
        </li>
    </ul>
</div>
<?php
}
?>