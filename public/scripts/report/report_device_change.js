var page = 1, from = '', to = '', title = '';
$(function(){
    $('#list_change').load(baseUrl + '/report_device_change/content');
});

function filter(){
    combo_select_2('#from',  baseUrl + '/other/combo_physical');
    combo_select_2('#to',  baseUrl + '/other/combo_physical');
    $('#modal-search').modal('show');
}

function view_page_change(pages){
    $('#list_change').load(baseUrl + '/report_device_change/content?page='+page+'&from='+from+'&to='+to+'&title='+title);
}

function search(){
    from = ($('#from').val().length != 0) ? $('#from').val()  : '';
    to = ($('#to').val().length != 0) ? $('#to').val() : '';
    tite = ($('#stitle').length != 0) ? $('#stitle').val().replaceAll(" ", "$", 'g') : '';
    $('#list_change').load(baseUrl + '/report_device_change/content?page=1&from='+from+'&to='+to+'&title='+title);
    $('#modal-search').modal('hide');
}

function export_xlsx(){
    window.open(baseUrl + '/report_device_change/export_xlsx?from='+from+'&to='+to+'&title='+title)
}