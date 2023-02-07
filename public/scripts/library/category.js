var page_book =1, page_manu = 1, url = '', page_bin = 1, page_floor = 1;
$(function(){
    $('#list_book').load(baseUrl + '/cate_book/content');
    $('#list_manu').load(baseUrl + '/cate_book_manu/content');
    $('#list_bin').load(baseUrl + '/bin/content');
    $('#list_floor').load(baseUrl + '/floor/content');
});
//////////////////////////////////////////////////////////////////////////////////////////
function add_book_cate(){
    $('#form').load(baseUrl + '/cate_book/form');
    $('#modal-form').modal('show');
    url = baseUrl + '/cate_book/add';
}

function edit_book_cate(idh){
    $('#form').load(baseUrl + '/cate_book/form?id='+idh);
    $('#modal-form').modal('show');
    url = baseUrl + '/cate_book/update';
}

function del_book_cate(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này ?", baseUrl+'/cate_book/del', '#list_book', baseUrl+'/cate_book/content?page='+page_book);
}

function save_book_cate(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', url, '#modal-form', '#list_book',  baseUrl+'/cate_book/content?page='+page_book); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_book_cate(pages){
    page_book = pages;
    $('#list_book').load(baseUrl + '/cate_book/content?page='+page_book);
}
///////////////////////////////////////////////////////////////////////////////////////
function add_book_manu(){
    $('#form').load(baseUrl + '/cate_book_manu/form');
    $('#modal-form').modal('show');
    url = baseUrl + '/cate_book_manu/add';
}

function edit_book_manu(idh){
    $('#form').load(baseUrl + '/cate_book_manu/form?id='+idh);
    $('#modal-form').modal('show');
    url = baseUrl + '/cate_book_manu/update';
}

function del_book_manu(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này ?", baseUrl+'/cate_book_manu/del', '#list_manu', baseUrl+'/cate_book_manu/content?page='+page_manu);
}

function save_book_cate_manu(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', url, '#modal-form', '#list_manu',  baseUrl+'/cate_book_manu/content?page='+page_manu); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_book_cate_manu(pages){
    page_manu = pages;
    $('#list_manu').load(baseUrl + '/cate_book_manu/content?page='+page_manu);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function add_bin(){
    $('#form').load(baseUrl + '/bin/form');
    $('#modal-form').modal('show');
    url = baseUrl + '/bin/add';
}

function edit_bin(idh){
    $('#form').load(baseUrl + '/bin/form?id='+idh);
    $('#modal-form').modal('show');
    url = baseUrl + '/bin/update';
}

function del_bin(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này ?", baseUrl+'/bin/del', '#list_bin', baseUrl+'/bin/content?page='+page_bin);
}

function save_bin(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', url, '#modal-form', '#list_bin',  baseUrl+'/bin/content?page='+page_bin); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_bin(pages){
    page_bin = pages;
    $('#list_bin').load(baseUrl + '/bin/content?page='+page_bin);
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function add_floor(){
    $('#form').load(baseUrl + '/floor/form'); 
    $('#modal-form').modal('show');
    url = baseUrl + '/floor/add';
}

function edit_floor(idh){
    $('#form').load(baseUrl + '/floor/form?id='+idh);
    $('#modal-form').modal('show');
    url = baseUrl + '/floor/update';
}

function del_floor(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này ?", baseUrl+'/floor/del', '#list_floor', baseUrl+'/floor/content?page='+page_floor);
}

function save_floor(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', url, '#modal-form', '#list_floor',  baseUrl+'/floor/content?page='+page_floor); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_floor(pages){
    page_bin = pages;
    $('#list_floor').load(baseUrl + '/floor/content?page='+page_floor);
}