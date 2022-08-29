<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Lịch làm việc</li>
            </ul><!-- /.breadcrumb -->
            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Tìm  kiếm ..." class="nav-search-input" id="nav-search-input" autocomplete="off"
                        onkeyup="search()"/>
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Công việc
                    <small class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" onclick="add()">
                            <i class="fa fa-plus"></i>
                            Thêm mới
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div id="list_tasks" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-tasks" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:55%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật thông tin công việc
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm" method="POST" enctype="multipart/form-data">
                        <input id="file_old" name="file_old" type="hidden"/>
                        <input id="datadc" name="datadc" type="hidden"/>
                        <input id="user_main_id" name="user_main_id" type="hidden"/>
                        <div class="col-sm-4">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Ngày làm việc</label>
                                    <div class="input-group">
                                        <input class="form-control date-picker" id="date_work" type="text" 
                                        name="date_work" required="" data-date-format="dd-mm-yyyy" readonly=""/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Thời gian làm việc</label>
                                    <div>
                                        <select class="select2" data-placeholder="Choose a Country..."
                                        style="width:100%" required="" id="time_work" name="time_work"
                                        data-minimum-results-for-search="Infinity">
                                            <option value="1">Sáng</option>
                                            <option value="2">Chiều</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn nhóm công việc</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn nhóm công việc..."
                                        style="width:100%" required="" id="group_id" name="group_id">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">
                                        Người xử lý chính &nbsp;
                                        <a class="red" href="javascript:void(0)" onclick="del_user_main()" title="Xóa người xử lý chính">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" id="user_main" name="user_main"
                                        placeholder="Click Go! để lựa chọn" style="width:100%" readonly=""/>
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm btn-primary" type="button" onclick="select_user(1)"
                                            id="select_users">
                                                <i class="ace-icon fa fa-user bigger-110"></i>
                                                Go!
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <label>
                                    <input name="is_display" id="is_display" class="ace ace-checkbox-2" type="checkbox"/>
                                    <span class="lbl"> Hiển thị trên lịch công tác</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-8" style="border-left:1px solid #000">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tiêu đề công việc</label>
                                    <div>
                                        <input class="form-control" id="title" type="text" name="title"  required=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Nội dung công việc</label>
                                    <div>
                                        <textarea type="text" id="content" style="width:100%;resize:none;height:70px" name="content"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">
                                        Lựa chọn người tham gia &nbsp;
                                        <a class="red" href="javascript:void(0)" onclick="del_user_share()" title="Xóa người tham gia">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" id="fullname" name="fullname"
                                        placeholder="Click Go! để lựa chọn" style="width:100%" readonly=""/>
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm btn-primary" type="button" onclick="select_user(2)"
                                            id="select_users">
                                                <i class="ace-icon fa fa-users bigger-110"></i>
                                                Go!
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tài liệu đính kèm</label>
                                    <div>
                                        <input type="file" id="file" name="file" class="file_attach" style="width:100%"/>
                                    </div>
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
    <div class="modal-dialog" style="width:51%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    Danh sách người dùng
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
                <button class="btn btn-sm btn-primary pull-right" onclick="confirm_user()">
                    <i class="ace-icon fa fa-save"></i>
                    Xác nhận
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->
<script src="<?php echo URL.'/public/' ?>scripts/task/tasks.js"></script>