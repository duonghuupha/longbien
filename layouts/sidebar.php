<?php
$userid = $this->_Info[0]['id']; $role = $this->_Info[0]['group_role_id'];
?>
<div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed">
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>
            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>
            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>
            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>
        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>
            <span class="btn btn-info"></span>
            <span class="btn btn-warning"></span>
            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->
    <ul class="nav nav-list">
        <li class="active hover">
            <a href="<?php echo URL.'/index' ?>">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Bàn làm việc </span>
            </a>
            <b class="arrow"></b>
        </li>
    <!------------------------------------Danh muc----------------------------------------->
        <?php
        if($userid == 1){
        ?>
        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text">
                    Danh mục
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover">
                    <a href="<?php echo URL.'/categories' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Dùng chung
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/physical_room' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Phòng "vật lý" 
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/department' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Phòng ban / Lớp học
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <?php
        }
        if($userid == 1){
            require('sidebar_admin.php');
        }else{
            
        }
        ?>
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>