<?php 
    $item = $this->jsonObj; $convert = new Convert();
    $sql = new Model();
    foreach(explode(",",  $item[0]['subject']) AS $row){
        $subject[] = $sql->return_title_subject($row);
    }
?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Nhân sự</li>
            </ul><!-- /.breadcrumb -->
            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off"
                        onkeyup="search()"/>
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Chi tiết thông tin nhân sự
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
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
                                            <div id="card" style="width:320px; height:199px; border:1px solid #06097c; border-radius: 10px;
                                            overflow:hidden;padding:5px; background: url('<?php echo URL.'/styles/images/bg_card.png' ?>') center;">
                                                <div class="top" style="width:100%; height:55px;overflow:hidden">
                                                    <div class="logo" style="float:left; width:40px;">
                                                        <img src="<?php echo URL ?>/styles/images/Logo.png" style="width:40px;height:55px;"/>
                                                    </div>
                                                    <div style="float:left; width:258px; font-family:Arial; font-size:18px; margin-left:10px;
                                                    font-weight:bold;color: #06097c; text-align:center">
                                                        <p style="margin:0px">TRƯỜNG THCS LONG BIÊN</p>
                                                        <hr style="border: 1px solid #06097c; width:80%; margin-top:0; margin-bottom:0"/>
                                                    </div>
                                                </div>
                                                <div class="main" style="float:left; width:100%; oveflow:hidden; margin-top:10px;">
                                                    <div class="left" style="float:left; width:82px;">
                                                        <img src="<?php echo URL ?>/public/avatar/<?php echo $item[0]['avatar'] ?>"
                                                        style="width:76px; height:114px; border:1px solid gray; padding:2px; border-radius:5px;"/>
                                                    </div>
                                                    <div class="right" style="float:left; width:226px; font-family: Arial; text-align:center;padding: 0 10px 0px 10px;">
                                                        <span style="text-transform:uppercase; font-weight:700; color:#eb1c24; font-size:18px;
                                                        float:left; width:100%;">
                                                            <?php echo $item[0]['fullname'] ?>
                                                        </span>
                                                        <span style="float:left; width:100%; margin-top:5px; font-weight:700; color:#06097c">
                                                            <?php echo $item[0]['job'] ?>
                                                        </span>
                                                        <span style="float:left; width:100%; margin-top:10px; ">
                                                            <img src="<?php echo URL ?>/public/barcode/teacher/<?php echo $item[0]['code'].'.png' ?>"
                                                            style="width:190px; height:30px"/>
                                                        </span>
                                                        <span style="float:left; width:100%; margin-top:5px; font-weight:700; color: #06097c;">
                                                            <?php echo $item[0]['code'] ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="hr hr2 hr-double"></div>
                                <div class="space-6"></div>
                                <div class="center">
                                    <button type="button" class="btn btn-sm btn-danger btn-white btn-round"
                                    onclick="window.location.href = '<?php echo URL.'/personal' ?>'">
                                        <i class="icon-on-right ace-icon fa fa-arrow-left"></i>
                                        <span class="bigger-110">Quay lại</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script>
$(function(){
    html2canvas(document.getElementById("card"),
    {
        allowTaint: true,
        useCORS: true
    }).then(function (canvas) {
        var anchorTag = document.createElement("a");
        document.body.appendChild(anchorTag);
        $.ajax({
            type: "POST",
            url: "<?php echo URL.'/personal/save_card' ?>",
            data: { 
                imgBase64: canvas.toDataURL(),
                code: <?php echo $item[0]['code'] ?>
            }
        }).done(function(o) {
            console.log('saved'); 
        });
    });
});
</script>