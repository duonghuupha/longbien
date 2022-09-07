<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
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
                    Lịch báo  giảng
                    <small class="pull-right hidden-480">
                        <button type="button" class="btn btn-primary btn-sm" onclick="add()">
                            <i class="fa fa-plus"></i>
                            Thêm mới
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-sm-12">
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
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.col -->
                        <div class="col-xs-12 col-sm-9">
                            <div id="list_library" class="dataTables_wrapper form-inline no-footer"></div>
                        </div><!-- /.col -->
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script src="<?php echo URL.'/public/' ?>scripts/calendars/index.js"></script>