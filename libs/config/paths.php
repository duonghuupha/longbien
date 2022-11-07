<?php
session_start();
define('URL', 'http://'.$_SERVER['HTTP_HOST']);
define('URL_OUT', 'http://search.longbien');
$dirtionary = realpath($_SERVER['DOCUMENT_ROOT']);
define('DIR_UPLOAD', $dirtionary.'/public');
define('DIR_BASIC', $dirtionary);
?>
