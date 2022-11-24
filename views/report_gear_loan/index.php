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
                    Báo cáo quá trình mượn - trả đồ dùng dạy học
                    <small class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" onclick="filter()">
                            <i class="fa fa-search"></i>
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
                        <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='<?php echo URL.'/report' ?>'">
                            <i class="fa fa-arrow-left"></i>
                            Quay lại
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div id="list_loan" class="dataTables_wrapper form-inline no-footer"></div>
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
                            <label for="form-field-username">Ngày mượn (Từ ngày)</label>
                            <div class="input-group">
                                <input class="form-control date-picker" id="from_date_loan" type="text" 
                                name="from_date_loan" data-date-format="dd-mm-yyyy" readonly=""/>
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Ngày mượn (Đến ngày)</label>
                            <div class="input-group">
                                <input class="form-control date-picker" id="to_date_loan" type="text" 
                                name="to_date_loan" data-date-format="dd-mm-yyyy" readonly=""/>
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Ngày trả (Từ ngày)</label>
                            <div class="input-group">
                                <input class="form-control date-picker" id="from_date_return" type="text" 
                                name="from_date_return" data-date-format="dd-mm-yyyy" readonly=""/>
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Ngày trả (Đến ngày)</label>
                            <div class="input-group">
                                <input class="form-control date-picker" id="to_date_return" type="text" 
                                name="to_date_return" data-date-format="dd-mm-yyyy" readonly=""/>
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                Người mượn
                            </label>
                            <div>
                                <input type="text" id="sfullname" name="sfullname" style="width:100%"
                                placeholder="Người mượn"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                Tên đồ dùng dạy học
                            </label>
                            <div>
                                <input type="text" id="stitle" name="stitle" style="width:100%"
                                placeholder="Đồ dùng mượn"/>
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

<script src="<?php echo URL.'/public/' ?>scripts/report/report_gear_loan.js"></script>