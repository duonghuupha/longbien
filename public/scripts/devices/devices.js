var page = 1, keyword= '', url = '';
$(function(){
    $('#list_device').load(baseUrl + '/devices/content');
});

function add(){
    $('#modal-info').modal('show');
    url = baseUrl + '/devices/add';
}

function edit(idh){
    $('#modal-info').modal('show');
    url = baseUrl + '/devices/update';
}

function del(idh){
    var data_str = "id="+idh;
    del_data(data_str, baseUrl+'/devices/del', '#list_devices', baseUrl + '/devices/content?page='+page+'&q='+keyword);
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
        save_form_modal('#fm', url, '#modal-info', '#list_devices',  baseUrl+'/devices/content?page='+page+'&q='+keyword); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_devices(pages){

}

function search(){

}
/////////////////////////////////////////////////////////////////////////////////////////////
function import_devices(){
    window.location.href = baseUrl + '/devices/import';
}

function detail(idh){
    $('#form').load(baseUrl + '/devices/form_info');
    $('#modal-detail').modal('show');
}