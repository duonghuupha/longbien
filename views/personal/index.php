<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
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
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Quản lý nhân sự
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
                    <div id="list_personal" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<!--Form don vi tinh-->
<div id="modal-personal" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật thông tin nhân sự
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Mã nhân sự</label>
                            <div>
                                <input type="text" id="form-field-username"
                                    placeholder="Tiêu đề trình độ, ví dụ: Đại học" style="width:100%" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Họ và tên</label>
                            <div>
                                <input type="text" id="form-field-username"
                                    placeholder="Tiêu đề trình độ, ví dụ: Đại học" style="width:100%" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Giới tính</label>
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
                            <label for="form-field-username">Ngày sinh</label>
                            <div class="input-group">
                                <input class="form-control date-picker" id="date_import" type="text" name="date_import"
                                    data-date-format="dd-mm-yyyy" required="" readonly=""/>
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Địa chỉ</label>
                            <div>
                                <input type="text" id="form-field-username"
                                    placeholder="Tiêu đề trình độ, ví dụ: Đại học" style="width:100%" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Điện thoại</label>
                            <div>
                                <input type="text" id="form-field-username" onkeypress="validate(event)"
                                    placeholder="Tiêu đề trình độ, ví dụ: Đại học" style="width:100%" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Email</label>
                            <div>
                                <input type="text" id="form-field-username"
                                    placeholder="Tiêu đề trình độ, ví dụ: Đại học" style="width:100%" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Trình độ</label>
                            <div>
                            <select class="select2" data-placeholder="Choose a Country..."
                                style="width:100%" required="" id="source" name="source">
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">Chuyên môn</label>
                            <div>
                            <select class="select2" data-placeholder="Choose a Country..."
                                style="width:100%" required="" id="source" name="source" multiple="">
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">Phân công nhiệm vụ</label>
                            <div>
                            <select class="select2" data-placeholder="Choose a Country..."
                                style="width:100%" required="" id="source" name="source">
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">Ghi chú</label>
                            <div>
                                <input type="text" id="form-field-username"
                                    placeholder="Tiêu đề trình độ, ví dụ: Đại học" style="width:100%" />
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
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thông tin nhân sự
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                <b>Mã nhân sự:</b> 89567845
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                <b>Họ và tên:</b> Nguyễn Văn A
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                <b>GIới tính:</b> Nam
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                <b>Ngày sinh:</b> 12-09-1979
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                <b>Địa chỉ:</b> Đa Tốn - Gia Lâm - Hà Nội
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                <b>Điện thoại:</b> 0987654321
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                <b>Trình độ:</b> Đại học
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                <b>Phân công nhiệm vụ:</b> Giáo viên
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                <b>Chuyên môn:</b> Tóa học, Tin học
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                <b>Emaiil:</b> webmasterzero@gmail.com
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">
                                <b>Ghi chú:</b> Lorem ipsum dolor sit amet, consectetur 
                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et 
                                dolore magna aliqua..
                            </label>
                        </div>
                    </div>
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
<script src="<?php echo URL.'/public/' ?>scripts/personal.js"></script>