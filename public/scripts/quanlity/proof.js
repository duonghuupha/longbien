var page = 1, keyword = '', url =  '', page_criteria = 1, keyword_criteria = '';
$(function(){
    $('#list_proof').load(baseUrl + '/proof/content');
});

function add(){
    $('#criteria_id').val(null); $('#fullname').val(null);
    $('#code_proof').val(null); $('#title').val(null);
    $('#file_old').val(null); $('#file').val(null);
    $('#modal-proof').modal('show');
    url = baseUrl + '/proof/add';
}

function edit(idh){
    $.getJSON(baseUrl + '/proof/data_edit?id='+idh, function(result){
        $('#criteria_id').val(result.criteria_id); $('#fullname').val(result.criteria);
        $('#code_proof').val(result.code_proof); $('#title').val(result.title);
        $('#file_old').val(result.file);
    });
    $('#modal-proof').modal('show');
    url = baseUrl + '/proof/update?id='+idh;
}

function del(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl + '/proof/del',   '#list_proof', baseUrl  + '/proof/content?page='+page+'&q='+keyword);
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
        save_form_modal('#fm', url, '#modal-proof', '#list_proof', baseUrl + '/proof/content?page='+page+'&q='+keyword); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_proof(pages){
    page = pages;
    $('#list_proof').load(baseUrl + '/proof/content?page='+page+'&q='+keyword);
}

function filter(){
    $('#modal-search').modal('show');
}

function search(){  

}

function detail(idh){
    $('#detail').load(baseUrl + '/proof/detail?id='+idh);
    $('#modal-detail').modal('show');
}
/////////////////////////////////////////////////////////////////////////////////////////
function select_criteria(){
    $('#list_criteria').load(baseUrl + '/proof/list_criteria');
    $('#pager_criteria').load(baseUrl + '/proof/list_criteria_page');
    $('#modal-criteria').modal('show');
}

function view_page_criteria(pages){
    page_criteria = pages;
    $('#list_criteria').load(baseUrl + '/proof/list_criteria?page='+page_criteria+'&q='+keyword_criteria);
    $('#pager_criteria').load(baseUrl + '/proof/list_criteria_page?page='+page_criteria+'&q='+keyword_criteria);
}

function search_criteria(){
    var value = $('#nav-search-input-criteria').val();
    if(value.length != 0){
        keyword_criteria = value.replaceAll(" ", "$", 'g');
    }else{
        keyword_criteria = '';
    }
    $('#list_criteria').load(baseUrl + '/proof/list_criteria?page=1&q='+keyword_criteria);
    $('#pager_criteria').load(baseUrl + '/proof/list_criteria_page?page=1&q='+keyword_criteria);
}

function confirm_criteria(idh){
    $('#criteria_id').val(idh); var title = $('#title_'+idh).text();
    $('#fullname').val(title); $('#modal-criteria').modal('hide');
}