var page = 1, keyword = '',  url = '';
$(function(){
    $('#list_loan').load(baseUrl + '/loans/content');
});

function add(){
    window.location.href = baseUrl + '/loans/formadd';
}

function edit(idh){
    window.location.href = baseUrl + '/loans/formedit?d='+idh;
}

function del(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl + '/loans/del', '#list_loan', baseUrl + '/loans/content?page='+page+'&q='+keyword);
}

function view_page_loans(pages){
    page = pages;
    $('#list_loan').load(baseUrl = '/loans/content?page='+page+'&q='+keyword);
}

function search(){

}