<div class="modal-header no-padding">
    <div class="table-header">
        Thêm mới - Cập nhật Phân công nhiệm vụ
    </div>
</div>
<div class="modal-body">
    <div class="row">
        <form id="fm" method="post">
            <input id="id" name="id" type="hidden" value="<?php echo (isset($_REQUEST['id'])) ? $this->jsonObj[0]['id'] : 0 ?>"/>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="form-field-username">Tiêu đề</label>
                    <div>
                        <input type="text" id="title" name="title" required="" 
                        placeholder="Tiêu đề nhiệm vụ, ví dụ: Giáo viên" style="width:100%"
                        value="<?php echo (isset($_REQUEST['id'])) ? $this->jsonObj[0]['title'] : '' ?>"/>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <label>
                    <input name="is_teacher" id="is_teacher" class="ace ace-checkbox-2" type="checkbox"
                    <?php echo (isset($_REQUEST['id']) && $this->jsonObj[0]['is_teacher'] == 1) ? 'checked=""' : '' ?>/>
                    <span class="lbl"> Là giáo viên</span>
                </label>
            </div>
        </form>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
        <i class="ace-icon fa fa-times"></i>
        Đóng
    </button>
    <button class="btn btn-sm btn-primary pull-right" onclick="save_job()">
        <i class="ace-icon fa fa-save"></i>
        Ghi dữ liệu
    </button>
</div>