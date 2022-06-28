<?php
$convert = new Convert(); $jsonObj = $this->jsonObj; $perpage = $this->perpage;
$pages = $this->page; $sql = new Model();$keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : '';
?>
<div class="modal-header no-padding">
    <div class="table-header">
        Danh sách trang thiết bị có thể mượn
    </div>
</div>
<div class="modal-body no-padding">
    <div class="row" style="margin:0;">
        <div id="dynamic-table_filter" class="dataTables_filter" style="text-align:left">
            <label style="width:100%">
                <input class="form-control input-sm" placeholder="Tìm kiếm" style="width:100%"
                onkeyup="search_device()" id="table_search" value="<?php echo $keyword ?>"
                autofocus="">
            </label>
        </div>
    </div>
    <table 
        id="dynamic-table" 
        class="table table-striped table-bordered table-hover dataTable no-footer" 
        role="grid"
        aria-describedby="dynamic-table_info">
        <thead>
            <tr role="row">
                <th class="text-center" style="width:20px">#</th>
                <th class="text-center" style="width:80px">Mã TB</th>
                <th class="">Tiêu đề</th>
                <th class="text-center" style="width:80px">Số con(s)</th>
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
                <td class="text-center" id="code_<?php echo $row['id'] ?>"><?php echo $row['code'] ?></td>
                <td id="title_<?php echo $row['id'] ?>"><?php echo $row['title'] ?></td>
                <td class="text-center">
                    <select class="form-control select2" style="width:100%" id="device_<?php echo $row['id'] ?>"
                    onchange="confirm_device(<?php echo $row['id'] ?>)" data-placeholder="">
                    <option value=""></option>
                    <?php
                    for($z = 1; $z <= $row['stock']; $z++){
                        if($sql->check_exit_sub_device($row['id'], $z) == 0 
                        && $sql->check_exit_sub_device_loans($row['id'], $z) == 0){
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
</div>
<div class="modal-footer no-margin-top">
    <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
        <i class="ace-icon fa fa-times"></i>
        Đóng
    </button>
    <?php
    if($jsonObj['total'] > $perpage){
        $pagination = $convert->pagination($jsonObj['total'], $pages, $perpage);
        $createlink = $convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_device', 1);
    ?>
    <ul class="pagination pull-right no-margin">
        <?php echo $createlink ?>
    </ul>
    <?php
    }
    ?>
</div>
<script>
    $(function(){
        $('.select2').select2();
    })
</script>