var page = 1, keyword = '', url = '';
$(function(){
    $('#list_role').load(baseUrl + '/quanlity_role/content');
});

function add(){
    $('#modal-role').modal('show');
    url = baseUrl + '/quanlity_role/add';
}

function edit(idh){
    $('#modal-role').modal('show');
    url = baseUrl + '/quanlity_role/update?id='+idh;
}

function del(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl + '/quanlity_role/del', '#list_role', baseUrl + '/quanlity_role/content?page='+page+'&q='+keyword);
}

function change(idh, status){
    var data_str = "id="+idh+'&status='+status;
    del_data(data_str, "Bạn có chắc chắn muốn cập nhật trạng thái cho bản ghi này?", baseUrl + '/quanlity_role/change', '#list_role', baseUrl + '/quanlity_role/content?page='+page+'&q='+keyword);
}

function save(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', url, '#modal-role', '#list_role', baseUrl + '/quanlity_role/content?page='+page+'&q='+keyword); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_role(pages){
    page = pages;
    $('#list_role').load( baseUrl + '/quanlity_role/content?page='+page+'&q='+keyword);
}

function search(){

}