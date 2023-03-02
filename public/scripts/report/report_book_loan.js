var page = 1, type_data = 1;
$(function(){
    $('#type_data').val(type_data).trigger('change');
    $('#category, #date_option, #month_year, #year').hide();
});

function set_type_data(value){
    if(value = 1){
        return true;
    }else if(value == 2){
        $('#category').show();
    }
}