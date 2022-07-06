var page = 1, keyword = '', url = '', numbers_line = 0, data = [];
$(function(){
    $('#list_student').load(baseUrl + '/student/content');
    $('#department_id').load(baseUrl + '/other/combo_department?yearid='+yearid);
});

function add(){
    var number = Math.floor(Math.random() * 999999999999); data = []; render_table(data);
    $('#code').val(number); $('#fullname').val(null); $('#gender').val(null).trigger('change');
    $('#birthday').val(null); $('#address').val(null); $('#department_id').val(null).trigger('change');
    $('#image_old').val(null); $('#status').val(null).trigger('change'); $('#refreshcode').show();
    $('#modal-student').modal('show');
    url = baseUrl + '/student/add'
}

function edit(idh){
    $('#refreshcode').hide();
    var code = $('#code_'+idh).text(), fullname = $('#fullname_'+idh).text();
    var gender = $('#gender_'+idh).text(), birthday = $('#birthday_'+idh).text();
    var department = $('#department_'+idh).text(), status = $('#status_'+idh).text();
    var address = $('#address_'+idh).text(), image = $('#image_'+idh).text();
    var datadc = $('#datadc_'+idh).text();
    $('#code').val(code); $('#fullname').val(fullname); $('#gender').val(gender).trigger('change');
    $('#birthday').val(birthday); $('#address').val(address); $('#department_id').val(department).trigger('change');
    $('#image_old').val(image); $('#status').val(status).trigger('change');
    // data relation////////////////////////////////////////////////////////
    data = JSON.parse(datadc); numbers_line = data.length;
    render_table(data);
    $('#modal-student').modal('show');
    url = baseUrl + '/student/update?id='+idh
}

function del(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl + '/student/del', '#list_student', baseUrl + '/student/content?page='+page+'&q='+keyword);
}

function save(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
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
    numbers_line += 1;
    var str = {'id': numbers_line, 'relation': '', 'fullname': '', 'year': '', 'phone': '', 'job': ''};
    data.push(str);
    render_table(data);
}

function render_table(data_json){
    var html = '', j = 1; $('#tbody').empty();
    for(i = 0; i < data_json.length; i++){
        html += '<tr id="line_'+data_json[i].id+'">';
            html += '<td class="text-center">'+j+'</td>'
            html += '<td class="text-center">';
                html += '<input id="relation_'+data_json[i].id+'" type="text" class="form-control" size="5" name="relation"';
                html += 'value="'+data_json[i].relation+'" onchange="push_data(this, '+data_json[i].id+')"/>';
            html += '</td>';
            html += '<td>';
                html += '<input id="fullname_'+data_json[i].id+'" type="text" class="form-control" size="15" name="fullname1"';
                html += 'value="'+data_json[i].fullname+'" onchange="push_data(this, '+data_json[i].id+')"/>';
            html += '</td>';
            html += '<td class="text-center">';
                html += '<input id="year_'+data_json[i].id+'" type="text" class="form-control" size="7" name="year"';
                html += 'onkeypress="validate(event)" maxlength="4" value="'+data_json[i].year+'" onchange="push_data(this, '+data_json[i].id+')"/>';
            html += '</td>';
            html += '<td class="text-center">';
                html += '<input id="phone_'+data_json[i].id+'" type="text" class="form-control" size="15" name="phone"';
                html += 'onkeypress="validate(event)" maxlength="10" value="'+data_json[i].phone+'" onchange="push_data(this, '+data_json[i].id+')"/>';
            html += '</td>';
            html += '<td class="text-center">';
                html += '<input id="job_'+data_json[i].id+'" type="text" class="form-control" size="15" name="job"';
                html += 'value="'+data_json[i].job+'" onchange="push_data(this, '+data_json[i].id+')"/>';
            html += '</td>';
            html += '<td class="text-center">';
                html += '<a href="javascript:void(0)" onclick="del_relatiion('+data_json[i].id+')">';
                    html += '<i class="fa fa-trash" style="color:red"></i>';
                html += '</a>';
            html += '</td>';
        html += '</tr>';
        j++;
    }
    $('#tbody').append(html);
}

function del_relatiion(idh){
    data = data.filter(item => item.id != idh);
    render_table(data);
}

function push_data(type, idh){
    var objIndex = data.findIndex(item => item.id == idh);
    if(type.name == 'relation'){
        data[objIndex].relation = $(type).val();
    }else if(type.name == 'fullname1'){
        data[objIndex].fullname = $(type).val();
    }else if(type.name == 'year'){
        data[objIndex].year = $(type).val();
    }else if(type.name == 'phone'){
        data[objIndex].phone = $(type).val();
    }else if(type.name == 'job'){
        data[objIndex].job = $(type).val();
    }
}

function refresh_code(){
    var number = Math.floor(Math.random() * 999999999999);
    $('#code').val(number);
}

function import_xls(){
    window.location.href = baseUrl + '/student/import';
}

function export_card(){
    window.location.href = baseUrl + '/student/export_card';
}