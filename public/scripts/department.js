var page = 1, keyword = '', url = baseUrl +'/department/add';
$(function(){
    $('#list_department').load(baseUrl + '/department/content');
    $('#year_id').load(baseUrl + '/other/combo_years');
    $('#physical_id').load(baseUrl + '/other/combo_physical');
    $('#sidebar').removeClass('menu-min');
});

function edit(idh){
    var title = $('#title_'+idh).text(), year = $('#yearid_'+idh).text(), physical = $('#physicalid_'+idh).text();
    $('#year_id').val(year).trigger('change'); $('#physical_id').val(physical).trigger('change');
    $('#title').val(title.trim());
    url = baseUrl + '/department/update?id='+idh;
}

function del(idh){
    var data_str = "id="+idh;
    del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này ?", baseUrl+'/department/del', '#list_department', baseUrl+'/department/content?page='+page+'&q='+keyword);
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
        save_reject('#fm', url,  baseUrl+'/department'); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_department(pages){
    $('#list_department').load(baseUrl + '/department/content?page='+page+'&q='+keyword);
}

function search(){
    var value = $('#nav-search-input').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
        $('#list_department').load(baseUrl + '/department/content?page=1&q='+keyword);
    }else{
        keyword = '';
        $('#list_department').load(baseUrl + '/department/content?page=1&q='+keyword);
    }
}