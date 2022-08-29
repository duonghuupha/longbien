var url = baseUrl + '/change_device/add', page = 1, keyword = '';
$(function(){
    $('#list_change').load(baseUrl + '/change_device/content');
    $('#physical_from_id').load(baseUrl + '/other/combo_physical');
    $('#physical_to_id').load(baseUrl + '/other/combo_physical');
});

function save(){
    var from = $('#physical_from_id').val(), to = $('#physical_to_id').val();
    var device = $('#device_id').val();
    if(from.length != 0 && to.length != 0 && device.length != 0){
        if(from == to){
            show_message("error", "Không thể luân chuyển thiết bị đến cùng phòng");
        }else{
            save_reject('#fm', baseUrl + '/change_device/add', baseUrl + '/change_device');
        }
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_change(pages){
    page = pages;
    $('#list_change').load(baseUrl + '/change_device/content?page='+page+'&q='+keyword);
}

function search(){
    var value = $('#nav-search-input').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
    }else{
        keyword = '';
    }
    $('#list_change').load(baseUrl + '/change_device/content?page=1&q='+keyword);
}

function set_device(){
    var value = $('#physical_from_id').val();
    console.log(value);
    $('#device_id').load(baseUrl + '/change_device/list_device?id='+value);
}