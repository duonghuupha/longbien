<script>
$(function(){
    var d1 = [];
    for (var i = 2; i <= 7; i += 1) {
        d1.push([i, Math.floor(Math.random() * 1000)]);
    }

    var d2 = [];
    for (var i = 2; i <= 7; i += 1) {
        d2.push([i, Math.floor(Math.random() * 1000)]);
    }
    

    var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
    $.plot("#sales-charts", [
        { label: "Hôm qua", data: d1 },
        { label: "Hôm nay", data: d2 }
    ], {
        hoverable: true,
        shadowSize: 0,
        series: {
            lines: { show: true },
            points: { show: true }
        },
        xaxis: {
            tickLength: 0
        },
        yaxis: {
            ticks: 10,
            min: 0,
            max: 1000,
            tickDecimals: 0
        },
        grid: {
            backgroundColor: { colors: [ "#fff", "#fff" ] },
            borderWidth: 1,
            borderColor:'#555'
        }
    });
})
</script>
<div class="widget-main padding-4">
    <div id="sales-charts"></div>
</div><!-- /.widget-main -->