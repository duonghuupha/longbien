var page = 1, keyword = '';
$(function(){
    $('#list_personel_tmp').load(baseUrl + '/personal/content_tmp');
})

function do_import(){
    save_form_reset_form('#fm', baseUrl + '/personal/do_import', '#list_personel_tmp', baseUrl + '/personal/content_tmp');
}

function view_page_personal_tmp(pages){
    page = pages;
    $('#list_personel_tmp').load(baseUrl + '/personal/content_tmp?page='+page+'&q='+keyword);
}

function search(){
    var value = $('#nav-search-input').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
        $('#list_personel_tmp').load(baseUrl + '/personal/content_tmp?page=1&q='+keyword);
    }else{
        keyword = '';
        $('#list_personel_tmp').load(baseUrl + '/personal/content_tmp?page=1&q='+keyword);
    }
}

function detail(idh){
    $('#detail').load(baseUrl + '/personal/form_detail?id='+idh);
    $('#modal-detail').modal('show');
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
            $('#birthday').val(result.birthday); $('#address').val(result.address);
            $('#phone').val(result.phone); $('#email').val(result.email); 
        }
    });
    $('#change_code').attr('onclick', 'change_code('+idh+')');
    $('#id').val(idh);
    $('#modal-personel').modal('show');
}

function save_info(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', baseUrl+'/personel/update_tmp', '#modal-personal', '#list_personal_temp',  baseUrl+'/personal/content_temp?page='+page+'&q='+keyword); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function change_code(idh){
    var number = Math.floor(Math.random() * 9999999999);
    $('#code').val(number);
}