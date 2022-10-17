var page = 1, url = '', page_user = 1, keyword_user = '';
$(function(){
    $('#list_task').load(baseUrl + '/calendars/content');
});

function add(){
	let today = new Date(), ngay = today.getDate(), thang = (today.getMonth() + 1);
    var nam = today.getFullYear(), hientai = ngay+'-'+thang+'-'+nam; 
    $('#date_study').datepicker('setDate', hientai); $('#modal-cal').modal('show');
	var $userid = $('#user_id').val();
	if($userid.length != 0){
		$('#subject_id').load(baseUrl + '/other/combo_subject_user');
	}
	url = baseUrl + '/calendars/add';
}

function edit(idh){
	$('#modal-cal').modal('show');
	url = baseUrl + '/calendars/update?id='+idh;
}

function del(idh){
	var data_str = "id="+idh;
	del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl+'/calendars/del', '#list_task', baseUrl + '/calendars/content?page='+page+'&title='+titles+'&date='+datestudy+'&lesson='+lessons+'&lesson_export='+lessonexps+'&teacher='+teacher+'&department_id='+department+'&subject_id='+subjects);
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
        save_form_modal('#fm', url, '#modal-cal', '#list_task',  baseUrl + '/calendars/content?page='+page+'&title='+titles+'&date='+datestudy+'&lesson='+lessons+'&lesson_export='+lessonexps+'&teacher='+teacher+'&department_id='+department+'&subject_id='+subjects); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function detail(idh){
	$('#detail').load(baseUrl + '/calendars/detail?id='+idh);
	$('#modal-detail').modal('show');
}

function view_page_task(pages){
	page = pages;
	//$('#list_task').load(baseUrl + '/calendars/content?page='+page+'&title='+titles+'&date='+datestudy+'&lesson='+lessons+'&lesson_export='+lessonexps+'&teacher='+teacher+'&department_id='+department+'&subject_id='+subjects);
}

function search(){
	
}
//////////////////////////////////////////////////////////////////////////////////////////////////////
function select_user(){
	$('#modal-users').modal('show');
	$('#list_users').load(baseUrl+'/calendars/list_user');
	$('#pager').load(baseUrl+'/calendars/list_user_page');
}

function search_user(){
	var value = $('#nav-search-input-user').val();
	if(value.length != 0){
        keyword_user = value.replaceAll(" ", "$", 'g');
    }else{
        keyword_user = '';
    }
	$('#list_users').load(baseUrl+'/calendars/list_user?page=1&q='+keyword_user);
	$('#pager').load(baseUrl+'/calendars/list_user_page?page=1&q='+keyword_user);
}

function view_page_user(pages){
	page_user = pages;
	$('#list_users').load(baseUrl+'/calendars/list_user?page='+page_user+'&q='+keyword_user);
	$('#pager').load(baseUrl+'/calendars/list_user_page?page='+page_user+'&q='+keyword_user);
}

function confirm_user(idh){
	$('#user_id').val(idh); var fullname = $('#fullname_'+idh).text();
	$('#fullname').val(fullname);
	$('#subject_id').load(baseUrl + '/other/combo_subject_user?id='+idh);
	$('#modal-users').modal('hide');
}
///////////////////////////////////////////////////////////////////////////////////////////////
function set_dep(){
	var value = $('#subject_id').val(), user_id = $('#user_id').val();
	$('#department_id').load(baseUrl + '/other/combo_department_user?subjectid='+value+'&userid='+user_id);
}
