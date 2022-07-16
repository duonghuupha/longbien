<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Hệ thống</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Thông báo hệ thống
                    <small class="pull-right hidden-480">
                        <button type="button" class="btn btn-primary btn-sm" onclick="read_notify()">
                            <i class="fa fa-book"></i>
                            Đánh dấu đã đọc
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="del_notify()">
                            <i class="fa fa-trash"></i>
                            Xóa thông báo
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div id="list_notify" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<script src="<?php echo URL.'/public/' ?>scripts/notify/index.js"></script>