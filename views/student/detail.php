<?php  
$item = $this->info;
?>
<div class="modal-header no-padding">
    <div class="table-header">
        Thông tin học sinh
    </div>
</div>
<div class="modal-body">
    <div class="row">
    <div class="col-xs-12">
            <div>
                <div id="user-profile-1" class="user-profile row">
                    <div class="col-xs-12 col-sm-3 center">
                        <div>
                            <span class="profile-picture">
                                <?php
                                if($item[0]['image'] != ''){ 
                                ?>
                                <img id="avatar" class="editable img-responsive" alt="<?php echo $item[0]['fullname'] ?>" 
                                src="<?php echo URL.'/public/student/'.$item[0] ['image']?>" />
                                <?php 
                                }else{
                                    if($item[0]['gender'] == 1){ // nam
                                ?>
                                <img id="avatar" class="editable img-responsive" alt="<?php echo $item[0]['fullname'] ?>" 
                                src="<?php echo URL ?>/styles/images/avatars/male.png" />
                                <?php
                                    }else{
                                ?>
                                <img id="avatar" class="editable img-responsive" alt="<?php echo $item[0]['fullname'] ?>" 
                                src="<?php echo URL ?>/styles/images/avatars/female.png" />
                                <?php
                                    }
                                }
                                ?>
                            </span>
                            <div class="space-4"></div>
                            <div class="width-100 label label-info label-xlg">
                                <div class="inline position-relative">
                                    <a href="javascript:void(0)" class="user-title-label">
                                        <span class="white"><?php echo $item[0]['fullname'] ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="space-6"></div>
                        <div class="profile-contact-info">
                            <div class="profile-contact-links align-left">
                                <a href="javscript:void(0)" class="btn btn-link">
                                    <i class="ace-icon fa fa-barcode bigger-125 blue"></i>
                                    <?php echo $item[0]['code'] ?>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-link">
                                    <i class="ace-icon fa fa-calendar bigger-120 green"></i>
                                    <?php echo date("d-m-Y",  strtotime($item[0]['birthday'])) ?>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-link">
                                    <i class="ace-icon fa fa-venus-mars bigger-120 pink"></i>
                                    <?php echo ($item[0]['gender'] == 1) ? "Nam" : "Nữ" ?>
                                </a>
                            </div>
                        </div>
                        <div class="hr hr16 dotted"></div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="col-sm-6">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Mã định danh </div>
                                    <div class="profile-info-value">
                                        <span class="editable" id="country"><?php echo $item[0]['code_csdl'] ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Dân tộc </div>
                                    <div class="profile-info-value">
                                        <span class="editable" id="country"><?php echo $item[0]['people'] ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Tôn giáo </div>
                                    <div class="profile-info-value">
                                        <span class="editable" id="country">Không</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Trạng thái </div>
                                    <div class="profile-info-value">
                                        <span class="editable" id="country">
                                            <?php 
                                            if($item[0]['status'] == 1){
                                                echo "Đang đi học";
                                            }elseif($item[0]['status'] == 2){
                                                echo "Nghỉ học";
                                            }elseif($item[0]['status'] == 3){
                                                echo "Chuyển trường";
                                            }else{
                                                echo "Lưu tạm";
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Lớp hiện tại </div>
                                    <div class="profile-info-value">
                                        <span class="editable" id="country">
                                            <?php echo ($item[0]['department'] != '')? $item[0]['department'] : '<i>Chưa phân lớp</i>' ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Địa chỉ </div>
                                    <div class="profile-info-value">
                                        <i class="fa fa-map-marker light-orange bigger-110"></i>
                                        <span class="editable" id="country"><?php echo $item[0]['address'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-10"></div>
                        <div class="tabbable">
                            <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
                                <li class="active">
                                    <a data-toggle="tab" href="#relation">Thông tin quan hệ</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#profile4">Chuyển lớp</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#profile5">Lên lớp</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="relation" class="tab-pane in active">
                                    <table style="font-size:12px"
                                        class="table table-striped table-bordered table-hover dataTable no-footer"
                                        role="grid" aria-describedby="dynamic-table_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="text-center" style="width:80px">Quan hệ</th>
                                                <th class="">Họ và tên</th>
                                                <th class="text-center" style="width:100px">Năm sinh</th>
                                                <th class="text-center"style="width:120px">Điện thoại</th>
                                                <th class="text-center">Nghề nghiệp</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach($this->relation as $row){
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $row['relation'] ?></td>
                                                <td><?php echo $row['fullname'] ?></td>
                                                <td class="text-center"><?php echo $row['year'] ?></td>
                                                <td class="text-center"><?php echo $row['phone'] ?></td>
                                                <td class="text-center"><?php echo $row['job'] ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="profile4" class="tab-pane">
                                    <table style="font-size:12px"
                                        class="table table-striped table-bordered table-hover dataTable no-footer"
                                        role="grid" aria-describedby="dynamic-table_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="text-center" rowspan="2">Ngày luân chuyển</th>
                                                <th class="text-center" colspan="2">Từ</th>
                                                <th class="text-center" colspan="2">Đến</th>
                                                <th class="text-center" rowspan="2">Lý do</th>
                                            </tr>
                                            <tr>
                                                <th class="t3xt-center">Năm học</th>
                                                <th class="t3xt-center">Lớp học</th>
                                                <th class="t3xt-center">Năm học</th>
                                                <th class="t3xt-center">Lớp học</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach($this->change as $row){
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo date("d-m-Y", strtotime($row['create_at'])) ?></td>
                                                <td class="text-center"><?php echo $this->_Data->return_title_year($row['year_id_from']) ?></td>
                                                <td class="text-center"><?php echo $this->_Data->return_title_department($row['department_id_from']) ?></td>
                                                <td class="text-center"><?php echo $this->_Data->return_title_year($row['year_id_to']) ?></td>
                                                <td class="text-center"><?php echo $this->_Data->return_title_department($row['department_id_to']) ?></td>
                                                <td class="text-left"><?php echo $row['content'] ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="profile5" class="tab-pane">
                                    <table style="font-size:12px"
                                        class="table table-striped table-bordered table-hover dataTable no-footer"
                                        role="grid" aria-describedby="dynamic-table_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="text-center">Năm học</th>
                                                <th class="text-center">Lớp học</th>
                                                <th class="text-center">Ngày tạo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach($this->upclass as $row){
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $this->_Data->return_title_year($row['year_id']) ?></td>
                                                <td class="text-center"><?php echo $this->_Data->return_title_department($row['department_id']) ?></td>
                                                <td class="text-center"><?php echo date("d-m-Y", strtotime($row['create_at'])) ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
        <i class="ace-icon fa fa-times"></i>
        Đóng
    </button>
</div>