<?php
$row = $this->jsonObj;
$html = '{';
$html .= '"code": "'.$row[0]['code'].'", "fullname": "'.$row[0]['fullname'].'", "gender": "'.$row[0]['gender'].'",
            "birthday": "'.$row[0]['birthday'].'", "address": "'.$row[0]['address'].'", "phone": "'.$row[0]['phone'].'",
            "email": "'.$row[0]['email'].'", "level_id": "'.$row[0]['level_id'].'", "job_id": "'.$row[0]['job_id'].'",
            "image": "'.$row[0]['avatar'].'", "description": "'.$row[0]['description'].'", "subject": "'.$row[0]['subject'].'",
            "level": "'.$row[0]['level'].'", "job": "'.$row[0]['job'].'",';
    $subject = explode(",", $row[0]['subject']); $subject = array_filter(array_unique($subject));
    if(count($subject) > 0){
        $html .= '"subjects": [';
        foreach($subject as $item){
            $array[] = '{"idh": "'.$item.'", "title": "'.$this->_Data->return_title_subject($item).'"}';
        }
        $html .= implode(",", $array);
        $html .= ']';
    }else{
        $html .= '"subjects": []';
    }
$html .= '}';
echo $html;
?>