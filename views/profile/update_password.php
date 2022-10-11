<!--Form don vi tinh-->
<div id="modal-profile" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" id="detail">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Cập nhật mật khẩu
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div>
                            <div id="user-profile-1" class="user-profile row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="profile-user-info profile-user-info-striped">
                                        <form id="fm">
                                            <div class="profile-info-row">
                                                <div class="profile-info-name" style="width:160px;"> Mật khẩu hiện tại </div>
                                                <div class="profile-info-value">
                                                    <span class="editable" id="username">
                                                        <input id="pass_old" name="pass_old" type="password" class="form-control"
                                                        style="width:100%" placeholder="Mật khẩu hiện tại" required=""/>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Mật khẩu mới </div>
                                                <div class="profile-info-value">
                                                    <span class="editable" id="username">
                                                        <input id="pass_new" name="pass_new" type="password" class="form-control"
                                                        style="width:100%" placeholder="Mật khẩu mới" required=""/>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Xác nhận mật khẩu </div>
                                                <div class="profile-info-value">
                                                    <span class="editable" id="username">
                                                        <input id="re_pass" name="re_pass" type="password" class="form-control"
                                                        style="width:100%" placeholder="Xác nhận mật khẩu" required=""/>
                                                    </span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?php 
                if($this->_Info[0]['is_change'] != 0){
                ?>
                <button class="btn btn-sm btn-danger pull-left" onclick="javascript:window.location.href='<?php echo URL.'/profile' ?>'" type="button">
                    <i class="ace-icon fa fa-times"></i>
                    Đóng
                </button>
                <?php
                }
                ?>
                <button class="btn btn-sm btn-primary pull-right" type="button" onclick="save()">
                    <i class="ace-icon fa fa-pencil"></i>
                    Ghi dữ liệu
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->
<script src="<?php echo URL.'/public/' ?>scripts/profile/index.js"></script>