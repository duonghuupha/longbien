<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Chuyên môn</li>
            </ul><!-- /.breadcrumb -->
            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Tìm kiếm ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Lịch báo  giảng
                    <?php
                    if($this->_Data->check_role_view($this->_Info[0]['id'], $this->_Info[0]['group_role_id'], $this->_Url[0], 1) > 0){
                    ?>
                    <small class="pull-right hidden-480">
                        <button type="button" class="btn btn-primary btn-sm" onclick="add()">
                            <i class="fa fa-plus"></i>
                            Thêm mới
                        </button>
                    </small>
                    <?php
                    }
                    ?>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-sm-12">
                    <div id="list_task" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-cal" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:50%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật thông tin báo giảng
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm" method="POST" enctype="multipart/form-data">
                        <input id="user_id" name="user_id" type="hidden"/>
                        <input id="lesson_id" name="lesson_id" type="hidden"/>
                        <input id="subjectid" name="subjectid" type="hidden"/>
                        <input id="code" name="code" type="hidden"/>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn giáo viên</label>
                                <div class="input-group">
                                    <input type="text" id="fullname" name="fullname"
                                    placeholder="Click Go! để lựa chọn" style="width:100%;" readonly=""/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm btn-primary" type="button" onclick="select_user()"
                                        id="select_users">
                                            <i class="ace-icon fa fa-users bigger-110"></i>
                                            Go!
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Ngày dạy</label>
                                <div class="input-group">
                                    <input class="form-control date-picker" id="date_study" type="text" 
                                    name="date_study" required="" data-date-format="dd-mm-yyyy" readonly=""/>
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn lớp học</label>
                                <div>
                                    <select class="select2" id="department_id" name="department_id" required=""
                                    data-placeholder="Lựa chọn lớp học..." style="width:100%" onchange="set_lesson()"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn tiết học</label>
                                <div>
                                    <select class="select2" id="lesson" name="lesson"
                                    data-placeholder="Lựa chọn tiết học..." style="width:100%"></select>
                                    <i class="title_lesson" style="font-size:11px;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn môn học</label>
                                <div>
                                    <select class="select2" id="subject_id" name="subject_id"
                                    data-placeholder="Lựa chọn môn học..." style="width:100%"></select>
                                    <i class="title_subject" style="font-size:11px;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Tiết học theo C/trình PP</label>
                                <div>
                                    <input type="text" id="lesson_export" name="lesson_export" required=""
                                    placeholder="Tiết học theo chương trình phân bổ" style="width:100%"
                                    onkeypress="validate(event)"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Đầu bài dạy</label>
                                <div>
                                    <input type="text" id="title" name="title" required=""
                                    placeholder="Đầu bài dạy" style="width:100%"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                    Đóng
                </button>
                <button class="btn btn-sm btn-primary pull-right" onclick="save()">
                    <i class="ace-icon fa fa-save"></i>
                    Ghi dữ liệu
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-users" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:55%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    Danh sách giáo viên
                </div>
            </div>
            <div class="modal-body" style="height:520px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <input class="form-control" id="nav-search-input-user" type="text" style="width:100%"
                        placeholder="Tìm kiếm" onkeyup="search_user()"/>
                    </div>
                    <div class="col-xs-12">
                        <div class="space-6"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div id="list_users" class="dataTables_wrapper form-inline no-footer"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-left" id="pager">
                    <!--display pagination-->
                </small>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-detail" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Phiếu báo giảng
                </div>
            </div>
            <div class="modal-body" id="detail">
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                    Đóng
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-device-gear-dep" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:60%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Đăng ký sử dụng trang thiết bị / đồ dùng / phòng chức năng
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm_loan">
                        <input id="datadc" name="datadc" type="hidden"/>
                        <div class="col-xs-4 col-sm-4">
                            <select class="select2" id="data_type" name="data_type" style="width:100%"
                            onchange="set_data_list()">
                                <option value="1">Trang thiết bị</option>
                                <option value="2">Đồ dùng dạy học</option>
                                <option value="3">Phòng chức năng</option>
                            </select>
                        </div>
                        <div class="col-xs-8 col-sm-8">
                            <input class="form-control" id="nav-search-input-device-gear-dep" type="text" style="width:100%"
                            placeholder="Tìm kiếm" onkeyup="search_device_gear_dep()"/>
                        </div>
                        <div class="col-xs-12">
                            <div class="space-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8">
                                <div id="list_data" class="dataTables_wrapper form-inline no-footer" style="overflow:hidden"></div>
                            </div><!-- /.col -->
                            <div class="col-xs-4 col-sm-4">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="form-field-username">Thiết bị, đồ dùng, phòng CN chuẩn bị</label>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <ul class="list-unstyled spaced" id="list_prepare" style="font-size:12px;">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-left" id="pager_data">
                    <!--display pagination-->
                </small>
                <small class="pull-right">
                    <button class="btn btn-sm btn-danger" onclick="cancel_loan()">
                        <i class="ace-icon fa fa-times"></i>
                        Đóng
                    </button>
                    <button class="btn btn-sm btn-primary" onclick="save_loan()">
                        <i class="ace-icon fa fa-save"></i>
                        Ghi dữ liệu
                    </button>
                </small>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->
<script src="<?php echo URL.'/public/' ?>scripts/calendars/index.js"></script>