var page = 1, codes = '', names = '', dates = '', departments = '', addresss = '';
var genders = 0, peoples = '', religions = 0, codecsdls = '', sstatus = 1;
$(function(){
    $('#list_student').load(baseUrl + '/report_student/content');
});

function view_page_student(pages){
    page = pages;
    $('#list_student').load(baseUrl + '/report_student/content?code='+codes+'&name='+names+'&date='+dates+'&class='+departments+'&address='+addresss+'&gender='+genders+'&people='+peoples+'&religion='+religions+'&codecsdl='+codecsdls+'&page='+page+'&status='+sstatus);
}

function filter(){
    combo_select_2('#sdepartment', baseUrl + '/other/combo_department?yearid='+yearid);
    combo_select_2('#speople',  baseUrl + '/other/combo_people');
    $('#modal-search').modal('show');
}

function search(){
    codes= ($('#scode').val().length != 0) ? $('#scode').val() : '';
    names = ($('#sfullname').val().length != 0) ? $('#sfullname').val().replaceAll(" ", "$", 'g') : ''; 
    dates = ($('#sbirthday').val().length != 0) ? $('#sbirthday').val() : ''; 
    sstatus = $('#sstatus').val(); departments = ($('#sdepartment').val().length != 0) ? $('#sdepartment').val() : ''; 
    addresss = ($('#saddress').val().length != 0) ? $('#saddress').val().replaceAll(" ", "$", 'g') : '';  
    genders = $('#sgender').val();
    peolpes = ($('#speople').val().length != '') ? $('#speople').val() : ''; 
    religions = $('#sreligion').val(); 
    codecsdls = ($('#scodecsdl').val() != '') ? $('#scodecsdl').val() : '';
    $('#modal-search').modal('hide');
    $('#list_student').load(baseUrl + '/report_student/content?code='+codes+'&name='+names+'&date='+dates+'&class='+departments+'&address='+addresss+'&gender='+genders+'&people='+peoples+'&religion='+religions+'&codecsdl='+codecsdls+'&page=1'+'&status='+sstatus);
}

function export_xlsx(){
    window.open(baseUrl + '/report_student/export_xlsx?code='+codes+'&name='+names+'&date='+dates+'&class='+departments+'&address='+addresss+'&gender='+genders+'&people='+peoples+'&religion='+religions+'&codecsdl='+codecsdls+'&status='+sstatus);
}