<?php
$jsonObj = $this->jsonObj;
$html = $_REQUEST['callback'].'([';
foreach($jsonObj as $row){
    $array[] = '{"id": "'.$row['id'].'", "title": "'.$row['title'].'", "type": "'.$row['type'].'"}';
}
$html .= implode(",", $array);
$html .= '])';
echo $html;
?>