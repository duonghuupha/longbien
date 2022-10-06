var page = 1, fullnames = '', semesters = '', subjects = '', departments = '', url = '';
$(function(){
    $('#list_student').load(baseUrl + '/student_point/content');
    $('#subject_id').load(baseUrl + '/other/combo_subject_user');
    $('#department_id').load(baseUrl + '/other/combo_department_user');
});

function view_page_student(pages){
    page = pages;
    $('#list_student').load(baseUrl + '/student_point/content?page='+page+'&semester='+semesters+'&subject='+subjects+'&department='+departments+'&fullname='+fullnames);
}

function view_point(){
    var semester = $('#semester').val(), subject = $('#subject_id').val();
    var department = $('#department_id').val(), fullname = $('#fullnames').val();
    if(subject.length != 0){
        if(fullname.length > 0){
            fullnames = fullname.replaceAll(" ", "$", 'g');
        }else{
            fullnames = '';
        }
        if(department.length != 0){
            departments = department;
        }else{
            departments = '';
        }
        semesters = semester; subjects = subject;
        $('#list_student').load(baseUrl + '/student_point/content?page=1&semester='+semesters+'&subject='+subjects+'&department='+departments+'&fullname='+fullnames);
    }else{
        show_message("error", "Bạn phải chọn môn học");
    }
}

function set_point(idh, seme, sub){
    if(sub != 0){
        $('#info_student').load(baseUrl + '/student_point/info?id='+idh+'&seme='+seme+'&subject='+sub);
        $('#tbody').load(baseUrl + '/student_point/point_of_student?id='+idh+'&seme='+seme+'&subject='+sub)
        $('#studentid').val(idh); $('#semesterid').val(seme); $('#subjectid').val(sub);
        $('#type_point').val(1).trigger('change'); $('#modal-point').modal('show'); 
        var diem = $('#diem1_'+idh).text();
        if(diem.length > 0){
            $('#ly_do').show(); $('#content').attr('required', true);
            url = baseUrl + '/student_point/update';
        }else{
            
            url = baseUrl + '/student_point/add';
        }
    }else{
        show_message("error", "Bạn chưa chọn môn học");
    }
}

function set_update(){
    var value = $('#type_point').val(); var diem = $('#diem'+value).text();
    if(diem.length > 0){
        $('#ly_do').show(); $('#content').attr('required', true);
        url = baseUrl + '/student_point/update';
    }else{
        $('#ly_do').hide(); $('#content').attr('required', false);
        url = baseUrl + '/student_point/add';
    }
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
        save_form_modal('#fm', url, '#modal-point', '#list_student',  baseUrl + '/student_point/content?page=1&semester='+semesters+'&subject='+subjects+'&department='+departments+'&fullname='+fullnames); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}