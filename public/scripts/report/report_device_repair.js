var page = 1, fromdate = '', todate = '', agencys = '', devices = '';
$(function(){
    $('#list_repair').load(baseUrl + '/report_device_repair/content');
});

function search(){
    fromdate = ($('#from_date').val().length != 0) ? $('#from_date').val() : '';
    todate = ($('#to_date').val().length != 0) ? $('#to_date').val() : '';
    agencys = ($('#agencys').val().length != 0) ? $('#agencys').val().replaceAll(" ", "$", 'g') : '';
    devices = ($('#devices').val().length != 0) ? $('#devices').val().replaceAll(" ", "$", 'g') : '';
    if(fromdate.length != 0 || todate.length != 0){
        if(fromdate.length != 0 && todate.length != 0){ 
            let date3 = new Date(convert_date(fromdatereturn)); let date4 = new Date(convert_date(todatereturn));
            if(date3 <= date4){
                $('#list_repair').load(baseUrl + '/report_device_repair/content?page=1&fromdate='+fromdate+'&todate='+todate+'&agency='+agencys+'&device='+devices);
            }else{
                show_message("error", "Từ ngày không thể lớn hơn đến ngày");
            }
        }else{
            show_message("error", "Bạn phải chọn Từ ngày và Đến  ngày");
        }
    }else{
        $('#list_repair').load(baseUrl + '/report_device_repair/content?page=1&fromdate='+fromdate+'&todate='+todate+'&agency='+agencys+'&device='+devices);
    }
}

function view_page_repair(pages){
    page = pages;
    $('#list_repair').load(baseUrl + '/report_device_repair/content?page='+page+'&fromdate='+fromdate+'&todate='+todate+'&agency='+agencys+'&device='+devices);
}

function export_xlsx(){
    fromdate = ($('#from_date').val().length != 0) ? $('#from_date').val() : '';
    todate = ($('#to_date').val().length != 0) ? $('#to_date').val() : '';
    agencys = ($('#agencys').val().length != 0) ? $('#agencys').val().replaceAll(" ", "$", 'g') : '';
    devices = ($('#devices').val().length != 0) ? $('#devices').val().replaceAll(" ", "$", 'g') : '';
    if(fromdate.length != 0 || todate.length != 0){
        if(fromdate.length != 0 && todate.length != 0){ 
            let date3 = new Date(convert_date(fromdatereturn)); let date4 = new Date(convert_date(todatereturn));
            if(date3 <= date4){
                window.open(baseUrl + '/report_device_repair/export_xlsx?fromdate='+fromdate+'&todate='+todate+'&agency='+agencys+'&device='+devices);
            }else{
                show_message("error", "Từ ngày không thể lớn hơn đến ngày");
            }
        }else{
            show_message("error", "Bạn phải chọn Từ ngày và Đến  ngày");
        }
    }else{
        window.open(baseUrl + '/report_device_repair/export_xlsx?fromdate='+fromdate+'&todate='+todate+'&agency='+agencys+'&device='+devices);
    }
}

function export_detail(){
    fromdate = ($('#from_date').val().length != 0) ? $('#from_date').val() : '';
    todate = ($('#to_date').val().length != 0) ? $('#to_date').val() : '';
    agencys = ($('#agencys').val().length != 0) ? $('#agencys').val().replaceAll(" ", "$", 'g') : '';
    devices = ($('#devices').val().length != 0) ? $('#devices').val().replaceAll(" ", "$", 'g') : '';
    if(fromdate.length != 0 || todate.length != 0){
        if(fromdate.length != 0 && todate.length != 0){ 
            let date3 = new Date(convert_date(fromdatereturn)); let date4 = new Date(convert_date(todatereturn));
            if(date3 <= date4){
                window.open(baseUrl + '/report_device_repair/export_detail?fromdate='+fromdate+'&todate='+todate+'&agency='+agencys+'&device='+devices);
            }else{
                show_message("error", "Từ ngày không thể lớn hơn đến ngày");
            }
        }else{
            show_message("error", "Bạn phải chọn Từ ngày và Đến  ngày");
        }
    }else{
        window.open(baseUrl + '/report_device_repair/export_detail?fromdate='+fromdate+'&todate='+todate+'&agency='+agencys+'&device='+devices);
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////
function convert_date(date){
    var item = date.split("-");
    return item[2]+'-'+item[1]+'-'+item[0];;
}

function open_detail(idh){
    //$('#row'+idh).show(500);
    var display = $('#row'+idh).css('display');
    if(display == 'none'){
        $('#button'+idh).removeClass('fa-plus'); $('#button'+idh).addClass('fa-minus');
        $('#row'+idh).show(500);
    }else{
        $('#button'+idh).addClass('fa-plus'); $('#button'+idh).removeClass('fa-minus');
        $('#row'+idh).hide(100);
    }
}