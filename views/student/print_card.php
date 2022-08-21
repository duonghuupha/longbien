<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Học sinh</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Xuất dữ liệu thẻ học sinh
                    <small class="pull-right hidden-480">
                        <button type="button" class="btn btn-success btn-sm" onclick="save()">
                            <i class="fa fa-print"></i>
                            Xuất thẻ
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href = '<?php echo URL.'/student' ?>'">
                            <i class="fa fa-arrow-left"></i>
                            Quay lại
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <input id="datadc" name="datadc" value="<?php echo $_REQUEST['data'] ?>" type="hidden"/> 
                    <?php
                    foreach($this->jsonObj as $row){
                    ?>
                    <div class="post">
                        <div id="card_<?php echo $row['id'] ?>" style="width:320px; height:199px; border:1px solid #06097c; border-radius: 10px;
                        overflow:hidden;padding:5px;">
                            <div class="top" style="width:100%; height:55px;overflow:hidden; background: url('<?php echo URL.'/styles/images/bg_card.png' ?>') center;">
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
                                    <?php
                                    if($row['image'] != ''){ 
                                    ?>
                                    <img src="<?php echo URL ?>/public/student/<?php echo $row['image'] ?>"
                                    style="width:76px; height:114px; border:1px solid gray; padding:2px; border-radius:5px;"/>
                                    <?php 
                                    }else{
                                    ?>
                                    <img src="<?php echo URL ?>/styles/images/avatars/profile-pic.jpg"
                                    style="width:76px; height:114px; border:1px solid gray; padding:2px; border-radius:5px;"/>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="right" style="float:left; width:226px; font-family: Arial; text-align:left;padding: 0 10px 0px 10px;">
                                    <span style="font-weight:700; color:#eb1c24; font-size:14px;
                                    float:left; width:100%;">
                                        <b>Họ và tên: </b><?php echo $row['fullname'] ?>
                                    </span>
                                    <span style="float:left; width:100%; margin-top:3px; font-weight:700; color:#06097c">
                                        <b>Ngày sinh: </b><?php echo $row['birthday'] ?>
                                    </span>
                                    <span style="float:left; width:100%; margin-top:3px; font-weight:700; color:#06097c">
                                        <b>Giới tính: </b><?php echo ($row['gender'] == 1) ? 'Nam' : 'Nữ';  ?>
                                    </span>
                                    <span style="float:left; width:100%; margin-top:5px; ">
                                        <img src="<?php echo URL ?>/public/barcode/student/<?php echo $row['code'].'.png' ?>"
                                        style="width:190px; height:30px"/>
                                    </span>
                                    <span style="float:left; width:100%; margin-top:5px; font-weight:700; color: #06097c;text-align:center">
                                        MHS: <?php echo $row['code'] ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(function(){
                            html2canvas(document.getElementById("card_<?php echo $row['id'] ?>"),
                            {
                                allowTaint: true,
                                useCORS: true
                            }).then(function (canvas) {
                                var anchorTag = document.createElement("a");
                                document.body.appendChild(anchorTag);
                                $('.overlay').show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo URL.'/student/save_card' ?>",
                                    data: { 
                                        imgBase64: canvas.toDataURL(),
                                        code: <?php echo $row['code'] ?>
                                    }
                                }).done(function(o) {
                                    var result = JSON.parse(o);
                                    if(result.success){
                                        $('.overlay').hide();
                                        show_message("success", result.msg);
                                    }else{
                                        $('.overlay').hide();
                                        show_message("error", result.msg);
                                    }
                                });
                            });
                        });
                    </script>
                    <?php
                    }
                    ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<style>
.post{float:left;margin-right:7px;margin-bottom:7px}
</style>
<script src="<?php echo URL.'/public/' ?>scripts/student/export_card.js"></script>