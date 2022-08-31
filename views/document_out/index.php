<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Văn bản</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Văn bản đi
                    <small class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" onclick="add()">
                            <i class="fa fa-plus"></i>
                            Thêm mới
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <form id="fm-search" method="post">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Từ khóa</label>
                                    <div>
                                        <input type="text" id="keywork" name="keywork"
                                        placeholder="TÌm kiếm ...." style="width:100%" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">
                                        Lựa chọn danh mục
                                        &nbsp;
                                        <a class="red" href="javascript:void(0)" onclick="del_cate()" title="Xóa người tham gia">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn danh mục"
                                        style="width:100%" id="cate_s" name="cate_s">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-sm btn-primary" type="button" onclick="search()">
                                    <i class="ace-icon fa fa-search"></i>
                                    Lọc dữ liệu
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-9">
                    <div id="list_document" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<!--Form don vi tinh-->
<div id="modal-document" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:60%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật thông tin văn bản đi
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm" method="POST" enctype="multipart/form-data">
                        <input id="data_user_share" name="data_user_share"  type="hidden"/>
                        <input id="file_old" name="file_old" type="hidden"/>
                        <div class="col-xs-4">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn danh mục</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn danh mục..."
                                        style="width:100%" required="" id="cate_id" name="cate_id">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Số văn bản</label>
                                    <div>
                                        <input class="form-control" id="number_dc" type="text" 
                                        name="number_dc" required="" placeholder="Số văn bản, ví dụ: 01/KH-UBND"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Ngày văn bản</label>
                                    <div class="input-group">
                                        <input class="form-control date-picker" id="date_dc" type="text" 
                                        name="date_dc" required="" data-date-format="dd-mm-yyyy" readonly=""/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Nơi nhận</label>
                                    <div>
                                        <input class="form-control" id="location_to" type="text" 
                                        name="location_to" placeholder="Nơi nhận văn bản" required=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-8" style="border-left:1px solid #000">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tiêu đề văn bản</label>
                                    <div>
                                        <input class="form-control" id="title" type="title" 
                                        name="title" required="" placeholder="Tiêu đề văn bản"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Trích yếu</label>
                                    <div>
                                        <textarea class="form-control" id="content"
                                        name="content" placeholder="Nội dung tóm tắt  của văn bản..." 
                                        style="width:100%;height:100px;resize:none"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tệp văn bản</label>
                                    <div>
                                        <input type="file" id="file" name="file" class="file_attach" style="width:100%"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">
                                        Chia sẻ
                                        &nbsp;
                                        <a class="red" href="javascript:void(0)" onclick="del_user_share()" title="Xóa người tham gia">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" id="fullname" name="fullname"
                                        placeholder="Click Go! để lựa chọn" style="width:100%;" readonly=""/>
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
<div id="modal-detail" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:60%">
        <div class="modal-content" id="detail">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-users" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:62%">
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
<script src="<?php echo URL.'/public/' ?>scripts/document/out.js"></script>