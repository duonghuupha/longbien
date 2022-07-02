var page = 1, keyword = '', url = '', numbers_line = 0, data = [];
$(function(){
    $('#list_student').load(baseUrl + '/student/content');
    $('#department_id').load(baseUrl + '/other/combo_department?yearid='+yearid);
});

function add(){
    var number = Math.floor(Math.random() * 999999999999);
    $('#code').val(number);
    $('#modal-student').modal('show');
    url = baseUrl + '/student/add'
}

function edit(idh){
    $('#modal-student').modal('show');
    url = baseUrl + '/student/update'
}

function del(idh){

}

function save(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true; push_data(); 
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired && data.length > 0){
        $('#datadc').val(JSON.stringify(data));
        save_form_modal('#fm', url, '#modal-student', '#list_student',  baseUrl+'/student/content?page='+page+'&q='+keyword); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_student(pages){
    page = pages;
    $('#list_student').load(baseUrl + '/student/content?page='+pages+'&q='+keyword);
}

function search(){
    var value = $('#table_search').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
        $('#list_student').load(baseUrl + '/student/content?page=1&q='+keyword);
    }else{
        keyword = '';
        $('#list_student').load(baseUrl + '/student/content?page=1&q='+keyword);
    }
}
//////////////////////////////////////////////////////////////////////////////////////////
function detail(){

}

function add_line(){
    var html = '';
    numbers_line += 1;
    html += '<tr id="line_'+numbers_line+'">';
        html += '<td class="text-center">';
            html += '<input id="relation_'+numbers_line+'" type="text" class="form-control" size="5"/>';
        html += '</td>';
        html += '<td>';
            html += '<input id="fullname_'+numbers_line+'" type="text" class="form-control" size="15"/>';
        html += '</td>';
        html += '<td class="text-center">';
            html += '<input id="year_'+numbers_line+'" type="text" class="form-control" size="7"';
            html += 'onkeypress="validate(event)" maxlength="4"/>';
        html += '</td>';
        html += '<td class="text-center">';
            html += '<input id="phone_'+numbers_line+'" type="text" class="form-control" size="15"';
            html += 'onkeypress="validate(event)" maxlength="10"/>';
        html += '</td>';
        html += '<td class="text-center">';
            html += '<input id="job_'+numbers_line+'" type="text" class="form-control" size="15"/>';
        html += '</td>';
        html += '<td class="text-center">';
            html += '<a href="javascript:void(0)" onclick="del_relatiion('+numbers_line+')">';
                html += '<i class="fa fa-trash" style="color:red"></i>';
            html += '</a>';
        html += '</td>';
    html += '</tr>';
    $('#tbody').append(html);
}

function del_relatiion(idh){
    $('#line_'+idh).remove();
}

function push_data(){
    $('#quanhe > tbody > tr').each(function(index, tr){
        var id = $(this).attr('id').split("_");
        if($('#relation_'+id[1]).val().length == 0 || $('#fullname_'+id[1]).val().length == 0
        || $('#year_'+id[1]).val().length == 0 || $('#phone_'+id[1]).val().length == 0
        || $('#job_'+id[1]).val().length == 0){
            show_message("error", "Thông tin quan hệ không được để trông");
            return false;
        }else{
            var str = {'id': id[1], 'relation': $('#relation_'+id[1]).val(), 'fullname': $('#fullname_'+id[1]).val(), 'year': $('#year_'+id[1]).val(), 'phone': $('#phone_'+id[1]).val(), 'job': $('#job_'+id[1]).val()};
            var objIndex = data.findIndex(item => item.id === id[1]);
            if(objIndex != -1){
                return false;
            }else{
                data.push(str);
            }
        }
    });
}

function refresh_code(){
    var number = Math.floor(Math.random() * 999999999999);
    $('#code').val(number);
}