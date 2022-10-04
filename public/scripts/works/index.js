var page = 1, keyword = '', url = '', data = [], page_works = 1, keyword_work = '';
$(function(){
    $('#list_works').load(baseUrl + '/works/content');
});

function add(){
    $('#datadc').val(null); $('#title').val(null); data = []; $('#content').val(null);
    $('#fullname').val(null); $('#file').attr("required", true);
    $('#modal-works').modal('show');
    url = baseUrl + '/works/add';
}

function edit(idh){
    var worksid = $('#worksid_'+idh).text(); $('#datadc').val(worksid); data = worksid.split(",");
    $('#fullname').val("Đã chọn "+data.length+" danh mục"); $('#file').attr("required", false);
    $.getJSON(baseUrl + '/works/data_edit?id='+idh, function(result){
        $('#title').val(result.title); $('#content').val(result.content);
        $('#fileold').val(result.file);
    });
    $('#modal-works').modal('show');
    url = baseUrl + '/works/update?id='+idh;
}

function del(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl + '/works/del','#list_works', baseUrl + '/works/content?page='+page);
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
        save_form_modal('#fm', url, '#modal-works', '#list_works', baseUrl+'/works/content?page='+page+'&q='+keyword); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_works(pages){
    page = pages;

}

function search(){

}
////////////////////////////////////////////////////////////////////////////////////////
function select_works(){
    $('#list_works_cate').load(baseUrl + '/works/list_works?selected='+btoa(data.join(",")));
    $('#pager_works_cate').load(baseUrl + '/works/list_works_page');
    $('#modal-works-cate').modal('show');
}

function view_page_works_cate(pages){
    page_works = pages;
    $('#list_works_cate').load(baseUrl + '/works/list_works?selected='+btoa(data.join(","))+'&page='+page_works+'&q='+keyword_work);
    $('#pager_works_cate').load(baseUrl + '/works/list_works_page?page='+page_works+'&q='+keyword_work);
}

function search_works(){
    var value = $('#nav-search-input-works').val();
    if(value.length != 0){
        keyword_work = value.replaceAll(" ", "$", 'g');
    }else{
        keyword_work = '';
    }
    $('#list_works_cate').load(baseUrl + '/works/list_works?selected='+btoa(data.join(","))+'&page=1&q='+keyword_work);
    $('#pager_works_cate').load(baseUrl + '/works/list_works_page?page=1&q='+keyword_work);
}

function sl_works(idh){
    var value = $('#ck_'+idh).is(':checked');
    if(value){
        data.push(idh);
    }else{
        data = data.filter(item => item !== idh);
    }
}

function confirm_works(){
    $('#datadc').val(data.join(",")); $('#fullname').val("Đã chọn "+data.length+" danh mục");
    $('#modal-works-cate').modal('hide');
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
function detail(idh){
    $('#detail').load(baseUrl + '/works/detail?id='+idh);
    $('#modal-detail').modal('show');
}