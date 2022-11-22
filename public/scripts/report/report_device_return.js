var page = 1, fromdate = '', todate = '', dep = '', title = '', status = 0;
$(function(){
    $('#list_return').load(baseUrl + '/report_device_return/content');
});

function filter(){
    combo_select_2('#sdep', baseUrl + '/report_device_return/combo_department');
    $('#modal-search').modal('show');
}

function search(){
    fromdate = ($('#from_date').val().length != 0) ? $('#from_date').val() : '';
    todate = ($('#to_date').val().length != 0) ? $('#to_date').val() : '';
    dep = ($('#sdep').val().length != 0) ? $('#sdep').val() : '';
    title = ($('#stitle').val().length != 0) ? $('#stitle').val().replaceAll(" ", "$", 'g') : '';
    status = $('#sstatus').val();
    if(fromdate.length != 0 || todate.length != 0){
        if(fromdate.length != 0 && todate.length != 0){ 
            let date3 = new Date(convert_date(fromdate)); let date4 = new Date(convert_date(todate));
            if(date3 <= date4){
                $('#list_return').load(baseUrl + '/report_device_return/content?page=1&fromdate='+fromdate+'&todate='+todate+'&dep='+dep+'&title='+title+'&status='+status);
                $('#modal-search').modal('hide');
            }else{
                show_message("error", "Từ ngày không thể lớn hơn đến ngày");
            }
        }else{
            show_message("error", "Bạn phải chọn Từ ngày và Đến  ngày");
        }
    }else{
        $('#list_return').load(baseUrl + '/report_device_return/content?page=1&fromdate='+fromdate+'&todate='+todate+'&dep='+dep+'&title='+title+'&status='+status);
        $('#modal-search').modal('hide');
    }
}

function view_page_return(pages){
    page = pages;
    $('#list_return').load(baseUrl + '/report_device_return/content?page='+page+'&fromdate='+fromdate+'&todate='+todate+'&dep='+dep+'&title='+title+'&status='+status);
}

function export_xlsx(){
    window.open(baseUrl + '/report_device_return/export_xlsx?fromdate='+fromdate+'&todate='+todate+'&dep='+dep+'&title='+title+'&status='+status);
}

function convert_date(date){
    var item = date.split("-");
    return item[2]+'-'+item[1]+'-'+item[0];;
}
