<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Báo cáo thu hồi - khôi phục trang thiết bị</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Thu hồi - Khôi phục trang thiết bị
                    <small class="pull-right">
                        <button class="btn btn-sm btn-primary" type="button" onclick="filter()">
                            <i class="ace-icon fa fa-search"></i>
                            Lọc dữ liệu
                        </button>
                        <button class="btn btn-sm btn-success" type="button" onclick="export_xlsx()">
                            <i class="ace-icon fa fa-file-excel-o"></i>
                            Xuất file excel
                        </button>
                        <button class="btn btn-sm btn-danger" type="button" onclick="window.location.href='<?php echo URL.'/report' ?>'">
                            <i class="ace-icon fa fa-arrow-left"></i>
                            Quay lại
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div id="list_return" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-search" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Lựa chọn điều kiện hiển thị dữ liệu
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Ngày tạo (Từ ngày)</label>
                            <div class="input-group">
                                <input class="form-control date-picker" id="from_date" type="text" 
                                name="from_date_loan" data-date-format="dd-mm-yyyy" readonly=""/>
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Ngày tạo (Đến ngày)</label>
                            <div class="input-group">
                                <input class="form-control date-picker" id="to_date" type="text" 
                                name="to_date_loan" data-date-format="dd-mm-yyyy" readonly=""/>
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                Phòng ban/Lớp học
                            </label>
                            <div>
                                <select class="select2" id="sdep" name="sdep" style="width:100%"
                                data-placeholder="Người mượn"></select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                Trạng thái
                            </label>
                            <div>
                                <select class="select2" id="sstatus" name="sstatus" style="width:100%"
                                data-placeholder="Lựa chọn trạng thái">
                                    <option value="0">Tất cả</option>
                                    <option value="1">Khôi phục</option>
                                    <option value="2">Thu hồi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">
                                Trang thiết bị
                            </label>
                            <div>
                                <input type="text" id="stitle" name="stitle" style="width:100%"
                                placeholder="Trang thiết bị mượn"/>
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

<script src="<?php echo URL.'/public/' ?>scripts/report/report_device_return.js"></script>