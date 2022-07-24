<?php 
$item = $this->jsonObj; $sql = new Model();
if($item[0]['subject'] != ''){
    foreach(explode(",",  $item[0]['subject']) AS $row){
        $subject[] = $sql->return_title_subject($row);
    }
}else{
    $subject = [];
}
?>
<script src="<?php echo URL ?>/styles/js/html2canvas.js"></script>
<div class="modal-header no-padding">
    <div class="table-header">
        Thông tin nhân sự
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
                            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
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