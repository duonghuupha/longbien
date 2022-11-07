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
                    Quản lý nhân sự
                    <small class="pull-right">
                        <?php
                        if($this->_Data->check_role_view($this->_Info[0]['id'], $this->_Info[0]['group_role_id'], $this->_Url[0], 1) > 0){
                        ?>
                        <button type="button" class="btn btn-primary btn-sm" onclick="add()">
                            <i class="fa fa-plus"></i>
                            Thêm mới
                        </button>
                        <?php
                        }
                        if($this->_Data->check_role_view($this->_Info[0]['id'], $this->_Info[0]['group_role_id'], $this->_Url[0], 4) > 0){
                        ?>
                        <button type="button" class="btn btn-info btn-sm" onclick="import_teacher()">
                            <i class="fa fa-file-excel-o"></i>
                            Nhập từ file
                        </button>
                        <?php
                        }
                        ?>
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
                    <form id="fm" method="POST" enctype="multipart/form-data">
                        <input id="image_old" name="image_old" type="hidden"/>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Mã nhân sự</label>
                                <div>
                                    <input type="text" id="code" name="code" style="width:100%" />
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
                                    name="birthday"  required=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Địa chỉ</label>
                                <div>
                                    <input type="text" id="address" name='address' placeholder="Địa chỉ" style="width:100%"
                                    required=""/>
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
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Trình độ</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn trình độ"
                                    style="width:100%" required="" id="level_id" name="level_id">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Chuyên môn</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn chuyên môn..."
                                    style="width:100%" id="subject_id" name="subject_id[]" multiple="">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Phân công nhiệm vụ</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn nhiệm vụ..."
                                    style="width:100%" required="" id="job_id" name="job_id">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Hình ảnh</label>
                                <div>
                                    <input type="file" id="avatar" name="avatar" class="file_attach" style="width:100%"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Ghi chú</label>
                                <div>
                                    <input type="text" id="description" name="description" style="width:100%" />
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
<script src="<?php echo URL.'/public/' ?>scripts/personel/index.js"></script>