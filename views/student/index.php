<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Học sinh</li>
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
                    Quản lý thông tin học sinh
                    <small class="pull-right hidden-480">
                        <button type="button" class="btn btn-primary btn-sm" onclick="add()">
                            <i class="fa fa-plus"></i>
                            Thêm mới
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div id="list_student" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-student" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" style="height:575px">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật thông tin học sinh
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="tabs">
                        <ul>
                            <li>
                                <a href="#tabs-1">Thông tin học sinh</a>
                            </li>
                            <li>
                                <a href="#tabs-2">Quan hệ</a>
                            </li>
                        </ul>
                        <div id="tabs-1" style="height:461px">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="form-field-username">Mã học sinh</label>
                                        <div>
                                            <input type="text" id="code" name="code" required=""
                                            placeholder="Mã học sinh gồm 12 chữ số ngẫu nhiên" style="width:100%" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="form-field-username">Họ và tên</label>
                                        <div>
                                            <input type="text" id="fullname" name="fullname" required=""
                                            placeholder="Họ và tên học sinh" style="width:100%" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="form-field-username">Giới tính</label>
                                        <div>
                                            <select class="select2" data-placeholder="Choose a Country..."
                                            style="width:100%" required="" id="gender" name="gender">
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
                                        <label for="form-field-username">Trạng thái</label>
                                        <div>
                                            <select class="select2" data-placeholder="Choose a Country..."
                                            style="width:100%" required="" id="status" name="status">
                                                <option value="1">Đang đi học</option>
                                                <option value="2">Nghỉ học</option>
                                                <option value="3">Chuyển trường</option>
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
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="form-field-username">Tỉnh / Thành phố</label>
                                        <div>
                                            <select class="select2" data-placeholder="Choose a Country..."
                                            style="width:100%" required="" id="gender" name="gender">
                                                <option value="1">Nam</option>
                                                <option value="2">Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="form-field-username">Quận / Huyện</label>
                                        <div>
                                            <select class="select2" data-placeholder="Choose a Country..."
                                            style="width:100%" required="" id="gender" name="gender">
                                                <option value="1">Nam</option>
                                                <option value="2">Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="form-field-username">Xã / Phường</label>
                                        <div>
                                            <select class="select2" data-placeholder="Choose a Country..."
                                            style="width:100%" required="" id="gender" name="gender">
                                                <option value="1">Nam</option>
                                                <option value="2">Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="form-field-username">Số nhà, Tên đường</label>
                                        <div>
                                            <input type="text" id="fullname" name="fullname" required=""
                                            placeholder="Số nhà, tên đường" style="width:100%" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tabs-2" style="height:461px">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="form-field-username">Họ và tên bố</label>
                                        <div>
                                            <input type="text" id="code" name="code" required=""
                                            placeholder="Mã học sinh gồm 12 chữ số ngẫu nhiên" style="width:100%" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="form-field-username">Năm sinh của bố</label>
                                        <div>
                                            <input type="text" id="fullname" name="fullname" required=""
                                            placeholder="Họ và tên học sinh" style="width:100%" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="form-field-username">Số điện thoại của bố</label>
                                        <div>
                                            <input type="text" id="fullname" name="fullname" required=""
                                            placeholder="Họ và tên học sinh" style="width:100%" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="form-field-username">Số điện thoại của bố</label>
                                        <div>
                                            <input type="text" id="fullname" name="fullname" required=""
                                            placeholder="Họ và tên học sinh" style="width:100%" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="form-field-username">Nghề nghiệp của bố</label>
                                        <div>
                                            <input type="text" id="fullname" name="fullname" required=""
                                            placeholder="Họ và tên học sinh" style="width:100%" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="form-field-username">Họ và tên mẹ</label>
                                        <div>
                                            <input type="text" id="code" name="code" required=""
                                            placeholder="Mã học sinh gồm 12 chữ số ngẫu nhiên" style="width:100%" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="form-field-username">Năm sinh của mẹ</label>
                                        <div>
                                            <input type="text" id="fullname" name="fullname" required=""
                                            placeholder="Họ và tên học sinh" style="width:100%" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="form-field-username">Số điện thoại của mẹ</label>
                                        <div>
                                            <input type="text" id="fullname" name="fullname" required=""
                                            placeholder="Họ và tên học sinh" style="width:100%" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="form-field-username">Số điện thoại của mẹ</label>
                                        <div>
                                            <input type="text" id="fullname" name="fullname" required=""
                                            placeholder="Họ và tên học sinh" style="width:100%" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="form-field-username">Nghề nghiệp của mẹ</label>
                                        <div>
                                            <input type="text" id="fullname" name="fullname" required=""
                                            placeholder="Họ và tên học sinh" style="width:100%" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---->
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

<script src="<?php echo URL.'/public/' ?>scripts/student.js"></script>