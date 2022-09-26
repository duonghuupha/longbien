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
                <div class="col-xs-12 col-sm-6">
                    <h3 class="header smaller lighter blue">
                        Tiêu chí kiểm định
                        <a href="javascript:void(0)" class="btn-sm" title="Thêm mới" onclick="add_criteria()">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h3>
                    <div id="list_criteria" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-6">
                    <h3 class="header smaller lighter blue">
                        Phân quyền tiêu chí
                        <a href="javascript:void(0)" class="btn-sm" title="Thêm mới" onclick="add_roles()">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h3>
                    <div id="list_users" class="dataTables_wrapper form-inline no-footer"></div>
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

<script src="<?php echo URL.'/public/' ?>scripts/quanlity/cate.js"></script>