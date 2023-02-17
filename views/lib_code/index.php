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
            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Tìm kiếm ..." class="nav-search-input" id="nav-search-input" autocomplete="off"
                        onkeyup="search()"/>
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    In mã sách
                    <small class="pull-right hidden-480">
                        <!--<button type="button" class="btn btn-info btn-sm" onclick="select_cate()">
                            <i class="fa fa-print"></i>
                            In theo danh mục
                        </button>-->
                        <button type="button" class="btn btn-primary btn-sm" onclick="select_manu()">
                            <i class="fa fa-print"></i>
                            In theo NXB
                        </button>
                        <button type="button" class="btn btn-success btn-sm" onclick="print_code()">
                            <i class="fa fa-print"></i>
                            In mã tổng hợp
                        </button>
                        <button type="button" class="btn btn-default btn-sm" onclick="print_code_option()">
                            <i class="fa fa-print"></i>
                            In mã tùy chọn
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <form id="fm" method="post">
                        <input id="datadc" name="datadc" type="hidden"/>
                    </form>
                    <div id="list_library" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-cate" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    In mã sách theo danh mục
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <input class="form-control" id="nav-search-input-cate" type="text" style="width:100%"
                        placeholder="Tìm kiếm" onkeyup="search_cate()"/>
                    </div>
                    <div class="col-xs-12">
                        <div class="space-6"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <form id="fm_cate" method="post">
                            <input id="data_cate" name="data_cate" type="hidden"/>
                        </form>
                        <div id="list_cate" class="dataTables_wrapper form-inline no-footer"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-left" id="pager_cate">
                    <!--display pagination-->
                </small>
                <button class="btn btn-sm btn-primary pull-right" onclick="print_code_cate()">
                    <i class="ace-icon fa fa-print"></i>
                    In mã
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-manu" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    In mã sách theo Nhà xuất bản
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <input class="form-control" id="nav-search-input-manu" type="text" style="width:100%"
                        placeholder="Tìm kiếm" onkeyup="search_manu()"/>
                    </div>
                    <div class="col-xs-12">
                        <div class="space-6"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <form id="fm_manu" method="post">
                            <input id="data_manu" name="data_manu" type="hidden"/>
                        </form>
                        <div id="list_manu" class="dataTables_wrapper form-inline no-footer"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-left" id="pager_manu">
                    <!--display pagination-->
                </small>
                <button class="btn btn-sm btn-primary pull-right" onclick="print_code_manu()">
                    <i class="ace-icon fa fa-print"></i>
                    In mã
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-option" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:60%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    In mã sách tùy chọn
                </div>
            </div>
            <div class="modal-body" style="height:500px;overflow:auto">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="col-xs-12 col-sm-12">
                            <input class="form-control" id="nav-search-input-book" type="text" style="width:100%"
                            placeholder="Nhập từ khóa tìm kiếm"/>
                        </div>
                        <div class="col-xs-12">
                            <div class="space-6"></div>
                        </div>
                        <form id="fm_option" method="post">
                            <input id="data_code" name="data_code" type="hidden"/>
                        </form>
                        <table id="dynamic-table" 
                            class="table table-striped table-bordered table-hover dataTable no-footer" 
                            role="grid"
                            aria-describedby="dynamic-table_info">
                            <thead>
                                <tr role="row">
                                    <th class="text-center" style="width:20px">#</th>
                                    <th class="text-center" style="width:80px">Mã sách</th>
                                    <th class="" style="width: 400px">Tiêu đề</th>
                                    <th class="" style="width:200px">Số con</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody id="tbody-option">
                            </tbody>
                        </table>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-primary pull-right" onclick="print_code_option_action()">
                    <i class="ace-icon fa fa-print"></i>
                    In mã
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/library/qrcode.js"></script>