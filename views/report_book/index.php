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
                    Danh sách sách trong thư viện
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
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tiêu đề</label>
                                    <div>
                                        <input type="text" id="title_s" name="title_s"
                                        placeholder="Từ kh ...." style="width:100%" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">
                                        Lựa chọn danh mục
                                        &nbsp;
                                        <a class="red" href="javascript:void(0)" onclick="del_cate()" title="Xóa người tham gia">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn danh mục"
                                        style="width:100%" id="cate_s" name="cate_s">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">
                                        Lựa chọn NXB
                                        &nbsp;
                                        <a class="red" href="javascript:void(0)" onclick="del_nxb()" title="Xóa người tham gia">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn NXB"
                                        style="width:100%" id="manu_s" name="manu_s">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tác giả</label>
                                    <div>
                                        <input type="text" id="author_s" name="author_s"
                                        placeholder="Tác giả ...." style="width:100%" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-sm btn-primary" type="button" onclick="search()">
                                    <i class="ace-icon fa fa-search"></i>
                                    Lọc dữ liệu
                                </button>
                                <button class="btn btn-sm btn-success" type="button" onclick="export_xlsx()">
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

<script src="<?php echo URL.'/public/' ?>scripts/report/report_book.js"></script>