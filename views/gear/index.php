<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Đồ dùng dạy học</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Quản lý thông tin đồ dùng
                    <small class="pull-right hidden-480">
                        <button type="button" class="btn btn-primary btn-sm" onclick="add()">
                            <i class="fa fa-plus"></i>
                            Thêm mới
                        </button>
                        <button type="button" class="btn btn-info btn-sm" onclick="import_gear()">
                            <i class="fa fa-file-excel-o"></i>
                            Nhập từ file
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
                                    <label for="form-field-username">Mã đồ dùng</label>
                                    <div>
                                        <input type="text" id="codes" name="codes"
                                        placeholder="Mã đồ dùng" style="width:100%" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tiêu đề</label>
                                    <div>
                                        <input type="text" id="titles" name="titles"
                                        placeholder="Tên đồ dùng" style="width:100%" />
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
                                    Tìm kiếm
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-9">
                    <div id="list_gear" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-gear" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật thông tin đồ dùng
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm" method="post" enctype="multipart/form-data">
                        <input id="image_old" name="image_old" type="hidden"/>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Mã đồ dùng</label>
                                <div>
                                    <input type="text" id="code" name="code" style="width:100%"
                                    required="" readonly=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Tiêu đề</label>
                                <div>
                                    <input type="text" id="title" name="title" style="width:100%"
                                    required=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Danh mục đồ dùng</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chonh danh mục..."
                                    style="width:100%" required="" id="cate_id" name="cate_id">
                                    </select>
                                </div> 
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Hình ảnh</label>
                                <div>
                                    <input type="file" id="image" name="image" class="file_attach" style="width:100%"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Mô tả / Thông số kỹ thuật</label>
                                <div>
                                    <textarea type="text" id="content" style="width:100%;resize:none;height:100px" name="content"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Số lượng</label>
                                <div>
                                    <input type="text" id="stock" name="stock" style="width:100%"
                                    required="" onkeypress="validate(event)"/>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thông tin chi tiết đồ dùng
                </div>
            </div>
            <div class="modal-body">
                <div class="row" id="detail">
                    
                </div>
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

<script src="<?php echo URL.'/public/' ?>scripts/gear/info.js"></script>