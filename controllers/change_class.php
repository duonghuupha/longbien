<?php
class Change_class extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('change_class/index');
        require('layouts/footer.php');
    }
}
?>