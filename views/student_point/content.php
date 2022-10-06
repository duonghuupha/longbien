<?php
$jsonObj = $this->jsonObj; $perpage = $this->perpage; $pages = $this->page;
$semester = (isset($_REQUEST['semester']) && $_REQUEST['semester'] != '') ?  $_REQUEST['semester'] : 1;
$subject = (isset($_REQUEST['subject']) && $_REQUEST['subject'] != '') ? $_REQUEST['subject'] : 0;
?>
<table 
    id="dynamic-table" 
    class="table table-striped table-bordered table-hover dataTable no-footer" 
    role="grid"
    aria-describedby="dynamic-table_info">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px" rowspan="2">#</th>
            <th class="" rowspan="2">Họ và tên</th>
            <th class="text-center" rowspan="2">Ngày sinh</th>
            <th class="text-center" rowspan="2">Lớp học</th>
            <th class="text-center" colspan="4">ĐĐGtx</th>
            <th class="text-center" rowspan="2">ĐĐGgk</th>
            <th class="text-center" rowspan="2">ĐĐGck</th>
        </tr>
        <tr>
            <th class="text-center">1</th>
            <th class="text-center">2</th>
            <th class="text-center">3</th>
            <th class="text-center">4</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd'; 
            if($row['status'] == 1){
                $status = "Đang đi học";
            }elseif($row['status'] = 2){
                $status = "Nghỉ học";
            }else{
                $status = "Chuyển trường";
            }
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td>
                <?php
                if($subject !=  0){
                ?>
                <a href="javascript:void(0)" onclick="set_point(<?php echo $row['id'].', '.$semester.', '.$subject ?>)">
                    <?php echo $row['fullname'] ?>
                </a>
                <?php
                }else{
                    echo $row['fullname'];
                }
                ?>
            </td>
            <td class="text-center" id="birthday_<?php echo $row['id'] ?>"><?php echo date("d-m-Y", strtotime($row['birthday'])) ?></td>
            <td class="text-center"><?php echo $row['department'] ?></td>
            <?php
            for($z = 1; $z <= 6; $z++){
                $bold = ($this->_Data->check_change_point($row['id'], $z, $this->_Year[0]['id'], $subject, $semester) > 0) ? 'style="color:red"' : '';
            ?>
            <td class="text-center" id="diem<?php echo $z ?>_<?php echo $row['id'] ?>" <?php echo $bold ?>><?php echo $this->_Data->return_point_of_student($z, $row['id'], $this->_Year[0]['id'], $semester, $subject) ?></td>
            <?php
            }
            ?>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<div class="row mini">
    <div class="col-xs-12 col-sm-6">
        <div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">
            <?php echo $this->_Convert->return_show_entries($jsonObj['total'], $perpage,  $pages) ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <?php
        if($jsonObj['total'] > $perpage){
            $pagination = $this->_Convert->pagination($jsonObj['total'], $pages, $perpage);
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_student', 1);
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