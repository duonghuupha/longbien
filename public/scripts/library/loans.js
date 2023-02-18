var page = 1, keyword = '';
$(function(){
    $('#list_loans').load(baseUrl + '/lib_loans/content');
    $('#per_stu_code').autocomplete({
        source: function (request, response) {
            $.ajax({
                url: baseUrl + "/lib_loans/list_per_stu",
                dataType: "jsonp",
                data: {
                    q: request.term
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        minLength: 2,
        select: function (event, ui) {
            console.log(ui.item);
        }
    });
});

function edit(idh){
    var str_data = "id="+idh;
    update_data(str_data, "Bạn có muốn trả sách", baseUrl + '/lib_loans/update', baseUrl + '/lib_loans');
}

function view_page_loans(pages){
    page = pages;
    $("#list_loans").load(baseUrl + '/lib_loans/content?page='+page+'&q='+keyword);
}

function search(){
    var value = $('#nav-search-input').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
        $("#list_loans").load(baseUrl + '/lib_loans/content?page=1&q='+keyword);
    }else{
        keyword = '';
        $("#list_loans").load(baseUrl + '/lib_loans/content?page=1&q='+keyword);
    }
}

function clear_form_loan(){
    $('#per_stu_code').val(null); $('#book_code').val(null)
}

function save(){
    /*var fullname = $('#fullname').val(), titlebook = $('#title_book').val();
    if(fullname.length > 0 && titlebook.length > 0){
        save_form_modal('#fm_lib', baseUrl+'/lib_loans/add_modal',  '#modal-library', '#list_loans', baseUrl+'/lib_loans/content');
    }else{
        show_message("error", "Bạn chưa điền đủ thông tin");
    }*/

}

function search_per_stu(){
    
}