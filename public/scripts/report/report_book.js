var page = 1, title_s = '', cate_s = '', manu_s = '', author_s = '';
$(function(){
    $('#list_library').load(baseUrl + '/report_book/content');
    combo_select_2('#cate_s', baseUrl + '/other/combo_book_cate');
    combo_select_2('#manu_s', baseUrl + '/other/combo_book_manu');
});

function del_cate(){
    $('#cate_s').val('').trigger('change');
}

function del_nb(){
    $('#manu_s').val('').trigger('change');
}

function search(){
    var title = $('#title_s').val(), cate = $('#cate_s').val(), manu = $('#manu_s').val(), author = $('#author_s').val();
    title_s = (title.length != 0) ? title.replaceAll(" ", "$", 'g') : '';
    cate_s = (cate.length != 0) ? cate : ''; manu_s = (manu.length != 0) ? manu : '';
    author = (author.length != 0) ? author.replaceAll(" ", "$", 'g') : ''
    $('#list_library').load(baseUrl + '/report_book/content?page=1&t='+title_s+'&c='+cate_s+'&m='+manu_s+'&a='+author_s);
}

function view_page_library(pages){
    page = pages;
    $('#list_library').load(baseUrl + '/report_book/content?page='+page+'&t='+title_s+'&c='+cate_s+'&m='+manu_s+'&a='+author_s);
}

function export_xlsx(){
    var title = $('#title_s').val(), cate = $('#cate_s').val(), manu = $('#manu_s').val(), author = $('#author_s').val();
    title_s = (title.length != 0) ? title.replaceAll(" ", "$", 'g') : '';
    cate_s = (cate.length != 0) ? cate : ''; manu_s = (manu.length != 0) ? manu : '';
    author = (author.length != 0) ? author.replaceAll(" ", "$", 'g') : ''
    window.open(baseUrl + '/report_book/export_xlsx?t='+title_s+'&c='+cate_s+'&m='+manu_s+'&a='+author_s);
}