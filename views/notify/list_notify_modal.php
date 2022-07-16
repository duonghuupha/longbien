<li class="dropdown-header">
    <i class="ace-icon fa fa-exclamation-triangle"></i>
    <?php echo $this->total ?> Thông báo
</li>
<li class="dropdown-content">
    <ul class="dropdown-menu dropdown-navbar navbar-pink">
        <?php
        foreach($this->jsonObj as $row){
        ?>
        <li>
            <a href="javascript:void(0)" class="clearfix" onclick="reject_link(<?php echo $row['id'] ?>)">
                <img src="<?php echo URL ?>/styles/images/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
                <span class="msg-body">
                    <span class="msg-title">
                        <span class="blue"><?php echo $row['fullname'] ?>:</span>
                        <?php echo $row['title'] ?>
                    </span>
                    <span class="msg-time">
                        <i class="ace-icon fa fa-clock-o"></i>
                        <span><?php echo date("H:i:s d-m-Y", strtotime($row['create_at'])) ?></span>
                    </span>
                </span>
            </a>
        </li>
        <?php
        }
        ?>
    </ul>
</li>
<li class="dropdown-footer">
    <a href="<?php echo URL.'/notify' ?>">
        Xem tất cả thông báo
        <i class="ace-icon fa fa-arrow-right"></i>
    </a>
</li>