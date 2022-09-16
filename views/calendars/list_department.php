<?php
$jsonObj = $this->jsonObj;
?>
<div class="tableFixHead">
    <table role="grid" aria-describedby="dynamic-table_info">
        <thead>
            <tr role="row">
                <th class="text-center" style="width:20px">#</th>
                <th class="">Tên phòng chức năng</th>
                <th class="text-center" style="width:80px"></th>
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
                <td id="title_<?php echo $row['id'] ?>"><?php echo $row['title'] ?></td>
                <td class="text-center">
                    <input id="lesson_<?php echo $id ?>" name="lesson_<?php echo $id ?>" type="checkbox"
                    onclick="confirm_department(<?php echo $row['id'] ?>)"/>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>