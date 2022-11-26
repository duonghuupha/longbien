var url = baseUrl + '/change_device/add', page = 1, keyword = '';
$(function(){
    $('#list_change').load(baseUrl + '/change_device/content');
    combo_select_2('#physical_from_id', baseUrl + '/other/combo_physical', 0, '');
    combo_select_2('#physical_to_id', baseUrl + '/other/combo_physical', 0, '');
});

function save(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        var from = $('#physical_from_id').val(), to = $('#physical_to_id').val();
        if(from == to){
            show_message("error", "Không thể luân chuyển thiết bị đến cùng phòng");
        }else{
            save_reject('#fm', baseUrl + '/change_device/add', baseUrl + '/change_device');
        }
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_change(pages){
    page = pages;
    $('#list_change').load(baseUrl + '/change_device/content?page='+page+'&q='+keyword);
}

function search(){
    var value = $('#nav-search-input').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
    }else{
        keyword = '';
    }
    $('#list_change').load(baseUrl + '/change_device/content?page=1&q='+keyword);
}

function set_device(){
    var value = $('#physical_from_id').val();
    combo_select_2('#device_id', baseUrl + '/change_device/list_device?id='+value);
}

function check_dep_to(){
    var from_dep = $('#physical_from_id').val(), to_dep = $('#physical_to_id').val();
    if(from_dep == to_dep){
        show_message("error", "KHông thể luân chuyển thiết bị đến cùng phòng");
        $('#physical_to_id').val(null).trigger('change');
    }
}

function approval(idh){
    $('#detail').load(baseUrl + '/change_device/detail?id='+idh);
    $('#modal-detail').modal('show');
}

function app_change(idh){
    $('#modal-detail').modal('hide');
    bootbox.confirm({
        message: "Bạn cố chắc chắn muốn duyệt đề nghị luân chuyển này.Khi duyệt yêu cầu thiết bị sẽ được luân chuyển sang phòng được đề nghị",
        buttons:{
            confirm: {
                label: "Đồng ý",
                className: "btn-danger btn-sm"
            },
            cancel: {
                label: "Không đồng ý",
                className: "btn-primary btn-sm"
            }
        },
        callback: function(result){
            if(result){
                var data_str = "id="+idh+"&type=1";
                exec_del(data_str, baseUrl+'/change_device/approval', '#list_change', baseUrl+'/change_device/content?page='+page+'&q='+keyword);
            }else{
                var data_str = "id="+idh+"&type=2";
                exec_del(data_str, baseUrl+'/change_device/approval', '#list_change', baseUrl+'/change_device/content?page='+page+'&q='+keyword);
            }
        }
    });
}