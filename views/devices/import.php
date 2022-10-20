<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Trang thiết bị</li>
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
                    Nhập thông tin trang thiết bị và tồn kho qua file Excel
                    <small class="pull-right hidden-480">
                        <button type="button" class="btn btn-success btn-sm" onclick="save()">
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
                                    <label for="form-field-username">Lựa chọn file dữ liệu</label>
                                    <div>
                                        <input type="file" id="file_asset" name="file_asset" class="file_attach" style="width:100%"
                                        accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                        onchange="do_import()"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                Định dạng file là .xlsx (Excel 2007 trở lên). Tải file mẫu 
                                <a href="<?php echo URL.'/public/temp/assets.xlsx'; ?>" target="_blank">tại đây</a> để moulde chạy đạt hiệu quả cao
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-9">
                    <div id="list_device_tmp" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-info" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Cập nhật thông tin thiết bị
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm_info" method="post" enctype="multipart/form-data">
                        <input id="image_old" name="image_old" type="hidden"/>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Mã thiết bị</label>
                                <div>
                                    <input type="text" id="code" name="code" style="width:100%"
                                    required="" onkeypress="validate(event)" maxlength="8"/>
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
                                <label for="form-field-username">Xuất sứ</label>
                                <div>
                                    <input id="origin" type="text"  name="origin"  required="" 
                                    style="width:100%"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Nguyên giá</label>
                                <div>
                                    <input type="text" id="price" onkeypress="validate(event)" name="price"
                                    required="" style="width:100%" data-type="currency"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Khấu hao (%)</label>
                                <div>
                                    <input type="text" id="depreciation" onkeypress="validate(event)"
                                    name="depreciation" style="width:100%" maxlength="2" required=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Năm đưa vào sử dụng</label>
                                <div>
                                    <input type="text" id="year_work" onkeypress="validate(event)"
                                    name="year_work" required="" style="width:100%" maxlength="4"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Mô tả / Thông số kỹ thuật</label>
                                <div>
                                    <textarea type="text" id="description" style="width:100%;resize:none;height:100px" name="description"></textarea>
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
                <button class="btn btn-sm btn-primary pull-right" onclick="save_info()">
                    <i class="ace-icon fa fa-save"></i>
                    Ghi dữ liệu
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/devices/import.js"></script>