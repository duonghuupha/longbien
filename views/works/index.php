<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Hồ sơ công việc</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Quản lý hồ sơ
                    <small class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" onclick="filter()">
                            <i class="fa fa-search"></i>
                            Lọc dữ liệu
                        </button>
                        <?php
                        if($this->_Data->check_role_view($this->_Info[0]['id'], $this->_Info[0]['group_role_id'], $this->_Url[0], 1) > 0){
                        ?>
                        <button type="button" class="btn btn-primary btn-sm" onclick="add()">
                            <i class="fa fa-plus"></i>
                            Thêm mới
                        </button>
                        <?php
                        }
                        ?>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-sm-12">
                    <div id="list_works" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-works" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:50%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật thông tin hồ sơ công việc
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm" method="POST" enctype="multipart/form-data">
                        <input id="datadc" name="datadc" type="hidden"/>
                        <input id="fileold" name="fileold" type="hidden"/>
                        <input id="code" name="code" type="hidden"/>
                        <input id="doc_id" name="doc_id" type="hidden"/>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn danh mục</label>
                                <div class="input-group">
                                    <input type="text" id="fullname" name="fullname" required=""
                                    placeholder="Click Go! để lựa chọn danh mục" style="width:100%" readonly=""/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm btn-primary" type="button" onclick="select_works()"
                                        id="selected_works" title="hello">
                                            <i class="ace-icon fa fa-users bigger-110"></i>
                                            Go!
                                        </button>
                                    </span>
                                </div>
                                <small>
                                    <i>Có thể lựa chọn nhiều danh mục</i>
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <div>
                                    <input class="form-control" type="text" name="title" id="title"
                                    style="width:100%" placeholder="Tiêu đề hồ sơ" required=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nội dung hồ sơ</label>
                                <div>
                                    <textarea class="form-control" type="text" name="content" id="content"
                                    style="width:100%;resize:none;height:70px" placeholder="Nội dung hồ sơ"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Tài liệu đính kèm</label>
                                <div>
                                    <input type="file" id="file" name="file" class="file_attach" style="width:100%"
                                    onchange="set_attr_btn()"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="form-group">
                                <label for="form-field-username">Hoặc lựa chọn từ văn bản</label>
                                <div>
                                    <button class="btn btn-sm btn-success" onclick="select_document()" type="button"
                                    id="select_doc">
                                        <i class="ace-icon fa fa-tags"></i>
                                        Lựa chọn văn bản
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="form-group">
                                <div id="file_select">
                                    
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
                <button class="btn btn-sm btn-primary pull-right" onclick="save()" id="save_form">
                    <i class="ace-icon fa fa-save"></i>
                    Ghi dữ liệu
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-works-cate" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:62%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Danh sách danh mục được phân quyền
                </div>
            </div>
            <div class="modal-body" style="height:600px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <input class="form-control" id="nav-search-input-works" type="text" style="width:100%"
                        placeholder="Tìm kiếm" onkeyup="search_works()"/>
                    </div>
                    <div class="col-xs-12">
                        <div class="space-6"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div id="list_works_cate" class="dataTables_wrapper form-inline no-footer"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-left" id="pager_works_cate">
                    <!--display pagination-->
                </small>
                <button class="btn btn-sm btn-primary pull-right" onclick="confirm_works()">
                    <i class="ace-icon fa fa-check"></i>
                    Xác nhận
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-detail" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" id="detail">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-search" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:30%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Lựa chọn điều kiện hiển thị dữ liệu
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Lựa chọn nhóm hồ sơ</label>
                            <div>
                                <select class="select2" type="text" name="group_id_s" id="group_id_s"
                                style="width:100%" data-placeholder="Lựa chọn nhóm hồ sơ"
                                onchange="set_works_cate()"></select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Lựa chọn danh mục hồ sơ</label>
                            <div>
                                <select class="select2" type="text" name="works_id_s" id="works_id_s"
                                style="width:100%" data-placeholder="Lựa chọn danh mục hồ sơ"></select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <div>
                                <input class="form-control" type="text" name="titles" id="titles"
                                style="width:100%" placeholder="Tiêu đề hồ sơ"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                    Đóng
                </button>
                <button class="btn btn-sm btn-primary pull-right" onclick="search()" id="save_form">
                    <i class="ace-icon fa fa-search"></i>
                    Tìm kiếm
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-doc" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:70%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    Danh sách văn bản
                </div>
            </div>
            <div class="modal-body" style="height:520px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <input class="form-control" id="nav-search-input-doc" type="text" style="width:100%"
                        placeholder="Tìm kiếm" onkeyup="search_doc()"/>
                    </div>
                    <div class="col-xs-12">
                        <div class="space-6"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div id="list_doc" class="dataTables_wrapper form-inline no-footer"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer no-margin-top">
                <small class="pull-right" id="pager_doc">
                    <!--display pagination-->
                </small>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->
<script src="<?php echo URL.'/public/' ?>scripts/works/index.js"></script>