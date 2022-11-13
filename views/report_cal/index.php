<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Báo cáo thống kê</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Báo giảng
                    <small class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" onclick="filter()">
                            <i class="fa fa-search"></i>
                            Lọc dữ liệu
                        </button>
                        <button type="button" class="btn btn-success btn-sm" onclick="export_xlsx()">
                            <i class="fa fa-file-excel-o"></i>
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
                <div class="col-sm-12">
                    <div id="list_cal" class="dataTables_wrapper form-inline no-footer"></div>
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
                    Lựa chọn điều kiện lọc dữ liệu
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">Giáo viên</label>
                            <div>
                                <input type="text" id="steacher" name="steacher" placeholder="Giáo viên" 
                                style="width:100%"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Từ ngày</label>
                            <div class="input-group">
                                <input class="form-control date-picker" id="sfrom_date" type="text" 
                                name="sfrom_date" data-date-format="dd-mm-yyyy" readonly=""/>
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Đến ngày</label>
                            <div class="input-group">
                                <input class="form-control date-picker" id="sto_date" type="text" 
                                name="sto_date" data-date-format="dd-mm-yyyy" readonly=""/>
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                Lựa chọn môn học
                            </label>
                            <div>
                                <select class="select2" id="subjects" name="subjects"
                                data-placeholder="Lựa chọn môn học..." style="width:100%"></select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                Lựa chọn lớp học
                            </label>
                            <div>
                                <select class="select2" id="deps" name="deps"
                                data-placeholder="Lựa chọn lớp học..." style="width:100%"></select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                Lựa chọn tiết học
                            </label>
                            <div>
                                <select class="select2" id="less" name="less" data-minimum-results-for-search="Infinity"
                                data-placeholder="Lựa chọn tiết học..." style="width:100%">
                                    <option value="0">Tất cả</option>
                                    <option value="1">Tiết 1</option>
                                    <option value="2">Tiết 2</option>
                                    <option value="3">Tiết 3</option>
                                    <option value="4">Tiết 4</option>
                                    <option value="5">Tiết 5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Tiết học theo C/trình PP</label>
                            <div>
                                <input type="text" id="exps" name="exps"
                                placeholder="Tiết học theo chương trình phân bổ" style="width:100%"
                                onkeypress="validate(event)"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">Đầu bài dạy</label>
                            <div>
                                <input type="text" id="titles" name="titles"
                                placeholder="Đầu bài dạy" style="width:100%"/>
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
                <button class="btn btn-sm btn-primary pull-right" onclick="search()">
                    <i class="ace-icon fa fa-search"></i>
                    Tìm kiếm
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->
<script src="<?php echo URL.'/public/' ?>scripts/report/report_cal.js"></script>