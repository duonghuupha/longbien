<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Học sinh</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Sổ điểm
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
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn học kì</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn học kỳ"
                                    style="width:100%" id="semester" name="semester">
                                        <option value="1" selected="">Học kỳ 1</option>
                                        <option value="2">Học kỳ 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn môn học</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn môn học"
                                    style="width:100%" id="subject_id" name="subject_id" onchange="set_dep()">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn lớp học</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn lớp học"
                                    style="width:100%" id="department_id" name="department_id">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Họ và tên học sinh</label>
                                <div>
                                    <input class="form-control" id="fullnames" name="fullnames"
                                    style="width:100%" placeholder="Họ và tên học sinh"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <button class="btn btn-sm btn-primary" type="button" onclick="view_point()">
                                <i class="ace-icon fa fa-search"></i>
                                Hiển thị
                            </button>
                            <button class="btn btn-sm btn-info" type="button" onclick="export_xlsx()">
                                <i class="ace-icon fa fa-file-excel-o"></i>
                                Xuất file Excel
                            </button>
                        </div>
                        <div class="col-xs-12">
                            <div class="space-4"></div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <button class="btn btn-sm btn-success" type="button" onclick="export_csdl()">
                                <i class="ace-icon fa fa-file-excel-o"></i>
                                Xuất file CSDL
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div id="list_student" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script src="<?php echo URL.'/public/' ?>scripts/report/report_point.js"></script>

