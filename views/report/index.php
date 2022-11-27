<?php
$array = ['red', 'green', 'blue', 'orange', 'blue2', 'orange2', 'pink'];
?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Báo cáo - Thống kê</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Báo cáo - Thống kê
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Báo cáo dữ liệu của hệ thống
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 infobox-container">
                    <?php
                    foreach($this->jsonObj as $row){
                        $randkey = array_rand($array, 2);
                    ?>
                    <div class="infobox infobox-<?php echo $array[$randkey[0]]; ?> report" 
                    onclick="window.location.href='<?php echo URL.'/'.$row['link'] ?>'">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-<?php echo $row['icon'] ?>"></i>
                        </div>
                        <div class="infobox-data">
                            <span class="infobox-data-number"></span>
                            <div class="infobox-content"><?php echo $row['title'] ?></div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->