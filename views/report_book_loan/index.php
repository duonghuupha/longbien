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
                    Báo cáo mượn trả sách
                    <small class="pull-right">
                        <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='<?php echo URL.'/report' ?>'">
                            <i class="fa fa-arrow-left"></i>
                            Quay lại
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
                                    <label for="form-field-username">Dữ liệu hiển thị</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn"
                                        style="width:100%" id="type_data" name="type_data"
                                        onchange="set_type_data(this.value)">
                                            <option value="1" selected="">Theo đầu sách</option>
                                            <option value="2">Theo danh mục</option>
                                            <option value="3">Theo ngày</option>
                                            <option value="4">Theo tháng</option>
                                            <option value="5">Theo năm</option>
                                            <option value="6">Tùy chỉnh</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12" id="category">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn danh mục</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn danh mục"
                                        style="width:100%" id="cate_id" name="cate_id">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12" id="date_option">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn ngày</label>
                                    <div class="input-group">
                                        <input class="form-control date-picker" id="date_loan" type="text" 
                                        name="date_loan" required="" data-date-format="dd-mm-yyyy" readonly=""/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12" id="month_year">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn tháng/năm</label>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <select class="select2" data-placeholder="Lựa chọn tháng"
                                            style="width:100%" id="thang" name="thang">
                                            <?php
                                            for($j = 1; $j <= 12; $j++){
                                                echo '<option value="'.$j.'">Tháng'.$j.'</option>';
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="col-xs-6">
                                            <select class="select2" data-placeholder="Lựa chọn năm"
                                            style="width:100%" id="nam" name="nam">
                                            <?php
                                            for($i = 2022; $i <= 2030; $i++){
                                                echo '<option value="'.$i.'">Năm'.$i.'</option>';
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12" id="year">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn năm</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn năm"
                                        style="width:100%" id="nam" name="nam">
                                            <?php
                                            for($i = 2022; $i <= 2030; $i++){
                                                echo '<option value="'.$i.'">Năm'.$i.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-sm btn-primary" type="button" onclick="search()">
                                    <i class="ace-icon fa fa-search"></i>
                                    Lọc dữ liệu
                                </button>
                                <button class="btn btn-sm btn-success" type="button" onclick="export_xlsx()">
                                    <i class="ace-icon fa fa-file-excel-o"></i>
                                    Xuất file excel
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-9">
                    <div id="list_library" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<script src="<?php echo URL.'/public/' ?>scripts/report/report_book_loan.js"></script>