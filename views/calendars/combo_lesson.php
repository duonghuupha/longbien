<option value="">Lựa chọn tiết học</option>
<?php
for($i = 1; $i <= 5; $i++){
    if(isset($_REQUEST['lesson_id'])){
        if($i == $_REQUEST['lesson_id']){
            $disabed = '';
        }else{
            if($this->_Data->get_lesson_of_department_via_date_study($_REQUEST['id'], $this->_Convert->convertDate($_REQUEST['date_study']), $i) > 0){
                $disabed = 'disabled=""';
            }else{
                $disabed = '';
            }
        }
    }else{
        if($this->_Data->get_lesson_of_department_via_date_study($_REQUEST['id'], $this->_Convert->convertDate($_REQUEST['date_study']), $i) > 0){
            $disabed = 'disabled=""';
        }else{
            $disabed = '';
        }
    }
    //$disabed = ($this->_Data->get_lesson_of_department_via_date_study($_REQUEST['id'], $this->_Convert->convertDate($_REQUEST['date_study']), $i) > 0) ? 'disabled=""' : '';
    echo '<option value="'.$i.'" '.$disabed.'>Tiết '.$i.'</option>';
}
?>