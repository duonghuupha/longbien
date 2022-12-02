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
                    Hồ sơ trang thiết bị
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
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-sm btn-success" type="button" onclick="select_device()"
                                style="width:100%">
                                    <i class="ace-icon fa fa-check"></i>
                                    Lựa chọn trang thiết bị
                                </button>
                            </div>
                            <div class="col-xs-12">
                                <div class="space-4"></div>
                            </div>
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-sm btn-primary" type="button" onclick="export_xlsx()"
                                style="width:100%">
                                    <i class="ace-icon fa fa-file-excel-o"></i>
                                    Xuất hồ sơ trang thiết bị
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-9">
                    <input id="device_id" name="device_id" type="hidden"/>
                    <div id="list_device" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-search" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:60%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    Lựa chọn điều kiện hiển thị dữ liệu
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">Lựa chọn dữ liệu</label>
                            <div>
                                <select class="select2" data-placeholder="Lựa chọn dữ liệu"
                                style="width:100%" id="type_data" name="type_data" onchange="set_data()">
                                    <option value="">Lựa chọn dữ liệu</option>    
                                    <option value="1">Danh sách trang thiết bị</option>
                                    <option value="2">Theo phòng ban</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-8" id="search_device">
                        <div class="form-group">
                            <label for="form-field-username">Từ khóa</label>
                            <div>
                                <input id="nav-search-input-device" name="nav-search-input-device" type="text"
                                style="width:100%;" placeholder="Từ khóa" onkeyup="search_device()"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div id="data_content" class="dataTables_wrapper form-inline no-footer"></div>
                    </div>
                    <div class="col-xs-6" id="select_dep">
                        <div class="form-group" style="width:100%">
                            <label for="form-field-username">Lựa chọn phòng ban / Lớp học</label>
                            <div>
                                <select class="select2" data-placeholder="Lựa chọn phòng..." style="width:100%" required=""
                                    id="physical_id" name="physical_id" onchange="set_device(this.value)">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6"  id="select_dev">
                        <div class="form-group" style="width:100%">
                            <label for="form-field-username">Lựa chọn trang thiết bị</label>
                            <div>
                                <select class="select2" data-placeholder="Lựa chọn thiết bị..." style="width:100%" required=""
                                    id="device_s" name="device_s" onchange="set_ho_so()">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/report/report_device_detail.js"></script>