<?php
$convert = new Convert(); $jsonObj = $this->jsonObj; $perpage = $this->perpage;
$pages = $this->page; $sql = new Model();
?>
<table 
    id="dynamic-table" 
    class="table table-striped table-bordered table-hover dataTable no-footer" 
    role="grid"
    aria-describedby="dynamic-table_info">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px">#</th>
            <td></td>
            <th class="text-center" style="width:80px">Mã</th>
            <th class="">Họ và tên</th>
            <th class="text-center hidden-480">Giới tinh</th>
            <th class="text-center hidden-480">Ngày sinh</th>
            <th class="text-center hidden-480">Trình độ</th>
            <th class="text-center hidden-480" title="Phân công nhiệm vụ">
                PCNV
                <i class="ace-icon fa fa-question-circle bigger-110"></i>
            </th>
            <th class="hidden-480">Chuyên môn</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd'; 
            if($row['subject'] != ''){
                foreach(explode(",",  $row['subject']) AS $item){
                    $subject[] = $sql->return_title_subject($item);
                }
            }else{
                $subject = [];
            }
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center">
                <input id="ck_<?php echo $row['id'] ?>" name="ck_<?php echo $row['id'] ?>"
                type="checkbox" value="<?php echo $row['id'] ?>" class="ck_inma"/>
            </td>
            <td class="text-center"><?php echo $row['code'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td class="text-center hidden-480"><?php echo ($row['gender'] == 1) ? "Nam" : "Nữ" ?></td>
            <td class="text-center hidden-480"><?php echo date("d-m-Y", strtotime($row['birthday'])) ?></td>
            <td class="text-center hidden-480"><?php echo $row['level'] ?></td>
            <td class="text-center hidden-480"><?php echo $row['job'] ?></td>
            <td class="hidden-480"><?php echo implode(", ", $subject) ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<div class="row mini">
    <div class="col-xs-12 col-sm-6">
        <div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">
            <?php echo $convert->return_show_entries($jsonObj['total'], $perpage,  $pages) ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <?php
        if($jsonObj['total'] > $perpage){
            $pagination = $convert->pagination($jsonObj['total'], $pages, $perpage);
            $createlink = $convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_personal', 1);
        ?>
        <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
            <ul class="pagination">
                <?php echo $createlink ?>
            </ul>
        </div>
        <?php
        }
        ?>
    </div>
</div>