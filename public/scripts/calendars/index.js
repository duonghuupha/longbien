var page = 1, url = '';
$(function(){
    $('#list_task').load(baseUrl + '/calendars/content');
});

function add(){
	$('#modal-cal').modal('show');
	url = baseUrl + '/calendars/add';
}

function edit(idh){
	$('#modal-cal').modal('show');
	url = baseUrl + '/calendars/update?id='+idh;
}

function del(idh){
	var data_str = "id="+idh;
	del_data(data_str, "Bạn có chắc chắn muốn xóa bản ghi này?", baseUrl+'/calendars/del', '#list_task', baseUrl + '/calendars/content?page='+pgae);
}

function save(){
	
}