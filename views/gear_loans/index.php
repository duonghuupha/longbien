<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Đồ dùng dạy học</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Mượn - Trả đồ dùng
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
                        if($this->_Data->check_role_view($this->_Info[0]['id'], $this->_Info[0]['group_role_id'], $this->_Url[0], 6) > 0){
                        ?>
                        <button type="button" class="btn btn-info btn-sm" onclick="add_reserve()">
                            <i class="fa fa-calendar"></i>
                            Đặt trước
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
                            <label for="form-field-username">
                                Ngày trả &nbsp;
                                <a href="javascript:void(0)" onclick="del_date_return()">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </label>
                            <div class="input-group">
                                <input class="form-control date-picker" id="date_return_s" type="text" 
                                name="date_return_s" data-date-format="dd-mm-yyyy" readonly=""/>
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">Tên đồ dùng</label>
                            <div>
                                <input type="text" id="titles" name="titles"
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
                    <div id="list_loan" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-loan" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header" id="title_modal">
                    Thêm mới - Cập nhật phiếu mượn đồ dùng
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm" method="POST" enctype="multipart/form-data">
                        <input id="user_loan" name="user_loan" type="hidden"/>
                        <input id="datadc" name="datadc" type="hidden"/>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn người mượn <b>SCAN</b></label>
                                <div>
                                    <input type="text" id="personel_code" name="personel_code"
                                    placeholder="Sử dụng mã nhân sự" style="width:100%" onchange="set_user_loan()"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn người mượn</label>
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
                                <label for="form-field-username">Ngày mượn</label>
                                <div class="input-group">
                                    <input class="form-control date-timepicker" id="date_loan" type="text" 
                                    name="date_loan" required="" data-date-format="dd-mm-yyyy" readonly=""/>
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Ngày dự kiến trả</label>
                                <div class="input-group">
                                    <input class="form-control date-timepicker" id="date_return" type="text" 
                                    name="date_return"  required="" data-date-format="dd-mm-yyyy" readonly=""/>
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Nội dung</label>
                                <div>
                                    <textarea id="content" name="content" style="width:100%;resize:none" 
                                    required=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Ghi chú</label>
                                <div>
                                    <textarea id="notes" name="notes" style="width:100%;resize:none"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <div>
                                    <input type="text" id="gear_code" name="gear_code"
                                    placeholder="Sử dụng mã của từng thiết bị" style="width:100%" onchange="set_gear_loan()"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <button class="btn btn-sm btn-success pull-right" onclick="select_gear()"
                            type="button" id="select_devices">
                                <i class="ace-icon fa fa-cubes"></i>
                                Lựa chọn đồ dùng(s)
                            </button>
                        </div>
                        <div class="col-xs-12">
                            <div class="dataTables_wrapper form-inline no-footer">
                                <table id="dynamic-table"
                                    class="table table-striped table-bordered table-hover dataTable no-footer"
                                    role="grid" aria-describedby="dynamic-table_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-center" style="width:20px">#</th>
                                            <th class="text-center" style="width:100px">Mã</th>
                                            <th class="">Tên đồ dùng</th>
                                            <th class="text-center">Số con</th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                    </tbody>
                                </table>
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
                        <div id="list_users" class="dataTables_wrapper form-inline no-footer"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-right" id="pager">
                    <!--display pagination-->
                </small>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-gear" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:70%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    Danh sách đồ dùng
                </div>
            </div>
            <div class="modal-body" style="height:600px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <input class="form-control" id="nav-search-input-gear" type="text" style="width:100%"
                        placeholder="Tìm kiếm" onkeyup="search_gear()"/>
                    </div>
                    <div class="col-xs-12">
                        <div class="space-6"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div id="list_gear" class="dataTables_wrapper form-inline no-footer"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-right" id="pager_gear">
                    <!--display pagination-->
                </small>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-detail" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:55%">
        <div class="modal-content" id="detail">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/gear/loans.js"></script>