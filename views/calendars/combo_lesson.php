<?php
$html = '[';
for($i = 1; $i <= 5; $i++){
    if(isset($_REQUEST['lesson_id'])){
        if($i == $_REQUEST['lesson_id']){
            $disabed = 'false';
        }else{
            if($this->_Data->get_lesson_of_department_via_date_study($_REQUEST['id'], $this->_Convert->convertDate($_REQUEST['date_study']), $i) > 0){
                $disabed = 'true';
            }else{
                $disabed = 'false';
            }
        }
    }else{
        if($this->_Data->get_lesson_of_department_via_date_study($_REQUEST['id'], $this->_Convert->convertDate($_REQUEST['date_study']), $i) > 0){
            $disabed = 'true';
        }else{
            $disabed = 'false';
        }
    }
    $array[] = '{"id": '.$i.', "title": "Tiết '.$i.'", "disabled": '.$disabed.'}';
}
$html .= implode(",", $array);
$html .= ']';
echo $html;
?>