var page = 1;
$(function(){
    combo_select_2('#department_id', baseUrl + '/other/combo_department_all');
});

function set_data(){
    var value = $('#department_id').val();
    $.getJSON(baseUrl + '/report_device_dep/return_title?id='+value, function(data){
        $('#title_data').text('Danh sách trang thiết bị - '+data);
    });
    $('#list_device').load(baseUrl + '/report_device_dep/content?id='+value);
}

function view_page_device(pages){
    page = pages;
    $('#list_device').load(baseUrl + '/report_device_dep/content?page='+page+'&id='+value);
}

function export_xlsx(){
    var value = $('#department_id').val();
    if(value.length != 0){
        window.open(baseUrl + '/report_device_dep/export_xlsx?id='+value);
    }else{
        show_message("error", "Chưa chọn phòng ban");
    }
}

function print_report(){
    var value = $('#department_id').val();
    if(value.length != 0){
        window.open(baseUrl + '/report_device_dep/print_report?id='+value);
    }else{
        show_message("error", "Chưa chọn phòng ban");
    }
}