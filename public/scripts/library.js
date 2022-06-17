$(function(){
    $('.select2').select2();
    $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    $('#sidebar').removeClass('menu-min');
    $('.file_attach').ace_file_input({
        no_file:'Không có file ...',
        btn_choose:'Lựa chọn',
        btn_change:'Thay đổi',
        droppable:false,
        onchange:null,
        thumbnail:true
    });
    $('.input-mask-date').mask('99-99-9999');
});

function style_option(value){
    console.log(value.text);
}

function show_message(icon, msg){
    $.toast({
        heading: 'Thông báo',
        text: msg,
        showHideTransition: 'fade',
        icon: icon,
        position: 'top-right'
    })
}

function formatNumber(n) {
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}

function formatCurrency(input, blur) {
    var input_val = input.val();
    if (input_val === "") { return; }
    var original_len = input_val.length;
    var caret_pos = input.prop("selectionStart");
    if (input_val.indexOf(".") >= 0) {
        var decimal_pos = input_val.indexOf(".");
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);
        left_side = formatNumber(left_side);
        right_side = formatNumber(right_side);
        if (blur === "blur") {
            right_side += "00";
        }
        right_side = right_side.substring(0, 2);
        input_val = left_side + "." + right_side;
    } else {
        input_val = formatNumber(input_val);
        input_val = input_val;
        if (blur === "blur") {
            input_val += ".00";
        }
    }
    input.val(input_val);
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
}

function validate(evt) {
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
        // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

function CurrencyFormatted(amount){
	return amount.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function save_reject(id_form, post_url, url_reject){
    var xhr = new XMLHttpRequest();
    var formData = new FormData($(id_form)[0]);
    $.ajax({
        url: post_url,  //server script to process data
        type: 'POST',
        xhr: function() {
            return xhr;
        },
        data: formData,
        success: function(data){
            var result = JSON.parse(data);
            if(result.success == true){
                window.location.href = url_reject;
            }else{
                show_message('error', result.msg);
                return false;
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
}



function save_form_modal(id_form, post_url, id_modal, id_content, url_refresh){
    var xhr = new XMLHttpRequest();
    var formData = new FormData($(id_form)[0]);
    $.ajax({
        url: post_url,  //server script to process data
        type: 'POST',
        xhr: function() {
            return xhr;
        },
        data: formData,
        success: function(data){
            var result = JSON.parse(data);
            if(result.success == true){
                show_message('success', result.msg);
                $(id_modal).modal('hide');
                $(id_content).load(url_refresh);
            }else{
                show_message('error', result.msg);
                return false;
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
}

function save_form_modal_no_refresh(id_form, post_url, id_modal){
    var xhr = new XMLHttpRequest();
    var formData = new FormData($(id_form)[0]);
    $.ajax({
        url: post_url,  //server script to process data
        type: 'POST',
        xhr: function() {
            return xhr;
        },
        data: formData,
        success: function(data){
            var result = JSON.parse(data);
            if(result.success == true){
                show_message('success', result.msg);
                $(id_modal).modal('hide');
            }else{
                show_message('error', result.msg);
                return false;
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
}

function save_form_reset_form(id_form, post_url, id_content, url_refresh){
    var xhr = new XMLHttpRequest();
    var formData = new FormData($(id_form)[0]);
    $.ajax({
        url: post_url,  //server script to process data
        type: 'POST',
        xhr: function() {
            return xhr;
        },
        data: formData,
        success: function(data){
            var result = JSON.parse(data);
            if(result.success == true){
                show_message('success', result.msg);
                $(id_form).trigger("reset");
                $(id_content).load(url_refresh);
            }else{
                show_message('error', result.msg);
                return false;
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
}

function del_data(str_data, notify, post_url, id_div, url_refresh){
    bootbox.confirm({
        message: notify,
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
                exec_del(str_data, post_url, id_div, url_refresh);
            }
        }
    });
}

function exec_del(data_str, url_data, id_div, url_content){
    $.ajax({
        type: "POST",
        url: url_data,
        data: data_str, // serializes the form's elements.
        success: function(data){
            var result = JSON.parse(data);
            if(result.success == true){
                show_message('success', result.msg);
                $(id_div).load(url_content);
            }else{
                show_message('error', result.msg);
                return false;
            }
        }
    });
}

function update_data(str_data, notify, post_url, reject_url){
    bootbox.confirm({
        message: notify,
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
                exec_del(str_data, post_url, id_div, url_refresh);
            }
        }
    });
}

function exec_del(data_str, url_data, id_div, url_content){
    $.ajax({
        type: "POST",
        url: url_data,
        data: data_str, // serializes the form's elements.
        success: function(data){
            var result = JSON.parse(data);
            if(result.success == true){
                show_message('success', result.msg);
                $(id_div).load(url_content);
            }else{
                show_message('error', result.msg);
                return false;
            }
        }
    });
}

function combo_select2(id_select, url_data){
    $(id_select).select2({
        ajax: {
            url: url_data,
            type: 'POST',
            dataType: 'json',
            data: function (params) {
                return {
                    keyWord: params.term
                };
            },
            processResults: function (data, params) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.title,
                            id: item.id,
                            data: item
                        };
                    })
                };
            }
        }
    });
}

function combo_select2_pagination(id_select, url_data){
    $(id_select).select2({
        ajax: {
            url: url_data,
            type: 'POST',
            dataType: 'json',
            processResults: function (data, params){
                params.page = data.page || 1;
                return {
                    results: $.map(data.rows, function(row){
                        return {
                            text: row.title,
                            id: row.id,
                            content: row.content
                        };
                    }),
                    pagination: {
                        more: (params.page * 10) < data.total
                    }
                };
            },
            cache:true
        },
        templateResult: format_content
    });
}

function format_content(row){
    var $strdata = $(
        '<div>'+row.text+'</div><div style="color:gray">'+row.content+'</div>'
    );
    return $strdata;
}

function url_content(url){
    return $.get(url);
}
