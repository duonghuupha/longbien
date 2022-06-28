var page = 1, keyword = '';

$(function(){
    //$('#list_device').load(baseUrl + '/loans/list_device');
    $('#dynamic-table').DataTable({
        ordering: false,
        lengthChange: false,
        iDisplayLength: 15,
        pagingType: 'full_numbers',
        bFilter: false,
        language:  {
            paginate: {
                first: "",
                last: "",
                next: "",
                previous: ""
            },
            info: 'Hiển thị _START_ đến _END_ của _TOTAL_ bản ghi',
            infoEmpty: 'Hiển thị 0 đến 0 của 0 bản ghi'
        },
    });
    $('#dynamic-table_paginate').addClass('mini'); $('#dynamic-table_info').addClass('mini');
})

function save(){

}

function view_page_device(pages){
    page = pages;
}

function search(){
    
}