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
                    Nhập kho trang thiết bị
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
                    <div id="list_import" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-import" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:70%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật thông tin tiếp nhận trang thiết bị
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm" method="post" enctype="multipart/form-data">
                        <input id="datadc" name="datadc" type="hidden"/>
                        <input id="code" name="code" type="hidden"/>
                        <div class="col-xs-4" style="height:505px">
                            <div class="col-xs-12 col-sm-12">   
                                <input type="text" placeholder="Tìm kiếm ..." class="form-control" id="nav-search-device"
                                onkeyup="search_device()" style="width:100%"/>
                            </div>
                            <div class="col-xs-12">
                                <div class="space-6"></div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div id="list_device" class="dataTables_wrapper form-inline no-footer"></div>
                            </div><!-- /.col -->
                        </div>
                        <div class="col-xs-8">
                            <div class="widget-header widget-header-flat widget-header-small">
                                <h5 class="widget-title">
                                    Thông tin biên bản
                                </h5>
                            </div>
                            <div class="col-xs-12">
                                <div class="space-6"></div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="form-field-username">Ngày tiếp nhận</label>
                                    <div class="input-group">
                                        <input class="form-control date-picker" id="date_import" type="text" 
                                        name="date_import" required="" data-date-format="dd-mm-yyyy" readonly=""/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="form-field-username">Nguồn cung cấp</label>
                                    <div>
                                        <input type="text" id="source" name="source" style="width:100%"
                                        required="" placeholder="Ví dụ:Dự án; Mua sắm tập trung"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Ghi chú</label>
                                    <div>
                                        <input type="text" id="notes" name="notes" style="width:100%"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="dataTables_wrapper form-inline no-footer" style="height:295px;overflow:auto"
                                id="table-device">
                                    <table id="dynamic-table"
                                        class="table table-striped table-bordered table-hover dataTable no-footer"
                                        role="grid" aria-describedby="dynamic-table_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="text-center" style="width:20px">#</th>
                                                <th class="text-center" style="width:100px">Mã</th>
                                                <th class="">Tên trang thiết bị</th>
                                                <th class="text-center" style="width:100px;">Số lượng</th>
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
    <div class="modal-dialog" style="width:50%">
        <div class="modal-content" id="detail">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/devices/import_device.js"></script>