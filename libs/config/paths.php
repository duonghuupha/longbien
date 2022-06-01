<?php
session_start();
define('URL', 'http://'.$_SERVER['HTTP_HOST'].'/longbien');
$dirtionary = realpath($_SERVER['DOCUMENT_ROOT']);
define('DIR_UPLOAD', $dirtionary.'/longbien/public');;
?>
