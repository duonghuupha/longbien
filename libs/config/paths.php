<?php
define('URL', 'http://'.$_SERVER['HTTP_HOST']);
define('URL_OUT', 'http://longbiensearch:81');
$dirtionary = realpath($_SERVER['DOCUMENT_ROOT']);
define('DIR_UPLOAD', $dirtionary.'/public');
define('DIR_BASIC', $dirtionary);
?>
