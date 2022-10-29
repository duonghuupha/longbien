<table 
    id="dynamic-table" 
    class="table table-striped table-bordered table-hover dataTable no-footer" 
    role="grid"
    aria-describedby="dynamic-table_info">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px">#</th>
            <th class="text_center"></th>
            <th class="text-center" style="width:80px">Mã TB</th>
            <th class="">Tiêu đề</th>
            <th class="text-center">Số con</th>
            <th class="text-center">SL tem</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($this->jsonObj as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd';
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center">
                <input id="ck_dep_<?php echo $row['id'] ?>" name="ck__dep_<?php echo $row['id'] ?>"
                type="checkbox" value="<?php echo $row['id'] ?>" onclick="selected_device_dep(<?php echo $row['id'] ?>)"/>
            </td>
            <td class="text-center"><?php echo $row['code_d'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td class="text-center" id="sub_<?php echo $row['id'] ?>"><?php echo $row['sub_device'] ?></td>
            <td class="text-center">
                <input id="qty_dep_<?php echo $row['id'] ?>" name="qty_dep_<?php echo $row['id'] ?>"
                value="1" size="1" class="form-control" style="text-align:center" onchange="set_qty_dep(<?php echo $row['id'] ?>)"/>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>