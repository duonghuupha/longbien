<?php include('layouts/header.php') ?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Danh mục</li>
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
                    Danh mục hệ thống
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Danh mục sử dụng chung trong hệ thống
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <h3 class="header smaller lighter blue">
                        Trình độ
                        <a href="javascript:void(0)" class="btn-sm" title="Thêm mới" onclick="add_level()">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h3>
                    <div id="list_level" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-6">
                    <h3 class="header smaller lighter blue">
                        Phân công nhiệm vụ
                        <a href="javascript:void(0)" class="btn-sm" title="Thêm mới" onclick="add_job()">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h3>
                    <div id="list_job" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <div class="space-4"></div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <h3 class="header smaller lighter blue">
                        Chuyên môn
                        <a href="javascript:void(0)" class="btn-sm" title="Thêm mới" onclick="add_subject()">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h3>
                    <div id="list_subject" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<!--Form don vi tinh-->
<div id="modal-level" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật thông tin trÌnh độ
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">Tiêu đề</label>
                            <div>
                                <input type="text" id="form-field-username"
                                    placeholder="Tiêu đề trình độ, ví dụ: Đại học" style="width:100%" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                    Đóng
                </button>
                <button class="btn btn-sm btn-primary pull-right" data-dismiss="modal">
                    <i class="ace-icon fa fa-save"></i>
                    Ghi dữ liệu
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->
<script src="js/categories.js"></script>
<?php include('layouts/footer.php') ?>