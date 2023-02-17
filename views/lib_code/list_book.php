<?php
$html = $_REQUEST['callback'].'([';
foreach($this->jsonObj as $row){
    $array[] = '{"id": "'.$row['id'].'", "label": "'.$row['title'].'", "code": "'.$row['code'].'", "stock": "'.$row['stock'].'"}';
}
$html .= implode(",", $array);
$html .= '])';
echo $html;
?>