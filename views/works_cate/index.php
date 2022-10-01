<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Hồ sơ công việc</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Danh mục
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Danh mục sử dụng chung trong hệ thống
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <h3 class="header smaller lighter blue">
                        Nhóm hồ sơ
                        <a href="javascript:void(0)" class="btn-sm" title="Thêm mới" onclick="add_group()">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h3>
                    <div id="list_group" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-6">
                    <h3 class="header smaller lighter blue">
                        Danh mục hồ sơ
                        <a href="javascript:void(0)" class="btn-sm" title="Thêm mới" onclick="add_cate()">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h3>
                    <div id="list_cate" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-group" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" id="form">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật nhóm hồ sơ
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm_group" method="post">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Tiêu đề</label>
                                <div>
                                    <input type="text" id="title_group" name="title_group" required="" 
                                    placeholder="Ví dụ: Hồ sơ kiểm tra công vụ" style="width:100%" />
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
                <button class="btn btn-sm btn-primary pull-right" onclick="save_group()">
                    <i class="ace-icon fa fa-save"></i>
                    Ghi dữ liệu
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-cate" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" id="form">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật danh mục hồ sơ
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm_cate" method="post">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn nhóm hồ sơ</label>
                                <div>
                                    <select id="group_id" name="group_id" required="" style="width:100%"
                                    class="form-control select2" data-placeholder="Lựa chọn nhóm hồ sơ"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Tiêu đề</label>
                                <div>
                                    <input type="text" id="title_cate" name="title_cate" required="" 
                                    placeholder="Ví dụ: Tài chính" style="width:100%" />
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
                <button class="btn btn-sm btn-primary pull-right" onclick="save_cate()">
                    <i class="ace-icon fa fa-save"></i>
                    Ghi dữ liệu
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->
<script src="<?php echo URL.'/public/' ?>scripts/works/cate.js"></script>