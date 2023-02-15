<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Thư viện</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Danh mục dùng trong thư viện
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <h3 class="header smaller lighter blue">
                        Danh mục sách
                        <a href="javascript:void(0)" class="btn-sm" title="Thêm mới" onclick="add_book_cate()">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h3>
                    <div id="list_book" class="dataTables_wrapper form-inline no-footer" style="height:500px;overflow:auto"></div>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-6">
                    <h3 class="header smaller lighter blue">
                        Danh mục nhà xuất bản
                        <a href="javascript:void(0)" class="btn-sm" title="Thêm mới" onclick="add_book_manu()">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h3>
                    <div id="list_manu" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
                <!--<div class="col-xs-12 col-sm-6">
                    <h3 class="header smaller lighter blue">
                        Danh sách giá kệ sách
                        <a href="javascript:void(0)" class="btn-sm" title="Thêm mới" onclick="add_bin()">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h3>
                    <div id="list_bin" class="dataTables_wrapper form-inline no-footer"></div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <h3 class="header smaller lighter blue">
                        Danh sách các tầng của kệ sách
                        <a href="javascript:void(0)" class="btn-sm" title="Thêm mới" onclick="add_floor()">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h3>
                    <div id="list_floor" class="dataTables_wrapper form-inline no-footer"></div>
                </div>-->
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

<script src="<?php echo URL.'/public/' ?>scripts/library/category.js"></script>