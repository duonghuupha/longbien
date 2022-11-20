<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
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
                    Báo cáo quá trình luân chuyển thiết bị
                    <small class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" onclick="filter()">
                            <i class="fa fa-filter"></i>
                            Lọc dữ liệu
                        </button>
                        <button type="button" class="btn btn-success btn-sm" onclick="export_xlsx()">
                            <i class="fa fa-file-excle-o"></i>
                            Xuất file Excel
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='<?php echo URL.'/report' ?>'">
                            <i class="fa fa-arrow-left"></i>
                            Quay lại
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div id="list_change" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-search" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:40%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Lựa chọn điều kiện hiển thị dữ liệu
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">Nơi đi</label>
                            <div>
                                <select class="select2" data-placeholder="Lựa chọn nơi đi..."
                                style="width:100%" id="from" name="from">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">Nơi đến</label>
                            <div>
                                <select class="select2" data-placeholder="Lựa chọn nơi đến..."
                                style="width:100%" id="to" name="to">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">
                                Tên trang thiết bị
                            </label>
                            <div>
                                <input type="text" id="stitle" name="stitle" style="width:100%"
                                placeholder="Tên trang thiết bị"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                    Đóng
                </button>
                <button type="button" class="btn btn-primary btn-sm pull-right" onclick="search()">
                    <i class="fa fa-search"></i>
                    Tìm kiếm
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/report/report_device_change.js"></script>