<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Thư viện</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Quản lý đầu sách
                    <small class="pull-right hidden-480">
                        <button type="button" class="btn btn-info btn-sm" onclick="filter()">
                            <i class="fa fa-search"></i>
                            Lọc dữ liệu
                        </button>
                        <button type="button" class="btn btn-primary btn-sm" onclick="add()">
                            <i class="fa fa-plus"></i>
                            Thêm mới
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div id="list_library" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-library" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:60%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật thông tin sách
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm" method="post" enctype="multipart/form-data">
                        <input id="file_old" name="file_old" type="hidden"/>
                        <input id="image_old" name="image_old" type="hidden"/>
                        <input id="id" name="ide" type="hidden" value="0"/>
                        <div class="col-xs-4" style="border-right:1px solid #000">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">
                                        Mã sách &nbsp;
                                        <a href="javascript:void(0)" onclick="refresh_code()" title="Tạo mã code" id="refreshcode">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                    </label>
                                    <div>
                                        <input type="text" id="code" name="code" required="" readonly=""
                                        placeholder="Mã sách gồm 8 chữ số ngẫu nhiên" style="width:100%" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Nhà xuất bản</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn NXB..."
                                        style="width:100%" required="" id="manu_id" name="manu_id">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Danh mục</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn danh mục..."
                                        style="width:100%" required="" id="cate_id" name="cate_id">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Số trang</label>
                                    <div>
                                        <input class="form-control" id="number_page" type="text" 
                                        name="number_page" required="" placeholder="Tổng số trang sách"
                                        onkeypress="validate(event)"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tác giả</label>
                                    <div>
                                        <input class="form-control" id="author" type="text" 
                                        name="author" required="" placeholder="Tác giả"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Năm xuất bản</label>
                                    <div>
                                        <input class="form-control" id="year_publish" type="text" onkeypress="validate(event)"
                                        name="year_publish" required="" placeholder="Năm xuất bản sách"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Nơi xuất bản</label>
                                    <div>
                                        <input class="form-control" id="position_publish" type="text" 
                                        name="position_publish" required="" placeholder="Nơi xuất bản sách"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tiêu đề</label>
                                    <div>
                                        <input class="form-control" id="title" type="text" 
                                        name="title" required="" placeholder="Tiêu đề sách"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Nội dung sách</label>
                                    <div>
                                        <textarea type="text" id="content" name="content" required=""
                                        placeholder="Nội dung tóm tắt của sách" style="width:100%;height:100px;resize:none"></textarea>
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
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="form-field-username">Loại sách</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn loại sách..."
                                        style="width:100%" required="" id="type" name="type"
                                        data-minimum-results-for-search="Infinity" onchange="set_required(this.value)">
                                            <option value="1">Sách truyền thống</option>
                                            <option value="2">Sách nói, sách điện tử</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tệp dữ liệu</label>
                                    <div>
                                        <input type="file" id="file" name="file" class="file_attach" style="width:100%"
                                        onchange="check_ext()"/>
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
                            <label for="form-field-username">Tiêu đề</label>
                            <div>
                                <input type="text" id="title_s" name="title_s"
                                placeholder="Từ khóa ...." style="width:100%" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
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
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                Lựa chọn NXB
                                &nbsp;
                                <a class="red" href="javascript:void(0)" onclick="del_nxb()" title="Xóa người tham gia">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </label>
                            <div>
                                <select class="select2" data-placeholder="Lựa chọn NXB"
                                style="width:100%" id="manu_s" name="manu_s">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">Tác giả</label>
                            <div>
                                <input type="text" id="author_s" name="author_s"
                                placeholder="Tác giả ...." style="width:100%" />
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
<div id="modal-read" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:60%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    <span id="title_modal_h"></span>
                </div>
            </div>
            <div class="modal-body" style="height:520px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <input class="form-control" id="nav-search-input-read" type="text" style="width:100%"
                        placeholder="Tìm kiếm" onkeyup="search_read()"/>
                    </div>
                    <div class="col-xs-12">
                        <div class="space-6"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <input id="id_book" name="id_book" type="hidden"/>
                        <div id="list_read" class="dataTables_wrapper form-inline no-footer"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-left" id="pager_read">
                    <!--display pagination-->
                </small>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/library/index.js"></script>