var url = baseUrl + '/export_device/add', thietbidachon = [], page = 1, keyword = '';
$(function(){
    $('#list_export').load(baseUrl + '/export_device/content');
    $('#physical_id').load(baseUrl + '/other/combo_physical');
    $('#device_id').load(baseUrl + '/export_device/combo_devices');
});

function set_sub_device(){
    var value = $('#device_id').val();
    $('#sub_device').load(baseUrl + '/export_device/combo_sub_device?id='+value);
}

function set_device_selected(){
    var value = $('#sub_device').val();
    thietbidachon.push(value); var dachon = thietbidachon.join(",");
    //console.log(dachon);
    $('#device_export').load(baseUrl + '/export_device/list_device?data='+btoa(dachon));
    return_total_device_selected();
}

function del_device_selected(id){
    thietbidachon = thietbidachon.filter(item => item !== id);
    var dachon = thietbidachon.join(",");
    $('#device_export').load(baseUrl + '/export_device/list_device?data='+btoa(dachon));
    return_total_device_selected();
}

function save(){
    var physical = $('#physical_id').val();
    if(physical.length != 0 && physical != 0 && thietbidachon.length != 0){
        $('#device_selected').val(btoa(thietbidachon.join(",")));
        save_reject('#fm', url, baseUrl + '/export_device');
    }else{
        show_message("error", "Bạn  chưa chọn phòng hoặc chưa có thiết bị nào được phân bổ");
    }
}

function return_total_device_selected(){
    var total = thietbidachon.length;
    $('#total_device').text(total+'(s)');
}

function view_page_export_device(pages){
    page = pages;
    $('#list_export').load(baseUrl + '/export_device/content?page='+page+'&q='+keyword);
}

function edit(idh){
    var physical = $('#physical_'+idh).text();
    $('#physical_id').val(physical).trigger('change');
    url = baseUrl +  '/export_device/update?id='+idh;
}