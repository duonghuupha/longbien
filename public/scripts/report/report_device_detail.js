var page_device = 1, keyword_device= '';
$(function(){
    $('#list_device').load(baseUrl + '/report_device_detail/content');
    select_device();
});

function select_device(){
    $('#search_device').hide();
    $('#modal-search').modal('show');
}

function search_device(){

}
//////////////////////////////////////////////////////////////////////////////////////////////////
function set_data(){
    var value = $('#type_data').val();
    if(value == 1){
        $('#search_device').show('slow');
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
}

function confirm_deviece(idh){

}