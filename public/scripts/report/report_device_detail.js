var page_device = 1, keyword_device= '';
$(function(){
    $('#list_device').load(baseUrl + '/report_device_detail/content?id=0.0');
    combo_select_2('#physical_id', baseUrl+'/report_device_detail/combo_department', 0, '');
});

function select_device(){
    $('#type_data').val('').trigger('change');
    $('#search_device').hide(); $('#device_id').val(0);
    $('#select_dep').hide(); $('#select_dev').hide(); $('#data_content').hide();
    $('#modal-search').modal('show');
}
//////////////////////////////////////////////////////////////////////////////////////////////////
function set_data(){
    var value = $('#type_data').val(); console.log(value);
    if(value == 1){
        $('#search_device').show('slow'); $('#device_id').val(0);
        $('#select_dep').hide(); $('#select_dev').hide(); $('#data_content').show();
        $('#data_content').load(baseUrl + '/report_device_detail/list_device');
    }else{
        $('#search_device').hide('slow'); $('#device_id').val(0);
        $('#select_dep').show(); $('#select_dev').show();
        $('#data_content').hide();
        combo_select_2('#physical_id', baseUrl+'/report_device_detail/combo_department', 0, '');
    }
}

function view_page_device(pages){
    page_device = pages;
    $('#data_content').load(baseUrl + '/report_device_detail/list_device?page='+page_device+'&q='+keyword_device);
}

function search_device(){
    keyword_device = ($('#nav-search-input-device').length != 0) ? $('#nav-search-input-device').val().replaceAll(" ", "$", 'g') : '';
    $('#data_content').load(baseUrl + '/report_device_detail/list_device?page=1&q='+keyword_device);
}

function confirm_device(idh){
    var value = $('#device_'+idh).val();
    $('#device_id').val(idh+'.'+value); $('#modal-search').modal('hide');
    $('#list_device').load(baseUrl + '/report_device_detail/content?id='+idh+'.'+value);
}

function set_device(value){
    combo_select_2('#device_s', baseUrl + '/report_device_detail/combo_devices?physicalid='+value);
}

function set_ho_so(){
    var value= $('#device_s').val(); 
    if(value.length != 0){
        $('#modal-search').modal('hide');
        $('#list_device').load(baseUrl + '/report_device_detail/content?id='+value);
    }
}