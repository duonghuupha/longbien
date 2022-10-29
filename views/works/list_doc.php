<?php
$jsonObj = $this->jsonObj;
?>
<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px">#</th>
            <th class="text-center" style="width:120px">Loại văn bản</th>
            <th class="">Tiêu đề</th>
            <th class="text-center">Danh mục</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="listPage">
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd'; 
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center" id="type_<?php echo $row['id'] ?>"><?php echo $row['type'] ?></td>
            <td id="title_<?php echo $row['id'] ?>"><?php echo $row['title'] ?></td>
            <td class="text-center" id="cate_<?php echo $row['id'] ?>"><?php echo $row['category'] ?></td>
            <td>
                <input type="checkbox" id="ck_<?php echo $row['id'] ?>" onclick="confirm_doc('<?php echo $row['id'] ?>')"/>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>