var page = 1, years = '', genders = 0, fullnames = '', data = [];
$(function(){
    $('#department_id').load(baseUrl + '/other/combo_department?yearid='+yearid);
    $('#list_student').load(baseUrl + '/student_change/content');
});

function search(){
    var year = $('#year_s').val(), gender = $('#gender_s').val(), fullname = $('#fullname_s').val();
    if(year.length > 0 || gender.length > 0){
        years = year; genders = gender;
        if(fullname.length > 0){
            fullnames = fullname.replaceAll(" ", "$", 'g');
        }
    }else{
        years = ''; genders = 0; fullnames  = '';
    }
    $('#list_student').load(baseUrl + '/student_change/content?page=1&year='+years+'&gender='+genders+'&fullname='+fullnames);
}

function check_row(idh){
    var value = $('#ck_'+idh).prop("checked");
    if(value){
        $('#ck_'+idh).prop("checked", false);
    }else{
        $('#ck_'+idh).prop("checked", true);
    }
}

function check_list(){
    var classid = $('#department_id').val(), class_title = $('#department_id').select2('data'); 
    if(classid.length  > 0){
        let myArray = (function() {
            let a = [];
            $(".ck_inma:checked").each(function() {
                //var qty = $('#qty_'+this.value).val();
                a.push(this.value);
            });
            return a;
        })()
        if(myArray.length > 0){
            //window.location.href = baseUrl + '/student/print_card?data='+btoa(myArray.join(","));
            var data_str = "data="+btoa(myArray.join(','));
            //del_data(data_str, 'Bạn có chắc chắn muốn phân lớp cho các học sinh đã chọn?', baseUrl + '/student_change/add', "#list_student", baseUrl  + '/student_change/content_class?class_id='+classid);
            $('#title_modal').text("Danh sách học sinh đã chọn để phân vào "+class_title[0].text);
            $('#modal-detail').modal('show');
        }else{
            show_message('error', 'Không có bản ghi nào được chọn');
            return false;
        }
    }else{
        show_message('error', 'Bạn chưa chọn lớp');
        return false;
    }
}