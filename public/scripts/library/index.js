var page = 1, keyword = '',  url = '';
$(function(){
    $('#list_library').load(baseUrl + '/library/content');
    $('#cate_id').load(baseUrl + '/other/combo_book_cate');
    $('#manu_id').load(baseUrl + '/other/combo_book_manu');
});

function add(){
    $('#fm')[0].reset(); $('.select2').val(null).trigger('change');
    var number = Math.floor(Math.random() * 99999999); $('#id').val(0);
    $('#code').val(number); $('#type').val(1).trigger('change');
    $('#modal-library').modal('show');
    url = baseUrl + '/library/add';
}

function edit(idh){
    $.getJSON(baseUrl + '/library/data_edit?id='+idh, function(data){
        $('#code').val(data.code); $('#manu_id').val(data.manu_id).trigger('change');
        $('#cate_id').val(data.cate_id).trigger('change'); $('#number_page').val(data.number_page);
        $('#author').val(data.author); $('#title').val(data.title); $('#content').val(data.content);
        $('#type').val(data.type).trigger('change'); $('#stock').val(data.stock);
        $('#id').val(idh); $('#file_old').val(data.file); $('#image_old').val(data.image);
    });
    $('#modal-library').modal('show');
    url = baseUrl + '/library/update?id='+idh;
}

function del(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl+'/library/del', '#list_library', baseUrl +  '/library/content?page='+page+'&q='+keyword);
}

function save(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            console.log($(this));
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', url, '#modal-library', '#list_library',  baseUrl+'/library/content?page='+page+'&q='+keyword); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_library(pages){
    page = pages;
    $('#list_library').load(baseUrl + '/library/content?page='+page+'&q='+keyword);
}

function search(){
    var value = $('#keywork').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
    }else{
        keyword = '';
    }
    $('#list_library').load(baseUrl + '/library/content?page=1&q='+keyword);
}

function detail(idh){
    $('#modal-detail').modal('show');
}
////////////////////////////////////////////////////////////////////////////////////////////////
function set_required(value){
    if($('#id').val()  == 0){
        if(value == 2){
            $('#file').prop('required', true);
        }else{
            $('#file').prop('required', false);
        }
    }else{
        $('#file').prop('required', false);
    }
}

function refresh_code(){
    var number = Math.floor(Math.random() * 99999999);
    $('#code').val(number); 
}