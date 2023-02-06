<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Đồ dụng dạy học</li>
            </ul><!-- /.breadcrumb -->
            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Tìm kiếm ..." class="nav-search-input" id="nav-search-input" autocomplete="off"
                        onkeyup="search()"/>
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Nhập thông tin đồ dùng và tồn kho qua file Excel
                    <small class="pull-right hidden-480">
                        <button type="button" class="btn btn-success btn-sm" onclick="save_all()">
                            <i class="fa fa-save"></i>
                            Cập nhật
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="del_tmp()">
                            <i class="fa fa-trash"></i>
                            Xóa bản ghi tạm
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <form id="fm" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn danh mục</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chonh danh mục..."
                                        style="width:100%" id="cate_imp" name="cate_imp">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn file dữ liệu</label>
                                    <div>
                                        <input type="file" id="file_gear" name="file_gear" class="file_attach" style="width:100%"
                                        accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                Định dạng file là .xlsx (Excel 2007 trở lên). Tải file mẫu 
                                <a href="<?php echo URL.'/public/temp/gear.xlsx'; ?>" target="_blank">tại đây</a> để moulde chạy đạt hiệu quả cao
                            </div>
                            <div class="col-sm-12 text-center">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-sm" onclick="do_import()">
                                        <i class="fa fa-upload"></i>
                                        Tải file
                                    </button>
                                </div>
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
                    <form id="fm_gear" method="post" enctype="multipart/form-data">
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

<script src="<?php echo URL.'/public/' ?>scripts/gear/import.js"></script>