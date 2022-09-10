<?php
$jsonObj = $this->jsonObj; //$perpage = $this->perpage; $pages = $this->page;
if(isset($_REQUEST['checked']) && $_REQUEST['checked'] != ''){
    $datachecked = base64_decode($_REQUEST['checked']); $datachecked = explode(",", $datachecked);
}else{
    $datachecked = [];
}
?>
<table class="table table-striped table-bordered table-hover no-margin-bottom">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Họ và tên</th>
            <th class="text-center">Giới tính</th>
            <th class="text-center">Ngày sinh</th>
            <th class="text-center">Nhiệm vụ</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd';
            $checked= (in_array($row['id'], $datachecked)) ? 'checked=""' : '';
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td id="fullname_<?php echo $row['id'] ?>"><?php echo $row['fullname'] ?></td>
            <td class="text-center"><?php echo ($row['gender'] == 1) ? 'Nam' : 'Nữ' ?></td>
            <td class="text-center"><?php echo date("d-m-Y",  strtotime($row['birthday'])) ?></td>
            <td class="text-center"><?php echo $row['job'] ?></td>
            <td class="text-center">
                <input type="checkbox" id="ck_<?php echo $row['id'] ?>" onclick="confirm_user(<?php echo $row['id'] ?>)"
                <?php echo $checked ?>/>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>