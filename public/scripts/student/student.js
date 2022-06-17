var page = 1, keyword = '', url = '';
$(function(){
    $('#list_student').load(baseUrl + '/student/content');
    $("#tabs").tabs();
});

function add(){
    $('#modal-student').modal('show');
    url = baseUrl + '/student/add'
}

function edit(idh){
    $('#modal-student').modal('show');
    url = baseUrl + '/student/update'
}

function del(idh){

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
        save_form_modal('#fm', url, '#modal-student', '#list_student',  baseUrl+'/student/content?page='+page+'&q='+keyword); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_student(pages){
    page = pages;
    $('#list_student').load(baseUrl + '/student/content?page='+pages+'&q='+keyword);
}

function search(){
    var value = $('#table_search').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
        $('#list_student').load(baseUrl + '/student/content?page=1&q='+keyword);
    }else{
        keyword = '';
        $('#list_student').load(baseUrl + '/student/content?page=1&q='+keyword);
    }
}
//////////////////////////////////////////////////////////////////////////////////////////
function detail(){

}