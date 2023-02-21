var page = 1, url = '', page_book = 1, key_book = '', page_stu = 1, key_stu = '';
var data_book = [];
$(function(){
    $('#list_loans').load(baseUrl + '/lib_loans/content');
});

function add(){
    let today = new Date(); var ngay = today.getDate(), thang = (today.getMonth() + 1);
    var nam = today.getFullYear(); data_book = []; render_table(data_book);
    var hientai = ngay+'-'+thang+'-'+nam; $('#date_loan').datepicker('setDate', hientai);
    $('#date_return').datepicker('setDate', hientai); $('#user_loan').val(0);
    $('#student_loan').val(0); $('#datadc').val(null); $('#modal-loan').modal('show');
    url = baseUrl + '/lin_loans/add';
}

function save(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired && data_book.length != 0){
        $('#datadc').val(JSON.stringify(data_book));
        save_form_modal('#fm', url, '#modal-loan', '#list_loans', baseUrl + '/lib_loans/content?page='+page); 
    }else{
        show_message("error", "Bạn chưa điền đủ thông tin");
    }
}

function view_page_loans(pages){
    page = pages;
}
///////////////////////////////////////////////////////////////////////////////////////////////////
function select_book(){ 
    $('#list_book').load(baseUrl + '/lib_loans/list_book');
    $('#pager-book').load(baseUrl + '/lib_loans/list_book_page');
    $('#modal-book').modal('show');
}

function search_book(){
    var value = $('#nav-search-input-book').val();
    if(value.length != 0){
        key_book = value.replaceAll(" ", "$", 'g');
    }else{
        key_book = '';
    }
    $('#list_book').load(baseUrl + '/lib_loans/list_book?page=1&q='+key_book);
    $('#pager-book').load(baseUrl + '/lib_loans/list_book_page?page=1&q='+key_book);
}

function view_page_book(pages){
    page_book = pages;
    $('#list_book').load(baseUrl + '/lib_loans/list_book?page='+page_book+'&q='+key_book);
    $('#pager-book').load(baseUrl + '/lib_loans/list_book_page?page='+page_book+'&q='+key_book);
}

function confirm_book(idh){
    var value = $('#book_'+idh).val(), title = $('#title_'+idh).text(), code = $('#code_'+idh).text();
    var objIndex = data_book.findIndex(item => item.id == idh && item.sub == value);
    var str = {'id': idh, 'title': title, 'code': code, 'sub': value};
    if(objIndex == -1){
        data_book.push(str); render_table(data_book);
        $('#modal-book').modal('hide');
    }else{
        show_message("error", "Sách đã được chọn, bạn vui lòng chọn lại");
    }
}

function render_table(data_json){
    $('#tbody').empty(); var html = '', j = 1;
    for(var i = 0; i < data_json.length; i++){
        html += '<tr role="row">';
            html += '<td class="text-center">'+j+'</td>';
            html += '<td class="text-center">'+data_json[i].code+'</td>';
            html += '<td class="text-left">'+data_json[i].title+'</td>';
            html += '<td class="text-center">'+data_json[i].sub+'</td>';
            html += '<td class="text-center">';
                html += '<a href="javascript:void(0)" onclick="del_selected('+data_json[i].id+', '+data_json[i].sub+')">';
                    html += '<i class="fa fa-trash" style="color:red"></i>';
                html += '</a>';
            html += '</td>';
        html += '</tr>';
        j++;
    }
    $('#tbody').append(html);
}

function del_selected(idh, sub){
    data_book = data_book.filter(item => item.id !== idh && item.sub !== sub);
    render_table(data_book);
}
/////////////////////////////////////////////////////////////////////////////////////////////
function select_student(){
    $('#list_student').load(baseUrl + '/lib_loans/list_student');
    $('#pager-student').load(baseUrl + '/lib_loans/list_student_page');
    $('#modal-student').modal('show');
}

function view_page_student(pages){
    page_stu = pages;
    $('#list_student').load(baseUrl + '/lib_loans/list_student?page='+page_stu+'&q='+key_stu);
    $('#pager-student').load(baseUrl + '/lib_loans/list_student_page?page='+page_stu+'&q='+key_stu);
}

function search_student(){
    var value = $('#nav-search-input-student').val();
    if(value.length != 0){
        key_stu = value.replaceAll(" ", "$", 'g');
    }else{
        key_stu = '';
    }
    $('#list_student').load(baseUrl + '/lib_loans/list_student?page=1&q='+key_stu);
    $('#pager-student').load(baseUrl + '/lib_loans/list_student_page?page=1&q='+key_stu);
}

function confirm_student(idh){
    var fullname = $('#fullname_'+idh).text();
    $('#user_loan').val(0); $('#student_loan').val(idh);
    $('#fullname_personel').val(null); $('#fullname_student').val(fullname);
    $('#modal-student').modal('hide'); $('#select_users').attr('disabled', true);
    $('#select_stu').html('<i class="ace-icon fa fa-times bigger-110"></i> Bỏ!');
    $('#select_stu').removeClass('btn-primary').addClass('btn-danger');
    $('#select_stu').attr('onclick', 'cancel_stu()');
}

function cancel_stu(){
    $('#user_loan').val(0); $('#student_loan').val(null);
    $('#fullname_personel').val(null); $('#fullname_student').val(null);
    $('#select_users').attr('disabled', false);
    $('#select_stu').html('<i class="ace-icon fa fa-graduation-cap bigger-110"></i> Go!');
    $('#select_stu').removeClass('btn-danger').addClass('btn-primary');
    $('#select_stu').attr('onclick', 'select_student()');
}
///////////////////////////////////////////////////////////////////////////////////////////////////