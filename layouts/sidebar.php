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
        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-calendar"></i>
                <span class="menu-text">
                    Lịch làm việc
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover">
                    <a href="<?php echo URL.'/group_task' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Nhóm công việc
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/tasks' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Công việc
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/weekly' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Lịch công tác
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <!--<li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-calendar-check-o"></i>
                <span class="menu-text">
                    Giảng dạy
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover">
                    <a href="<?php echo URL.'/schedule' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Thời khóa biểu
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/teaching' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Phân bổ giáo viên dạy
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/calendars' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Lịch báo giảng
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>-->
        <li class="hover">
            <a href="<?php echo URL.'/calendars' ?>">
                <i class="menu-icon fa fa-calendar-check-o"></i>
                <span class="menu-text">
                    Lịch báo giảng
                </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-book"></i>
                <span class="menu-text">
                    Văn bản
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover">
                    <a href="<?php echo URL.'/document_cate' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Danh mục
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/document_in' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Văn bản đến
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/document_out' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Văn bản đi
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="hover">
            <a href="<?php echo URL.'/quanlity' ?>">
                <i class="menu-icon fa fa-balance-scale"></i>
                <span class="menu-text">
                    Kiểm đinh chất lượng
                </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="hover">
            <a href="<?php echo URL.'/works' ?>">
                <i class="menu-icon fa fa-briefcase"></i>
                <span class="menu-text">
                    Hồ sơ công việc
                </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="hover">
            <a href="<?php echo URL.'/personal' ?>">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text">
                    Nhân sự
                </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-graduation-cap"></i>
                <span class="menu-text">
                    Học sinh
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover">
                    <a href="<?php echo URL.'/student' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Thông tin học sinh
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/student_change' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Phân lớp
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Chuyển lớp
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="">
                            <a href="<?php echo URL.'/change_class' ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Chuyển lớp
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="<?php echo URL.'/up_class' ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Lên lớp
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/student_point' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Sổ điểm
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-cubes"></i>
                <span class="menu-text">
                    Trang thiết bị
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover">
                    <a href="<?php echo URL.'/devices' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Thông tin
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/import_device' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Nhập kho
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/export_device' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Phân bổ
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/qrcode_device' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        In mã thiết bị
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/change_device' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Luân chuyển thiết bị
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/loans' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Mượn - trả
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/repairs' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Sửa chữa nâng cấp
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/returns' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Thu hồi - Khôi phục
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-flask"></i>
                <span class="menu-text">
                    Đồ dùng dạy học
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover">
                    <a href="<?php echo URL.'/gear' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Thông tin
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/gear_code' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        In mã đồ dùng
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/gear_loans' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Quản lý mượn - trả
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/gear_return' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Thu hồi - Khôi phục
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-book"></i>
                <span class="menu-text">
                    Thư viện
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover">
                    <a href="<?php echo URL.'/lib_cate' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Danh mục
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/library' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Quản lý đầu sách
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/lib_code' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        In mã đầu sách
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/lib_loans' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Quản lý mượn - trả
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/lib_return' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Thu hồi - Khôi phục
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-bar-chart"></i>
                <span class="menu-text">
                    Báo cáo - Thống kê
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover">
                    <a href="<?php echo URL.'/lib_cate' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Lịch báo giảng
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/report_document' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Văn bản
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/report_personel' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Nhân sự
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="<?php echo URL.'/report_student' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Học sinh
                    </a>
                    <b class="arrow"></b>
                </li>
               <li class="hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Trang thiết bị
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="hover">
                            <a href="<?php echo URL.'/report_device' ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Danh sách trang thiết bị
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="<?php echo URL.'/report_export_device' ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Sổ theo dõi trang thiết bị phòng ban
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="<?php echo URL.'/report_change_device' ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Sổ theo dõi luân chuyển thiết bị
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="<?php echo URL.'/report_loan_device' ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Sổ theo dõi mượn - trả thiết bị
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="<?php echo URL.'/report_repair_device' ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Sổ theo dõi quá trình bảo trì bảo dưỡng trang thiết bị
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="<?php echo URL.'/report_file_device' ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Hồ sơ trang thiết bị
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                <li class="hover">
                    <a a href="<?php echo URL.'/lib_loans' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Đồ dùng
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a a href="<?php echo URL.'/lib_loans' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Thư viện
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="hover">
            <a href="<?php echo URL.'/users' ?>">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text">
                    Người dùng
                </span>
            </a>
            <b class="arrow"></b>
        </li>
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>