var page = 1, keyword = '', data = [];
var page_cate = 1, keyword_cate=  '';
$(function(){
    $('#list_library').load(baseUrl + '/lib_code/content');
});

function view_page_library(pages){
    page = pages;
    $('#list_library').load(baseUrl + '/lib_code/content?page='+page+'&q='+keyword);
}

function search(){
    var value = $('#nav-search-input').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
        $('#list_library').load(baseUrl + '/lib_code/content?page=1&q='+keyword);
    }else{
        keyword = '';
        $('#list_library').load(baseUrl + '/lib_code/content?page=1&q='+keyword);
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////
function print_code(){
    
}
///////////////////////////////////////////////////////////////////////////////////////////////////
function select_cate(){
    $('#list_cate').load(baseUrl + '/lib_code/list_cate');
    $('#pager_cate').load(baseUrl + '/lib_code/list_cate_page');
    $('#modal-cate').modal('show');
}

function view_page_cate(pages){
    page_cate = pages;
    $('#list_cate').load(baseUrl + '/lib_code/list_cate?page='+page_cate+'&q='+keyword_cate);
    $('#pager_cate').load(baseUrl + '/lib_code/list_cate_page?page='+page_cate+'&q='+keyword_cate);
}

function search_cate(){
    var value = $('#nav-search-input-cate').val();
    if(value.length != 0){
        keyword_cate = value.replaceAll(" ", "$", 'g');
    }else{
        keyword_cate = '';
    }
    $('#list_cate').load(baseUrl + '/lib_code/list_cate?page=1&q='+keyword_cate);
    $('#pager_cate').load(baseUrl + '/lib_code/list_cate_page?page=1&q='+keyword_cates);
}

function confirm_cate(idh){
    var value= $('#ck_'+idh).is(':checked');
    console.log(value);
}
////////////////////////////////////////////////////////////////////////////////////////////////
function select_manu(){

}
////////////////////////////////////////////////////////////////////////////////////////////////////