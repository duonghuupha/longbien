var page = 1, keyword = '', data = [];
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
    combo_select_2('#cate_id', baseUrl + '/other/combo_book_cate', 0, '');
    data = []; render_table_cate(data); $('#modal-cate').modal('show');
}

function selected_cate(idh){
    
}

function render_table_cate(data_json){
    $('#tbody').empty(); var html = '', j = 1;
    for(i = 0; i < data_json.length; i++){
        html += '<tr id="linecate_'+data_json[i].id+'">';
            html += '<td>'+j+'</td>';
            html += '<td>'+data_json[i].title+'</td>'
        html += '</tr>';
        j++;
    }
    $('#tbody').append(html);
}
////////////////////////////////////////////////////////////////////////////////////////////////
function select_manu(){

}
////////////////////////////////////////////////////////////////////////////////////////////////////