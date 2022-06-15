<?php 
$item = $this->jsonObj; $sql = new Model();
foreach(explode(",",  $item[0]['subject']) AS $row){
    $subject[] = $sql->return_title_subject($row);
}
?>
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
                                <img id="avatar" class="editable img-responsive" alt="<?php echo $item[0]['fullname'] ?>" 
                                src="<?php echo URL.'/public/avatar/'.$item[0] ['avatar']?>" />
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
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Thẻ nhân sự </div>
                                <div class="profile-info-value">
                                    <canvas id="card" width="325" height="204"></canvas>
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

<script>
    var canvas = document.getElementById('card');
    var context = canvas.getContext("2d"), ctx = canvas.getContext("2d");
    roundedImage(context, 0, 0, canvas.offsetWidth, canvas.offsetHeight, 10);
    context.strokeStyle = '#06097c';
    context.fillRect(0, 0, canvas.offsetWidth, canvas.offsetHeight);
    ctx.fillRect(0, 0, canvas.offsetWidth, canvas.offsetHeight);
    // Logo 
    var image = new Image();
    image.onload = function(){
        context.drawImage(image, 10, 5, 30, 41);
    }
    image.src = "<?php echo URL ?>/styles/images/Logo.png";
    // barcode 
    var mavach = new Image();
    mavach.src = "<?php echo URL ?>/public/barcode/teacher/<?php echo $item[0]['code'].'.png' ?>";
    mavach.onload = function(){
        ctx.drawImage(mavach, 110, 140, 190, 30);
    }
    // anh nhan su
    var avatar = new Image();
    avatar.src = "<?php echo URL ?>/public/avatar/<?php echo $item[0]['avatar'] ?>";
    avatar.onload = function(){
        roundedImage(context, 10, 60, 76, 114, 0);
        context.strokeStyle = '#ccc';
        context.stroke();
        context.clip();
        context.drawImage(avatar, 10, 60, 76, 114);
        context.restore();
    }
    // Ten truong
    context.fillStyle = "#06097c";
    context.font = "bold 13px Arial";
    context.fillText("TRƯỜNG TRUNG HỌC CƠ SỞ LONG BIÊN", 50, 25);
    // Gach chan ten truong
    context.strokeStyle = "#06097c";
    context.lineWidth = 1;
    context.moveTo(60, 35);
    context.lineTo(300, 35);
    context.stroke();
    // ten nhan su
    context.fillStyle = "#eb1c24";
    context.font = "bold 17px Arial";
    context.fillText("<?php echo mb_strtoupper($item[0]['fullname'], 'UTF-8') ?>", 120, 90);
    // nhiem vu
    context.fillStyle = "#000";
    context.font = "bold 15px Arial";
    context.fillText("<?php echo $item[0]['job'] ?>", 120, 120);
    // ma nhan su
    context.fillStyle = "#000";
    context.font = "bold 13px Arial";
    context.fillText("<?php echo $item[0]['code'] ?>", 170, 190);

    function roundedImage(ctx, x, y, width, height, radius) {
        ctx.beginPath();
        ctx.moveTo(x + radius, y);
        ctx.lineTo(x + width - radius, y);
        ctx.quadraticCurveTo(x + width, y, x + width, y + radius);
        ctx.lineTo(x + width, y + height - radius);
        ctx.quadraticCurveTo(x + width, y + height, x + width - radius, y + height);
        ctx.lineTo(x + radius, y + height);
        ctx.quadraticCurveTo(x, y + height, x, y + height - radius);
        ctx.lineTo(x, y + radius);
        ctx.quadraticCurveTo(x, y, x + radius, y);
        ctx.closePath();
    }
</script>