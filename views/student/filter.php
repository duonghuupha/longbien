<div class="modal-header no-padding">
    <div class="table-header">
        Lọc dữ liệu
    </div>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-xs-4">
            <div class="form-group">
                <label for="form-field-username">
                    Mã học sinh
                </label>
                <div>
                    <input type="text" id="code" name="code" style="width:100%" />
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label for="form-field-username">
                    Họ và tên
                </label>
                <div>
                    <input type="text" id="fullname" name="fullname" style="width:100%" />
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label for="form-field-username">Ngày sinh (dd-mm-yyyy)</label>
                <div>
                    <input class="form-control input-mask-date" id="birthday" type="text" 
                    name="birthday" required=""/>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
        <i class="ace-icon fa fa-times"></i>
        Đóng
    </button>
    <button type="button" class="btn btn-primary btn-sm pull-right" onclick="search_adv()">
        <i class="fa fa-search"></i>
        Tìm kiếm
    </button>
</div>