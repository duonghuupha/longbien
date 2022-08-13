var page = 1, keyword = '', url = baseUrl + '/student_change/add';
$(function(){
    $('#list_change').load(baseUrl + '/student_change/content');
    $('#year_to').load(baseUrl + '/other/combo_years?id='+yearid);
    combo_select2_student('#student_id', baseUrl + '/student_change/student');
});

function set_current_class(){
    var value = $('#student_id').select2('data');
    //console.log(value[0].department_id);
    $('#class_current_id').val(value[0].department_id);
    $('#class_current').val(value[0].department);
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
        if($('#class_current_id').val() != $('#class_to').val()){
            save_reject('#fm', url, baseUrl+'/student_change'); 
        }else{
            show_message("error", "Không thể chuyển học sinh đến lớp hiện tại");
        }
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_change(pages){
    page = pages;
    $('#list_change').load(baseUrl + '/student_change/content?page='+page);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function combo_select2_student(id_select, url_data){
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
                            content: item.content,
                            department_id: item.department_id,
                            department: item.department
                        };
                    })
                };
            }
        },
        templateResult: format_content
    });
}