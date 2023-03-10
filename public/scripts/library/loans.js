var page = 1, url = '', page_book = 1, key_book = '', page_stu = 1, key_stu = '', page_per = 1, key_per = '';
let data_book = [], keyword = '';
$(function(){
    $('#list_loans').load(baseUrl + '/lib_loans/content');
});

function add(){
    clear_form();
    let today = new Date(); var ngay = today.getDate(), thang = (today.getMonth() + 1);
    var nam = today.getFullYear(); data_book = []; render_table(data_book);
    var hientai = ngay+'-'+thang+'-'+nam; $('#date_loan').datepicker('setDate', hientai);
    $('#date_return').datepicker('setDate', hientai); $('#user_loan').val(0);
    $('#student_loan').val(0); $('#datadc').val(null); $('#modal-loan').modal('show');
    url = baseUrl + '/lib_loans/add';
}

function save_loan(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired && data_book.length != 0){
        $('#datadc').val(JSON.stringify(data_book));
        save_form_modal('#fm-loan', url, '#modal-loan', '#list_loans', baseUrl + '/lib_loans/content?page='+page+'&q='+keyword); 
    }else{
        show_message("error", "Bạn chưa điền đủ thông tin");
    }
}

function view_page_loans(pages){
    page = pages;
    $('#list_loans').load(baseUrl + '/lib_loans/content?page='+page+'&q='+keyword);
}

function search(){
    var value = $('#nav-search-input').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
    }else{
        keyword = '';
    }
    $('#list_loans').load(baseUrl + '/lib_loans/content?page=1&q='+keyword);
}

function detail(idh){
    $('#detail').load(baseUrl + '/lib_loans/detail?id='+idh);
    $('#modal-detail').modal('show');
}

function edit(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn chắc chắn trả sách này ?", baseUrl + '/lib_loans/update', '#list_loans', baseUrl + '/lib_loans/content?page='+page+'&q='+keyword);
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
        data_book = [];
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
    var fullname = $('#fullname_'+idh).text(); $('#fullname_personel').attr('required', false);
    $('#user_loan').val(0); $('#student_loan').val(idh);
    $('#fullname_personel').val(null); $('#fullname_student').val(fullname);
    $('#modal-student').modal('hide'); $('#select_users').attr('disabled', true);
    $('#select_stu').html('<i class="ace-icon fa fa-times bigger-110"></i> Bỏ!');
    $('#select_stu').removeClass('btn-primary').addClass('btn-danger');
    $('#select_stu').attr('onclick', 'cancel_stu()');
}

function cancel_stu(){
    $('#user_loan').val(0); $('#student_loan').val(0); $('#fullname_personel').attr('required', true);
    $('#fullname_personel').val(null); $('#fullname_student').val(null);
    $('#select_users').attr('disabled', false);
    $('#select_stu').html('<i class="ace-icon fa fa-graduation-cap bigger-110"></i> Go!');
    $('#select_stu').removeClass('btn-danger').addClass('btn-primary');
    $('#select_stu').attr('onclick', 'select_student()');
}
///////////////////////////////////////////////////////////////////////////////////////////////////
function select_personel(){
    $('#list_personel').load(baseUrl + '/lib_loans/list_personel');
    $('#pager-personel').load(baseUrl + '/lib_loans/list_personel_page');
    $('#modal-personel').modal('show');
}

function view_page_personel(pages){
    page_per = pages;
    $('#list_personel').load(baseUrl + '/lib_loans/list_personel?page='+page_per+'&q='+key_per);
    $('#pager-personel').load(baseUrl + '/lib_loans/list_personel_page?page='+page_per+'&q='+key_per);
}

function search_personel(){
    var value = $('#nav-search-input-personel').val();
    if(value.length != 0){
        key_per = value.replaceAll(" ", "$", 'g');
    }else{
        key_per = '';
    }
    $('#list_personel').load(baseUrl + '/lib_loans/list_personel?page=1&q='+key_per);
    $('#pager-personel').load(baseUrl + '/lib_loans/list_personel_page?page=1&q='+key_per);
}

function confirm_personel(idh){
    var fullname = $('#fullname_'+idh).text(); $('#fullname_student').attr('required', false);
    $('#user_loan').val(idh); $('#student_loan').val(0);
    $('#fullname_personel').val(fullname); $('#fullname_student').val(null);
    $('#modal-personel').modal('hide'); $('#select_stu').attr('disabled', true);
    $('#select_users').html('<i class="ace-icon fa fa-times bigger-110"></i> Bỏ!');
    $('#select_users').removeClass('btn-primary').addClass('btn-danger');
    $('#select_users').attr('onclick', 'cancel_per()');
}

function cancel_per(){
    $('#user_loan').val(0); $('#student_loan').val(0); $('#fullname_student').attr('required', true);
    $('#fullname_personel').val(null); $('#fullname_student').val(null);
    $('#select_stu').attr('disabled', false);
    $('#select_users').html('<i class="ace-icon fa fa-graduation-cap bigger-110"></i> Go!');
    $('#select_users').removeClass('btn-danger').addClass('btn-primary');
    $('#select_users').attr('onclick', 'select_personel()');
}
/////////////////////////////////////////////////////////////////////////////////////////////////
function set_book_loan(){
    let value = $('#book_code_form').val();
    $.getJSON(baseUrl + '/lib_loans/check_exit_book_pass_code?code='+value, function(data){
        if(data.success){
            //console.log(data.data.id);
            var str = {'id': data.data.id, 'title': data.data.title, 'code': data.data.code, 'sub': data.data.sub};
            data_book = []; data_book.push(str); render_table(data_book);
            $('#book_code_form').val(null);
        }else{
            show_message("error", data.msg);
        }
    });
}
////////////////////////////////////////////////////////////////////////////////////////////////////
function set_info_book(value){
    $.getJSON(baseUrl + '/lib_loans/check_exit_book_pass_code?code='+value, function(data){
        if(data.success){
            //console.log(data.data.id);
            var html = '';
            html += '<b>Tiêu đề:</b> '+data.data.title+"<br/>";
            html += '<b>Quyển số:</b> '+data.data.sub;
            $('#book_info').html(html); $('#book_id').val(data.data.id+'.'+data.data.sub);
            $('#per_stu_code').focus();
        }else{
            show_message("error", data.msg);
            $('#book_info').empty(); $('#book_code').val(null);
        }
    });
}

function set_info_per_stu(value){
    if(value.length != 10 && value.length != 12){
        show_message("error", "Định dạng mã không chính xác. Mã Học sinh 12 số, Mã CBGVNV 10 số");
        return false;
    }else{
        if(isNaN(value)){
            show_message("error", "Mã phải là dạng số");
            return false;
        }else{
            $.getJSON(baseUrl + '/lib_loans/check_exit_per_stu_pass_code?code='+value, function(data){
                if(data.success){
                    var html = '';
                    if(data.type == 1){
                        html += '<b>Họ và tên:</b> '+data.data.fullname+"<br/>";
                        html += '<b>Nhiệm vụ:</b> '+data.data.job;
                        $('#per_stu_info').html(html); $('#per_id').val(data.data.id);
                        $('#stu_id').val(0);
                    }else{
                        html += '<b>Họ và tên:</b> '+data.data.fullname+"<br/>";
                        html += '<b>Lớp:</b> '+data.data.department;
                        $('#per_stu_info').html(html); $('#stu_id').val(data.data.id);
                        $('#per_id').val(0);
                    }
                    $('#book_code').focus();
                }else{
                    show_message("error", data.msg);
                    $('#per_stu_info').empty(); $('#per_stu_code').val(null);
                }
            });
        }
    }
}

function save(){
    let bookid = $('#book_id').val(), stuid = $('#stu_id').val(), perid = $('#per_id').val();
    if(bookid.length != 0 && (stuid != 0 || perid != 0)){
        save_form_reset_form('#fm', baseUrl + '/lib_loans/add_scan', '#list_loans', baseUrl + '/lib_loans/content');
    }else{
        show_message("error", "Chưa nhập đủ thông tin");
    }
}
///////////////////////////////////////////////////////////////////////////////////////////////////
function clear_form(){
    $('#user_loan').val(0); $('#student_loan').val(0); 
    $('#fullname_student').attr('required', true); $('#fullname_personel').attr('required', true);
    $('#fullname_personel').val(null); $('#fullname_student').val(null);
    $('#select_stu').attr('disabled', false); $('#select_users').attr('disabled', false);
    /*************************************************************************************** */
    $('#select_users').html('<i class="ace-icon fa fa-graduation-cap bigger-110"></i> Go!');
    $('#select_users').removeClass('btn-danger').addClass('btn-primary');
    $('#select_users').attr('onclick', 'select_personel()');
    /************************************************************************************** */
    $('#select_stu').html('<i class="ace-icon fa fa-graduation-cap bigger-110"></i> Go!');
    $('#select_stu').removeClass('btn-danger').addClass('btn-primary');
    $('#select_stu').attr('onclick', 'select_student()');
    data_book = []; render_table(data_book);
}
//////////////////////////////////////////////////////////////////////////////////////////////////
function clear_form_loan(){
    $('#per_stu_code').val(null); $('#book_code').val(null);
    $('#per_stu_info').empty(); $('#book_info').empty();
}
///////////////////////////////////////////////////////////////////////////////////////////////////
function return_quick_book(value){
    var data_str = "data="+value;
    $('.overlay').show();
    $.ajax({
        type: "POST",
        url: baseUrl + '/lib_loans/return_quick',
        data: data_str, // serializes the form's elements.
        success: function(data){
            var result = JSON.parse(data);
            if(result.success == true){
                $('.overlay').hide();
                show_message('success', result.msg);
                $('#book_code_return').val(null);
                $('#list_loans').load(baseUrl + '/lib_loans/content?page='+page+'&q='+keyword);
            }else{
                $('.overlay').hide();
                $('#book_code_return').val(null);
                show_message('error', result.msg);
                return false;
            }
        }
    });
}