<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Đăng ký sử dụng phòng chức năng</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Đăng ký sử dụng phòng chức năng
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
                        ?>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">Người mượn</label>
                            <div>
                                <input type="text" id="fullnames" name="fullnames"
                                placeholder="Tên người mượn" style="width:100%"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">
                                Ngày mượn &nbsp;
                                <a href="javascript:void(0)" onclick="del_date_loan()">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </label>
                            <div class="input-group">
                                <input class="form-control date-picker" id="date_loan_s" type="text" 
                                name="date_loan_s" data-date-format="dd-mm-yyyy" readonly=""/>
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">Phòng chức năng</label>
                            <div>
                                <input type="text" id="deps" name="deps"
                                placeholder="Tên đồ dùng" style="width:100%"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 text-center">
                        <button class="btn btn-sm btn-primary" onclick="search()">
                            <i class="ace-icon fa fa-search"></i>
                            Tìm kiếm
                        </button>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-9">
                    <div id="list_dep" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-dep" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header" id="title_modal">
                    Thêm mới - Cập nhật phiếu đăng ký sử dụng phòng chức năng
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm" method="POST" enctype="multipart/form-data">
                        <input id="user_loan" name="user_loan" type="hidden"/>
                        <input id="department_id" name="department_id" type="hidden"/>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn người sử dụng</label>
                                <div class="input-group">
                                    <input type="text" id="fullname" name="fullname" required=""
                                    placeholder="Click Go! để lựa chọn" style="width:100%" readonly=""/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm btn-primary" type="button" onclick="select_user()"
                                        id="select_users">
                                            <i class="ace-icon fa fa-users bigger-110"></i>
                                            Go!
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Ngày sử dụng</label>
                                <div class="input-group">
                                    <input class="form-control date-picker" id="date_loan" type="text" 
                                    name="date_loan" required="" data-date-format="dd-mm-yyyy" readonly=""/>
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn tiết học</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn tiết học"
                                    style="width:100%" required="" id="lesson" name="lesson"
                                    data-minimum-results-for-search="Infinity">
                                        <option value="">Lựa chọn tiết học</option>
                                        <option value="1">Tiết 1</option>
                                        <option value="2">Tiết 2</option>
                                        <option value="3">Tiết 3</option>
                                        <option value="4">Tiết 4</option>
                                        <option value="5">Tiết 5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn phòng chức năng</label>
                                <div class="input-group">
                                    <input type="text" id="title_dep" name="title_dep" required=""
                                    placeholder="Click Go! để lựa chọn" style="width:100%" readonly=""/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm btn-primary" type="button" onclick="select_dep()">
                                            <i class="ace-icon fa fa-users bigger-110"></i>
                                            Go!
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Nội dung</label>
                                <div>
                                    <textarea id="content" name="content" style="width:100%;resize:none" 
                                    required=""></textarea>
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
<div id="modal-users" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    Danh sách người dùng
                </div>
            </div>
            <div class="modal-body" style="height:520px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <input class="form-control" id="nav-search-input-user" type="text" style="width:100%"
                        placeholder="Tìm kiếm" onkeyup="search_user()"/>
                    </div>
                    <div class="col-xs-12">
                        <div class="space-6"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div id="list_user" class="dataTables_wrapper form-inline no-footer"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-right" id="pager_user">
                    <!--display pagination-->
                </small>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-detail" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" id="detail">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-department" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    Danh sách phòng chức năng
                </div>
            </div>
            <div class="modal-body" style="height:520px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <input class="form-control" id="nav-search-input-dep" type="text" style="width:100%"
                        placeholder="Tìm kiếm" onkeyup="search_dep()"/>
                    </div>
                    <div class="col-xs-12">
                        <div class="space-6"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div id="list_dep" class="dataTables_wrapper form-inline no-footer"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-right" id="pager_dep">
                    <!--display pagination-->
                </small>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/dep_loan/index.js"></script>