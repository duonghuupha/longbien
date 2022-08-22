<?php $item = $this->jsonObj; ?>
<div class="col-xs-12">
    <div class="form-group">
        <div class="text-center">
            <?php
            if($item[0]['image'] == ''){
            ?>
            <img src="<?php echo URL.'/styles/images/noimg.jpg' ?>" alt="" 
            width="150" height="150" style="border:2px solid #ccc;border-radius:5px;"/>
            <?php
            }else{
            ?>
            <img src="<?php echo URL.'/public/utensils/images/'.$item[0]['image'] ?>" alt="" 
            width="150" style="border:2px solid #ccc;border-radius:5px;"/>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<div class="col-xs-6">
    <div class="form-group">
        <label for="form-field-username">
            <b>Mã đồ dùng:</b> 89567845
        </label>
    </div>
</div>
<div class="col-xs-6">
    <div class="form-group">
        <label for="form-field-username">
            <b>Danh mục:</b> <?php echo $item[0]['category'] ?>
        </label>
    </div>
</div>
<div class="col-xs-6">
    <div class="form-group">
        <label for="form-field-username">
            <b>Tiêu đề:</b> <?php echo $item[0]['title'] ?>
        </label>
    </div>
</div>
<div class="col-xs-6">
    <div class="form-group">
        <label for="form-field-username">
            <b>Số  lượng:</b> <?php echo $item[0]['stock'] ?>
        </label>
    </div>
</div>
<div class="col-xs-12">
    <div class="form-group">
        <label for="form-field-username">
            <b>Mô tả:</b> <?php echo $item[0]['content'] ?>
        </label>
    </div>
</div>
<div class="col-xs-12">
    <div class="form-group">
        <label for="form-field-username">
            <b>Cập nhật lần cuối (%):</b> <?php echo date("H:i:s  d-m-Y", strtotime($item[0]['create_at'])) ?>
        </label>
    </div>
</div>