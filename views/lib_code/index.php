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
                        <button type="button" class="btn btn-info btn-sm" onclick="select_cate()">
                            <i class="fa fa-print"></i>
                            In theo danh mục
                        </button>
                        <button type="button" class="btn btn-primary btn-sm" onclick="select_manu()">
                            <i class="fa fa-print"></i>
                            In theo NXB
                        </button>
                        <button type="button" class="btn btn-success btn-sm" onclick="print_code()">
                            <i class="fa fa-print"></i>
                            In mã tổng hợp
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
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
                    In mã sách theo danh mục
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm-dep" method="post" enctype="multipart/form-data">
                        <input id="datadc_dep" name="datadc_dep" type="hidden"/>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn danh mục</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn danh mục"
                                    style="width:100%"  id="cate_id" name="cate_id"
                                    onchange="selected_cate(this.value)">
                                    </select>
                                </div> 
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="dataTables_wrapper form-inline no-footer">
                                <table
                                    class="table table-striped table-bordered table-hover dataTable no-footer"
                                    role="grid" aria-describedby="dynamic-table_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-center" style="width:30px">#</th>
                                            <th class="">Danh mục</th>
                                            <th class="text-center" style="width:150px">
                                                Số lượng tem<br/>
                                                <small style="font-weight:normal;font-style:italic">
                                                    Mỗi đầu sách thuộc danh mục sẽ được 
                                                    in ra số lượng tem như cấu hình
                                                </small>
                                            </th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                    </tbody>
                                </table>
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
                <button class="btn btn-sm btn-primary pull-right" onclick="print_code_dep()">
                    <i class="ace-icon fa fa-print"></i>
                    In mã thiết bị
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->
<script src="<?php echo URL.'/public/' ?>scripts/library/qrcode.js"></script>