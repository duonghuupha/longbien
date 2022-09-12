var page = 1, url = '', page_user = 1, keyword_user = '';
var titles = '', datestudy = '', lessons = 0, lessonexps = '', teacher = '', department = '', subjects = '';
var page_device = 1, keyword_device = '', datadc = [], page_gear = 1, keyword_gear = '', page_department = 1, keyword_department = '';
$(function(){
    $('#list_task').load(baseUrl + '/calendars/content');
	$('#department_id').load(baseUrl + '/other/combo_department?yearid='+yearid);
	$('#lesson_search').val(lessons).trigger('change');
	$('#class_search').load(baseUrl + '/other/combo_department?yearid='+yearid);
	$('#subject_search').load(baseUrl + '/other/combo_subject_point');
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
	var result = $('#datadc_'+idh).text(); datadc = JSON.parse(result); render_table(datadc);
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
		if(datadc.length > 0){
			$('#datadc').val(JSON.stringify(datadc));
		}else{
			$('#datadc').val(null);
		}
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
	$('#list_task').load(baseUrl + '/calendars/content?page='+page+'&title='+titles+'&date='+datestudy+'&lesson='+lessons+'&lesson_export='+lessonexps+'&teacher='+teacher+'&department_id='+department+'&subject_id='+subjects);
}

function search(){
	var title = $('#title_search').val(), date = $('#date_search').val(); departments = $('#class_search').val();
	var lesson_search = $('#lesson_search').val(), lesson_export = $('#lessonexport').val(), subject = $('#subject_search').val();
	var giaovien = $('#teacher').val();
	if(title.length != 0 || date.length != 0 || lesson_export.length != 0 || giaovien.length != 0
		|| lesson_search != 0 || departments.length != 0 || subject.length != 0){
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
		datestudy = date; lessonexps = lesson_export; lessons = lesson_search; department = departments; subjects  = subject;
	}else{
		titles = ''; datestudy = ''; lessons = 0; lessonexps = ''; teacher = ''; department = ''; subjects = '';
	}
	$('#list_task').load(baseUrl + '/calendars/content?page=1&title='+titles+'&date='+datestudy+'&lesson='+lessons+'&lesson_export='+lessonexps+'&teacher='+teacher+'&department_id='+department+'&subject_id='+subjects);
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

function del_department(){
	$('#class_search').val(null).trigger('change');
}

function del_subject(){
	$('#subject_search').val(null).trigger('change');
}
///////////////////////////////////////////////////////////////////////////////////////////////
function select_device(){
	$('#list_device').load(baseUrl + '/calendars/list_device'); 
    $('#pager_device').load(baseUrl + '/calendars/list_device_page');
	$('#modal-device').modal('show');
}

function view_page_devices(pages){
	page_device = pages;
	$('#list_device').load(baseUrl + '/calendars/list_device?page='+page_device+'&q='+keyword_device); 
    $('#pager_device').load(baseUrl + '/calendars/list_device_page?page='+page_device+'&q='+keyword_device);
}

function search_device(){
	var value = $('#nav-search-input-device').val();
    if(value.length != 0){
        keyword_device = value.replaceAll(" ", "$", 'g');
    }else{
        keyword_device = '';
    }
    $('#list_device').load(baseUrl + '/calendars/list_device?page=1&q='+keyword_device); 
    $('#pager_device').load(baseUrl + '/calendars/list_device_page?page=1&q='+keyword_device);
}

function confirm_devices(idh){
	var value = $('#device_'+idh).val(), title = $('#title_'+idh).text();
    var str = {'id': idh+'.'+value, 'title': title, 'sub': value, 'type' : 1};
    var objIndex = datadc.findIndex(item => item.id === idh+'.'+value && item.type === 1);
    if(objIndex != -1){
        show_message("error", "Thiết bị đã được chọn, không thể chọn lại");
        return false;
    }else{
        datadc.push(str);
        render_table(datadc); $('#modal-device').modal('hide');
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////
function select_gear(){
	$('#list_gear').load(baseUrl + '/calendars/list_gear');
    $('#pager_gear').load(baseUrl + '/calendars/list_gear_page');
	$('#modal-gear').modal('show');
}

function view_page_gear(pages){
    page_gear = pages;
    $('#list_gear').load(baseUrl + '/calendars/list_gear?page='+page_gear+'&q='+keyword_gear);
    $('#pager_gear').load(baseUrl +'/calendars/list_gear_page?page='+page_gear+'&q='+keyword_gear);
}

function search_gear(){
    var value = $('#nav-search-input-gear').val();
    if(value.length != 0){
        keyword_gear = value.replaceAll(" ", "$", 'g');
    }else{
        keyword_gear = '';
    }
    $('#list_gear').load(baseUrl + '/calendars/list_gear?page=1&q='+keyword_gear);
    $('#pager_gear').load(baseUrl +'/calendars/list_gear_page?page=1&q='+keyword_gear);
}

function confirm_gear(idh){
    var value = $('#gear_'+idh).val(), title = $('#title_'+idh).text();
    var str = {'id': idh+'.'+value, 'title': title, 'sub': value, 'type': 2};
    var objIndex = datadc.findIndex(item => item.id === idh+'.'+value && item.type === 2);
    if(objIndex != -1){
        show_message("error", "Đồ dùng đã được chọn, không thể chọn lại");
        return false;
    }else{
        datadc.push(str);
        render_table(datadc); $('#modal-gear').modal('hide');
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function select_department(){
	$('#list_department').load(baseUrl + '/calendars/list_department');
	$('#pager_department').load(baseUrl + '/calendars/list_department_page');
	$('#modal-department').modal('show');
}

function view_page_department(pages){
	page_department = pages;
	$('#list_department').load(baseUrl + '/calendars/list_department?page='+page_department+'&q='+keyword_department);
	$('#pager_department').load(baseUrl + '/calendars/list_department_page?page='+page_department+'&q='+keyword_department);
}

function search_department(){
	var value = $('#nav-search-input-department').val();
    if(value.length != 0){
        keyword_department = value.replaceAll(" ", "$", 'g');
    }else{
        keyword_department = '';
    }
    $('#list_department').load(baseUrl + '/calendars/list_department?page=1&q='+keyword_department);
	$('#pager_department').load(baseUrl + '/calendars/list_department_page?page=1&q='+keyword_department);
}

function confirm_department(idh){
	var title = $('#title_'+idh).text();
	var str = {'id': idh, 'title': title, 'sub': 0, 'type': 3};
    var objIndex = datadc.findIndex(item => item.id === idh && item.type === 3);
    if(objIndex != -1){
        show_message("error", "Phòng chức năng đã được chọn, không thể chọn lại");
        return false;
    }else{
        datadc.push(str);
        render_table(datadc); $('#modal-department').modal('hide');
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////
function render_table(data_json){
	$('#list_prepare').empty(); var html = '';
	for(var i = 0; i < data_json.length; i++){
		html += '<li>';
			if(data_json[i].type ==  1){
				html += '<i class="ace-icon fa fa-cubes bigger-110 purple"></i>';
			}else if(data_json[i].type == 2){
				html += '<i class="ace-icon fa fa-flask bigger-110 green"></i>';
			}else{
				html += '<i class="ace-icon fa fa-gamepad bigger-110 blue"></i>';
			}
			html += ' '+data_json[i].title+' - '+data_json[i].sub;
			html += ' <a href="javascript:void(0)" onclick="del_select('+data_json[i].id+', '+data_json[i].type+')">';
				html += '<i class="fa fa-trash" style="color:red"></i>';
			html += '</a>';
		html += '</li>';
	}
	$('#list_prepare').append(html);
}

function del_select(idh, type){
	var objIndex = datadc.findIndex(item => item.id === idh.toString() && item.type === type);
	datadc.splice(objIndex, 1); render_table(datadc);
}
