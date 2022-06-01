<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">IVYVET</a>
                </li>
                <li class="active">Bảng điều khiển</li>
            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Tìm kiếm ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div>
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Bảng điều khiển
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Tổng quan và số liệu thống kê
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="space-6"></div>
                        <div class="col-sm-7 infobox-container">
                            <div class="infobox infobox-green">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-shopping-cart"></i>
                                </div>
                                <div class="infobox-data">
                                    <span class="infobox-data-number"><?php echo $this->dontrongngay ?></span>
                                    <div class="infobox-content">Đơn trong ngày</div>
                                </div>
                                <?php
                                if($this->dontrongngay == 0){
                                    if($this->donhomtruoc == 0){
                                        $class1 = "";
                                        $so1 = '';
                                    }else{
                                        $class1 = "important";
                                        $so1 = '100%';
                                    }
                                }else{
                                    if($this->donhomtruoc == 0){
                                        $class1 = "success";
                                        $so1 = '100%';
                                    }else{
                                        // tinh phan tram
                                        if($this->dontrongngay > $this->donhomtruoc){
                                            $class1 = "success";
                                            $percent_seller = ($this->dontrongngay/$this->donhomtruoc)*100;
                                            $so1 = $percent_seller.'%';
                                        }elseif($this->dontrongngay < $this->donhomtruoc){
                                            $class1 = "important";
                                            $percent_seller = ($this->dontrongngay/$this->donhomtruoc)*100;
                                            $so1 = $percent_seller.'%';
                                        }else{
                                            $class1 = "";
                                            $so1 = '0%';
                                        }
                                    }
                                }
                                ?>
                                <div class="stat stat-<?php echo $class1 ?>">
                                    <?php echo $so1 ?>
                                </div>
                            </div>
                            <div class="infobox infobox-blue">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-shopping-cart"></i>
                                </div>
                                <div class="infobox-data">
                                    <span class="infobox-data-number">11</span>
                                    <div class="infobox-content">Đơn trong tuần</div>
                                </div>
                                <div class="badge badge-success">
                                    +32%
                                    <i class="ace-icon fa fa-arrow-up"></i>
                                </div>
                            </div>
                            <div class="infobox infobox-pink">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-shopping-cart"></i>
                                </div>
                                <div class="infobox-data">
                                    <span class="infobox-data-number">8</span>
                                    <div class="infobox-content">Tổng SP xuất</div>
                                </div>
                            </div>
                            <div class="infobox infobox-red">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-shopping-cart"></i>
                                </div>
                                <div class="infobox-data">
                                    <span class="infobox-data-number"><?php echo number_format($this->totalseller) ?></span>
                                    <div class="infobox-content">Tổng đơn hàng</div>
                                </div>
                            </div>
                            <div class="infobox infobox-orange2">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-users"></i>
                                </div>
                                <div class="infobox-data">
                                    <span class="infobox-data-number"><?php echo number_format($this->totalcus) ?></span>
                                    <div class="infobox-content">Tổng khách hàng</div>
                                </div>
                                <div class="badge badge-success">
                                    100%
                                    <i class="ace-icon fa fa-arrow-up"></i>
                                </div>
                            </div>
                            <div class="infobox infobox-blue2">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-money"></i>
                                </div>
                                <div class="infobox-data">
                                    <span class="infobox-text"><?php echo number_format($this->doanhthu) ?></span>
                                    <div class="infobox-content">
                                        <span class="bigger-110">~</span>
                                        Tổng doanh thu
                                    </div>
                                </div>
                            </div>
                            <div class="space-6"></div>
                            <div class="infobox infobox-green infobox-small infobox-dark">
                                <div class="infobox-progress">
                                    <div class="easy-pie-chart percentage" data-percent="61" data-size="39">
                                        <span class="percent">61</span>%
                                    </div>
                                </div>
                                <div class="infobox-data">
                                    <div class="infobox-content">Doanh thu</div>
                                    <div class="infobox-content">Completion</div>
                                </div>
                            </div>
                            <div class="infobox infobox-blue infobox-small infobox-dark">
                                <div class="infobox-chart">
                                    <span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
                                </div>
                                <div class="infobox-data">
                                    <div class="infobox-content">Phải trả</div>
                                    <div class="infobox-content">$32,000</div>
                                </div>
                            </div>
                            <div class="infobox infobox-grey infobox-small infobox-dark">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-download"></i>
                                </div>
                                <div class="infobox-data">
                                    <div class="infobox-content">DT Thuần</div>
                                    <div class="infobox-content">1,205</div>
                                </div>
                            </div>
                        </div>
                        <div class="vspace-12-sm"></div>
                        <div class="col-sm-5">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Doanh thu
                                    </h5>
                                    <div class="widget-toolbar no-border">
                                        <div class="inline dropdown-hover">
                                            <button class="btn btn-minier btn-primary">
                                                Tuần này
                                                <i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
                                                <li class="active">
                                                    <a href="#" class="blue">
                                                        <i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
                                                        Tuần này
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                                        Tuần trước
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                                        Tháng này
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                                        Tháng trước
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div id="piechart-placeholder"></div>
                                        <div class="hr hr8 hr-double"></div>
                                        <div class="clearfix">
                                            <div class="grid3">
                                                <span class="grey">
                                                    <i class="ace-icon fa fa-facebook-square fa-2x blue"></i>
                                                    &nbsp; likes
                                                </span>
                                                <h4 class="bigger pull-right">1,255</h4>
                                            </div>
                                            <div class="grid3">
                                                <span class="grey">
                                                    <i class="ace-icon fa fa-twitter-square fa-2x purple"></i>
                                                    &nbsp; tweets
                                                </span>
                                                <h4 class="bigger pull-right">941</h4>
                                            </div>
                                            <div class="grid3">
                                                <span class="grey">
                                                    <i class="ace-icon fa fa-pinterest-square fa-2x red"></i>
                                                    &nbsp; pins
                                                </span>
                                                <h4 class="bigger pull-right">1,050</h4>
                                            </div>
                                        </div>
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="hr hr32 hr-dotted"></div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="widget-box transparent">
                                <div class="widget-header widget-header-flat">
                                    <h4 class="widget-title lighter">
                                        <i class="ace-icon fa fa-star orange"></i>
                                        Sản phẩm bán chạy
                                    </h4>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main no-padding">
                                        <table class="table table-bordered table-striped">
                                            <thead class="thin-border-bottom">
                                                <tr>
                                                    <th>
                                                        <i class="ace-icon fa fa-caret-right blue"></i>name
                                                    </th>
                                                    <th>
                                                        <i class="ace-icon fa fa-caret-right blue"></i>price
                                                    </th>
                                                    <th class="hidden-480">
                                                        <i class="ace-icon fa fa-caret-right blue"></i>status
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>internet.com</td>
                                                    <td>
                                                        <small>
                                                            <s class="red">$29.99</s>
                                                        </small>
                                                        <b class="green">$19.99</b>
                                                    </td>
                                                    <td class="hidden-480">
                                                        <span class="label label-info arrowed-right arrowed-in">on sale</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>online.com</td>
                                                    <td>
                                                        <b class="blue">$16.45</b>
                                                    </td>
                                                    <td class="hidden-480">
                                                        <span class="label label-success arrowed-in arrowed-in-right">approved</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>newnet.com</td>
                                                    <td>
                                                        <b class="blue">$15.00</b>
                                                    </td>
                                                    <td class="hidden-480">
                                                        <span class="label label-danger arrowed">pending</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>web.com</td>
                                                    <td>
                                                        <small>
                                                            <s class="red">$24.99</s>
                                                        </small>
                                                        <b class="green">$19.95</b>
                                                    </td>
                                                    <td class="hidden-480">
                                                        <span class="label arrowed">
                                                            <s>out of stock</s>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>domain.com</td>
                                                    <td>
                                                        <b class="blue">$12.00</b>
                                                    </td>
                                                    <td class="hidden-480">
                                                        <span class="label label-warning arrowed arrowed-right">SOLD</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div><!-- /.col -->

                        <div class="col-sm-7">
                            <div class="widget-box transparent">
                                <div class="widget-header widget-header-flat">
                                    <h4 class="widget-title lighter">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Sale Stats
                                    </h4>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main padding-4">
                                        <div id="sales-charts"></div>
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script src="<?php echo URL.'/public' ?>/javascript/index.js"></script>