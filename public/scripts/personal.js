var page = 1, keyword = '', url = '';
$(function(){
    $('#list_personal').load(baseUrl + '/personal/content');
    $('#level_id').load(baseUrl + '/other/combo_level'); $('#subject_id').load(baseUrl + '/other/combo_subject');
    $('#job_id').load(baseUrl + '/other/combo_job');
});

function add(){
    var number = Math.floor(Math.random() * 9999999999);
    $('#code').val(number); $('#avatar').prop('required', true);
    $('#modal-personal').modal('show');
    url = baseUrl + '/personal/add';
}

function edit(idh){
    $.ajax({
        type: "POST",
        url: baseUrl + '/personal/data_edit',
        data: "id="+idh, // serializes the form's elements.
        success: function(data){
            var result = JSON.parse(data);
            $('#code').val(result.code);
            $('#fullname').val(result.fullname); $('#gender').val(result.gender).trigger("change");
            $('#birthday').datepicker('setDate', result.birthday); $('#address').val(result.address);
            $('#phone').val(result.phone); $('#email').val(result.email); 
            $('#level_id').val(result.level_id).trigger('change');
            var subject = result.subject.split(",");
            $('#subject_id').val(subject).trigger('change'); $('#job_id').val(result.job_id).trigger('change');
            $('#description').val(result.description); $('#image_old').val(result.avatar);
        }
    });
    $('#code').prop('readonly', true); $('#avatar').prop('required', false);
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