<?php
$thang = $_REQUEST['month']; $nam = $_REQUEST['year']; $date = $nam."-".$thang."-".date('d');
$calendar = new Calendar($date);
foreach($this->jsonObj as $row){
    $calendar->add_event('Tiết '.$row['lesson'].': '.$row['title'], $row['date_study'], 1);
}
echo $calendar;
?>