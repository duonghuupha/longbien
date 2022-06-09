var page = 1, keyword= '', url = '';
$(function(){
    $('#sidebar').addClass('menu-min');
    $('#list_device_tmp').load(baseUrl + '/devices/content_tmp');
});