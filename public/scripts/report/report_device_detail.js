var page_device = 1, keyword_device= '';
$(function(){
    $('#list_device').load(baseUrl + '/report_device_detail/content?id=0.0');
});

function select_device(){
    $('#search_device').hide(); $('#device_id').val(0);
    $('#modal-search').modal('show');
}

function search_device(){

}
//////////////////////////////////////////////////////////////////////////////////////////////////
function set_data(){
    var value = $('#type_data').val();
    if(value == 1){
        $('#search_device').show('slow'); $('#device_id').val(0);
        $('#data_content').load(baseUrl + '/report_device_detail/list_device');
    }else{

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