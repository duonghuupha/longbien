<?php
$jsonObj = $this->jsonObj; $perpage = $this->perpage; $pages = $this->page;
?>
<div class="timeline-container">
    <div class="timeline-label">
        <span class="label label-primary arrowed-in-right label-lg">
            <b>Trao đổi công việc</b>
        </span>
    </div>
    <?php
    foreach($jsonObj['rows'] as $row){
    ?>
    <div class="timeline-items">
        <div class="timeline-item clearfix">
            <div class="timeline-info">
                <i class="timeline-indicator ace-icon fa fa-comment btn btn-success no-hover"></i>
            </div>
            <div class="widget-box transparent">
                <div class="widget-header widget-header-small">
                    <h5 class="widget-title smaller">
                        <a class="blue" href="javascript:void(0)">
                            <?php echo $row['fullname'] ?>
                        </a>
                        <span class="grey">nêu ý kiến</span>
                    </h5>
                    <span class="widget-toolbar no-border">
                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                        <?php echo date("H:i:s d-m-Y", strtotime($row['create_at'])) ?>
                    </span>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <?php echo $row['content'] ?>
                        <?php
                        if($row['file'] != ''){
                        ?>
                        <div class="space-6"></div>
                        <div class="widget-toolbox clearfix">
                            <div class="pull-left">
                                <i class="ace-icon fa fa-hand-o-right grey bigger-125"></i>
                                <a href="<?php echo URL.'/public/tasks/'.$row['user_id'].'/'.$row['file'] ?>" class="bigger-110"
                                target="_blank">
                                    <?php echo $row['file'] ?>
                                </a>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.timeline-items -->
    <?php
    }
    ?>
</div><!-- /.timeline-container -->
<div class="row mini">
    <div class="col-xs-12 col-sm-6">
        <div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">
            <?php echo $this->_Convert->return_show_entries($jsonObj['total'], $perpage,  $pages) ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <?php
        if($jsonObj['total'] > $perpage){
            $pagination = $this->_Convert->pagination($jsonObj['total'], $pages, $perpage);
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_coment', 1);
        ?>
        <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
            <ul class="pagination">
                <?php echo $createlink ?>
            </ul>
        </div>
        <?php
        }
        ?>
    </div>
</div>