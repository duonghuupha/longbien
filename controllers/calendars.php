<?php
class Calendars extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('calendars/index');
        require('layouts/footer.php');
    }
}
?>
