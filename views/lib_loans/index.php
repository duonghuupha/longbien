<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Thư viện</li>
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
                    Quản lý mượn / trả
                    <small class="pull-right">
                        <button class="btn btn-sm btn-info" type="button" onclick="filter()">
                            <i class="ace-icon fa fa-search"></i>
                            Lọc dữ liệu
                        </button>
                        <button class="btn btn-sm btn-primary" type="button" onclick="add()">
                            <i class="ace-icon fa fa-plus"></i>
                            Thêm mới
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <?php 
                $class = "12";
                if($this->_Data->check_role_view($this->_Info[0]['id'], $this->_Info[0]['group_role_id'], $this->_Url[0], 1) > 0){
                    $class = "9";
                ?>
                <div class="col-xs-12 col-sm-3">
                    <form id="fm" method="post">
                        <input id="book_id" name="book_id" value="" type="hidden"/>
                        <input id="per_id" name="per_id" value="0" type="hidden"/>
                        <input id="stu_id" name="stu_id" value="0" type="hidden"/>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>
                                        Mã giáo viên/học sinh <b>(SCAN)</b>
                                    </label>
                                    <div>
                                        <input type="text" id="per_stu_code" name="per_stu_code" autofocus=""
                                        placeholder="Mã học sinh / giáo viên" style="width:100%"
                                        onchange="set_info_per_stu(this.value)"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Thông tin giáo viên / Học sinh</label>
                                    <div id="per_stu_info">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">
                                        Mã sách <b>(SCAN)</b>
                                    </label>
                                    <div>
                                        <input type="text" id="book_code" name="book_code"
                                        placeholder="Mã sách" style="width:100%" onchange="set_info_book(this.value)"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Thông tin sách</label>
                                    <div id="book_info">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-sm btn-danger" type="button" onclick="clear_form_loan()">
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
                <?php
                }
                ?>
                <div class="col-xs-12 col-sm-<?php echo $class ?>">
                    <div id="list_loans" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-loan" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header" id="title_modal">
                    Thêm mới - Cập nhật phiếu mượn sách thư viện
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm-loan" method="POST" enctype="multipart/form-data">
                        <input id="user_loan" name="user_loan" type="hidden" value="0"/>
                        <input id="student_loan" name="student_loan" type="hidden" value="0"/>
                        <input id="datadc" name="datadc" type="hidden"/>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn học sinh</label>
                                <div class="input-group">
                                    <input type="text" id="fullname_student" name="fullname_student" required=""
                                    placeholder="Click Go! để lựa chọn" style="width:100%" readonly=""/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm btn-primary" type="button" onclick="select_student()"
                                        id="select_stu">
                                            <i class="ace-icon fa fa-graduation-cap bigger-110"></i>
                                            Go!
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn giáo viên</label>
                                <div class="input-group">
                                    <input type="text" id="fullname_personel" name="fullname_personel" required=""
                                    placeholder="Click Go! để lựa chọn" style="width:100%" readonly=""/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm btn-primary" type="button" onclick="select_personel()"
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
                                <label for="form-field-username">Ngày mượn</label>
                                <div class="input-group">
                                    <input class="form-control date-picker" id="date_loan" type="text" 
                                    name="date_loan" required="" data-date-format="dd-mm-yyyy" readonly=""/>
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Ngày dự kiến trả</label>
                                <div class="input-group">
                                    <input class="form-control date-picker" id="date_return" type="text" 
                                    name="date_return"  required="" data-date-format="dd-mm-yyyy" readonly=""/>
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <div>
                                    <input type="text" id="book_code_form" name="book_code_form" onchange="set_book_loan()"
                                    placeholder="Sử dụng mã của từng sách" style="width:100%"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <button class="btn btn-sm btn-success pull-right" onclick="select_book()"
                            type="button" id="select_devices">
                                <i class="ace-icon fa fa-book"></i>
                                Lựa chọn sách(s)
                            </button>
                        </div>
                        <div class="col-xs-12">
                            <div class="dataTables_wrapper form-inline no-footer">
                                <table id="dynamic-table"
                                    class="table table-striped table-bordered table-hover dataTable no-footer"
                                    role="grid" aria-describedby="dynamic-table_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-center" style="width:20px">#</th>
                                            <th class="text-center" style="width:100px">Mã</th>
                                            <th class="">Tên sách</th>
                                            <th class="text-center" style="width:60px">Số con</th>
                                            <th class="text-center" style="width:20px"></th>
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
                <button class="btn btn-sm btn-primary pull-right" onclick="save_loan()">
                    <i class="ace-icon fa fa-save"></i>
                    Ghi dữ liệu
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-book" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:66%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    Danh sách sách có thể mượn
                </div>
            </div>
            <div class="modal-body" style="height:520px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <input class="form-control" id="nav-search-input-book" type="text" style="width:100%"
                        placeholder="Tìm kiếm" onkeyup="search_book()"/>
                    </div>
                    <div class="col-xs-12">
                        <div class="space-6"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div id="list_book" class="dataTables_wrapper form-inline no-footer" style="height:457px;overflow:auto"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-left" id="pager-book">
                    <!--display pagination-->
                </small>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-student" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:66%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    Danh sách học sinh
                </div>
            </div>
            <div class="modal-body" style="height:520px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <input class="form-control" id="nav-search-input-student" type="text" style="width:100%"
                        placeholder="Tìm kiếm" onkeyup="search_student()"/>
                    </div>
                    <div class="col-xs-12">
                        <div class="space-6"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div id="list_student" class="dataTables_wrapper form-inline no-footer"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-left" id="pager-student">
                    <!--display pagination-->
                </small>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-personel" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:66%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    Danh sách học sinh
                </div>
            </div>
            <div class="modal-body" style="height:520px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <input class="form-control" id="nav-search-input-personel" type="text" style="width:100%"
                        placeholder="Tìm kiếm" onkeyup="search_personel()"/>
                    </div>
                    <div class="col-xs-12">
                        <div class="space-6"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div id="list_personel" class="dataTables_wrapper form-inline no-footer"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-left" id="pager-personel">
                    <!--display pagination-->
                </small>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-detail" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:40%">
        <div class="modal-content" id="detail">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/library/loans.js"></script>