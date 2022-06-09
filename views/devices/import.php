<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
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
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Nhập thông tin trang thiết bị và tồn kho qua file Excel
                    <small class="pull-right hidden-480">
                        <button type="button" class="btn btn-success btn-sm" onclick="save()">
                            <i class="fa fa-save"></i>
                            Cập nhật
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <form id="fm" method="post" en>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn file dữ liệu</label>
                                    <div>
                                        <input type="file" id="image" name="image" class="file_attach" style="width:100%"
                                        accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                Định dạng file là .xlsx (Excel 2007 trở lên). Tải file mẫu 
                                <a href="<?php echo URL.'/public/temp/assets.xlsx'; ?>" target="_blank">tại đây</a> để moulde chạy đạt hiệu quả cao
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-9">
                    <div id="list_device_tmp" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<script src="<?php echo URL.'/public/' ?>scripts/import_device.js"></script>