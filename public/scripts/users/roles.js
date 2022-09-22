var page = 1, keyword = '', url = baseUrl + '/roles/add';
$(function(){
    $('#list_roles').load(baseUrl + '/roles/content');
    $('#link').load(baseUrl + '/roles/combo_link');
});

function edit(idh){
    var title = $('#title_'+idh).text(), link = $('#link_'+idh).text(), functions = $('#function_'+idh).text();
    $('#title').val(title); $('#link').val(link).trigger('change');
    if(functions.length > 0){
        $('#functions').val(functions.split(",")).trigger('change');
    }
    url = baseUrl + '/roles/update?id='+idh;
}

function del(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl + '/roles/del', '#list_roles', baseUrl + '/roles/content?page='+page+'&q='+keyword);
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
        save_reject('#fm', url, baseUrl+'/roles');
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_role(pages){
    page = pages;
    $('#list_roles').load(baseUrl + '/roles/content?page='+page+'&q='+keyword);
}

function search(){
    
}