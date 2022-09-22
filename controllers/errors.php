<?php
class Errors extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('errors/index');
        require('layouts/footer.php');
    }
}
?>