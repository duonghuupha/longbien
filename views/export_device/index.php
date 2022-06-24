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
                    Phân bổ trang thiết bị
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <form  id="fm" method="post">
                        <input id="device_selected" name="device_selected" type="hidden"/>
                        <input id="code" name="code" type="hidden"/>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn phòng</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn phòng..."
                                    style="width:100%" required="" id="physical_id" name="physical_id">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn thiết bị</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn thiết bị..."
                                    style="width:100%" required="" id="device_id" name="device_id"
                                    onchange="set_sub_device()">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn thiết bị con</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn thiết bị con..."
                                    style="width:100%" required="" id="sub_device" name="sub_device"
                                    onchange="set_device_selected()">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="form-field-username">Các thiết bị được phân bổ - <span id="total_device">0(s)</span></label>
                                <div id="device_export" style="height:100px;overflow:auto">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <button class="btn btn-sm btn-danger" type="button" onclick="window.location.href='<?php echo URL.'/export_device' ?>'">
                                <i class="ace-icon fa fa-times"></i>
                                Hủy bỏ
                            </button>
                            <button class="btn btn-sm btn-primary" onclick="save()" type="button">
                                <i class="ace-icon fa fa-save"></i>
                                Ghi dữ liệu
                            </button>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-12">
                    <div class="space-6"></div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div id="list_export" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-detail" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header no-padding">
                <div class="table-header">
                    Danh sách thiết bị được phân bổ
                </div>
            </div>
            <div class="modal-body" id="detail">
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

<script src="<?php echo URL.'/public/' ?>scripts/export_device/index.js"></script>