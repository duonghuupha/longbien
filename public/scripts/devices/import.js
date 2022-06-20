var page = 1, keyword= '', url = '';
$(function(){
    $('#sidebar').addClass('menu-min');
    $('#list_device_tmp').load(baseUrl + '/devices/content_tmp');
});

function do_import(){
    save_form_reset_form('#fm', baseUrl + '/devices/do_import', '#list_device_tmp', baseUrl + '/devices/content_tmp');
}

function view_page_devices(pages){
    page = pages;
    $('#list_device_tmp').load(baseUrl + '/devices/content_tmp?page='+page+'&q='+keyword);
}

function search(){
    var value = $('#nav-search-input').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
        $('#list_device_tmp').load(baseUrl + '/devices/content_tmp?page=1&q='+keyword);
    }else{
        keyword = '';
        $('#list_device_tmp').load(baseUrl + '/devices/content_tmp?page=1&q='+keyword);
    }
}

function del_tmp(){
    var data_str = "id=";
    del_data(data_str, "Bạn có chắc chắn muốn xóa dữ liệu tạm?", baseUrl+'/devices/del_tmp', "#list_device_tmp", baseUrl + '/devices/content_tmp?page='+page+'&q='+keyword);
}