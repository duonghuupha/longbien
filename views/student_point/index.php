<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Học sinh</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Sổ điểm
                    <small>
                        Quản lý điểm các môn học của học sinh
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn học kì</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn học kỳ"
                                    style="width:100%" id="semester" name="semester">
                                        <option value="1" selected="">Học kỳ 1</option>
                                        <option value="2">Học kỳ 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn môn học</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn môn học"
                                    style="width:100%" id="subject_id" name="subject_id">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn lớp học</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn lớp học"
                                    style="width:100%" id="department_id" name="department_id">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Họ và tên học sinh</label>
                                <div>
                                    <input class="form-control" id="fullnames" name="fullnames"
                                    style="width:100%" placeholder="Họ và tên học sinh"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <button class="btn btn-sm btn-primary" type="button" onclick="view_point()">
                                <i class="ace-icon fa fa-search"></i>
                                Hiển thị
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div id="list_student" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-point" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:50%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật điểm của học sinh
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm" method="post" enctype="multipart/form-data">
                        <input id="studentid" name="studentid" type="hidden"/>
                        <input id="semesterid" name="semesterid" type="hidden"/>
                        <input id="subjectid" name="subjectid" type="hidden"/>
                        <div class="col-xs-5" style="border-right:1px solid #000" id="info_student">
                            
                        </div>
                        <div class="col-xs-7">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Loại điểm</label>
                                    <div>
                                        <select class="form-control select2" data-placeholder="Lựa chọn loại điểm..."
                                        style="width:100%" id="type_point" name="type_point" required=""
                                        onchange="set_update()">
                                            <option value="1" selected="">ĐĐGtx 1</option>
                                            <option value="2">ĐĐGtx 2</option>
                                            <option value="3">ĐĐGtx 3</option>
                                            <option value="4">ĐĐGtx 4</option>
                                            <option value="5">ĐĐGgk</option>
                                            <option value="6">ĐĐGck</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Điểm</label>
                                    <div>
                                        <input type="text" id="point" name="point" required=""
                                        placeholder="Điểm" style="width:100%" onkeypress="validate(event)"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12" id="ly_do">
                                <div class="form-group">
                                    <label for="form-field-username">Lý do sửa điểm</label>
                                    <div>
                                        <input type="text" id="content" name="content" placeholder="Lý do sửa điểm" style="width:100%"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="dataTables_wrapper form-inline no-footer">
                                    <table id="quanhe"
                                        class="table table-striped table-bordered table-hover dataTable no-footer"
                                        role="grid" aria-describedby="dynamic-table_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="text-center" colspan="4">ĐĐGtx</th>
                                                <th class="text-center" rowspan="2">ĐĐGgx</th>
                                                <th class="text-center" rowspan="2">ĐĐGcx</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">1</th>
                                                <th class="text-center">2</th>
                                                <th class="text-center">3</th>
                                                <th class="text-center">4</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            
                                        </tbody>
                                    </table>
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
<script src="<?php echo URL.'/public/' ?>scripts/student/point.js"></script>