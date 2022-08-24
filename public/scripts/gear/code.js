var page = 1, codes = '', titles = '', cates = '', url = '';
let data = [];
$(function(){
    $('#list_gear').load(baseUrl + '/gear_code/content?data='+data);
    $('#cate_s').load(baseUrl + '/other/combo_utensils');
});

function view_page_gear(pages){
    page = pages;
    $('#list_gear').load(baseUrl + '/gear_code/content?page='+page+'&code='+codes+'&title='+titles+'&cate='+cates+'&data='+btoa(data.join(",")));
}

function search(){
    var code= $('#codes').val(), title = $('#titles').val(), cate = $('#cate_s').val();
    if(code.length != 0 || title.length != 0 || cate.length != 0){
        if(title.length != 0){
            titles = title.replaceAll(" ", "$", 'g');
        }
        codes = code; cates = cate;
    }else{
        codes = ''; titles = ''; cates = '';
    }
    $('#list_gear').load(baseUrl + '/gear_code/content?page=1&code='+codes+'&title='+titles+'&cate='+cates+'&data='+btoa(data.join(",")));
}

function set_check(){
    $("input:checkbox[name=checkbox_utensils]:checked").each(function() {
        let val = this.value+'.'+$('#qty_'+this.value).val();
        if(data.indexOf(val) == -1){
            data.push(val);
        }
    });
}

function unchecked_utensils(idh){
    var checked= $('#ck_'+idh).is(':checked'), qty=  $('#qty_'+idh).val();
    let val  = idh+'.'+qty;
    if(checked){
        if(data.indexOf(val) == -1){
            data.push(val);
        }
    }else{
        data = data.filter(item => item !== val);
    }
}

function print_code(){
    if(data.length > 0){
        window.open(baseUrl + '/gear_code/print_code?data='+btoa(data.join(",")));
    }else{
        show_message('error', 'Không có bản ghi nào được chọn');
        return false;
    }
}