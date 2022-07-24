var page = 1, keyword = '', codes = '', names = '', dates = '';
var classs = '', addresss = '';
$(function(){
    $('#list_student').load(baseUrl + '/student/content_card');
    $('#department_id').load(baseUrl + '/other/combo_department?yearid='+yearid);
    $('#adv').hide(); $('#class_id').load(baseUrl + '/other/combo_department?yearid='+yearid);
});

function view_page_student(pages){
    page = pages;
    $('#list_student').load(baseUrl + '/student/content_card?page='+page+'&q='+keyword);
}

function print_card(){
    let myArray = (function() {
        let a = [];
        $(".ck_inma:checked").each(function() {
            //var qty = $('#qty_'+this.value).val();
            a.push(this.value);
        });
        return a;
    })()
    if(myArray.length > 0){
        window.location.href = baseUrl + '/student/print_card?data='+btoa(myArray.join(","));
    }else{
        show_message('error', 'Không có bản ghi nào được chọn');
        return false;
    }
}

function save(){
    var data = $('#datadc').val(); var data_str = "data="+data;
    //window.open(baseUrl + '/personal/print_print_card?data='+data);
    $('.overlay').show();
    $.ajax({
        type: "POST",
        url: baseUrl + '/student/download_card',
        data: data_str, // serializes the form's elements.
        success: function(data){
            var result = JSON.parse(data);
            if(result.success == true){
                $('.overlay').hide();
                show_message('success', result.msg);
                //$(id_div).load(url_content);
                window.open(baseUrl+'/public/card/tmp/the_hoc_sinh.zip');
                // xoa du lieu the khi xuat file thanh cong
                del_card();
            }else{
                $('.overlay').hide();
                show_message('error', result.msg);
                return false;
            }
        }
    });
}

function adv(){
    var value = $('#adv').is(':visible');
    if(!value){
        $('#adv').show(300);
    }else{
        $('#adv').hide(300);
    }
}

function search_adv(){
    var code= $('#code_s').val(), name = $('#name_s').val(), date = $('#date_s').val();
    var classid = $('#class_id').val(), address = $('#address_s').val();
    if(code.length != 0 || name.length != 0 || date.length != 0 || classid.length != 0 || address.length != 0){
        if(name.length != 0){
            names = name.replaceAll(" ", "$", 'g');
        }
        if(address.length != 0){
            addresss = address.replaceAll(" ", "$", 'g');
        }
        codes = code; dates = date; classs = classid;
        $('#list_student').load(baseUrl + '/student/content_card?code='+codes+'&name='+names+'&date='+dates+'&class='+classs+'&address='+addresss+'&page=1');
    }else{
        codes = ''; dates = ''; classs = ''; names = ''; addresss = ''
        $('#list_student').load(baseUrl + '/student/content_card?code='+codes+'&name='+names+'&date='+dates+'&class='+classs+'&address='+addresss+'&page=1');
    }
}

function del_card(){
    $.ajax({
        type: "POST",
        url: baseUrl + '/student/del_card',
        data: '', // serializes the form's elements.
        success: function(data){
            var result = JSON.parse(data);
            if(result.success == true){
                show_message('success', result.msg);
            }else{
                $('.overlay').hide();
                show_message('error', result.msg);
                return false;
            }
        }
    });
}