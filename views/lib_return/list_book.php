<?php
$jsonObj = $this->jsonObj; //$perpage = $this->perpage; $pages = $this->page;
?>
<table class="table table-striped table-bordered table-hover no-margin-bottom">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Mã sách</th>
            <th>Tiêu đề</th>
            <th class="text-center">Danh mục</th>
            <th class="text-center">Nhà xuất bản</th>
            <th class="text-center">Tác giả</th>
            <th style="width:80px"></th>
        </tr>
    </thead>
    <tbody style="font-size:12px;">
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd';
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td><?php echo $row['code'] ?></td>
            <td id="title_<?php echo $row['id'] ?>"><?php echo $row['title'] ?></td>
            <td class="text-center"><?php echo $row['category'] ?></td>
            <td class="text-center"><?php echo $row['manufactory'] ?></td>
            <td class="text-center"><?php echo $this->_Convert->cut($row['author'], 30) ?></td>
            <td class="text-center">
                <select class="form-control select2" style="width:100%" id="book_<?php echo $row['id'] ?>"
                onchange="confirm_book(<?php echo $row['id'] ?>)" data-placeholder="" data-minimum-results-for-search="Infinity">
                <option value=""></option>
                <?php
                for($z = 1; $z <= $row['stock']; $z++){
                    if($this->_Data->check_book_loan($row['id'], $z) == 0){
                        echo '<option value="'.$z.'">'.$z.'</option>';
                    }
                }
                ?>
                </select>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<script>
    $(function(){
        $('.select2').select2();
    })
</script>