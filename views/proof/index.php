<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Kiểm định chất lượng giáo dục</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Quản lý minh chứng
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
                    <div id="list_proof" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-proof" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:50%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật thông tin minh chứng
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm" method="POST" enctype="multipart/form-data">
                        <input id="criteria_id" name="criteria_id" type="hidden"/>
                        <input id="file_old" name="file_old" type="hidden"/>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn tiêu chí</label>
                                <div class="input-group">
                                    <input type="text" id="fullname" name="fullname"
                                    placeholder="Click Go! để lựa chọn" style="width:100%;" readonly=""/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm btn-primary" type="button" onclick="select_criteria()"
                                        id="select_users">
                                            <i class="ace-icon fa fa-users bigger-110"></i>
                                            Go!
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Mã hóa minh chứng</label>
                                <div>
                                    <input type="text" id="code_proof" name="code_proof" required=""
                                    placeholder="Mã hóa minh chứng" style="width:100%;text-transform:uppercase"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Tiêu đề</label>
                                <div>
                                    <input type="text" id="title" name="title" required=""
                                    placeholder="Tiêu đề minh chứng" style="width:100%;"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Tài liệu đính kèm</label>
                                <div>
                                    <input type="file" id="file" name="file" class="file_attach" style="width:100%"/>
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
<div id="modal-criteria" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:62%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    Danh sách tiêu chí kiểm định
                </div>
            </div>
            <div class="modal-body" style="height:600px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <input class="form-control" id="nav-search-input-criteria" type="text" style="width:100%"
                        placeholder="Tìm kiếm" onkeyup="search_criteria()"/>
                    </div>
                    <div class="col-xs-12">
                        <div class="space-6"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div id="list_criteria" class="dataTables_wrapper form-inline no-footer"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-left" id="pager_criteria">
                    <!--display pagination-->
                </small>
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
    <div class="modal-dialog" style="width:50%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Lựa chọn điều kiện hiển thị dữ liệu
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Lựa chọn tiêu chuẩn</label>
                            <div>
                                <select class="select2" id="standards" name="standards" style="width:100%"
                                data-placeholder="Lựa chọn tiêu chuẩn" onchange="set_criteria()">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Lựa chọn tiêu chí</label>
                            <div>
                                <select class="select2" id="criterias" name="criterias" style="width:100%"
                                data-placeholder="Lựa chọn tiêu chí">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Mã hóa minh chứng</label>
                            <div>
                                <input type="text" id="codeproofs" name="codeproofs" style="width:100%;"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Tiêu đề</label>
                            <div>
                                <input type="text" id="titles" name="titles" style="width:100%;"/>
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
                <button class="btn btn-sm btn-primary pull-right" onclick="search()">
                    <i class="ace-icon fa fa-save"></i>
                    Tìm kiếm
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->
<script src="<?php echo URL.'/public/' ?>scripts/quanlity/proof.js"></script>