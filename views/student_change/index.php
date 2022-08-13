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
                    Phân lớp
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <form id="fm" method="post">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn lớp học</label>
                                    <div>
                                        <select id="department_id" name="department_id" required=""
                                        data-placeholder="Lựa chọn lớp  học" style="width:100%" class="select2">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-9">
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="form-field-username">Họ và tên</label>
                                <div>
                                    <input type="text" id="fullname_s" name="fullname_s"
                                    placeholder="Nhập họ tên học sinh" style="width:100%">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="form-field-username">Năm sinh</label>
                                <div>
                                    <input type="text" id="year_s" name="year_s" maxlength="4"
                                    placeholder="Nhập năm sinh" style="width:100%" onkeypress="validate(event)">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="form-field-username">Giới tính</label>
                                <div>
                                    <select id="gender_s" name="gender_s" class="select2"
                                    data-placeholder="Lựa chọn giới tính" style="width:100%">
                                        <option value="0">Tất cả</option>
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="form-field-username">&nbsp;</label>
                                <div>
                                    <button type="button" class="btn btn-primary btn-sm" onclick="search()">
                                        <i class="fa fa-search"></i>
                                        Tìm kiếm
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm" onclick="check_list()">
                                        <i class="fa fa-check"></i>
                                        Duyệt DS
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space-3"></div>
                    <div id="list_student" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-detail" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:60%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    <span id="title_modal">Danh sách học sinh đã chọn để phân vào lớp</span>
                </div>
            </div>
            <div class="modal-body" style="height:520px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div id="list_data" class="dataTables_wrapper form-inline no-footer"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-left" id="pager">
                    <!--display pagination-->
                </small>
                <button class="btn btn-sm btn-primary pull-right" onclick="save()">
                    <i class="ace-icon fa fa-save"></i>
                    Ghi dữ liệu
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/student_change/index.js"></script>