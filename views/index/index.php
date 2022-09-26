<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Bàn làm việc</li>
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Bảng điều khiển
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Tổng quan và số liệu thống kê
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="space-6"></div>
                        <div class="col-sm-6 col-xs-4 infobox-container" id="block_one">
                        </div>
                        <div class="vspace-12-sm"></div>
                        <div class="col-sm-6 col-xs-4">
                            <div class="widget-box transparent" id="block_two">
                            </div><!-- /.widget-box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="hr hr32 hr-dotted"></div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-4">
                            <div class="widget-box transparent" id="block_three">
                            </div><!-- /.widget-box -->
                        </div><!-- /.col -->
                        <div class="col-sm-6 col-xs-4">
                            <div class="widget-box transparent">
                                <div class="widget-header widget-header-flat">
                                    <h4 class="widget-title lighter">
                                        <i class="ace-icon fa fa-calendar orange"></i>
                                        Lịch báo giảng hôm nay
                                        <select class="select2" id="department_schedule" style="width:150px"
                                        data-placeholder="Lựa chọn lớp  học" onchange="set_data_schedule()"></select>
                                    </h4>
                                    <div class="widget-toolbar">
                                        <a href="javascript:void(0)" onclick="window.location.href='<?php echo URL.'/calendars' ?>'">
                                            <i class="ace-icon fa fa-info-circle"></i>
                                            Xem thêm
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body" style="min-height:200px;">
                                    <div class="widget-main no-padding" id="block_four">
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="hr hr32 hr-dotted"></div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-4">
                            <div class="widget-box transparent" id="recent-box">
                                <div class="widget-header">
                                    <h4 class="widget-title lighter smaller">
                                        <i class="ace-icon fa fa-rss orange"></i>Kết quả học tập
                                    </h4>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main padding-4">
                                        
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div><!-- /.col -->
                        <div class="col-sm-6 col-xs-4">
                            <div class="widget-box transparent">
                                <div class="widget-header">
                                    <h4 class="widget-title lighter smaller">
                                        <i class="ace-icon fa fa-book blue"></i>Thư viện
                                    </h4>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main no-padding">
                                        
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script src="<?php echo URL.'/public/' ?>scripts/index/block.js"></script>
<script src="<?php echo URL.'/public/' ?>scripts/index.js"></script>