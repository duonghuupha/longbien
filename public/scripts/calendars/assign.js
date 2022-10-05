var page = 1, keyword = '', url = '', page_user = 1, keyword_user = '';
$(function(){
    $('#list_assign').load(baseUrl + '/assign/content');
    $('#subject').load(baseUrl + '/other/combo_subject_point_no_null');
    $('#department').load(baseUrl + '/other/combo_department_no_null?yearid='+yearid);
});

function add(){
    $('#user_id').val(null); $('#fullname').val(null); $('#subject').val(null).trigger('change');
    $('#department').val(null).trigger('change'); $('#modal-assign').modal('show');
    url = baseUrl + '/assign/add';
}

function edit(idh){
    var userid = $('#userid_'+idh).text(), fullname = $('#name_'+idh).text();
    var subject = $('#subject_'+idh).text(), department = $('#department_'+idh).text();
    $('#user_id').val(userid); $('#fullname').val(fullname);
    subject =  subject.split(","); $('#subject').val(subject).trigger('change');
    department = department.split(","); $('#department').val(department).trigger('change');
    $('#modal-assign').modal('show');
    url = baseUrl + '/assign/update?id='+idh;
}

function del(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl + '/assign/del', '#list_assign', baseUrl + '/assign/content?page='+page+'&q='+keyword);
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
        save_form_modal('#fm', url, '#modal-assign', '#list_assign',  baseUrl + '/assign/content?page='+page+'&q='+keyword); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_assign(pages){
    page = pages;
    $('#list_assign').load(baseUrl + '/assign/content?page='+page+'&q='+keyword);
}

function search(){
    var value = $('#nav-search-input').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
    }else{
        keyword = '';
    }
    $('#list_assign').load(baseUrl + '/assign/content?page=1&q='+keyword);
}

function detail(idh){
    $('#detail').load(baseUrl + '/assign/detail?id='+idh);
    $('#modal-detail').modal("show");
}
/////////////////////////////////////////////////////////////////////////////////
function select_user(){
    $('#modal-users').modal('show');
    $('#list_users').load(baseUrl + '/assign/list_user');
    $('#pager').load(baseUrl + '/assign/list_user_page');
}

function view_page_user(pages){
    page_user = pages;
    $('#list_users').load(baseUrl + '/assign/list_user?page='+page_user+'&q='+keyword_user);
    $('#pager').load(baseUrl + '/assign/list_user_page?page='+page_user+'&q='+keyword_user);
}

function search_user(){
    var value = $('#nav-search-input-user').val();
	if(value.length != 0){
        keyword_user = value.replaceAll(" ", "$", 'g');
    }else{
        keyword_user = '';
    }
    $('#list_users').load(baseUrl + '/assign/list_user?page=1&q='+keyword_user);
    $('#pager').load(baseUrl + '/assign/list_user_page?page=1&q='+keyword_user);
}

function confirm_user(idh){
    $('#user_id').val(idh); var fullname = $('#fullname_'+idh).text();
    $('#fullname').val(fullname);
    $('#modal-users').modal('hide');
}