var page = 1, keyword = '', url = '';
$(function(){
    $('#list_personal').load(baseUrl + '/personal/content');
});

function add(){
    $('#modal-personal').modal('show');
    url = baseUrl + '/personal/add';
}

function edit(idh){
    $('#modal-personal').modal('show');
    url = baseUrl + '/personal/update';
}

function del(idh){
    var data_str = "id="+idh;
    del_data(data_str, baseUrl+'/personal/del', '#list_personal', baseUrl + '/personal/content?page='+page+'&q='+keyword);
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
        save_form_modal('#fm', url, '#modal-personal', '#list_personal',  baseUrl+'/personal/content?page='+page+'&q='+keyword); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function detail(idh){
    $('#modal-detail').modal('show');
}

function view_page_personal(pages){
    page = pages;
    $('#list_personal').load(baseUrl + '/personal/content?page='+pages+'&q='+keyword);
}

function search(){
    var value = $('#table_search').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
        $('#list_personal').load(baseUrl + '/personal/content?page=1&q='+keyword);
    }else{
        keyword = '';
        $('#list_personal').load(baseUrl + '/personal/content?page=1&q='+keyword);
    }
}