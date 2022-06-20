var page = 1, keyword = '', url = '';
$(function(){
    $('#list_device').load(baseUrl + '/import_device/content');
});

function view_page_device(pages){
    page = pages;
    $('#list_device').load(baseUrl + '/import_device/content?page='+page+'&q='+keyword);
}

function search(){
    var value = $('#nav-search-input').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
        $('#list_device').load(baseUrl + '/import_device/content?page=1&q='+keyword);
    }else{
        keyword = '';
        $('#list_device').load(baseUrl + '/import_device/content?page=1&q='+keyword);
    }
}

function save(idh){
    var stock = $('#stock_'+idh).val();
    if(stock.length == 0){
        show_message("error", "Tồn kho không được để trống");
    }else{
        var data_str = "id="+idh+'&stock='+stock;
        del_data(data_str, "Bạn có chắc chắn muốn cập nhật dữ liệ cho bản ghi này?", baseUrl+'/import_device/update',  '#list_device', baseUrl+'/import_device/content?page='+page+'&q='+keyword);
    }
}