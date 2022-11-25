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
                    Báo cáo kiểm định
                    <small class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" onclick="filter()">
                            <i class="fa fa-search"></i>
                            Lọc dữ liệu
                        </button>
                        <button type="button" class="btn btn-success btn-sm" onclick="print_proof()">
                            <i class="fa fa-print"></i>
                            In
                        </button>
                        <button type="button" class="btn btn-info btn-sm" onclick="export_xlsx()">
                            <i class="fa fa-file-excel-o"></i>
                            Xuất file excel
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
                    <div id="list_proof" class="dataTables_wrapper form-inline no-footer"></div>
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
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">
                                Giai đoạn kiểm định
                                <a class="red" href="javascript:void(0)" onclick="del_quanlity()">
                                    <i class="red fa fa-trash"></i>
                                </a>
                            </label>
                            <div>
                                <select class="select2" data-placeholder="Lựa chọn giai đoạn kiểm định..."
                                style="width:100%" id="squan" name="squan" onchange="set_standard()">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                Lựa chọn tiêu chuẩn
                                <a class="red" href="javascript:void(0)" onclick="del_stand()">
                                    <i class="red fa fa-trash"></i>
                                </a>
                            </label>
                            <div>
                                <select class="select2" data-placeholder="Lựa chọn tiêu chuẩn..."
                                style="width:100%" id="sstand" name="sstand" onchange="set_criteria()">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                Lựa chọn tiêu chí
                                <a href="javascript:void(0)" onclick="del_criteria()">
                                    <i class="red fa fa-trash"></i>
                                </a>
                            </label>
                            <div>
                                <select class="select2" data-placeholder="Lựa chọn tiêu chí..."
                                style="width:100%" id="scriteria" name="scriteria">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                Mã hóa minh chứng
                            </label>
                            <div>
                                <input type="text" id="scode" name="scode" style="width:100%" placeholder="Mã hóa minh chứng"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                Tiêu đề minh chứng
                            </label>
                            <div>
                                <input type="text" id="stitle" name="stitle" style="width:100%" placeholder="Tiêu đề minh chứng"/>
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
                <button type="button" class="btn btn-primary btn-sm pull-right" onclick="search_adv()">
                    <i class="fa fa-search"></i>
                    Tìm kiếm
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->
<script src="<?php echo URL.'/public/' ?>scripts/report/report_proof.js"></script>