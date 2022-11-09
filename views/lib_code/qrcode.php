<?php
$data = URL_OUT.'/qrcode?data='.$_REQUEST['data'];
QRcode::png($data);
?>