var page = 1, fromdate = '', todate = '',  fullname = '', lesson  = 0, dep = '';
$(function(){
    $('#list_dep').load(baseUrl + '/report_dep_loan/content');
});

function filter(){
    combo_select_2('#sdep', baseUrl + '/report_dep_loan/combo_dep_function');
    $('#modal-search').modal('show');
}

function search(){
    fromdate = ($('#from_date').val().length != 0) ? $('#from_date').val() : '';
    todate = ($('#to_date').val().length != 0) ? $('#to_date').val() : '';
    fullname = ($('#sfullname').val().length != 0) ? $('#sfullname').val().replaceAll(" ", "$", 'g') : '';
    lesson = $('#sles').val(); dep = ($('#sdep').val().length != 0) ? $('#sdep').val() : '';
    if(fromdate.length != 0 || todate.length != 0){
        if(fromdate.length != 0 && todate.length != 0){
            let date1 = new Date(convert_date(fromdate)); let date2 = new Date(convert_date(todate));
            if(date1 <= date2){
                $('#list_dep').load(baseUrl + '/report_dep_loan/content?page=1&fromdate='+fromdate+'&todate='+todate+'&fullname='+fullname+'&lesson='+lesson+'&dep='+dep);
                $('#modal-search').modal('hide');
            }else{
                show_message("error", "Từ ngày không thể lớn hơn đến ngày");
            }
        }else{
            show_message("error", "Bạn phải chọn Từ ngày và đến ngày");
        }
    }else{
        $('#list_dep').load(baseUrl + '/report_dep_loan/content?page=1&fromdate='+fromdate+'&todate='+todate+'&fullname='+fullname+'&lesson='+lesson+'&dep='+dep);
        $('#modal-search').modal('hide');
    }
}

function view_page_loan(pages){
    page = pages;
    $('#list_dep').load(baseUrl + '/report_dep_loan/content?page='+pages+'&fromdate='+fromdate+'&todate='+todate+'&fullname='+fullname+'&lesson='+lesson+'&dep='+dep);
}

function export_xlsx(){
    window.open(baseUrl + '/report_dep_loan/export_xlsx?fromdate='+fromdate+'&todate='+todate+'&fullname='+fullname+'&lesson='+lesson+'&dep='+dep);
}

function convert_date(date){
    var item = date.split("-");
    return item[2]+'-'+item[1]+'-'+item[0];;
}