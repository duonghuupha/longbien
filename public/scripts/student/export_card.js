var page = 1, keyword = '';
$(function(){
    $('#list_student').load(baseUrl + '/student/content_card');
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
            }else{
                $('.overlay').hide();
                show_message('error', result.msg);
                return false;
            }
        }
    });
}
