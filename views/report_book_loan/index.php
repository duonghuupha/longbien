<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Báo cáo - Thống kê</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Báo cáo mượn trả sách
                    <small class="pull-right">
                        <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='<?php echo URL.'/report' ?>'">
                            <i class="fa fa-arrow-left"></i>
                            Quay lại
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <form id="fm-search" method="post">
                        <div class="row">
                            <div class="col-xs-12" id="date_option">
                                <div class="form-group">
                                    <label for="form-field-username">Từ ngày</label>
                                    <div class="input-group">
                                        <input class="form-control date-picker" id="from_date" type="text" 
                                        name="from_date" required="" data-date-format="dd-mm-yyyy" readonly=""
                                        value="<?php echo date("01-m-Y") ?>"/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12" id="date_option">
                                <div class="form-group">
                                    <label for="form-field-username">Đến ngày</label>
                                    <div class="input-group">
                                        <input class="form-control date-picker" id="to_date" type="text" 
                                        name="to_date" required="" data-date-format="dd-mm-yyyy" readonly=""
                                        value="<?php echo date("d-m-Y") ?>"/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">
                                        Danh mục
                                    </label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn danh mục"
                                        style="width:100%" id="category" name="category">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">
                                        Nhà xuất bản
                                    </label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn NXB"
                                        style="width:100%" id="manu" name="manu">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tên sách</label>
                                    <div>
                                        <input class="form-control" id="title_book" type="text" 
                                        name="title_book" placeholder="Nhập tên sách"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-sm btn-primary" type="button" onclick="search()">
                                    <i class="ace-icon fa fa-search"></i>
                                    Lọc dữ liệu
                                </button>
                                <button class="btn btn-sm btn-success" type="button" onclick="export_xlsx()"
                                id="btn_export">
                                    <i class="ace-icon fa fa-file-excel-o"></i>
                                    Xuất file excel
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-9">
                    <div id="list_library" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<script src="<?php echo URL.'/public/' ?>scripts/report/report_book_loan.js"></script>