<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Danh mục</li>
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
                    Khai báo thông tin các phòng "vật lý"
                    <small class="pull-right">
                        <button class="btn btn-sm btn-info" type="button" onclick="import_xls()">
                            <i class="ace-icon fa fa-file-excel-o"></i>
                            Nhập từ file
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <form id="fm" method="post">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn khu nhà</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn khu nhà"
                                        style="width:100%" required="" id="region" name="region">
                                            <option value="1">Khu nhà A</option>
                                            <option value="2">Khu nhà B</option>
                                            <option value="3">Khu nhà C</option>
                                            <option value="4">Khu nhà D</option>
                                            <option value="5">Khu nhà E</option>
                                            <option value="6">Khu nhà F</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn tầng</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn tầng"
                                        style="width:100%" required="" id="floor" name="floor">
                                            <option value="1">Tầng 1</option>
                                            <option value="2">Tầng 2</option>
                                            <option value="3">Tầng 3</option>
                                            <option value="4">Tầng 4</option>
                                            <option value="5">Tầng 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tên phòng</label>
                                    <div>
                                        <input type="text" id="title" name="title" required=""
                                        placeholder="Tên phòng, ví dụ: Phòng A201" style="width:100%" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-sm btn-danger" type="button" onclick="window.location.href='<?php echo URL.'/physical_room' ?>'">
                                    <i class="ace-icon fa fa-times"></i>
                                    Hủy bỏ
                                </button>
                                <button class="btn btn-sm btn-primary" type="button" onclick="save()">
                                    <i class="ace-icon fa fa-save"></i>
                                    Ghi dữ liệu
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-9">
                    <div id="list_physical" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-import" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật thông tin nhân sự
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm-import" method="POST" enctype="multipart/form-data">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn file</label>
                                <div>
                                    <input type="file" id="file" name="file" class="file_attach" style="width:100%"
                                    accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">
                                Định dạng file là <b>.xlsx</b> (Excel 2007 trở lên). Tải file mẫu 
                                <a href="<?php echo URL.'/public/temp/physical_room.xlsx'; ?>" target="_blank">tại đây</a> để moulde chạy đạt hiệu quả cao
                                </label>
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
                <button class="btn btn-sm btn-primary pull-right" onclick="saveimp()">
                    <i class="ace-icon fa fa-save"></i>
                    Ghi dữ liệu
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/categories/physical_room.js"></script>