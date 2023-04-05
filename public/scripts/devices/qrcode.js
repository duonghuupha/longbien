var page = 1; keyword = '', data_dep = [], data = [];
let data_options = [], keyword_dv = '', page_dv = 1;
$(function(){
    $('#list_device').load(baseUrl + '/qrcode_device/content');
});

function view_page_devices(pages){
    page = pages;
    $('#list_device').load(baseUrl + '/qrcode_device/content?page='+page+'&q='+keyword);
    setInterval(function(){
        for(const item of data){
            $('#ck_'+item.id).prop('checked',  true);
            $('#device_'+item.id).val(item.sub).trigger('change');
        }
    }, 200);
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
    setInterval(function(){
        for(const item of data){
            $('#ck_'+item.id).prop('checked',  true);
            $('#device_'+item.id).val(item.sub).trigger('change');
        }
    }, 200);
}
////////////////////////////////////////////////////////////////////////////////////////////////
function selected_device(idh){
    var value = $('#ck_'+idh).is(':checked');
    if(value){
        var sub = $('#device_'+idh).val(), qty = $('#qty_'+idh).val();
        if(sub.length != 0){
            var str = {'id': idh, 'sub': sub, 'qty': qty};
            data.push(str);
        }else{
            $('#ck_'+idh).prop('checked', false);
            show_message("error", "Bạn phải chọn số con của thiết bị trước")
        }
    }else{
        data = data.filter(item => item.id != idh);
    }
}

function set_select_sub_device(idh){
    var sub = $('#device_'+idh).val(), qty = $('#qty_'+idh).val();
    var objIndex = data.findIndex(item => item.id === idh);
    if(objIndex != -1){
        data[objIndex].sub = sub;
        data[objIndex].qty = qty;
    }else{
        var str = {'id': idh, 'sub': sub, 'qty': qty};
        data.push(str);
    }
    $('#ck_'+idh).prop('checked', true);
}

function set_qty(idh){
    var objIndex = data.findIndex(item => item.id === idh);
    var qty = $('#qty_'+idh).val();
    if(qty != 0 && qty.length != 0){
        if(data.length != 0 && objIndex != -1){
            data[objIndex].qty = qty;
        }
    }else{
        show_message("error", "Số lượng tem không thể để trống hoặc bằng 0");
        $('#qty_'+idh).val(1);
    }
}

function print_allcode(){
    if(data.length != 0){
        $('#datadc').val(JSON.stringify(data));
        save_reject_open('#fm', baseUrl + '/qrcode_device/add_code', baseUrl + '/qrcode_device/code');
    }else{
        show_message("error", "Không có bản ghi nào được chọn");
    }
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

/*function selected_device_dep(idh){
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
    if(qty != 0 && qty.length != 0){
        if(data_dep.length != 0 && objIndex != -1){
            data_dep[objIndex].qty = qty;
        }
    }else{
        show_message("error", "Số lượng tem không thể bỏ trống hoặc bằng 0");
        $('#qty_dep_'+idh).val(1);
    }
}*/

function print_code_dep(){
    $('.ck_dep_single:checkbox:checked').map(function(){
        var value = this.value.split('_');
        var sub = $('#sub_'+value[0]+'_'+value[1]).text(), qty = $('#qty_dep_'+value[0]+'_'+value[1]).val();
        var str = {'id': value[0], 'sub': sub, 'qty': qty};
        data_dep.push(str);
    }).get(); 
    if(data_dep.length != 0){
        $('#datadc_dep').val(JSON.stringify(data_dep));
        save_reject_open('#fm-dep', baseUrl + '/qrcode_device/add_code_dep', baseUrl + '/qrcode_device/code_dep');
    }else{
        show_message("error", "Không có bản ghi nào được chọn");
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////
function print_code_options(){
    $('#list_dv').load(baseUrl + '/qrcode_device/list_device');
    $('#modal-option').modal('show');
}

function view_page_dv(pages){
    page_dv = pages;
    $('#list_dv').load(baseUrl + '/qrcode_device/list_device?page='+page_dv+'&q='+keyword_dv);
}

function search(){
    var value = $('#nav-search-dv').val();
    if(value.length != 0){
        keyword_dv = value.replaceAll(" ", "$", 'g');
    }else{
        keyword_dv = '';
    }
    $('#list_dv').load(baseUrl + '/qrcode_device/list_device?page=1&q='+keyword_dv);
}

function select_device(idh){
    var objIndex = data_options.findIndex(item => item.id == idh);
    if(objIndex == -1){
        var str = {"id": idh, "title": $('#title_'+idh).text(), "code": $('#code_'+idh).text(), 
                    "qty": 1, "selected": "", "stock": parseInt($('#stock_'+idh).text()), "type": 0}
        data_options.push(str); render_table(data_options);
        $('#table-device').animate({
            scrollTop: $('#table-device').get(0).scrollHeight
        }, 1500);
    }else{
        show_message("error", "Thiết bị đã được chọn");
    }
}

function render_table(data_json){
    console.log(data_json);
    $('#tbody').empty(); var html = '', j = 1;
    for(var i = 0; i < data_json.length; i++){
        html += '<tr role="row" style="font-size:12px;">';
            html += '<td class="text-center">'+j+'</td>';
            html += '<td class="text-center">'+data_json[i].code+'</td>';
            html += '<td class="text-left">'+data_json[i].title+'</td>';
            html += '<td class="text-left">';
                html += '<input id="select_'+data_json[i].id+'" name="select_'+data_json[i].id+'" class="form-control"';
                html += 'style="width:100%" onkeypress="validates(event)" onchange="change_data('+data_json[i].id+', 0)"/>';
            html += '</td>';
            html += '<td class="text-center">';
                html += '<input id="qtyt_'+data_json[i].id+'" name="qtyt_'+data_json[i].id+'" class="form-control"';
                html += 'style="width:100%;text-align:center" value="'+data_json[i].qty+'" onchange="change_data('+data_json[i].id+', 1)"';
                html += 'onkeypress="validate(event)"/>';
            html += '</td>';
            html += '<td class="text-center">';
                html += '<a href="javascript:void(0)" onclick="del_selected('+data_json[i].id+')">';
                    html += '<i class="fa fa-trash" style="color:red"></i>';
                html += '</a>';
            html += '</td>';
        html += '</tr>';
        j++;
    }
    $('#tbody').append(html);
}

function del_selected(idh){
    data_options = data_options.filter(item => item.id != idh);
    render_table(data_options);
}

function change_data(idh, type){
    var objIndex = data_options.findIndex(item => item.id == idh);
    if(type == 0){ // cap nhat gia tri so con
        var value = $('#select_'+idh).val();
        if(value.includes(',') || value.includes('-')){ // neu ton tai mot trong hai ky tu
            if(value.includes(',') && value.includes('-')){ 
                show_message("error", "Không thể thực hiện in khi có cả hai định dạng mã đặc biệt");
            }else{
                if(value.includes(',')){
                    var number = value.split(",").map(function(item){return parseInt(item, 10)});
                    number = number.filter(function(item){return !Number.isNaN(item)});
                    if(Math.max(...number) > data_options[objIndex].stock || Math.min(...number) == 0){
                        $('#select_'+idh).val('');
                        show_message("error", "Gía trị lớn nhất muốn in vượt quá số lượng tồn kho hoặc giá trị nhỏ nhất muốn in phải là khác 0");
                    }else{
                        data_options[objIndex].selected = value;
                        data_options[objIndex].type = 1; // in ma theo cac so dien vao
                    }
                }else if(value.includes('-')){
                    var number = value.split("-").map(function(item){return parseInt(item, 10)});
                    number = number.filter(function(item){return !Number.isNaN(item)});
                    if(Math.max(...number) > data_options[objIndex].stock || Math.min(...number) == 0){
                        $('#select_'+idh).val('');
                        show_message("error", "Gía trị lớn nhất muốn in vượt quá số lượng tồn kho hoặc giá trị nhỏ nhất muốn in phải là khác 0");
                    }else{
                        data_options[objIndex].selected = value;
                        data_options[objIndex].type = 2;// In ma tuwf dau den dau
                    }
                }else{
                    show_message("error", "Định dạng mã đặc biệt (Số con) không chính xác, vui lòng nhập lại");
                }
            }
        }else{
            show_message("error", "Định dạng mã đặc biệt (Số con) không chính xác, vui lòng nhập lại");
        }
    }else{ // cap nhat gia tri so luong
        var qty = $('#qtyt_'+idh).val();
        data_options[objIndex].qty = qty;
    }
}

function print_code_option(){
    if(data_options.length != 0){
        var allRequired = true;
        for(var i = 0; i < data_options.length; i++){
            if(data_options[i].selected.length == 0){
                allRequired = false;
            }
        }
        if(allRequired){
            $('#datadc_option').val(JSON.stringify(data_options));
            save_reject_open('#fm-option', baseUrl + '/qrcode_device/add_option', baseUrl + '/qrcode_device/code_option');
        }else{
            show_message("error", "Bạn chưa điền đủ thông tin");
        }
    }else{
        show_message("error", "Bạn chưa điền đủ thông tin");
    }
}