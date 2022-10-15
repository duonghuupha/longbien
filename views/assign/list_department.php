<?php
$jsonObj = $this->jsonObj; //$perpage = $this->perpage; $pages = $this->page;
$checked = $_REQUEST['checked'];
if($checked != ''){
    $array_check = explode(",", base64_decode($checked));
}else{
    $array_check = [];
}
?>
<table class="table table-striped table-bordered table-hover no-margin-bottom">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Tên môn học</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd';
            $checked = (count($array_check) > 0 && in_array($row['id'], $array_check)) ? "checked=''" : '';
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td id="titledep_<?php echo $row['id'] ?>"><?php echo $row['title'] ?></td>
            <td class="text-center">
                <input type="checkbox" id="ck_<?php echo $row['id'] ?>" onclick="checked_department(<?php echo $row['id'] ?>)"
                <?php echo $checked ?>/>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>