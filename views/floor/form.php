<div class="modal-header no-padding">
    <div class="table-header">
        Thêm mới - Cập nhật thông tin các tầng của giá kệ
    </div>
</div>
<div class="modal-body">
    <div class="row">
        <form id="fm" method="post">
            <input id="id" name="id" type="hidden" value="<?php echo (isset($_REQUEST['id'])) ? $this->jsonObj[0]['id'] : 0 ?>"/>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="form-field-username">Lựa chọn giá kệ</label>
                    <div>
                        <select class="select2" data-placeholder="Lựa chọn giá kệ..."
                        style="width:100%" required="" id="bin_id" name="bin_id">
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="form-field-username">Tiêu đề</label>
                    <div>
                        <input type="text" id="title" name="title" required="" 
                        placeholder="Tiêu đề giá kệ sách, vd: Kệ 1" style="width:100%"
                        value="<?php echo (isset($_REQUEST['id'])) ? $this->jsonObj[0]['title'] : '' ?>"/>
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
    <button class="btn btn-sm btn-primary pull-right" onclick="save_floor()">
        <i class="ace-icon fa fa-save"></i>
        Ghi dữ liệu
    </button>
</div>
<script>
$(function(){
    $('.select2').select2();
    //$('#bin_id').load(baseUrl + '/other/combo_bin?id=1');
})
</script>