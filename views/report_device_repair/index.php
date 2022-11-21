<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Báo cáo - thống kê</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Báo cáo bảo trì - sửa chữa nâng cấp trang thiết bị
                    <small class="pull-right">
                        <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='<?php echo URL.'/report' ?>'">
                            <i class="fa fa-arrow-left"></i>
                            Quay lại
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                <form id="fm-search" method="post">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">
                                        Ngày thực hiện (Từ ngày)
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control date-picker" id="from_date" type="text" 
                                        name="from_date" data-date-format="dd-mm-yyyy" readonly=""/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">
                                        Ngày thực hiện (Đến ngày)
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control date-picker" id="to_date" type="text" 
                                        name="to_date" data-date-format="dd-mm-yyyy" readonly=""/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Đơn vị thực hiện</label>
                                    <div>
                                        <input type="text" id="agencys" name="agencys"
                                            placeholder="Đơn vị thực hiện" style="width:100%"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Thiết bị</label>
                                    <div>
                                        <input type="text" id="devices" name="devices"
                                            placeholder="Nhập tên tiết bị" style="width:100%"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-sm btn-primary" type="button" onclick="search()">
                                    <i class="ace-icon fa fa-search"></i>
                                    Lọc dữ liệu
                                </button>
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-primary btn-white dropdown-toggle" aria-expanded="false">
                                        Xuất file excel
                                        <i class="ace-icon fa fa-angle-down icon-on-right"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javscript:void(0)" onclick="export_xlsx()">Tổng hợp</a>
                                        </li>
                                        <li>
                                            <a href="javscript:void(0)" onclick="export_detail()">Chi tiết</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-9">
                    <div id="list_repair" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<script src="<?php echo URL.'/public/' ?>scripts/report/report_device_repair.js"></script>