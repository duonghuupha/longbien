<?php
require_once './libs/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$html = file_get_contents(DIR_UPLOAD."/temp/lich_tuan.html");
$week = $this->week; $weekly = $this->_Convert->daysInWeek($this->week);

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
$i = 0;
foreach($_SESSION['tasks'] as $row){
    $i++;
    if(isset($row['s']) && $row['s']  != ''){
        $userids[$i] = [];
        foreach($row['s'] as $items){
            if($items['checked'] == 0){
                $task_s[$i][] = "* ".$items['title'];
            }else{
                $task_s[$i] = [];
            }
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if(!in_array($items['user_main'], $userids)){
                array_push($userids, $items['user_main']);
                if($items['checkedu'] == 0){
                    $user_s[$i][] = "+ ".$this->_Convert->return_fullname_sort($items['usermain']);
                }else{
                    $user_s[$i] = [];
                }
            }
        }
    }else{
        $task_s[$i] = []; $user_s[$i] = [];
    }
    if(isset($row['c']) && $row['c']  != ''){
        $useridc[$i] = [];
        foreach($row['c'] as $itemc){
            if($itemc['checked'] == 0){
                $task_c[$i][] = "* <span>".$itemc['title'].'</span>';
            }else{
                $task_c[$i] = [];
            }
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if(!in_array($itemc['user_main'], $useridc)){
                array_push($useridc, $itemc['user_main']);
                if($itemc['checkedu'] == 0){
                    $user_c[$i][] = "+ ".$this->_Convert->return_fullname_sort($itemc['usermain']);
                }else{
                    $user_c[$i] = [];
                }
            }
        }
    }else{
        $task_c[$i] = []; $user_c[$i] = [];
    }
    $msg .= '
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
    ';
}

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
