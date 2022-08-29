<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Lịch làm việc</li>
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Lịch công tác tuần
                    <small class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" onclick="export_pdf()">
                            <i class="fa fa-file-pdf-o"></i>
                            Xuất file
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-2">
                    <div class="control-group">
                        <input class="form-control" id="nav-search-input" onkeyup="search()"
                        placeholder="Tìm kiếm..."/>
                        <div class="space-6"></div>
                        <label class="control-label bolder blue">Lựa chọn người dùng</label>
                        <div id="list_users">
                            
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-10">
                    <div class="row">
                        <div class="col-xs-12">
                            <select class="select2" data-placeholder="Lựa chọn tuần..."
                            style="width:50%" required="" id="week" name="week" onchange="set_content()">
                            <?php
                            $week = date("W",strtotime('31th December '.date("Y")));
                            for($i = 1; $i <= $week; $i++){
                                $selected = ($i == date("W")) ? 'selected=""' : '';
                            ?>
                                <option value="<?php echo $i ?>" <?php echo $selected ?>><?php echo 'Tuần ' .$i?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col-xs-12">
                            <div class="space-6"></div>
                        </div>
                        <div class="col-xs-12 col-sm-12" id="weekly">
                            
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script src="<?php echo URL.'/public/' ?>scripts/task/weekly.js"></script>