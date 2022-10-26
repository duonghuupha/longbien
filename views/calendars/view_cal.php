<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Chuyên môn</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    <span id="title_cal">Lịch báo  giảng</span>
                    <small class="pull-right">
                        Tháng
                        <select class="select2" data-minimum-results-for-search="Infinity"
                        data-placeholder="Lựa chọn tháng..." id="month">
                        <?php
                        for($i = 1; $i <= 12; $i++){
                            echo '<option value="'.$i.'">Tháng '.$i.'</option>';
                        }
                        ?>
                        </select>
                        &nbsp;
                        Năm
                        <select class="select2" data-minimum-results-for-search="Infinity"
                        data-placeholder="Lựa chọn năm..." id="year">
                        <?php
                        for($y = 2020; $y <= 2030; $y++){
                            echo '<option value="'.$y.'">Năm '.$y.'</option>';
                        }
                        ?>
                        </select>
                        &nbsp;
                        <button type="button" class="btn btn-info btn-sm" onclick="view_cal()">
                            <i class="fa fa-search"></i>
                            Hiển thị
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='<?php echo URL.'/calendars' ?>'"
                        title="Quay lại">
                            <i class="fa fa-arrow-left"></i>
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-sm-12">
                    <div id="content_cal">
                        
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script src="<?php echo URL.'/public/' ?>scripts/calendars/calendars.js"></script>