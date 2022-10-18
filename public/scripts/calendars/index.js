var page = 1, url = '', page_user = 1, keyword_user = '';
$(function(){
    $('#list_task').load(baseUrl + '/calendars/content');
});

function add(){
	let today = new Date(), ngay = today.getDate(), thang = (today.getMonth() + 1);
    var nam = today.getFullYear(), hientai = ngay+'-'+thang+'-'+nam; 
    $('#date_study').datepicker('setDate', hientai); $('#modal-cal').modal('show');
	var $userid = $('#user_id').val(); $('#lesson_export').val(''); $('#title').val('');  
	$('#subject_id').val(null).trigger('change'); $('#department_id').val(null).trigger('change');
	combo_select_2('#lesson', baseUrl + '/calendars/combo_lesson', 0, ''); $('#lesson').val(null).trigger('change');
	if($userid.length != 0){
		combo_select_2('#subject_id', baseUrl + '/other/combo_subject_user', 0, '');
	}
	url = baseUrl + '/calendars/add';
}

function edit(idh){
	$.getJSON(baseUrl + '/calendars/data_edit?id='+idh, function(data){
		$('#user_id').val(data.user_id); $('#fullname').val(data.fullname);
		$('#date_study').datepicker('setDate', data.date_study); $('#code').val(data.code);
		combo_select_2('#subject_id', baseUrl + '/other/combo_subject_user?id='+data.user_id, data.subject_id, data.subject);
		combo_select_2('#department_id', baseUrl + '/other/combo_department_user?id='+data.subject_id+'&userid='+data.user_id, data.department_id, data.department);
		combo_select_2('#lesson', baseUrl + '/calendars/combo_lesson?id='+data.department_id+'&date_study='+data.date_study+'&lesson_id='+data.lesson, data.lesson, 'Tiết '+data.lesson);
		$('#lesson_export').val(data.lesson_export); $('#title').val(data.title);
	});
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
        save_form_modal('#fm', url, '#modal-cal', '#list_task',  baseUrl + '/calendars/content?page='+page); 
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
	combo_select_2('#department_id', baseUrl + '/other/combo_department_user?id='+value+'&userid='+user_id, 0, '');
}

function set_lesson(){
	var value = $('#department_id').val(), date_study = $('#date_study').val(); 
	if(date_study.length != 0){
		combo_select_2('#lesson', baseUrl + '/calendars/combo_lesson?id='+value+'&date_study='+date_study, 0, '');
	}else{
		show_message("error", "Bạn chưa chọn ngày dạy");
		return false;
	}
}
