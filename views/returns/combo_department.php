<?php
$html = '[';
    foreach($this->jsonObj as $row){
        $array[] = '{"id": "'.$row['physical_id'].'", "title": "'.$row['physical'].' - '.$row['title'].'"}';
    }
    $html .= implode(",", $array);
$html .= ']';
echo $html;
?>