var page = 1, keyword = '',  url = '';
$(function(){
    $('#list_loan').load(baseUrl + '/loans/content');
});

function add(){
    $('.overlay').show();
    $.ajax({
        type: "POST",
        url: baseUrl + '/loans/create_tmp',
        data: "", // serializes the form's elements.
        success: function(data){
            var result = JSON.parse(data);
            if(result.success == true){
                window.location.href = baseUrl + '/loans/formadd';
            }else{
                $('.overlay').hide();
                show_message('error', result.msg);
                return false;
            }
        }
    });
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