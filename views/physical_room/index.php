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
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Tìm kiếm ..." class="nav-search-input" id="nav-search-input" autocomplete="off"
                        onkeypress="search()"/>
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Khai báo thông tin các phòng "vật lý"
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <form id="fm" method="post">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn khu nhà</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn khu nhà"
                                        style="width:100%" required="" id="region" name="region">
                                            <option value="1">Khu nhà A</option>
                                            <option value="2">Khu nhà B</option>
                                            <option value="3">Khu nhà C</option>
                                            <option value="4">Khu nhà D</option>
                                            <option value="5">Khu nhà E</option>
                                            <option value="6">Khu nhà F</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn tầng</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn tầng"
                                        style="width:100%" required="" id="floor" name="floor">
                                            <option value="1">Tầng 1</option>
                                            <option value="2">Tầng 2</option>
                                            <option value="3">Tầng 3</option>
                                            <option value="4">Tầng 4</option>
                                            <option value="5">Tầng 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tên phòng</label>
                                    <div>
                                        <input type="text" id="title" name="title" required=""
                                        placeholder="Tên phòng, ví dụ: Phòng A201" style="width:100%" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-sm btn-danger" type="button" onclick="window.location.href='<?php echo URL.'/physical_room' ?>'">
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
                    <div id="list_physical" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<script src="<?php echo URL.'/public/' ?>scripts/physical_room.js"></script>