<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
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
                    Lên lớp cho học sinh
                    <small>
                        Là module hỗ trợ chuyển lớp cho toàn bộ học sinh của một lớp lên lớp mới.
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <form id="fm">
                    <div class="col-xs-12 col-sm-6">
                        <h3 class="header smaller lighter blue">
                            Chuyển từ lớp
                        </h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="form-field-username">Năm học</label>
                                    <div>
                                        <b class="form-control"><?php echo $this->_Year[0]['title'] ?></b>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn lớp học</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn lớp học..."
                                        style="width:100%" required="" id="department_from" name="department_from">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-12 col-sm-6">
                        <h3 class="header smaller lighter blue">
                            Đến  lớp
                        </h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn năm học</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn năm học..."
                                        style="width:100%" required="" id="year_to" name="year_to"
                                        onchange="set_department()">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn lớp học</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn lớp học..."
                                        style="width:100%" required="" id="department_to" name="department_to">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col -->
                </form>
                <div class="col-sm-12 text-center">
                    <button class="btn btn-sm btn-danger" onclick="javascript:location.reload(true)">
                        <i class="ace-icon fa fa-times"></i>
                        Hủy bỏ
                    </button>
                    <button class="btn btn-sm btn-primary" onclick="save()">
                        <i class="ace-icon fa fa-save"></i>
                        Ghi dữ liệu
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="space-6"></div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div id="list_change" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<script src="<?php echo URL.'/public/' ?>scripts/student/up_class.js"></script>