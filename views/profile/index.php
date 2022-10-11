<?php 
$item = $this->jsonObj;
if($item[0]['subject'] != ''){
    foreach(explode(",",  $item[0]['subject']) AS $row){
        $subject[] = $this->_Data->return_title_subject($row);
    }
}else{
    $subject = [];
}
?>
<!--Form don vi tinh-->
<div id="modal-profile" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:60%">
        <div class="modal-content" id="detail">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thông tin tài khoản
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
                                            if($item[0]['avatar'] != ''){ 
                                            ?>
                                            <img id="avatar" class="editable img-responsive" alt="<?php echo $item[0]['fullname'] ?>" 
                                            src="<?php echo URL.'/public/avatar/'.$item[0] ['avatar']?>" />
                                            <?php 
                                            }else{
                                            ?>
                                            <img id="avatar" class="editable img-responsive" alt="<?php echo $item[0]['fullname'] ?>" 
                                            src="<?php echo URL ?>/styles/images/avatars/profile-pic.jpg" />
                                            <?php
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
                                                <i class="ace-icon fa fa-globe bigger-125 blue"></i>
                                                <?php echo $item[0]['code'] ?>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-link">
                                                <i class="ace-icon fa fa-calendar bigger-120 green"></i>
                                                <?php echo $item[0]['birthday'] ?>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-link">
                                                <i class="ace-icon fa fa-envelope bigger-120 pink"></i>
                                                <?php echo ($item[0]['gender'] == 1) ? "Nam" : "Nữ" ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="hr hr16 dotted"></div>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="tabbable">
                                        <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
                                            <li class="active">
                                                <a data-toggle="tab" href="#relation">Thông tin nhân sự</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#profile4">Thông tin tài khoản</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="relation" class="tab-pane in active">
                                                <div class="profile-user-info profile-user-info-striped">
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Điện thoại </div>
                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?php echo $item[0]['phone'] ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Địa chỉ </div>
                                                        <div class="profile-info-value">
                                                            <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                            <span class="editable" id="country"><?php echo $item[0]['address'] ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Email </div>
                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?php echo $item[0]['email'] ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Trình độ </div>
                                                        <div class="profile-info-value">
                                                            <span class="editable" id="age"><?php echo $item[0]['level'] ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Nhiệm vụ </div>
                                                        <div class="profile-info-value">
                                                            <span class="editable" id="signup"><?php echo $item[0]['job'] ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Chuyên môn </div>
                                                        <div class="profile-info-value">
                                                            <span class="editable" id="signup"><?php echo implode(",", $subject) ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Ghi chú </div>
                                                        <div class="profile-info-value">
                                                            <span class="editable" id="about"><?php echo $item[0]['description'] ?></span>
                                                        </div>
                                                    </div>
                                                    <?php if($item[0]['status'] != 99){ ?>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Barcode </div>
                                                        <div class="profile-info-value">
                                                            <img src="<?php echo URL.'/public/barcode/teacher/'.$item[0]['code'].'.png' ?>"
                                                            width="190" height="30"/>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div id="profile4" class="tab-pane">
                                            <div class="profile-user-info profile-user-info-striped">
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name" style="width:160px;"> Tên đăng nhập </div>
                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?php echo $this->_Info[0]['username'] ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Mật khẩu </div>
                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?php echo '********' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Đăng nhập lần cuối </div>
                                                        <div class="profile-info-value">
                                                            <span class="editable" id="age"><?php echo $this->_Info[0]['last_login'] ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Thông tin đăng nhập </div>
                                                        <div class="profile-info-value">
                                                            <span class="editable" id="signup"><?php echo $this->_Info[0]['info_login'] ?></span>
                                                        </div>
                                                    </div>
                                                </div>
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
                <button class="btn btn-sm btn-danger pull-left" onclick="javascript:window.location.href='<?php echo URL.'/index' ?>'" type="button">
                    <i class="ace-icon fa fa-times"></i>
                    Đóng
                </button>
                <button class="btn btn-sm btn-primary pull-right" type="button" onclick="javascript:window.location.href='<?php echo URL.'/profile/update_password' ?>'">
                    <i class="ace-icon fa fa-pencil"></i>
                    Thay đổi mật khẩu
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->
<script src="<?php echo URL.'/public/' ?>scripts/profile/index.js"></script>