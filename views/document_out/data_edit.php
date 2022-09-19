<?php
$item = $this->jsonObj; 
if($item[0]['user_share'] != ''){
    $user = explode(",", $item[0]['user_share']);
    foreach($user as $row){
        $array[] = $this->_Data->get_fullname_users($row);
    }
    $usershare = implode(", ", $array);
}else{
    $usershare = '';
}
$html = '{';
    $html .= '"title": "'.$item[0]['title'].'", "cate_id": "'.$item[0]['cate_id'].'",';
    $html .= '"content": "'.$item[0]['content'].'", "user_share": "'.$item[0]['user_share'].'",';
    $html .= '"file": "'.$item[0]['file'].'", "users": "'.$usershare.'", "number_dc": "'.$item[0]['number_dc'].'",';
    $html .= '"date_dc": "'.$item[0]['date_dc'].'", "location_to": "'.$item[0]['location_to'].'",';
    $html .= '"type": "'.$item[0]['type'].'"';
$html .=  '}';
echo $html;
?>