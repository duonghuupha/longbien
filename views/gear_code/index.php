<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Đồ dùng dạy học</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Quản lý thông tin đồ dùng
                    <small class="pull-right hidden-480">
                        <button type="button" class="btn btn-primary btn-sm" onclick="print_code()">
                            <i class="fa fa-print"></i>
                            In mã
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
                                    <label for="form-field-username">Mã đồ dùng</label>
                                    <div>
                                        <input type="text" id="codes" name="codes"
                                        placeholder="Mã đồ dùng" style="width:100%" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tiêu đề</label>
                                    <div>
                                        <input type="text" id="titles" name="titles"
                                        placeholder="Tên đồ dùng" style="width:100%" />
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
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-sm btn-primary" type="button" onclick="search()">
                                    <i class="ace-icon fa fa-search"></i>
                                    Tìm kiếm
                                </button>
                            </div>
                            <div class="col-sm-12">
                                <div  class="space-6"></div>
                            </div>
                            <div class="col-sm-12 text-justify" style="font-weight:700;font-style:italic">
                                <small>
                                    Hệ thống sẽ tự động xuất ra tem theo đúng số lượng của đồ dùng, nếu đồ dùng có số lượng trong kho là 4
                                    thì hệ thống sẽ xuất tem với mã "Mã đồ dùng.số phụ" (Số phụ là số thứ tự của đồ dùng). Ví dụ:  đồ dùng có tên
                                    Quả địa cầu vật lý, mã đồ dùng 12345678, số lượng tồn kho có thể mượn là 4; Hệ thống sẽ xuất ra 4 mã 12345678.1;
                                    12345678.2; 12345678.3; 12345678.4
                                </small>
                                <div  class="space-6"></div>
                                <small>
                                    Cột số lượng trong bảng bên là số lượng tem muốn in, ví dụ: đồ dùng có số lượng tồn kho có thể mượn là 4;
                                    Số lượng được điền trong bảng bên là 4 thì hệ thống sẽ xuất ra 4 tem mã 12345678.1, 4 tem 12345678.2, ....
                                </small>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-9">
                    <form id="fm" method="post">
                        <input id="datadc" name="datadc" type="hidden"/>
                    </form>
                    <div id="list_gear" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<script src="<?php echo URL.'/public/' ?>scripts/gear/code.js"></script>