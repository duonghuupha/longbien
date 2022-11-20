var page = 1;
$(function(){
    $('#list_return').load(baseUrl + '/report_device_return/content');
});

function filter(){
    $('#modal-search').modal('show');
}

function search(){

}

function view_page_repair(pages){
    page = pages;
}

function export_xlsx(){
    
}