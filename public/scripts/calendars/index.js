var page = 1, url = '', page_user = 1, keyword_user = '';
var titles = '', datestudy = '', lessons = 0, lessonexps = '', teacher = '';
$(function(){
    $('#list_task').load(baseUrl + '/calendars/content');
	$('#department_id').load(baseUrl + '/other/combo_department?yearid='+yearid);
	$('#lesson_search').val(lessons).trigger('change');
});

function add(){
	$('#user_id').val(null); $('#fullname').val(null);
	let today = new Date(), ngay = today.getDate(), thang = (today.getMonth() + 1);
    var nam = today.getFullYear(), hientai = ngay+'-'+thang+'-'+nam; 
    $('#date_study').datepicker('setDate', hientai); $('#lesson_id').val(null); $('#subjectid').val(null);
	$('.title_lesson').text(''); $('.title_subject').text(''); $('#lesson_export').val(null);
	$('#department_id').val(null).trigger('change'); $('#lesson').attr("required", true);
	$('#subject_id').attr('required', true); $('#code').val(null); $('#lesson').val(null).trigger('change');
	$('#subject_id').val(null).trigger('change');
	$('#modal-cal').modal('show');
	url = baseUrl + '/calendars/add';
}

function edit(idh){
	$.getJSON(baseUrl + '/calendars/data_edit?id='+idh, function(data){
		$('#user_id').val(data.user_id); $('#fullname').val(data.fullname); $('#date_study').datepicker('setDate', data.date_study);
		$('#department_id').val(data.department_id).trigger('change'); 
		$('#lesson').load(baseUrl + '/calendars/combo_lesson?id='+data.department_id+'&date_study='+data.date_study+'&lesson_id='+data.lesson);
		$('#lesson_export').val(data.lesson_export); $('#lesson').attr("required", false); $('#subject_id').attr('required', false);
		$('#title').val(data.title); $('#subject_id').load(baseUrl + '/calendars/combo_subject?userid='+data.user_id);
		$('#lesson_id').val(data.lesson); $('#subjectid').val(data.subject_id); $('#code').val(data.code);
		$('.title_lesson').text("Tiết học đã chọn: Tiết "+data.lesson); $('.title_subject').text("Môn học đã chọn: "+data.subject);
	});
	$('#modal-cal').modal('show');
	url = baseUrl + '/calendars/update?id='+idh;
}

function del(idh){
	var data_str = "id="+idh;
	del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl+'/calendars/del', '#list_task', baseUrl + '/calendars/content?page='+page+'&title='+titles+'&date='+datestudy+'&lesson='+lessons+'&lesson_export='+lessonexps+'&teacher='+teacher);
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
        save_form_modal('#fm', url, '#modal-cal', '#list_task',  baseUrl + '/calendars/content?page='+page+'&title='+titles+'&date='+datestudy+'&lesson='+lessons+'&lesson_export='+lessonexps+'&teacher='+teacher); 
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
	$('#list_task').load(baseUrl + '/calendars/content?page='+page+'&title='+titles+'&date='+datestudy+'&lesson='+lessons+'&lesson_export='+lessonexps+'&teacher='+teacher);
}

function search(){
	var title = $('#title_search').val(), date = $('#date_search').val();
	var lesson_search = $('#lesson_search').val(), lesson_export = $('#lessonexport').val();
	var giaovien = $('#teacher').val();
	if(title.length != 0 || date.length != 0 || lesson_export.length != 0 || giaovien.length != 0
		|| lesson_search != 0){
		if(title.length != 0){
			titles = title.replaceAll(" ", "$", 'g');
		}else{
			titles = '';
		}
		if(giaovien.length != 0){
			teacher = giaovien.replaceAll(" ", "$", 'g');
		}else{
			teacher = '';
		}
		datestudy = date; lessonexps = lesson_export; lessons = lesson_search;
	}else{
		titles = ''; datestudy = ''; lessons = 0; lessonexps = ''; teacher = '';
	}
	$('#list_task').load(baseUrl + '/calendars/content?page=1&title='+titles+'&date='+datestudy+'&lesson='+lessons+'&lesson_export='+lessonexps+'&teacher='+teacher);
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
	// set gia tri cho combo mon hoc//
	$('#subject_id').load(baseUrl + '/calendars/combo_subject?userid='+idh);
	$('#modal-users').modal('hide');
}

function set_lesson(){
	var value = $('#department_id').val(), date_study = $('#date_study').val();
	if(date_study.length != 0){
		$('#lesson').load(baseUrl + '/calendars/combo_lesson?id='+value+'&date_study='+date_study);
	}else{
		show_message("error", "Bạn chưa chọn ngày dạy");
		return false;
	}
}

function del_date_study(){
	$('#date_search').datepicker('setDate', '');
}