var page = 1; keyword = '';
$(function(){
    $('#list_device').load(baseUrl + '/qrcode_device/content');
});

function view_page_devices(pages){
    page = pages;
    $('#list_device').load(baseUrl + '/qrcode_device/content?page='+page+'&q='+keyword);
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
}

function print_code(){
    let myArray = (function() {
        let a = [];
        $(".ck_inma:checked").each(function() {
            var qty = $('#qty_'+this.value).val();
            a.push(this.value+'.'+qty);
        });
        return a;
    })()
    if(myArray.length > 0){
        window.open(baseUrl + '/qrcode_device/print_code?data='+btoa(myArray.join(",")));
    }else{
        show_message('error', 'Không có bản ghi nào được chọn');
        return false;
    }
}