var  page = 1, keyword = '', data = [], data_del = [], data_delu = [];
$(function(){
    $('#sidebar').addClass('menu-min');
    var week = $('#week').val();
    $('#list_users').load(baseUrl + '/weekly/content_user');
    $('#weekly').load(baseUrl  + '/weekly/content?week='+week+'&data=&del=&delu=');
});

function view_page_users(pages){
    page = pages;
    $('#list_users').load(baseUrl + '/weekly/content_user?page='+page+'&q='+keyword);
}

function search(){
    var value = $('#nav-search-input').val();
    if(value.length != 0){
        keyword = value.replaceAll(" ", "$", 'g');
        $('#list_users').load(baseUrl + '/weekly/content_user?page=1&q='+keyword);
    }else{
        keyword = '';
        $('#list_users').load(baseUrl + '/weekly/content_user?page=1&q='+keyword);
    }
}

function selected_user(idh){
    var value = $('#ckuser_'+idh).is(":checked");
    if(value){
        data.push(idh);
    }else{
        data = data.filter(item => item !== idh);
    }
    var week = $('#week').val();
    $('#weekly').load(baseUrl  + '/weekly/content?week='+week+'&data='+btoa(data.join(","))+'&del='+btoa(data_del.join(","))+'&delu='+btoa(data_delu.join(",")));
}

function set_content(){
    var week = $('#week').val();
    $('#weekly').load(baseUrl  + '/weekly/content?week='+week+'&data='+btoa(data.join(","))+'&del='+btoa(data_del.join(","))+'&delu='+btoa(data_delu.join(",")));
}

function del(idh){
    var value = $('#ck_'+idh).is(":checked");
    if(value){
        data_del.push(idh);
    }else{
        data_del = data_del.filter(item => item !== idh);
    }
    var week = $('#week').val();
    $('#weekly').load(baseUrl  + '/weekly/content?week='+week+'&data='+btoa(data.join(","))+'&del='+btoa(data_del.join(","))+'&delu='+btoa(data_delu.join(",")));
}

function delu(idh, type){
    var value = $('#cku_'+idh+'_'+type).is(":checked"); var val = $('#cku_'+idh+'_'+type).val();
    if(value){
        data_delu.push(val);
    }else{
        data_delu = data_delu.filter(item => item !== val);
    }
    var week = $('#week').val(); //console.log(data_delu);
    $('#weekly').load(baseUrl  + '/weekly/content?week='+week+'&data='+btoa(data.join(","))+'&del='+btoa(data_del.join(","))+'&delu='+btoa(data_delu.join(",")));
}

function export_pdf(){
    var week = $('#week').val();
    window.open(baseUrl + '/weekly/export_pdf?week='+week);
}
