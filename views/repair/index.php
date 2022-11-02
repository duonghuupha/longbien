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
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Sửa chữa & nâng cấp
                    <?php
                    if($this->_Data->check_role_view($this->_Info[0]['id'], $this->_Info[0]['group_role_id'], $this->_Url[0], 1) > 0){
                    ?>
                    <small class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" onclick="add()">
                            <i class="fa fa-plus"></i>
                            Thêm mới
                        </button>
                    </small>
                    <?php
                    }
                    ?>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                <form id="fm-search" method="post">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">
                                        Ngày thực hiện
                                        &nbsp;
                                        <a href="javascript:void(0)" class="red" onclick="del_date_search()">
                                            <i class="ace-icon fa fa-trash"></i>
                                        </a>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control date-picker" id="dates" type="text" 
                                        name="dates" data-date-format="dd-mm-yyyy" readonly=""/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Đơn vị thực hiện</label>
                                    <div>
                                        <input type="text" id="agencys" name="agencys"
                                            placeholder="Đơn vị thực hiện" style="width:100%"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Thiết bị</label>
                                    <div>
                                        <input type="text" id="devices" name="devices"
                                            placeholder="Nhập tên tiết bị" style="width:100%"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-sm btn-primary" type="button" onclick="search()">
                                    <i class="ace-icon fa fa-search"></i>
                                    Lọc dữ liệu
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-9">
                    <div id="list_repair" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<!--Form don vi tinh-->
<div id="modal-repair" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:80%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật thông tin sửa chữa & nâng cấp trang thiết bị
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm" method="POST" enctype="multipart/form-data">
                        <input id="datadc" name="datadc"  type="hidden"/>
                        <input id="file_old" name="file_old" type="hidden"/>
                        <input id="code" name="code" type="hidden"/>
                        <div class="col-xs-4">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn phòng ban / lớp học</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn phòng ban / lớp học"
                                        style="width:100%" id="department_id" name="department_id" onchange="load_device(this.value)">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="space-6"></div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div id="list_device" class="dataTables_wrapper form-inline no-footer"></div>
                            </div><!-- /.col -->
                        </div>
                        <div class="col-xs-8" style="border-left:1px solid #000">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="form-field-username">Ngày thực hiện</label>
                                    <div class="input-group">
                                        <input class="form-control date-picker" id="date_repair" type="text" 
                                        name="date_repair" required="" data-date-format="dd-mm-yyyy" readonly=""/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="form-field-username">Đơn vị thực hiện</label>
                                    <div>
                                        <input type="text" id="agency" name="agency" required=""
                                            placeholder="Đơn vị thực hiện" style="width:100%"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="form-field-username">File biên bản</label>
                                    <div>
                                        <input type="file" id="file" name="file" class="file_attach" style="width:100%"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="dataTables_wrapper form-inline no-footer" style="height:350px;overflow:auto"
                                id="table-device">
                                    <table id="dynamic-table"
                                        class="table table-striped table-bordered table-hover dataTable no-footer"
                                        role="grid" aria-describedby="dynamic-table_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="text-center" style="width:20px">#</th>
                                                <th class="">Tên trang thiết bị</th>
                                                <th class="text-left">Nội dung lỗi</th>
                                                <th class="text-left">Nội dung khắc phục</th>
                                                <th class="text-center" style="width:30px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                        </tbody>
                                    </table>
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

<script src="<?php echo URL.'/public/' ?>scripts/devices/repair.js"></script>