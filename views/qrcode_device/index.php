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
                    In mã trang thiết bị
                    <small class="pull-right hidden-480">
                        <button type="button" class="btn btn-primary btn-sm" onclick="print_code()">
                            <i class="fa fa-qrcode"></i>
                            In QRCODE
                        </button>
                        <button type="button" class="btn btn-info btn-sm" onclick="print_barcode()">
                            <i class="fa fa-barcode"></i>
                            In BARCODE
                        </button>
                        <button type="button" class="btn btn-success btn-sm" onclick="print_allcode()">
                            <i class="fa fa-print"></i>
                            In mã tổng hợp
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div id="list_device" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script src="<?php echo URL.'/public/' ?>scripts/devices/qrcode.js"></script>