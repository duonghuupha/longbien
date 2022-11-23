var page = 1, fromdateloan = '', todateloan = '', fromdatereturn = '', todatereturn = '', fullname = '', title = '';
$(function(){
    $('#list_loan').load(baseUrl + '/report_gear_loan/content');
});

function filter(){
    $('#modal-search').modal('show');
}

function search(){
    fromdateloan = ($('#from_date_loan').val().length != 0) ? $('#from_date_loan').val() : '';
    todateloan = ($('#to_date_loan').val().length != 0) ? $('#to_date_loan').val() : '';
    fromdatereturn = ($('#from_date_return').val().length != 0) ? $('#from_date_return').val() : '';
    todatereturn = ($('#to_date_return').val().length != 0) ? $('#to_date_return').val() : '';
    fullname = ($('#sfullname').val().length != 0) ? $('#sfullname').val().replaceAll(" ", "$", 'g') : '';
    title = ($('#stitle').val().length != 0) ? $('#stitle').val().replaceAll(" ", "$", 'g') : '';
    var status = '', status1 = '';
    if(fromdateloan.length != 0 || todateloan.length != 0){
        if(fromdateloan.length != 0 && todateloan.length != 0){
            let date1 = new Date(convert_date(fromdateloan)); let date2 = new Date(convert_date(todateloan));
            if(date1 <= date2){
                status = '';
            }else{
                status = 'Ngày mượn (Từ ngày) không thể lớn hơn Ngày mượn (Đến ngày)';
            }
        }else{
            status = 'Bạn phải chọn Ngày mượn (Từ ngày) và Ngày mượn (Đến ngày)';
        }
    }else{
        status = '';
    }
    /////////////////////////////////////////////////////////////////
    if(fromdatereturn.length != 0 || todatereturn.length != 0){
        if(fromdatereturn.length != 0 && todatereturn.length != 0){
            let date3 = new Date(convert_date(fromdatereturn)); let date4 = new Date(convert_date(todatereturn));
            if(date3 <= date4){
                status1 = '';
            }else{
                status1 = 'Ngày trả (Từ ngày) không thể lớn hơn Ngày trả (Đến ngày)';
            }
        }else{
            status1 = 'Bạn phải chọn Ngày trả (Từ ngày) và Ngày trả (Đến ngày)';
        }
    }else{
        status1 = '';
    }
    if(status.length == 0 && status1.length == 0){
        $('#list_loan').load(baseUrl + '/report_gear_loan/content?page=1&fromloan='+fromdateloan+'&toloan='+todateloan
        +'&fromreturn='+fromdatereturn+'$toreturn='+todatereturn+'&fullname='+fullname+'&title='+title);
        $('#modal-search').modal('hide');
    }else{
        if(status.length != 0){
            show_message("error", status);
        } 
        if(status1.length != 0){
            show_message("error", status1);
        }
    }
}

function view_page_loan(pages){
    page = pages;
    $('#list_loan').load(baseUrl + '/report_gear_loan/content?page='+page+'&fromloan='+fromdateloan+'&toloan='+todateloan
    +'&fromreturn='+fromdatereturn+'$toreturn='+todatereturn+'&fullname='+fullname+'&title='+title);
}

function export_xlsx(){
    window.open(baseUrl + '/report_gear_loan/export_xlsx?fromloan='+fromdateloan+'&toloan='+todateloan
    +'&fromreturn='+fromdatereturn+'$toreturn='+todatereturn+'&fullname='+fullname+'&title='+title)
}

function export_detail(){
    window.open(baseUrl + '/report_gear_loan/export_detail?fromloan='+fromdateloan+'&toloan='+todateloan
    +'&fromreturn='+fromdatereturn+'$toreturn='+todatereturn+'&fullname='+fullname+'&title='+title)
}
/////////////////////////////////////////////////////////////////////////////////////////
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