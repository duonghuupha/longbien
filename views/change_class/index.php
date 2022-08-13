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
                </form>
            </div><!-- /.nav-search -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Luân chuyển học sinh
                    <small class="pull-right">
                        <button class="btn btn-sm btn-success" onclick="save()" type="button">
                            <i class="ace-icon fa fa-line-chart"></i>
                            Lên lớp
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <form  id="fm" method="post">
                        <input id="class_current_id" name="class_current_id" type="hidden"/>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn học sinh</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn học sinh..."
                                    style="width:100%" required="" id="student_id" name="student_id"
                                    onchange="set_current_class()">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="form-field-username">Lớp hiện tại</label>
                                <div>
                                    <input id="class_current" name="class_current" class="form-control"
                                    style="width:100%" placeholder="Lớp hiện tai" readonly="" required=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn lớp muốn chuyển đến</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn lớp học..."
                                    style="width:100%" required="" id="class_to" name="class_to">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <button class="btn btn-sm btn-danger" type="button" onclick="window.location.href='<?php echo URL.'/student_change' ?>'">
                                <i class="ace-icon fa fa-times"></i>
                                Hủy bỏ
                            </button>
                            <button class="btn btn-sm btn-primary" onclick="save()" type="button">
                                <i class="ace-icon fa fa-save"></i>
                                Ghi dữ liệu
                            </button>
                        </div>
                    </form>
                </div><!-- /.col -->
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

<script src="<?php echo URL.'/public/' ?>scripts/change_class/index.js"></script>