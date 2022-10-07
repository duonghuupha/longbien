var page = 1, keyword = '', url = '';
$(function(){
    $('#list_personal').load(baseUrl + '/personal/content');
    $('#level_id').load(baseUrl + '/other/combo_level'); 
    $('#subject_id').load(baseUrl + '/other/combo_subject_point_no_null');
    $('#job_id').load(baseUrl + '/other/combo_job');
});

function add(){
    var number = Math.floor(Math.random() * 9999999999);
    $('#code').val(number); $('#avatar').prop('required', true);
    $('#modal-personal').modal('show');
    url = baseUrl + '/personal/add';
}

function edit(idh){
    $.getJSON(baseUrl+'/personal/data_edit?id='+idh, function(data) {
        $('#code').val(data.code);
        $('#fullname').val(data.fullname); $('#gender').val(data.gender).trigger("change");
        $('#birthday').val(data.birthday); $('#address').val(data.address);
        $('#phone').val(data.phone); $('#email').val(data.email); 
        $('#level_id').val(data.level_id).trigger('change');
        var subject = data.subject.split(",");
        $('#subject_id').val(subject).trigger('change'); $('#job_id').val(data.job_id).trigger('change');
        $('#description').val(data.description); $('#image_old').val(data.avatar);
    });
    $('#code').prop('readonly', true);
    $('#modal-personal').modal('show');
    url = baseUrl + '/personal/update?id='+idh;
}

function del(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl+'/personal/del', '#list_personal', baseUrl + '/personal/content?page='+page+'&q='+keyword);
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
    $('#detail').load(baseUrl + '/personal/form_detail?id='+idh);
    $('#modal-detail').modal('show');
}

function view_page_personal(pages){
    page = pages;
    $('#list_personal').load(baseUrl + '/personal/content?page='+pages+'&q='+keyword);
}

function search(){
    var value = $('#nav-search-input').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
        $('#list_personal').load(baseUrl + '/personal/content?page=1&q='+keyword);
    }else{
        keyword = '';
        $('#list_personal').load(baseUrl + '/personal/content?page=1&q='+keyword);
    }
}
///////////////////////////////////////////////////////////////////////////////////////
function import_teacher(){
    window.location.href = baseUrl + '/personal/import';
}

function export_card(){
    window.location.href = baseUrl + '/personal/export_card';
}