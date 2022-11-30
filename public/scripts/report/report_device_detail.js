var page_device = 1, keyword_device= '';
$(function(){
    $('#list_device').load(baseUrl + '/report_device_detail/content');
    select_device();
});

function select_device(){
    $('#modal-search').modal('show');
}

function search_device(){

}
//////////////////////////////////////////////////////////////////////////////////////////////////
function set_data(){
    var value = $('#type_data').val();
    if(value == 1){
        $('#data_content').load(baseUrl + '/report_device_detail/list_device');
    }else{

    }
}

function confirm_deviece(idh){

}