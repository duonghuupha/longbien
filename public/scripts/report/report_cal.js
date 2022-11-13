var page = 1, steacher = '', sfromdate = '', stodate = '', ssubject = '', sdep = '';
var sles = 0,  sexp = '', stitle = '';
$(function(){
    $('#list_cal').load(baseUrl + '/report_cal/content');
});

function view_page_cal(pages){
    page = pages;
    $('#list_cal').load(baseUrl + '/report_cal/content?page='+page+'&teacher='+steacher+'&fromdate='+sfromdate+'&todate='+stodate
                        +'&subject='+ssubject+'&dep='+sdep+'&lesson='+sles+'&exp='+sexp+'&title='+stitle);
}

function search(){
    steacher = ($('#steacher').val().length != 0) ? $('#steacher').val().replaceAll(" ", "$", 'g') : '';
    sfromdate = ($('#sfrom_date').val().length != 0) ? $('#sfrom_date').val() : '';
    stodate = ($('#sto_date').val().length != 0) ? $('#sto_date').val() : '';
    ssubject = ($('#subjects').val().length != 0) ? $('#subjects').val() : '';
    sdep = ($('#deps').val().length != 0) ? $('#deps').val() : '';
    sles = ($('#less').val() != 0) ? $('#less').val() : 0;
    sexp = ($('#exps').val().length != 0) ? $('#exps').val() : '';
    stitle = ($('#titles').val().length != 0) ? $('#titles').val().replaceAll(" ", "$", 'g') : '';
    if($('#sfrom_date').val().length != 0 || $('#sto_date').val().length != 0){
        if($('#sfrom_date').val().length != 0 && $('#sto_date').val().length != 0){
            $('#list_cal').load(baseUrl + '/report_cal/content?page=1&teacher='+steacher+'&fromdate='+sfromdate+'&todate='+stodate
                        +'&subject='+ssubject+'&dep='+sdep+'&lesson='+sles+'&exp='+sexp+'&title='+stitle);
        }else{
            show_message("error", "Khi lựa chọn điều kiện là Từ ngày hoặc Đến ngày thì phải chọn cả hai dữ liệu");
        }
    }else{
        //show_message("error", "Khi lựa chọn điều kiện là Từ ngày hoặc Đến ngày thì phải chọn cả hai dữ liệu");
        $('#list_cal').load(baseUrl + '/report_cal/content?page=1&teacher='+steacher+'&fromdate='+sfromdate+'&todate='+stodate
                            +'&subject='+ssubject+'&dep='+sdep+'&lesson='+sles+'&exp='+sexp+'&title='+stitle);
    }
    $('#modal-search').modal('hide');
}   

function export_xlsx(){
    window.open(baseUrl + '/report_cal/export_xlsx?teacher='+steacher+'&fromdate='+sfromdate+'&todate='+stodate
    +'&subject='+ssubject+'&dep='+sdep+'&lesson='+sles+'&exp='+sexp+'&title='+stitle);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
function filter(){
    combo_select_2('#subjects', baseUrl + '/other/combo_subject');
    combo_select_2('#deps', baseUrl + '/other/combo_department?yearid='+yearid);
    $('#modal-search').modal('show');
}