var url = baseUrl + '/export_device/add', thietbidachon = [], page = 1, keyword = '';
var data_all = [];
$(function(){
    $('#list_export').load(baseUrl + '/export_device/content');
    combo_select_2('#physical_id', baseUrl+'/other/combo_physical', 0, '');
    combo_select_2('#device_id', baseUrl + '/export_device/combo_devices', 0, '');
});

function set_sub_device(){
    var value = $('#device_id').val();
    combo_select_2('#sub_device', baseUrl + '/export_device/combo_sub_device?id='+value);
}

function set_device_selected(){
    var value = $('#sub_device').val();
    thietbidachon.push(value); var dachon = thietbidachon.join(",");
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

function view_page_export_device(pages){
    page = pages;
    $('#list_export').load(baseUrl + '/export_device/content?page='+page+'&q='+keyword);
}

function edit(idh){
    var physical = $('#physical_'+idh).text(), code = $('#code_'+idh).text();
    var titlephysical = $('#physicaltitle_'+idh).text(); $('#code').val(code.trim());
    var dachon = $('#tbdc_'+idh).text(); thietbidachon = dachon.split(",");
    $('#device_export').load(baseUrl + '/export_device/list_device?data='+btoa(dachon));
    combo_select_2('#physical_id', baseUrl + '/other/combo_physical', physical, titlephysical);
    return_total_device_selected();
    url = baseUrl +  '/export_device/update?id='+idh;
}

function return_total_device_selected(){
    var filtered = thietbidachon.filter(function(el){
        return el != "";
    }); thietbidachon = filtered;
    var total = thietbidachon.length;
    $('#total_device').text(total+'(s)');
}

function del(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl + '/export_device/del', '#list_export', baseUrl + '/export_device/content?page='+page+'&q='+keyword);
}

function detail(idh){
    $('#detail').load(baseUrl + '/export_device/detail?id='+idh);
    $('#modal-detail').modal('show');
}

function search(){
    var value = $('#nav-search-input').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
    }else{
        keyword = '';
    }
    $('#list_export').load(baseUrl + '/export_device/content?page=1&q='+keyword);
}
/////////////////////////////////////////////////////////////////////////////////////////////
function update(idh){
    var title = $('#physicaltitle_'+idh).text(); data_all = [];
    $('#title_header').text("Phân bổ nhiều thiết bị cùng mã :: "+title);
    $('.select2').val(null).trigger('change.select2');
    combo_select_2('#device_all_id', baseUrl + '/export_device/combo_devices', 0, '');
    $('#list_device').load(baseUrl + '/export_device/content_device_all?id=0');
    $('#iddevice').val(idh); $('#modal-all').modal('show');
}

function set_content_all(value){
    $('#list_device').load(baseUrl + '/export_device/content_device_all?id='+value);
}

function confirm_checked(idh){
    var checked = $('#ck_'+idh).is(":checked");
    if(checked){
        data_all.push(idh);
    }else{
        data_all = data_all.filter(item => item != idh);
    }
    $('#display_select').text("Đã lựa chọn: "+data_all.length);
}

function save_all(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired && data_all.length != 0){
        $('#datadc_all').val(JSON.stringify(data_all));
        save_form_modal('#fm-all', baseUrl + '/export_device/update_all', '#modal-all', '#list_export', baseUrl + '/export_device/content?page='+page+'&q='+keyword); 
    }else{
        show_message("error", "Bạn chưa điền đủ thông tin");
    }
}