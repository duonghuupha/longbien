var url = '', page_level = 1, page_job = 1, page_subject = 1, page_years = 1, page_physical = 1, page_department = 1;
$(function(){
    $('#list_level').load(baseUrl + '/level/content');
    $('#list_job').load(baseUrl + '/job/content');
    $('#list_subject').load(baseUrl + '/subject/content');
    $('#list_years').loas(baseUrl + '/years/content');
});

/**
 * Level
 */
function add_level(){
    $('#form').load(baseUrl + '/level/form');
    $('#modal-form').modal('show');
    url = baseUrl + '/level/add';
}

function edit_level(idh){
    $('#form').load(baseUrl + '/level/form?id='+idh);
    $('#modal-form').modal('show');
    url = baseUrl + '/level/update';
}

function del_level(idh){
    var data_str = "id="+idh;
    del_data(data_str, baseUrl+'/level/del', '#list_level', baseUrl+'/level/content?page='+page_level);
}

function save_level(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', url, '#modal-form', '#list_level',  baseUrl+'/level/content?page='+page_level); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_level(pages){
    page_level = pages;
    $('#list_level').load(baseUrl + '/level/content?page='+page_level);
}

/**
 * Job
 */
 function add_job(){
    $('#form').load(baseUrl + '/job/form');
    $('#modal-form').modal('show');
    url = baseUrl + '/job/add';
}

function edit_job(idh){
    $('#form').load(baseUrl + '/job/form?id='+idh);
    $('#modal-form').modal('show');
    url = baseUrl + '/job/update';
}

function del_job(idh){
    var data_str = "id="+idh;
    del_data(data_str, baseUrl+'/job/del', '#list_job', baseUrl+'/job/content?page='+page_job);
}

function save_job(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', url, '#modal-form', '#list_job',  baseUrl+'/job/content?page='+page_job); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_job(pages){
    page_job = pages;
    $('#list_job').load(baseUrl + '/job/content?page='+page_job);
}

/**
 * Subject
 */
 function add_subject(){
    $('#form').load(baseUrl + '/subject/form');
    $('#modal-form').modal('show');
    url = baseUrl+'/subject/add';
}

function edit_subject(idh){
    $('#form').load(baseUrl + '/subject/form?id='+id);
    $('#modal-form').modal('show');
    url = baseUrl+'/subject/update';
}

function del_subject(idh){
    var data_str = "id="+idh;
    del_data(data_str, baseUrl+'/subject/del', '#list_subject', baseUrl+'/subject/content?page='+page_subject);
}

function save_subject(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', url, '#modal-form', '#list_subject',  baseUrl+'/subject/content?page='+page_subject); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_subject(pages){
    page_subject = pages;
    $('#list_subject').load(baseUrl + '/subject/content?page='+page_subject);
}

/**
 * Years
 */
function add_years(){
    $('#form').load(baseUrl + '/years/form');
    $('#modal-form').modal('show');
    url = baseUrl + '/years/add';
}

function edit_years(idh){
    $('#form').load(baseUrl + '/years/form?id='+idh);
    $('#modal-form').modal('show');
    url = baseUrl + '/years/update';
}

function del_years(idh){
    var data_str = "id="+idh;
    del_data(data_str, baseUrl+'/subject/del', '#list_years', baseUrl+'/years/content?page='+page_years);
}

function save_years(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', url, '#modal-form', '#list_years',  baseUrl+'/years/content?page='+page_years); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_years(pages){
    page_years = pages;
    $('#list_years').load(baseUrl + '/years/content?page='+page_years);
}

/**
 * Physical Room
 */
function add_physical(){
    $('#form').load(baseUrl + '/physical_room/form');
    $('#modal-form').modal('show');
    url = baseUrl + '/physical_room/add';
}

function edit_physical(idh){
    $('#form').load(baseUrl + '/physical_room/form?id='+idh);
    $('#modal-form').modal('show');
    url = baseUrl + '/physical_room/update';
}

function del_physical(idh){
    var data_str = "id="+idh;
    del_data(data_str, baseUrl+'/physical_room/del', '#list_physical', baseUrl+'/physical_room/content?page='+page_physical);
}

function save_physical(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', url, '#modal-form', '#list_physical',  baseUrl+'/physical_room/content?page='+page_physical); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_physical(pages){
    page_physical = pages;
    $('#list_physical').load(baseUrl + '/physical_room/content?page='+page_physical);
}

/**
 * Department
 */

function add_department(){
    $('#modal-department').modal('show');
    url = baseUrl + '/department/add';
}

function update_department(idh){
    $('#id_department').val(idh); var title = $('#titledep_'+idh).text();
    var yearid = $('#yearsid_'+idh).text(), physicalid = $('#physicalid_'+idh).text();
    $('#title_department').val(title); $('#years_id').val(yearid).trigger('change');
    $('#physical_id').val(physicalid).trigger('change');
    $('#modal-department').modal('show');
    url = baseUrl + '/department/update';
}

function del_department(idh){
    var data_str = "id="+idh;
    del_data(data_str, baseUrl+'/department/del', '#list_department', baseUrl+'/department/content?page='+page_department);
}

function save_department(){
    var required = $('input,textarea,select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired){
        save_form_modal('#fm', url, '#modal-department', '#list_department',  baseUrl+'/department/content?page='+page_department); 
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}

function view_page_physical(pages){
    page_department = pages;
    $('#list_department').load(baseUrl + '/department/content?page='+page_department);
}