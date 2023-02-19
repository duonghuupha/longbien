var page = 1, url = '', page_book = 1, key_book = '';
$(function(){
    $('#list_loans').load(baseUrl + '/lib_loans/content');
});

function add(){
    $('#modal-loan').modal('show');
    url = baseUrl + '/lin_loans/add';
}

function save(){

}

function view_page_loans(pages){
    page = pages;
}
///////////////////////////////////////////////////////////////////////////////////////////////////
function select_book(){
    $('#list_book').load(baseUrl + '/lib_loans/list_book');
    $('#pager-book').load(baseUrl + '/lib_loans/list_book_page');
    $('#modal-book').modal('show');
}

function search_book(){
    var value = $('#nav-search-input-book').val();
    if(value.length != 0){
        key_book = value.replaceAll(" ", "$", 'g');
    }else{
        key_book = '';
    }
    $('#list_book').load(baseUrl + '/lib_loans/list_book?page=1&q='+key_book);
    $('#pager-book').load(baseUrl + '/lib_loans/list_book_page?page=1&q='+key_book);
}

function view_page_book(pages){
    page_book = pages;
    $('#list_book').load(baseUrl + '/lib_loans/list_book?page='+page_book+'&q='+key_book);
    $('#pager-book').load(baseUrl + '/lib_loans/list_book_page?page='+page_book+'&q='+key_book);
}

function confirm_book(idh){
    
}