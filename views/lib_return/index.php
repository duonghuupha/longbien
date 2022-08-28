<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Thu viện</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Thu hồi - Khôi phục sách
                    <small class="pull-right">
                        <button class="btn btn-sm btn-primary" type="button" onclick="add()">
                            <i class="ace-icon fa fa-plus"></i>
                            Thêm mới
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">Tên sách</label>
                            <div>
                                <input type="text" id="titles" name="titles"
                                placeholder="Tên sách" style="width:100%"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">Trạng thái</label>
                            <div>
                                <select class="select2" data-placeholder="Lựa chọn trạng thái"
                                style="width:100%" id="statuss" name="statuss">
                                    <option value="0">Tất cả</option>
                                    <option value="1">Thu hồi</option>
                                    <option value="2">Khôi phục</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 text-center">
                        <button class="btn btn-sm btn-primary" onclick="search()">
                            <i class="ace-icon fa fa-search"></i>
                            Tìm kiếm
                        </button>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div id="list_return" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-returns" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header" id="title_modal">
                    Thêm mới - Cập nhật thông tin phiếu thu hồi đồ dùng
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm" method="POST" enctype="multipart/form-data">
                        <input id="book_id" name="book_id" type="hidden"/>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn sách</label>
                                <div class="input-group">
                                    <input type="text" id="title" name="title" required=""
                                    placeholder="Click Go! để lựa chọn" style="width:100%" readonly=""/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm btn-primary" type="button" onclick="select_book()"
                                        id="select_gears">
                                            <i class="ace-icon fa fa-users bigger-110"></i>
                                            Go!
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Số con</label>
                                <div>
                                    <input type="text" id="sub_book" name="sub_book" required=""
                                    placeholder="Click Go! để lựa chọn" style="width:100%" readonly=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Lý do</label>
                                <div>
                                    <input type="text" id="content" name="content" required=""
                                    placeholder="Lý do thu hồi" style="width:100%"/>
                                </div>
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
                <button class="btn btn-sm btn-primary pull-right" onclick="save()">
                    <i class="ace-icon fa fa-save"></i>
                    Ghi dữ liệu
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-data" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:62%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    <span>Lựa chọn sách</span>
                </div>
            </div>
            <div class="modal-body" style="height:520px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12" id="book">
                        <input class="form-control" id="nav-search-input-data" type="text" style="width:100%"
                        placeholder="Tìm kiếm" onkeypress="search_book()"/>
                    </div>
                    <div class="col-xs-12">
                        <div class="space-6"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div id="list_data" class="dataTables_wrapper form-inline no-footer"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-left" id="pager">
                    <!--display pagination-->
                </small>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/lib_return/index.js"></script>