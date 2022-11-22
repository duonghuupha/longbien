<?php
if($_REQUEST['id'] != 0){
    $html = '[';
    $jsonObj = $this->jsonObj;
    for($i = 1; $i <= $jsonObj[0]['stock']; $i++){
        if($this->_Data->check_exit_sub_device($jsonObj[0]['id'], $i) > 0 
        || $this->_Data->check_exit_sub_device_loans($jsonObj[0]['id'], $i, date('Y-m-d')) > 0
        || $this->_Data->check_exit_sub_device_return($jsonObj[0]['id'], $i) == 1){
            $disabled = 'true';
        }else{
            $disabled = 'false';
        } 
        $array[] = '{"id": "'.$jsonObj[0]['id'].'.'.$i.'", "title": "'.$jsonObj[0]['title'].' - '.$i.'", "disabled": '.$disabled.'}';
    }
    $html .= implode(",", $array);
    $html .= ']';
    echo $html;
}
?>
