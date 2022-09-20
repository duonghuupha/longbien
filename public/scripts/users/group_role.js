var page = 1, keyword = '', url = '', data = [];
$(function(){
    $('#list_role').load(baseUrl + '/group_role/content');
});

function add(){
    $('#title').val(null);
    $('#roles').load(baseUrl + '/group_role/data_role');
    $('#modal-role').modal('show');
    url= baseUrl + '/group_role/add';
}

function edit(idh){
    $('#modal-role').modal('show');
    url= baseUrl + '/group_role/update?id='+idh;
}

function del(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl +'/group_role/del', '#list_role', baseUrl + '/group_role/content?page='+page+'&q='+keyword);
}

function save(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    $("input:checkbox[type=checkbox]:checked").each(function(){
        data.push($(this).val());
    });
    if(allRequired && data.length > 0){
        $('#datadc').val(btoa(data.join(",")));
        save_form_modal('#fm', url, '#modal-role', '#list_role',  baseUrl+'/group_role/content?page='+page+'&q='+keyword)
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function set_checked(id){
    var value = $('#role_'+id).is(':checked');
    if(value){
        $("input:checkbox[name=role_"+id+"_]").each(function(){
            $(this).prop('checked', true);
        });
    }else{
        $("input:checkbox[name=role_"+id+"_]").each(function(){
            $(this).prop('checked', false);
        });
    }
}

function set_checked_sub(id, sub){
    var value = $('#role_'+id+'_'+sub).is(":checked");
    if(value){
        $('#role_'+id).prop('checked', true);
    }
}

function view_page_role(pages){
    page = pages;
}