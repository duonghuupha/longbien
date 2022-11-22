var page = 1, codes = '', titles = '', cates = '';
$(function(){
    $('#list_gear').load(baseUrl + '/report_gear/content');
    combo_select_2('#cate_s', baseUrl + '/other/combo_utensils');
});

function search(){
    codes  = ($('#codes').val().length != 0) ? $('#codes').val() : '';
    titles = ($('#titles').val().length  != 0) ? $('#titles').val().replaceAll(" ", "$", 'g') : '';
    cates = ($('#cate_s').val().length != 0) ? $('#cate_s').val() : '';
    $('#list_gear').load(baseUrl + '/report_gear/content?page=1&code='+codes+'&title='+titles+'&cate='+cates);
}

function view_page_gear(pages){
    page = pages;
    $('#list_gear').load(baseUrl + '/report_gear/content?page='+page+'&code='+codes+'&title='+titles+'&cate='+cates);
}

function export_xlsx(){
    codes  = ($('#codes').val().length != 0) ? $('#codes').val() : '';
    titles = ($('#titles').val().length  != 0) ? $('#titles').val().replaceAll(" ", "$", 'g') : '';
    cates = ($('#cate_s').val().length != 0) ? $('#cate_s').val() : '';
    window.open(baseUrl + '/report_gear/export_xlsx?code='+codes+'&title='+titles+'&cate='+cates);
}