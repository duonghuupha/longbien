var page = 1, keyword= '', url = '';
$(function(){
    $('#list_device').load(baseUrl + '/devices/content');
    $('#cate_id').load(baseUrl + '/other/combo_equipment');
});

function add(){
    var number = Math.floor(Math.random() * 99999999);
    $('#code').val(number);
    $('#modal-info').modal('show');
    url = baseUrl + '/devices/add';
}

function edit(idh){
    $.ajax({
        type: "POST",
        url: baseUrl + '/devices/data_edit',
        data: "id="+idh, // serializes the form's elements.
        success: function(data){
            var result = JSON.parse(data);
            $('#code').val(result.code); $('#title').val(result.title);
            $('#cate_id').val(result.cate_id).trigger('change');
            $('#origin').val(result.origin); $('#price').val(formatNumber(result.price));
            $('#depreciation').val(result.depreciation); $('#year_work').val(result.year_work);
            $('#image_old').val(result.image); $('#description').val(result.description);
        }
    });
    $('#code').attr('readonly', true); $('#modal-info').modal('show');
    url = baseUrl + '/devices/update?id='+idh;
}

function del(idh){
    var data_str = "id="+idh;
    del_data(data_str, 'Bạn có chắc chắn muốn xóa bản ghi này?', baseUrl+'/devices/del', '#list_device', baseUrl + '/devices/content?page='+page+'&q='+keyword);
}

function save(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', url, '#modal-info', '#list_device',  baseUrl+'/devices/content?page='+page+'&q='+keyword); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_devices(pages){
    page = pages;
    $('#list_device').load(baseUrl + '/devices/content?page='+page+'&q='+keyword);
}

function search(){
    var value = $('#nav-search-input').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
        $('#list_device').load(baseUrl + '/devices/content?page=1&q='+keyword);
    }else{
        keyword = '';
        $('#list_device').load(baseUrl + '/devices/content?page=1&q='+keyword);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////
function import_devices(){
    window.location.href = baseUrl + '/devices/import';
}

function detail(idh){
    $('#form').load(baseUrl + '/devices/form_info');
    $('#modal-detail').modal('show');
}