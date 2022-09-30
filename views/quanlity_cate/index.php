<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Kiểm định chất lượng giáo dục</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Danh mục kiểm định
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Danh mục sử dụng chung trong module kiểm định
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <h3 class="header smaller lighter blue">
                        Giai đoạn
                        <a href="javascript:void(0)" class="btn-sm" title="Thêm mới" onclick="add_quanlity()">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h3>
                    <div id="list_quanlity" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-6">
                    <h3 class="header smaller lighter blue">
                        Tiêu chuẩn kiểm định
                        <a href="javascript:void(0)" class="btn-sm" title="Thêm mới" onclick="add_standard()">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h3>
                    <div id="list_standard" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <div class="space-4"></div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <h3 class="header smaller lighter blue">
                        Tiêu chí kiểm định
                        <a href="javascript:void(0)" class="btn-sm" title="Thêm mới" onclick="add_criteria()">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h3>
                    <div id="list_criteria" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-form" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" id="form">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-standard" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" id="form">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật Tiêu chuẩn kiểm định
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm-standard" method="post">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Giai đoạn</label>
                                <div>
                                    <select id="quanlity_id" name="quanlity_id" required="" style="width:100%"
                                    class="form-control select2" data-placeholder="Lựa chọn giai đoạn"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Tiêu chuẩn</label>
                                <div>
                                    <input type="text" id="title_standard" name="title_standard" required="" 
                                    placeholder="Ví dụ: Tiêu chuẩn 1: Quản lý hành chính" style="width:100%" />
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
                <button class="btn btn-sm btn-primary pull-right" onclick="save_standard()">
                    <i class="ace-icon fa fa-save"></i>
                    Ghi dữ liệu
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-criteria" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" id="form">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật Tiêu chí kiểm định
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm-criteria" method="post">
                        <input id="standard_old" name="standard_old" type="hidden"/>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Giai đoạn</label>
                                <div>
                                    <select id="quanlity_id_" name="quanlity_id" required="" style="width:100%"
                                    class="form-control select2" data-placeholder="Lựa chọn giai đoạn"
                                    onchange="set_standard()"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">
                                    Tiêu chuẩn
                                    <span id="st_old">: </span>
                                </label>
                                <div>
                                    <select id="standard_id" name="standard_id" style="width:100%"
                                    class="form-control select2" data-placeholder="Lựa chọn tiêu chuẩn"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Tiêu chí</label>
                                <div>
                                    <input type="text" id="title_criteria" name="title_criteria" required="" 
                                    placeholder="Ví dụ: Tiêu chí 1: Quyết định thành lập hội đồng trường" style="width:100%" />
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
                <button class="btn btn-sm btn-primary pull-right" onclick="save_criteria()">
                    <i class="ace-icon fa fa-save"></i>
                    Ghi dữ liệu
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->
<script src="<?php echo URL.'/public/' ?>scripts/quanlity/cate.js"></script>