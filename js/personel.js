$(function(){
    $('#list_personel').load('personel/content.php');
});

function add(){
    $('#modal-personal').modal('show');
}

function detail(){
    $('#modal-detail').modal('show');
}