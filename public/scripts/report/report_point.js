var page = 1, fullnames = '', semesters = 1, subjects = '', departments = '';
$(function(){
    $('#list_student').load(baseUrl + '/report_point/content');
    combo_select_2('#subject_id', baseUrl + '/other/combo_subject_user');
});

function set_dep(){
    var value = $('#subject_id').val();
    combo_select_2('#department_id', baseUrl + '/other/combo_department_user?id='+value);
}

function view_point(){
    semesters = ($('#semester').val().length != 0) ? $('#semester').val() : 1;
    subjects = ($('#subject_id').val().length != 0) ? $('#subject_id').val() : '';
    departments = ($('#department_id').val().length != 0) ? $('#department_id').val() : '';
    fullnames = ($('#fullnames').val().length != 0) ? $('#fullnames').val().replaceAll(" ", "$", 'g') : ''
    if(subjects.length != 0){
        $('#list_student').load(baseUrl + '/report_point/content?page=1&semester='+semesters+'&subject='+subjects+'&department='+departments+'&fullname='+fullnames);
    }else{
        show_message("error", "Bạn phải chọn môn học");
    }
}

function view_page_student(pages){
    page = pages;
    $('#list_student').load(baseUrl + '/report_point/content?page='+page+'&semester='+semesters+'&subject='+subjects+'&department='+departments+'&fullname='+fullnames);
}

function export_xlsx(){
    semesters = ($('#semester').val().length != 0) ? $('#semester').val() : 1;
    subjects = ($('#subject_id').val().length != 0) ? $('#subject_id').val() : '';
    departments = ($('#department_id').val().length != 0) ? $('#department_id').val() : '';
    fullnames = ($('#fullnames').val().length != 0) ? $('#fullnames').val().replaceAll(" ", "$", 'g') : ''
    if(subjects.length != 0){
        window.open(baseUrl + '/report_point/export_xlsx?semester='+semesters+'&subject='+subjects+'&department='+departments+'&fullname='+fullnames);
    }else{
        show_message("error", "Bạn phải chọn môn học");
    }
}

function export_csdl(){
    semesters = ($('#semester').val().length != 0) ? $('#semester').val() : 1;
    subjects = ($('#subject_id').val().length != 0) ? $('#subject_id').val() : '';
    departments = ($('#department_id').val().length != 0) ? $('#department_id').val() : '';
    fullnames = ($('#fullnames').val().length != 0) ? $('#fullnames').val().replaceAll(" ", "$", 'g') : ''
    if(subjects.length != 0){
        window.open(baseUrl + '/report_point/export_csdl?semester='+semesters+'&subject='+subjects+'&department='+departments+'&fullname='+fullnames);
    }else{
        show_message("error", "Bạn phải chọn môn học và lớp học");
    }
}