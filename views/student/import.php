<?php
$sql = new Model();
?>
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
                        <input type="text" placeholder="Tìm kiếm ..." class="nav-search-input" id="nav-search-input" autocomplete="off"
                        onkeyup="search()"/>
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Nhập thông tin học sinh qua file Excel
                    <small class="pull-right hidden-480">
                        <button type="button" class="btn btn-success btn-sm" onclick="save_tmp()">
                            <i class="fa fa-save"></i>
                            Ghi dữ liệu
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="del_tmp()">
                            <i class="fa fa-trash"></i>
                            Xóa bản ghi tạm
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <form id="fm" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12">
                                <i style="font-size:12px;">Khi thực hiện nhập danh sách học sinh heo file excel thì hệ thống 
                                    sẽ mặc định năm học là năm đang được kích hoạt trong hệ thống</i>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lớp học</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn lớp học..."
                                        style="width:100%" required="" id="department_id" name="department_id">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn file dữ liệu</label>
                                    <div>
                                        <input type="file" id="file_tmp" name="file_tmp" class="file_attach" style="width:100%"
                                        accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                        onchange="save()"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                Định dạng file là <b>.xlsx</b> (Excel 2007 trở lên). Tải file mẫu 
                                <a href="<?php echo URL.'/public/temp/student.xlsx'; ?>" target="_blank">tại đây</a> để moulde chạy đạt hiệu quả cao
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-9">
                    <div id="list_student_tmp" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-student" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:60%">
        <div class="modal-content">
        <div class="modal-header no-padding">
                <div class="table-header">
                    Cập nhật thông tin học sinh
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm_edit" method="post" enctype="multipart/form-data">
                        <input id="datadc" name="datadc" type="hidden"/>
                        <input id="image_old" name="image_old" type="hidden"/>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">
                                    Mã học sinh &nbsp;
                                    <a href="javascript:void(0)" onclick="refresh_code()" title="Tạo mã code" id="refreshcode">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                </label>
                                <div>
                                    <input type="text" id="code" name="code" required="" readonly=""
                                    placeholder="Mã học sinh gồm 12 chữ số ngẫu nhiên" style="width:100%" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="form-field-username">
                                    Mã định danh
                                </label>
                                <div>
                                    <input type="text" id="code_csdl" name="code_csdl" required=""
                                    placeholder="Mã định danh Bộ GD&ĐT" style="width:100%" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="form-field-username">Họ và tên</label>
                                <div>
                                    <input type="text" id="fullname" name="fullname" required=""
                                    placeholder="Họ và tên học sinh" style="width:100%" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="form-field-username">Ngày sinh (dd-mm-yyyy)</label>
                                <div>
                                    <input class="form-control input-mask-date" id="birthday" type="text" 
                                    name="birthday" required=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="form-field-username">Giới tính</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn giới tính..."
                                    style="width:100%" required="" id="gender" name="gender">
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="form-field-username">Dân tộc</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn dân tộc..."
                                    style="width:100%" id="people_id" name="people_id">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="form-field-username">Tôn giáo</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn tôn giáo..."
                                    style="width:100%" id="religion" name="religion">
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
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Địa chỉ</label>
                                <div>
                                    <input type="text" id="address" name="address" required=""
                                    placeholder="Địa chỉ" style="width:100%" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Hình ảnh</label>
                                <div>
                                    <input type="file" id="image" name="image" class="file_attach" style="width:100%"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <button class="btn btn-sm btn-success pull-right" onclick="add_line()"
                            type="button" id="select_devices">
                                <i class="ace-icon fa fa-list"></i>
                                Thêm dòng (s)
                            </button>
                        </div>
                        <div class="col-xs-12">
                            <div class="dataTables_wrapper form-inline no-footer">
                                <table id="quanhe"
                                    class="table table-striped table-bordered table-hover dataTable no-footer"
                                    role="grid" aria-describedby="dynamic-table_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-center">#</th>
                                            <th class="text-center" style="width:100px">Quan hệ</th>
                                            <th class="">Họ và tên</th>
                                            <th class="text-center" style="width:100px">Năm sinh</th>
                                            <th class="text-center"style="width:100px">Điện thoại</th>
                                            <th class="text-center">Nghề nghiệp</th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                    </tbody>
                                </table>
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
                <button class="btn btn-sm btn-primary pull-right" onclick="save_info()">
                    <i class="ace-icon fa fa-save"></i>
                    Ghi dữ liệu
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-detail" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:60%">
        <div class="modal-content" id="detail">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/student/import.js"></script>