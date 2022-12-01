<?php
$info = $this->info; $export = $this->export; $change = $this->change; $repair = $this->repair;
?>
<div class="tabbable">
    <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
        <li class="active">
            <a data-toggle="tab" href="#tab1">Thông tin chung</a>
        </li>
        <li>
            <a data-toggle="tab" href="#tab2">Quá trình luân chuyển</a>
        </li>
        <li>
            <a data-toggle="tab" href="#tab3">Bảo trì - Bảo dưỡng</a>
        </li>
        <li>
            <a data-toggle="tab" href="#tab4">Mượn - trả</a>
        </li>
        <li>
            <a data-toggle="tab" href="#tab5">Thu hồi - Khôi phục</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="tab1" class="tab-pane in active" style="max-height:500px;overflow:auto">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="form-field-username">
                            <b>Mã thiết bị:</b> <?php echo $info[0]['code'] ?>
                        </label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="form-field-username">
                            <b>Tên thiết bị:</b> <?php echo $info[0]['title'] ?>
                        </label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="form-field-username">
                            <b>Danh mục thiết bị:</b>
                            <?php
                            if($info[0]['cate_id'] == 0){
                                if($info[0]['price'] >= 10000000){
                                    echo "Tài sản cố định";
                                }else{
                                    echo "Công cụ - dụng cụ";
                                }
                            }else{
                                echo $info[0]['category'];
                            }
                            ?>
                        </label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="form-field-username">
                            <b>Xuất xứ:</b> <?php echo $info[0]['origin'] ?>
                        </label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="form-field-username">
                            <b>Năm đưa vào sử dụng:</b> <?php echo $info[0]['year_work'] ?>
                        </label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="form-field-username">
                            <b>Mô tả / Thông số kỹ thuật:</b> <?php echo $info[0]['description'] ?>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div id="tab2" class="tab-pane" style="max-height:500px;overflow:auto">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                    <div class="timeline-container timeline-style2">
                        <span class="timeline-label">
                            <b><?php echo date("d-m-Y", strtotime($export[0]['create_at'])) ?></b>
                        </span>
                        <div class="timeline-items">
                            <div class="timeline-item clearfix">
                                <div class="timeline-info">
                                    <span class="timeline-date">Phân bổ</span>
                                    <i class="timeline-indicator btn btn-info no-hover"></i>
                                </div>
                                <div class="widget-box transparent">
                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            <span class="bigger-110">
                                                <a href="javascript:void(0)" class="purple bolder">
                                                    <?php echo $export[0]['nam_hoc'] ?>
                                                </a>
                                                <?php echo '- '.$export[0]['physical'].' - '.$export[0]['department'] ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.timeline-items -->
                    </div><!-- /.timeline-container -->
                    <?php
                    foreach($change as $row_c){
                    ?>
                    <div class="timeline-container timeline-style2">
                        <span class="timeline-label">
                            <b><?php echo date("d-m-Y", strtotime($row_c['create_at'])) ?></b>
                        </span>
                        <div class="timeline-items">
                            <div class="timeline-item clearfix">
                                <div class="timeline-info">
                                    <span class="timeline-date">Luân chuyển</span>
                                    <i class="timeline-indicator btn btn-success no-hover"></i>
                                </div>
                                <div class="widget-box transparent">
                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            Trong 
                                            <b><?php echo $row_c['nam_hoc'] ?></b><br/>
                                            Luân chuyển từ 
                                            <b><?php echo $row_c['physical_from'].' - '.$row_c['department_from'] ?></b>
                                            đến 
                                            <b><?php echo $row_c['physical_to'].' - '.$row_c['department_to'] ?></b><br/>
                                            Với lý do: <b><i><?php echo $row_c['content'] ?></i></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.timeline-items -->
                    </div><!-- /.timeline-container -->
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="tab3" class="tab-pane" style="max-height:500px;overflow:auto">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                    <?php
                    foreach($repair as $row_r){
                    ?>
                    <div class="timeline-container timeline-style2">
                        <span class="timeline-label">
                            <b><?php echo date("d-m-Y", strtotime($row_r['date_repair'])) ?></b>
                        </span>
                        <div class="timeline-items">
                            <div class="timeline-item clearfix">
                                <div class="timeline-info">
                                    <span class="timeline-date"><i class="ace-icon fa fa-wrench"></i></span>
                                    <i class="timeline-indicator btn btn-success no-hover"></i>
                                </div>
                                <div class="widget-box transparent">
                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            Lỗi thiết bị:  
                                            <b><?php echo $row_r['content_error'] ?></b><br/>
                                            Khắc phục
                                            <b><?php echo $row_r['content_repair'] ?></b><br/>
                                            Đơn vị thực hiện: <b><i><?php echo $row_r['agency'] ?></i></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.timeline-items -->
                    </div><!-- /.timeline-container -->
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="tab4" class="tab-pane">
            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro
                fanny pack lo-fi farm-to-table readymade.</p>
        </div>
        <div id="tab5" class="tab-pane">
            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro
                fanny pack lo-fi farm-to-table readymade.</p>
        </div>
    </div>
</div>