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
                    Khai báo danh mục văn bản
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
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Lựa chọn danh mục cha</label>
                                    <div>
                                        <select class="select2" data-placeholder="Lựa chọn danh mục cha"
                                        style="width:100%" id="parent_id" name="parent_id">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tên danh mục</label>
                                    <div>
                                        <input type="text" id="title" name="title" required=""
                                        placeholder="Tên danh mục, ví dụ: Phòng giáo dục" style="width:100%" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-sm btn-danger" type="button" onclick="javascript:location.reload(true)">
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
                    <div id="list_document" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script src="<?php echo URL.'/public/' ?>scripts/document/cate.js"></script>