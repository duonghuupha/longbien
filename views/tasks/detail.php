<?php $item = $this->jsonObj; ?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Lịch làm việc</li>
            </ul><!-- /.breadcrumb -->
            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off"
                        onkeyup="search()"/>
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Chi tiết công việc
                    <?php
                    if($item[0]['status'] == 2){
                    ?>
                    <small class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" onclick="add(<?php echo $item[0]['id'] ?>)">
                            <i class="fa fa-comment"></i>
                            Gửi ý kiến
                        </button>
                    </small>
                    <?php
                    }
                    ?>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username" style="font-weight:700">
                                Tiêu đề công việc
                            </label>
                            <div><?php echo $item[0]['title'] ?></div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username" style="font-weight:700">
                                Người tạo
                            </label>
                            <div><?php echo $item[0]['user_create'] ?></div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username" style="font-weight:700">
                                Người xử lý chính
                            </label>
                            <div><?php echo $item[0]['usermain'] ?></div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username" style="font-weight:700">
                                Người tham gia
                            </label>
                            <div>
                            <?php
                                if($item[0]['user_share'] != ''){
                                    $user = explode(",", $item[0]['user_share']);
                                    foreach($user as $row){
                                        $array[] = "* ".$this->_Data->get_fullname_users($row);
                                    }
                                    $user_share = implode("<br/>", $array);
                                }else{
                                    $user_share = "<i>Không có người tham gia</i>";
                                }
                                echo $user_share;
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username" style="font-weight:700">
                                Thời gian thực hiện
                            </label>
                            <div>
                                <?php
                                echo ($item[0]['time_work'] == 1) ? 'Sáng' : 'Chiều';
                                echo " / ".$item[0]['date_work'];
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username" style="font-weight:700">
                                Nội dung công việc
                            </label>
                            <div><?php echo $item[0]['content'] ?></div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username" style="font-weight:700">
                                Tài liệu đính kèm
                            </label>
                            <div>
                            <?php
                            if($item[0]['file'] != ''){
                                echo '<a href="'.URL.'/public/tasks/'.$item[0]['user_id'].'/'.$item[0]['file'].'" target="_blank">'.$item[0]['file'].'</a>';
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-field-username" style="font-weight:700">
                                Ngày tạo
                            </label>
                            <div><?php echo date("H:i:s d-m-Y", strtotime($item[0]['create_at'])) ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12" id="comment">
                            
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-comment" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Gửi ý kiến - Tra đổi nội dung công việc
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm" method="POST" enctype="multipart/form-data">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Nội dung trao đổi</label>
                                <div>
                                    <textarea type="text" id="content" style="width:100%;resize:none;height:70px" name="content"
                                    required=""></textarea>
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
                <button class="btn btn-sm btn-primary pull-right" onclick="save(1)">
                    <i class="ace-icon fa fa-save"></i>
                    Ghi dữ liệu
                </button>
                <button class="btn btn-sm btn-success pull-right" onclick="save(2)">
                    <i class="ace-icon fa fa-save"></i>
                    Hoàn thành công việc
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->
<script>var id_task = <?php echo $item[0]['id'] ?></script>
<script src="<?php echo URL.'/public/' ?>scripts/task/detail.js"></script>