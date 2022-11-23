var page = 1, fromdate = '', todate = '', source = '';
$(function(){
    $('#list_import').load(baseUrl + '/report_gear_imp/content');
});

function filter(){
    $('#modal-search').modal('show');
}

function search(){
    fromdate = ($('#from_date').val().length != 0) ? $('#from_date').val() : '';
    todate = ($('#to_date').val().length != 0) ? $('#to_date').val() : '';
    source = ($('#ssource').val().length != 0) ? $('#ssource').val().replaceAll(" ", "$", 'g') : '';
    if(fromdate.length != 0 || todate.length != 0){
        if(fromdate.length != 0 && todate.length != 0){
            let date1 = new Date(convert_date(fromdate)); let date2 = new Date(convert_date(todate));
            if(date1 <= date2){
                $('#list_import').load(baseUrl + '/report_gear_imp/content?page=1&fromdate='+fromdate+'&todate='+todate+'&source='+source);
                $('#modal-search').modal('hide');
            }else{
                show_message("error", "Từ ngày không thể lớn hơn đến ngày");
            }
        }else{
            show_message("error", "Bạn phải chọn Từ ngày và đến ngày");
        }
    }else{
        $('#list_import').load(baseUrl + '/report_gear_imp/content?page=1&fromdate='+fromdate+'&todate='+todate+'&source='+source);
        $('#modal-search').modal('hide');
    }
}

function view_page_import(pages){
    page = pages;
    $('#list_import').load(baseUrl + '/report_gear_imp/content?page='+page+'&fromdate='+fromdate+'&todate='+todate+'&source='+source);
}

function export_xlsx(){
    window.open(baseUrl + '/report_gear_imp/export_xlsx?fromdate='+fromdate+'&todate='+todate+'&source='+source);
}

function export_detail(){
    window.open(baseUrl + '/report_gear_imp/export_detail?fromdate='+fromdate+'&todate='+todate+'&source='+source);
}
//////////////////////////////////////////////////////////////////////////////////////////////////
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