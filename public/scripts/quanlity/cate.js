var page_quanlity = 1, page_standard = 1, page_criteria = 1, page_role = 1, url = '';
$(function(){
    $('#list_quanlity').load(baseUrl + '/quanlity_cate/content_quanlity');
    //$('#list_standard').load(baseUrl + '/quanlity_cate/content_standard');
});
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function add_quanlity(){
    $('#form').load(baseUrl + '/quanlity_cate/form_quanlity');
    $('#modal-form').modal('show');
    url = baseUrl + '/quanlity_cate/add_quanlity';
}

function edit_quanlity(idh){
    $('#form').load(baseUrl + '/quanlity_cate/form_quanlity?id='+idh);
    $('#modal-form').modal('show');
    url = baseUrl + '/quanlity_cate/update_quanlity?id='+idh;
}

function del_quanlity(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl + '/quanlity_cate/del_quanlity', '#list_quanlity', baseUrl + '/quanlity_cate/content_quanlity?page='+page_quanlity);
}

function save_quanlity(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', url, '#modal-form', '#list_quanlity',  baseUrl+'/quanlity_cate/content_quanlity?page='+page_quanlity); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_quanlity(pages){
    page_quanlity = pages;
    $('#list_quanlity').load(baseUrl + '/quanlity_cate/content_quanlity?page='+page_quanlity);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function add_standard(){
    $('#form').load(baseUrl + '/quanlity_cate/form_standard');
    $('#modal-form').modal('show');
    url = baseUrl + '/quanlity_cate/add_standard';
}

function edit_standard(idh){
    $('#form').load(baseUrl + '/quanlity_cate/form_standard?id='+idh);
    $('#modal-form').modal('show');
    url = baseUrl + '/quanlity_cate/update_standard?id='+idh;
}

function del_standard(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl + '/quanlity_cate/del_standard', '#list_standard', baseUrl + '/quanlity_cate/content_standard?page='+page_quanlity);
}

function save_standard(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', url, '#modal-form', '#list_standard',  baseUrl+'/quanlity_cate/content_standard?page='+page_standard); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_standard(pages){
    page_standard = pages;
    $('#list_standard').load(baseUrl + '/stquanlity_cateandard/content?page='+page_standard);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////