<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Danh mục</li>
            </ul><!-- /.breadcrumb -->
            <div class="nav-search" id="nav-search">
                <form class="form-search" onsubmit="search()">
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
                    Khai báo phòng ban / lớp học
                    <small class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" onclick="copy()"
                        title='Chỉ thực hiện copy phòng "Không cố định"'>
                            <i class="fa fa-copy"></i>
                            Copy phòng ban / lớp học
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <form id="fm" method="post">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn năm học</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn năm học"
                                        style="width:100%" required="" id="year_id" name="year_id">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn phòng "vật lý"</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn phòng 'vật lý'"
                                        style="width:100%" required="" id="physical_id" name="physical_id">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tên phòng ban / lớp học</label>
                                    <div>
                                        <input type="text" id="title" name="title" required=""
                                        placeholder="Tên phòng, ví dụ: Phòng Hiệu trưởng" style="width:100%" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <label>
                                    <input name="class_study" id="class_study" class="ace ace-checkbox-2" type="checkbox"
                                    checked="">
                                    <span class="lbl"> Là lớp học</span>
                                </label>
                            </div>
                            <div class="col-xs-6">
                                <label>
                                    <input name="is_default" id="is_default" class="ace ace-checkbox-2" type="checkbox"
                                    checked="">
                                    <span class="lbl"> Không cố định</span>
                                    
                                </label>
                            </div>
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-sm btn-danger" type="button" onclick="window.location.href='<?php echo URL.'/department' ?>'">
                                    <i class="ace-icon fa fa-times"></i>
                                    Hủy bỏ
                                </button>
                                <button class="btn btn-sm btn-primary" type="button" onclick="save()">
                                    <i class="ace-icon fa fa-save"></i>
                                    Ghi dữ liệu
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-9">
                    <div id="list_department" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->


<div id="modal-copy" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Copy phòng ban / lớp học
                    <small style="margin-left:10px;"><i>(Lưu ý: Chỉ thực hiện copy với phòng ban / lớp học "Không cố định")</i></small>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm_copy" method="POST" enctype="multipart/form-data">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn năm học</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn năm học..."
                                    style="width:100%" required="" id="year_from" name="year_from"
                                    onchange="set_list_department()">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn năm học</label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn năm học..."
                                    style="width:100%" required="" id="year_to" name="year_to">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <select multiple="multiple" size="10" name="department_id[]" id="department_id"
                            style="height: 200px" required="">
                                <!--<option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                                <option value="option4">Option 4</option>
                                <option value="option5">Option 5</option>
                                <option value="option6">Option 6</option>
                                <option value="option7">Option 7</option>
                                <option value="option8">Option 8</option>
                                <option value="option9">Option 9</option>
                                <option value="option0">Option 10</option>-->
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                    Đóng
                </button>
                <button class="btn btn-sm btn-primary pull-right" onclick="save_copy()">
                    <i class="ace-icon fa fa-save"></i>
                    Ghi dữ liệu
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/categories/department.js"></script>