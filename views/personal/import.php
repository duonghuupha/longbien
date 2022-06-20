<?php
$sql = new Model();
?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Nhân sự</li>
            </ul><!-- /.breadcrumb -->
            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off"
                        onkeyup="search()"/>
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Nhập thông tin nhân sự qua file Excel
                    <small class="pull-right hidden-480">
                        <button type="button" class="btn btn-success btn-sm" onclick="save()">
                            <i class="fa fa-save"></i>
                            Ghi dữ liệu
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
                                        <input type="file" id="file_tmp" name="file_tmp" class="file_attach" style="width:100%"
                                        accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                        onchange="do_import()"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                Định dạng file là <b>.xlsx</b> (Excel 2007 trở lên). Tải file mẫu 
                                <a href="<?php echo URL.'/public/temp/personel.xlsx'; ?>" target="_blank">tại đây</a> để moulde chạy đạt hiệu quả cao
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-9">
                    <div id="list_personel_tmp" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-personel" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header no-padding">
                <div class="table-header">
                    Cập nhật thông tin nhân sự
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm_edit" method="POST" enctype="multipart/form-data">
                        <input id="id"  name="id" type="hidden"/>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Mã nhân sự</label>
                                <div class="input-group">
                                    <input type="text" id="code" name="code" style="width:100%"
                                    onkeypress="validate(event)"/>
                                    <span class="input-group-addon" style="cursor: pointer" title="Cập nhật mã nhân sự"
                                    id="change_code">
                                        <i class="fa fa-refresh bigger-110"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Họ và tên</label>
                                <div>
                                    <input type="text" id="fullname" name="fullname" required=""
                                        placeholder="Họ và tên" style="width:100%" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Giới tính</label>
                                <div>
                                    <select class="select2" data-placeholder="Choose a Country..."
                                    style="width:100%" required="" id="gender" name="gender"
                                    data-minimum-results-for-search="Infinity">
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Ngày sinh (dd-mm-yyyy)</label>
                                <div>
                                    <input class="form-control input-mask-date" id="birthday" type="text" 
                                    name="birthday" required=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Điện thoại</label>
                                <div>
                                    <input type="text" id="phone" name="phone" onkeypress="validate(event)"
                                    placeholder="Điện thoại" style="width:100%" maxlength="10" required=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Email</label>
                                <div>
                                    <input type="email" id="email" name="email" placeholder="Email" style="width:100%"
                                    required=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Địa chỉ</label>
                                <div>
                                    <input type="text" id="address" name='address' placeholder="Địa chỉ" style="width:100%"
                                    required=""/>
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

<!--Form don vi tinh-->
<div id="modal-detail" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:60%">
        <div class="modal-content" id="detail">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/personel/import.js"></script>