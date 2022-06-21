var page = 1, keyword = '', url = '', page_per = 1, keword_per = '';
$(function(){
    $('#list_users').load(baseUrl + '/users/content');
});

function add(){
    $('#modal-users').modal('show');
    url = baseUrl + '/users/add';
}

function edit(idh){
    /*$.getJSON('http://time.jsontest.com', function(data) {

        var text = `Date: ${data.date}<br>
                    Time: ${data.time}<br>
                    Unix time: ${data.milliseconds_since_epoch}`


        $(".mypanel").html(text);
    });*/
    $('#model-users').modal('show');
    url = baseUrl + '/users/update?id='+idh
}

function del(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl + '/users/del', '#list_users',  baseUrl+ '/users/content?page='+page+'&q='+keyword)
}

function save(){
    // kiem tra nhap input 
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    // kiem tra mat khau
    var pass = $('#password').val(), repass = $('#repass').val(), allpass = true;
    if(pass.length <= 6){
        allpass = false;
    }else{
        if(pass != repass){
            allpass = false;
        }
    }
    if(allRequired){
        if(allpass){
            save_form_modal('#fm', url, '#modal-users', '#list_users',  baseUrl+'/users/content?page='+page+'&q='+keyword); 
        }else{
            show_message("error", "Mật khẩu phải dài hơn 6 ký tự hoặc xác nhận mật khẩu không đúng");
        }
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_users(pages){
    page = pages;
    $('#list_users').load(baseUrl + '/users/content?page='+page+'&q='+keyword);
}

function search(){
    var value = $('#nav-search-input').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
        $('#list_users').load(baseUrl + '/users/content?page=1&q='+keyword);
    }else{
        keyword = '';
        $('#list_users').load(baseUrl + '/users/content?page=1&q='+keyword);
    }
}

function re_pass(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn đặt lại mật khẩu cho người dùng này?", baseUrl + '/users/change_pass', '#list_users',  baseUrl+ '/users/content?page='+page+'&q='+keyword)
}
/////////////////////////////////////////////////////////////////////////////////////////
function select_per(){
    $('#personel').load(baseUrl + '/users/list_personel');
    $('#modal-personel').modal('show');
}

function view_page_per(pages){
    page_per = pages;
    $('#personel').load(baseUrl + '/users/list_personel?page='+page_per+'&q='+keword_per);
}

function search_per(){
    var value = $('#table_search').val();
    if(value.length != 0){
        keword_per = value.replaceAll(" ", "$", 'g');
        $('#personel').load(baseUrl + '/users/list_personel?page=1&q='+keword_per);
    }else{
        keyword = '';
        $('#personel').load(baseUrl + '/users/list_personel?page=1&q='+keword_per);
    }
}

function confirm_per(idh){
    $('#hr_id').val(idh); var title = $('#title_'+idh).text();
    title = title.trim(); arr_title = title.split(' ');
    var chieudai = arr_title.length, name = arr_title[chieudai-1];
    name = removeVietnameseTones(name); arr_title.pop();
    var prefix = '';
    for(const element of arr_title){
        prefix += removeVietnameseTones(element.substr(0, 1));
    }
    var username = name+prefix;
    $('#fullname').val(title); $('#username').val(username);
    $('#modal-personel').modal('hide');
}