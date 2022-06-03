<?php
class Categories extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('categories/index');
        require('layouts/footer.php');
    }
}
?>
