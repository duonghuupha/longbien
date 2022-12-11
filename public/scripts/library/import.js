var page = 1, page_book = 1, key_book = '', data = [], widthBook = 0, url = '';
$(function(){
    $('#list_import').load(baseUrl + '/lib_import/content');
});

function add(){
    data = []; render_table(data); $('#date_import').val(null); $('#source').val(null);
    $('#notes').val(null);
    $('#list_book').load(baseUrl + '/lib_import/list_library');
    $('#modal-lib').modal('show'); url = baseUrl + '/lib_import/add';
}

function save(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true, requiredata = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired && data.length > 0){
        for(const item of data){
            if(item.qty == 0 || item.qty == ""){
                requiredata = false;
            }
        }
        if(requiredata){
            $('#datadc').val(JSON.stringify(data));
            save_form_modal('#fm', url, '#modal-lib', '#list_import',  baseUrl+'/lib_import/content?page='+page); 
        }else{
            show_message("error", "Các đầu sách được chọn phải có số lượng lớn hơn 0");
        }
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function edit(idh){
    var dateimport = $('#dateimport_'+idh).text(), source = $('#source_'+idh).text(), notes = $('#notes_'+idh).text();
    var datadc = $('#detail_'+idh).text(), code = $('#code_'+idh).text(); data = JSON.parse(datadc); render_table(data);
    $('#date_import').datepicker('setDate', dateimport); $('#source').val(source);$('#notes').val(notes);
    $('#code').val(code); $('#list_book').load(baseUrl + '/lib_import/list_library');
    $('#modal-lib').modal('show');
    url = baseUrl + '/lib_import/update?id='+idh;
}

function del(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Nếu bản ghi này bị xóa đồng nghĩa tồn kho của sách sẽ bị thay đổi. Bạn có chắc chắn muốn xóa bản ghi này ?",
            baseUrl + '/lib_import/del', '#list_import', baseUrl + '/lib_import/content?page='+page);
}

function view_page_import(pages){
    page = pages;
    $('#list_import').load(baseUrl + '/lib_import/content?page='+page);
}

function detail(idh){
    $('#detail').load(baseUrl + '/lib_import/detail?id='+idh);
    $('#modal-detail').modal('show');
}
///////////////////////////////////////////////////////////////////////////////////////////////////
function view_page_book(pages){
    page_book = pages;
    $('#list_book').load(baseUrl + '/lib_import/list_library?page='+page_book+'&q='+key_book);
}

function search_book(){
    key_book = ($('#nav-search-book').val().length != 0) ? $('#nav-search-book').val().replaceAll(" ", "$", 'g') : '';
    $('#list_book').load(baseUrl + '/lib_import/list_library?page=1&q='+key_book);
}

function selected_book(idh){
    var code = $('#code_'+idh).text(), title = $('#title_'+idh).text();
    var str = {'id': idh.toString(), 'code': code, 'title': title, 'qty': 0};
    var objIndex = data.findIndex(item => item.id === idh.toString());
    if(objIndex != -1){
        show_message("error", "Sách đã được chọn, không thể chọn lại");
        return false;
    }else{
        data.push(str);
        render_table(data);
        $('#table-gear').animate({
            scrollTop: $('#table-gear').get(0).scrollHeight
        }, 1500);
    }
}
///////////////////////////////////////////////////////////////////////////////////////////////////
function render_table(data_json){
    $('#tbody').empty(); var html = '', j = 1;
    for(var i = 0; i < data_json.length; i++){
        html += '<tr role="row">';
            html += '<td class="text-center">'+j+'</td>';
            html += '<td class="text-center">'+data_json[i].code+'</td>';
            html += '<td class="text-left">'+data_json[i].title+'</td>';
            html += '<td class="text-center">';
                html += '<input id="qty_'+data_json[i].id+'" name="qty_'+data_json[i].id+'" class="form-control"';
                html += 'size="5" value="'+data_json[i].qty+'" onkeypress="validate(event)" style="text-align:center"';
                html += 'onchange="change_data('+data_json[i].id+')"/>';
            html += '</td>';
            html += '<td class="text-center">';
                html += '<a href="javascript:void(0)" onclick="del_selected('+data_json[i].id+')">';
                    html += '<i class="fa fa-trash" style="color:red"></i>';
                html += '</a>';
            html += '</td>';
        html += '</tr>';
        j++;
    }
    $('#tbody').append(html);
}


function del_selected(idh){
    data = data.filter(item => item.id != idh);
    render_table(data);
}

function change_data(idh){
    var qty = $('#qty_'+idh).val();
    var objIndex = data.findIndex(item => item.id == idh);
    data[objIndex].qty = qty;
}