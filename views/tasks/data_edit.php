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
    $html .= '"title": "'.$item[0]['title'].'", "group_id": "'.$item[0]['group_id'].'",';
    $html .= '"content": "'.$item[0]['content'].'", "date_work": "'.$item[0]['date_work'].'",';
    $html .= '"time_work": "'.$item[0]['time_work'].'", "user_share": "'.$item[0]['user_share'].'",';
    $html .= '"file": "'.$item[0]['file'].'", "users": "'.$usershare.'", "user_main": "'.$item[0]['user_main'].'",';
    $html .= '"usermain": "'.$item[0]['usermain'].'"';
$html .=  '}';
echo $html;
?>