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
                    Báo cáo trang thiết bị các phòng ban
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
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="form-field-username">
                                        Lựa chọn phòng ban
                                    </label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn phòng ban"
                                        style="width:100%" id="department_id" name="department_id" 
                                        onchange="set_data(this.value)" data-minimum-results-for-search="Infinity"s>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-sm btn-info tool_tip" type="button" onclick="export_xlsx()"
                                title="Không bao gồm mã QRcode" data-toggle="tooltip" tabindex="0">
                                    <i class="ace-icon fa fa-file-excel-o"></i>
                                    Xuất file excel
                                </button>
                                <button class="btn btn-sm btn-success tool_tip" type="button" onclick="print_report()"
                                title="Bao gồm mã QRcode" data-toggle="tooltip" tabindex="0">
                                    <i class="ace-icon fa fa-print"></i>
                                    In báo cáo
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-9">
                    <h3 class="header smaller lighter blue" id="title_data">
                        Danh sách trang thiết bị phòng - 
                    </h3>
                    <div id="list_device" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script src="<?php echo URL.'/public/' ?>scripts/report/report_device_dep.js"></script>