<?php
$convert = new Convert(); $jsonObj = $this->jsonObj; $perpage = $this->perpage;
$pages = $this->page; $sql = new Model();
$keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : '';
?>
<div class="modal-header no-padding">
    <div class="table-header">
        Danh sách người dùng
    </div>
</div>
<div class="modal-body no-padding">
    <div class="row" style="margin:0;">
        <div id="dynamic-table_filter" class="dataTables_filter" style="text-align:left">
            <label style="width:100%">
                <input class="form-control input-sm" placeholder="Tìm kiếm" style="width:100%"
                onkeyup="search_user()" id="table_search" value="<?php echo $keyword ?>">
            </label>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Tên đăng nhập</th>
                <th>Họ và tên</th>
                <th class="text-center">Giới tính</th>
                <th class="text-center">Ngày sinh</th>
                <th class="text-center">Trình độ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach($jsonObj['rows'] as $row){
                $i++;
                $class = ($i%2 == 0) ? 'even' : 'odd';
            ?>
            <tr role="row" class="<?php echo $class ?>">
                <td class="text-center"><?php echo $i ?></td>
                <td><?php echo $row['username'] ?></td>
                <td id="title_<?php echo $row['id'] ?>"><?php echo $row['fullname'] ?></td>
                <td class="text-center hidden-480"><?php echo ($row['gender'] == 1) ? "Nam" : "Nữ" ?></td>
                <td class="text-center hidden-480"><?php echo date("d-m-Y", strtotime($row['birthday'])) ?></td>
                <td class="text-center hidden-480"><?php echo $row['level'] ?></td>
                <td class="text-center">
                    <input type="checkbox" id="ck_<?php echo $row['id'] ?>" onclick="confirm_user(<?php echo $row['id'] ?>)"/>
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
        $createlink = $convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_user', 1);
    ?>
    <ul class="pagination pull-right no-margin">
        <?php echo $createlink ?>
    </ul>
    <?php
    }
    ?>
</div>