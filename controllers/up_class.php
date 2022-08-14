<?php
class Up_class extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('up_class/index');
        require('layouts/footer.php');
    }
}
?>