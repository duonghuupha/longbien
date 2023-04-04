var page = 1, tungay = '', denngay = '', cate = 0, manu = 0, titles = '';
$(function(){
    tungay = $('#from_date').val(); denngay = $('#to_date').val();
    var data_str = 'tungay='+tungay+'&denngay='+denngay+'&cate='+cate+'&manu='+manu+'&title='+titles;
    $('#list_library').load(baseUrl + '/report_book_loan/content?'+data_str);
    $('#category').load(baseUrl + '/other/combo_book_cate');
    combo_select_2('#manu', baseUrl + '/other/combo_book_manu');
    $('#btn_export').hide();
});

function search(){
    $('#btn_export').show(500);
    tungay = $('#from_date').val(); denngay = $('#to_date').val(); cate = $('#category').val();
    manu = $('#manu').val(); titles = $('#title_book').val();
    var data_str = 'tungay='+tungay+'&denngay='+denngay+'&cate='+cate+'&manu='+manu+'&title='+titles;
    $('#list_library').load(baseUrl + '/report_book_loan/content?'+data_str);
}