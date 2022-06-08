<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
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
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Quản lý thông tin trang thiết bị
                    <small class="pull-right hidden-480">
                        <button type="button" class="btn btn-primary btn-sm" onclick="add()">
                            <i class="fa fa-plus"></i>
                            Thêm mới
                        </button>
                        <button type="button" class="btn btn-info btn-sm" onclick="import_devices()">
                            <i class="fa fa-file-excel-o"></i>
                            Nhập từ file
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div id="list_device" class="dataTables_wrapper form-inline no-footer"></div>
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
                    Thêm mới - Cập nhật thông tin thiết bị
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Mã thiết bị</label>
                            <div>
                                <input type="text" id="form-field-username"
                                    placeholder="Tiêu đề trình độ, ví dụ: Đại học" style="width:100%" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Tiêu đề</label>
                            <div>
                                <input type="text" id="form-field-username"
                                    placeholder="Tiêu đề trình độ, ví dụ: Đại học" style="width:100%" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Danh mục thiết bị</label>
                            <div>
                                <select class="select2" data-placeholder="Choose a Country..."
                                style="width:100%" required="" id="source" name="source">
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Xuất sứ</label>
                            <div>
                                <input id="date_import" type="text"  name="date_import"  required="" style="width:100%"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Nguyên giá</label>
                            <div>
                                <input type="text" id="form-field-username" onkeypress="validate(event)"
                                placeholder="Tiêu đề trình độ, ví dụ: Đại học" style="width:100%" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Khấu hao (%)</label>
                            <div>
                                <input type="text" id="form-field-username" onkeypress="validate(event)"
                                placeholder="Tiêu đề trình độ, ví dụ: Đại học" style="width:100%" 
                                maxlength="2"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Năm đưa vào sử dụng</label>
                            <div>
                                <input type="text" id="form-field-username" onkeypress="validate(event)"
                                    placeholder="Tiêu đề trình độ, ví dụ: Đại học" style="width:100%" maxlength="4"/>
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
                                <textarea type="text" id="form-field-username"placeholder="Tiêu đề trình độ, ví dụ: Đại học" 
                                style="width:100%;resize:none"></textarea>
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
        <div class="modal-content" id="form">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/devices.js"></script>