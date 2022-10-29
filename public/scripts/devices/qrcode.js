var page = 1; keyword = '', data_dep = [];
$(function(){
    $('#list_device').load(baseUrl + '/qrcode_device/content');
});

function view_page_devices(pages){
    page = pages;
    $('#list_device').load(baseUrl + '/qrcode_device/content?page='+page+'&q='+keyword);
}

function search(){
    var value = $('#nav-search-input').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
        $('#list_device').load(baseUrl + '/qrcode_device/content?page=1&q='+keyword);
    }else{
        keyword = '';
        $('#list_device').load(baseUrl + '/qrcode_device/content?page=1&q='+keyword);
    }
}

function print_allcode(){
    
}
///////////////////////////////////////////////////////////////////////////////////////////////
function view_device_dep(){
    combo_select_2('#dep_id', baseUrl + '/other/combo_department_all');
    data_dep= []; $('#modal-dep').modal('show');
}

function load_device_dep (){
    var value = $('#dep_id').val();
    $('#list_dep').load(baseUrl + '/qrcode_device/content_dep?id='+value);
}

function selected_device_dep(idh){
    var value = $('#ck_dep_'+idh).is(':checked');
    if(value){
        var sub = $('#sub_'+idh).text(), qty = $('#qty_dep_'+idh).val();
        var str = {'id': idh, 'sub': sub, 'qty': qty};
        data_dep.push(str);
    }else{
        data_dep = data_dep.filter(item => item.id != idh);
    }
}

function set_qty_dep(idh){
    var objIndex = data_dep.findIndex(item => item.id === idh);
    var qty = $('#qty_dep_'+idh).val();
    if(data_dep.length != 0){
        data_dep[objIndex].qty = qty;
    }
}

function print_code_dep(){
    if(data_dep.length != 0){
        $('#datadc_dep').val(JSON.stringify(data_dep));
        save_reject_open('#fm-dep', baseUrl + '/qrcode_device/add_code_dep', baseUrl + '/qrcode_device/code_dep');
    }else{
        show_message("error", "Không có bản ghi nào được chọn");
    }
}