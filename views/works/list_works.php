<?php
$jsonObj = $this->jsonObj; //$perpage = $this->perpage; $pages = $this->page;
$selected = base64_decode($_REQUEST['selected']);
$array = ($selected != '') ? explode(",", $selected) : [];
?>
<table class="table table-striped table-bordered table-hover no-margin-bottom">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Nhóm hồ sơ</th>
            <th>Danh mục hồ sơ</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd';
            $checked = (count($array) > 0 && in_array($row['id'], $array)) ? 'checked=""' : '';
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td id="fullname_<?php echo $row['id'] ?>"><?php echo $row['group'] ?></td>
            <td ><?php echo $row['title'] ?></td>
            <td class="text-center">
                <input type="checkbox" id="ck_<?php echo $row['id'] ?>" onclick="sl_works(<?php echo $row['id'] ?>)"
                <?php echo $checked ?>/>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>