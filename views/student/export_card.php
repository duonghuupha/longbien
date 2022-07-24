<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Học sinh</li>
            </ul><!-- /.breadcrumb -->
            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off"
                        onkeyup="search()"/>
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                    <span>
                        <button type="button" class="btn btn-primary btn-xs" onclick="adv()"
                        title="Tìm kiếm nâng cao">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Xuất dữ liệu thẻ học sinh
                    <small class="pull-right hidden-480">
                        <button type="button" class="btn btn-success btn-sm" onclick="print_card()">
                            <i class="fa fa-print"></i>
                            Xuất thẻ
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12" id="adv">
                    <div class="col-xs-2">
                        <input class="form-control" placeholder="Mã học sinh" id="code_s"/>
                    </div>
                    <div class="col-xs-2">
                        <input class="form-control" placeholder="Họ và tên" id="name_s"/>
                    </div>
                    <div class="col-xs-2">
                        <input class="form-control input-mask-date" placeholder="Ngày sinh" id="date_s"/>
                    </div>
                    <div class="col-xs-2">
                        <select class="select2" data-placeholder="Lựa chọn lớp học..."
                        style="width:100%" required="" id="class_id">
                        </select>
                    </div>
                    <div class="col-xs-3">
                        <input class="form-control" placeholder="Địa chỉ" id="address_s"/>
                    </div>
                    <div class="col-xs-1">
                        <button type="button" class="btn btn-primary btn-sm" onclick="search_adv()"
                        title="Tìm kiếm">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <div class="col-xs-12">
                        <div class="space-6"></div>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-12">
                    <div id="list_student" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<script src="<?php echo URL.'/public/' ?>scripts/student/export_card.js"></script>