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
                    Danh sách học sinh
                    <small class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" onclick="filter()">
                            <i class="fa fa-filter"></i>
                            Lọc dữ liệu
                        </button>
                        <button type="button" class="btn btn-success btn-sm" onclick="export_xlsx()">
                            <i class="fa fa-file-excle-o"></i>
                            Xuất file Excel
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='<?php echo URL.'/report' ?>'">
                            <i class="fa fa-arrow-left"></i>
                            Quay lại
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div id="list_student" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-search" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Lựa chọn điều kiện hiển thị dữ liệu
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">
                                Mã học sinh
                            </label>
                            <div>
                                <input type="text" id="scode" name="scode" style="width:100%" onkeypress="validate(event)"
                                placeholder="Mã học sinh"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">
                                Mã định danh
                            </label>
                            <div>
                                <input type="text" id="scodecsdl" name="scodecsdl" style="width:100%" onkeypress="validate(event)"
                                placeholder="Mã định danh"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">
                                Họ và tên
                            </label>
                            <div>
                                <input type="text" id="sfullname" name="sfullname" style="width:100%" placeholder="Họ và tên"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">Ngày sinh (dd-mm-yyyy)</label>
                            <div>
                                <input class="form-control input-mask-date" id="sbirthday" type="text" 
                                name="sbirthday" placeholder="NGày sinh"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">Giới tính</label>
                            <div>
                                <select class="select2" data-placeholder="Lựa chọn giới tính..."
                                style="width:100%" id="sgender" name="sgender" data-minimum-results-for-search="Infinity">
                                    <option value="0">Tất cả</option>
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">
                                Dân tộc
                            </label>
                            <div>
                                <select class="select2" data-placeholder="Lựa chọn dân tộc..."
                                style="width:100%" id="speople" name="speople">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">Tôn giáo</label>
                            <div>
                                <select class="select2" data-placeholder="Lựa chọn tôn giáo..."
                                style="width:100%" id="sreligion" name="sreligion" data-minimum-results-for-search="Infinity">
                                    <option value="0">Tất cả</option>
                                    <option value="1">Không</option>
                                    <option value="2">Phật giáo</option>
                                    <option value="3">Công giáo</option>
                                    <option value="4">Kito giáo</option>
                                    <option value="5">Tin lành</option>
                                    <option value="6">Hòa hảo</option>
                                    <option value="7">Cao đài</option>
                                    <option value="8">Khác</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">
                                Lớp học
                            </label>
                            <div>
                                <select class="select2" data-placeholder="Lựa chọn lớp học..."
                                style="width:100%" id="sdepartment" name="sdepartment">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="form-field-username">Địa chỉ</label>
                            <div>
                                <input type="text" id="saddress" name="saddress"
                                placeholder="Địa chỉ" style="width:100%" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username">Trạng thái</label>
                            <div>
                                <select class="select2" data-placeholder="Lựa chọn trạng thái..."
                                style="width:100%" id="sstatus" name="sstatus" data-minimum-results-for-search="Infinity">
                                    <option value="0">Tất cả</option>
                                    <option value="1" selected="">Đang đi học</option>
                                    <option value="2">Nghỉ học</option>
                                    <option value="3">Chuyển trường</option>
                                    <option value="4">Ra trường</option>
                                </select>
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
                <button type="button" class="btn btn-primary btn-sm pull-right" onclick="search()">
                    <i class="fa fa-search"></i>
                    Tìm kiếm
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/report/report_student.js"></script>