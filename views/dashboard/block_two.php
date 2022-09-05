<?php
$id = $_REQUEST['id']; $jsonObj = $this->jsonObj;
$html = '[';
foreach($jsonObj as $row){
    $array[] = '{y: '.$row['Total'].', indexLabel: "'.$row['title'].'"}';
}
$html .= implode(",", $array);
$html .= ']';
if($id == 1){
    $title = "Giới tính";
}elseif($id == 2){
    $title = "Độ tuổi";
}else{
    $title = "Bán trú";
}
?>
<script>
$(function(){
	var placeholder = $('#chartContainer').css({'width':'100%' , 'min-height':'200px'});
    var data = [
    { label: "social networks",  data: 38.7, color: "#68BC31"},
    { label: "search engines",  data: 24.5, color: "#2091CF"},
    { label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
    { label: "direct traffic",  data: 18.6, color: "#DA5430"},
    { label: "other",  data: 10, color: "#FEE074"}
    ]
    function drawPieChart(placeholder, data, position) {
        $.plot(placeholder, data, {
        series: {
            pie: {show: true, tilt:0.8,
                highlight: {opacity: 0.25},
                stroke: {color: '#fff',width: 2},
                startAngle: 2
            }
        },
        grid: {hoverable: true,clickable: true}
        });
    }
    drawPieChart(placeholder, data);
    placeholder.data('chart', data);
    placeholder.data('draw', drawPieChart);
    var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
    var previousPoint = null;
    placeholder.on('plothover', function (event, pos, item) {
        if(item) {
            if (previousPoint != item.seriesIndex) {
                previousPoint = item.seriesIndex;
                var tip = item.series['label'] + " : " + item.series['percent']+'%';
                $tooltip.show().children(0).text(tip);
            }
            $tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
        } else {
            $tooltip.hide();
            previousPoint = null;
        }
    });
});
</script>
<div class="widget-header widget-header-flat widget-header-small">
    <h5 class="widget-title">
        <i class="ace-icon fa fa-signal"></i>
        Học sinh
    </h5>
    <div class="widget-toolbar no-border">
        <div class="inline dropdown-hover">
            <button class="btn btn-minier btn-primary">
                <?php echo $title ?>
                <i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
                <li class="active">
                    <a href="javascript:void(0)" <?php echo ($id == 1) ? 'class="blue"' : '' ?>
                    onclick="reload_block_two(1)">
                        <i class="ace-icon fa fa-caret-right bigger-110 <?php echo ($id == 1) ? '' : 'invisible' ?>">&nbsp;</i>
                        Giới tính
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" <?php echo ($id == 2) ? 'class="blue"' : '' ?>
                    onclick="reload_block_two(2)">
                        <i class="ace-icon fa fa-caret-right bigger-110 <?php echo ($id == 2) ? '' : 'invisible' ?>">&nbsp;</i>
                        Độ tuổi
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" <?php echo ($id == 3) ? 'class="blue"' : '' ?>
                    onclick="reload_block_two(3)">
                        <i class="ace-icon fa fa-caret-right bigger-110 <?php echo ($id == 3) ? '' : 'invisible' ?>">&nbsp;</i>
                        Bán trú
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="widget-body">
    <div class="widget-main">
        <div id="chartContainer"></div>
    </div><!-- /.widget-main -->
</div><!-- /.widget-body -->