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
                    Luân chuyển thiết bị
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <form id="fm" method="post">
                    <div class="col-sm-6">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4 class="smaller">
                                    Chuyển từ
                                </h4>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="form-group">
                                        <label for="form-field-username">Lựa chọn phòng</label>
                                        <div>
                                            <select class="select2" data-placeholder="Lựa chọn phòng..." onchange="set_device()"
                                            style="width:100%" required="" id="physical_from_id" name="physical_from_id">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="form-field-username">Lựa chọn thiết bị</label>
                                        <div>
                                            <select class="select2" data-placeholder="Lựa chọn thiết bị..."
                                            style="width:100%" required="" id="device_id" name="device_id">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4 class="smaller">
                                    Chuyển đến
                                </h4>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="form-group">
                                        <label for="form-field-username">Lựa chọn phòng</label>
                                        <div>
                                            <select class="select2" data-placeholder="Lựa chọn phòng..."
                                            style="width:100%" required="" id="physical_to_id" name="physical_to_id">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-xs-12 col-sm-12 text-center">
                    <div class="space-6"></div>
                    <button class="btn btn-sm btn-danger" type="button" onclick="window.location.href='<?php echo URL.'/change_device' ?>'">
                        <i class="ace-icon fa fa-times"></i>
                        Hủy bỏ
                    </button>
                    <button class="btn btn-sm btn-primary" onclick="save()" type="button">
                        <i class="ace-icon fa fa-save"></i>
                        Ghi dữ liệu
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="space-6"></div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div id="list_change" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<script src="<?php echo URL.'/public/' ?>scripts/devices/change_device.js"></script>