<?php
require_once './libs/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$html = file_get_contents(DIR_UPLOAD."/temp/lich_tuan.html");
$week = $this->week; $weekly = $this->_Convert->daysInWeek($this->week);
$data = base64_decode($_REQUEST['data']); 

$msg = '';
$msg .= '
    <colgroup style="width:10%"></colgroup>
    <colgroup style="width:33%"></colgroup>
    <colgroup style="width:12%"></colgroup>
    <colgroup style="width:33%"></colgroup>
    <colgroup style="width:12%"></colgroup>
    <tr>
        <th>Thứ - Ngày</th>
        <th>Sáng</th>
        <th>BGH trực</th>
        <th>Chiều</th>
        <th>BGH trực</th>
    </tr>
';
$listdate = $this->_Convert->daysInWeek($_REQUEST['week']);
foreach($listdate as $row){
    $msg .=   '
    <tr>
        <td style="text-align:center;font-weight:700">
            '.$this->_Convert->return_day_text(date("D", strtotime($row)))."<br/>".date("d-m-Y",strtotime($row)).'
        </td>
        <td>';
        $json_am = $this->_Data->get_all_task_of_user_via_time_work($data, date("Y-m-d",  strtotime($row)), 1);
        $msg .= "<ul style='margin:0px;padding-left:12px;'>";
        foreach($json_am as $item_am){
            $msg .= "<li>".$item_am['title']."</li>";
        }
        $msg .= "</ul>";
    $msg .= '
        </td>
        <td>';
        $json_am_user = $this->_Data->get_all_user_main_via_time_work($data, date("Y-m-d",  strtotime($row)), 1);
        $msg  .= "<ul style='margin:0px;padding-left:12px;'>";
        foreach($json_am_user as $item_am_user){
            $msg .= "<li>".$this->_Convert->return_fullname_sort($item_am_user['fullname'])."</li>";
        }
        $msg .= "</ul>";
    $msg .= '
        </td>
        <td>';
        $json_pm = $this->_Data->get_all_task_of_user_via_time_work($data, date("Y-m-d",  strtotime($row)), 2);
        $msg .= "<ul style='margin:0px;padding-left:12px;'>";
        foreach($json_pm as $item_pm){
            $msg .= "<li>".$item_pm['title']."</li>";
        }
        $msg .= "</ul>";
    $msg .= '
        </td>
        <td>';  
        $json_pm_user = $this->_Data->get_all_user_main_via_time_work($data, date("Y-m-d",  strtotime($row)), 2);
        $msg .= "<ul style='margin:0px;padding-left:12px;'>";
        foreach($json_pm_user as $item_pm_user){
            $msg .= "<li>".$this->_Convert->return_fullname_sort($item_pm_user['fullname'])."</li>";
        }
        $msg .= "</ul>";
    $msg .= '
        </td>
    </tr>
    ';
}
    /*$msg .= '
    <tr>
        <td style="text-align:center;font-weight:700">
            '.$this->_Convert->return_day_text(date("D", strtotime($row['date_work']))).'<br/>
            '.date("d-m-Y", strtotime($row['date_work'])).'
        </td>
        <td>'.implode("<br/>", $task_s[$i]).'</td>
        <td>'.implode("<br/>", array_unique($user_s[$i])).'</td>
        <td>'.implode("<br/>", $task_c[$i]).'</td>
        <td>'.implode("<br/>", array_unique($user_c[$i])).'</td>
    </tr>
    ';*/

$msg .= '
<tr>
    <td colspan="3" style="border:none"></td>
    <td colspan="2" style="border:none;text-align:center;padding-top:10px;">
        <i>Long Biên, ngày '.date("d").' tháng '.date("m").' năm '.date("Y").'</i>
    </td>
</tr>
<tr>
    <td colspan="3" style="border:none"></td>
    <td colspan="2" style="border:none;text-align:center;padding:0 !importand">
        <b>Hiệu trưởng</b>
    </td>
</tr>
<tr>
    <td colspan="3" style="border:none"></td>
    <td colspan="2" style="border:none;text-align:center;">
        <i>(Đã ký)</i>
    </td>
</tr>
<tr>
    <td colspan="3" style="border:none"></td>
    <td colspan="2" style="border:none;text-align:center;">
        Nguyễn Thị Diệu Thúy
    </td>
</tr>
';

$html = str_replace("####title####", "Kế hoạch công tác tuần ".$week, $html);
$html = str_replace("####date####", "(Từ ngày ".date("d-m-Y", strtotime($weekly[0]))." đến ".date("d-m-Y", strtotime(end($weekly))).')', $html);
$html = str_replace("####noidung####", $msg, $html);
$html = str_replace("####add####", "Long biên, ngày ".date("d")." tháng ".date("m")." năm ".date("Y"), $html);
$dompdf->loadHtml($html, 'UTF-8');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Lich_cong_tac_tuan_".$week, array("Attachment" => 1));
?>
