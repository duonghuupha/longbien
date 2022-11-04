<?php
$item = $this->jsonObj;
foreach($this->_Data->return_title_works_cate($item[0]['works_id']) as $row){
    $array[] = $row['title'];
}
?>
<div class="modal-header no-padding">
    <div class="table-header">
        Thông tin hồ sơ công việc
    </div>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Mã hệ thống:</b> <?php echo $item[0]['code'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Danh mục:</b> <?php echo implode("; ",$array) ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Tiêu đề:</b> <?php echo $item[0]['title'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Nội dung:</b> <?php echo $item[0]['content'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">
                    <b>File đính kèm:</b> 
                    <?php
                    if($item[0]['file']  != ''){
                        $url = URL.'/public/works/'.$item[0]['file'];
                    }else{
                        $link = explode("_", $item[0]['file_link']);
                        if($link[1] == 1){ // van ban den
                            $detail = $this->_Data->get_info_document_in($link[0]);
                            $url = URL.'/public/document_in/'.$detail[0]['cate_id'].'/'.$detail[0]['file'];
                        }else{ // van ban di
                            $detail = $this->_Data->get_info_document_out($link[0]);
                            $url = URL.'/public/document_out/'.$detail[0]['cate_id'].'/'.$detail[0]['file'];
                        }
                    }
                    ?>
                    <a href="<?php echo $url ?>" target="_blank">Xem tệp đính kèm</a>
                </label>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Người tạo:</b> <?php echo $item[0]['fullname'] ?>
                </label>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="form-field-username">
                    <b>Cập nhật lần cuối:</b> <?php echo date("H:i:s d-m-Y", strtotime($item[0]['create_at'])) ?>
                </label>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
        <i class="ace-icon fa fa-times"></i>
        Đóng
    </button>
</div>