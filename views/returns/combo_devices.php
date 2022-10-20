<?php
$html = '[';
    foreach($this->jsonObj as $row){
        $id = $row['device_id'].'.'.$row['sub_device'];
        $code = $row['code_dv'].'.'.$row['sub_device'];
        $array[] = '{"id": "'.$id.'", "title": "'.$row['title'].'-'.$row['sub_device'].'"}';
    }
    $html .= implode(",", $array);
$html .= ']';
echo $html;
?>