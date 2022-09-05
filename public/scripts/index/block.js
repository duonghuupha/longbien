$(function(){
    $('#block_one').load(baseUrl + '/dashboard/block_one');
    $('#block_two').load(baseUrl + '/dashboard/block_two?id=1');
});

function reload_block_two(value){
    $('#block_two').load(baseUrl + '/dashboard/block_two?id='+value);
}