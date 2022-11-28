$(function(){
    $('#list_device').load(baseUrl + '/report_device_detail/content');
});

function select_device(){
    console.log('hi');
    $('#modal-search').modal('show');
}

function search_device(){

}