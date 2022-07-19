<table 
    id="dynamic-table" 
    class="table table-striped table-bordered table-hover dataTable no-footer" 
    role="grid"
    aria-describedby="dynamic-table_info">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:10%">Thứ - Ngày</th>
            <th class="text-center" style="width:33%">Sáng</th>
            <th class="text-center" style="width:12%">BGH trực</th>
            <th class="text-center" style="width:33%">Chiều</th>
            <th class="text-center" style="width:12%">BGH trực</th>
        </tr>
    </thead>
    <tbody style="font-size:12px;">
        <?php
        $i = 0;
        foreach($_SESSION['tasks'] as $row){
            $i++;
            //print_r($row['date_work']);
            if(isset($row['s']) && $row['s']  != ''){
                $userids[$i] = [];
                foreach($row['s'] as $items){
                    $checks = ($items['checked'] == 1) ? 'checked=""' : '';
                    $styles = ($items['checked'] == 1) ? 'style="color:gray;text-decoration-line:line-through"' : '';
                    $task_s[$i][] = "+ <span ".$styles.">".$items['title'].'</span> <input id="ck_'.$items['id'].'" type="checkbox" onclick="del('.$items['id'].')" '.$checks.'/>';
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    $checksu = ($items['checkedu'] == 1) ? 'checked=""' : '';
                    $stylesu = ($items['checkedu'] == 1) ? 'style="color:gray;text-decoration-line:line-through"' : '';
                    if(!in_array($items['user_main'], $userids)){
                        array_push($userids, $items['user_main']);
                        $user_s[$i][] = "<span ".$stylesu.">+ ".$this->_Convert->return_fullname_sort($items['usermain']).'</span> <input id="cku_'.$i.'_1" type="checkbox" value="'.$items['user_main'].'.'.date("Y-m-d", strtotime($row['date_work'])).'.1" onclick="delu('.$i.', 1)" '.$checksu.'/>';
                    }
                }
            }else{
                $task_s[$i] = []; $user_s[$i] = [];
            }
            if(isset($row['c']) && $row['c']  != ''){
                $useridc[$i] = [];
                foreach($row['c'] as $itemc){
                    $checkc = ($itemc['checked'] == 1) ? 'checked=""' : '';
                    $stylec = ($itemc['checked'] == 1) ? 'style="color:gray;text-decoration-line:line-through"' : '';
                    $task_c[$i][] = "+ <span ".$stylec.">".$itemc['title'].'</span> <input id="ck_'.$itemc['id'].'" type="checkbox" onclick="del('.$itemc['id'].')" '.$checkc.'/>';
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    $checkcu = ($itemc['checkedu'] == 1) ? 'checked=""' : '';
                    $stylecu = ($itemc['checkedu'] == 1) ? 'style="color:gray;text-decoration-line:line-through"' : '';
                    if(!in_array($itemc['user_main'], $useridc)){
                        array_push($useridc, $itemc['user_main']);
                        $user_c[$i][] = "<span ".$stylecu.">+ ".$this->_Convert->return_fullname_sort($itemc['usermain']).'</span> <input id="cku_'.$i.'_2" type="checkbox" value="'.$itemc['user_main'].'.'.date("Y-m-d", strtotime($row['date_work'])).'.2" onclick="delu('.$i.', 2)" '.$checkcu.'/>';
                    }
                }
            }else{
                $task_c[$i] = []; $user_c[$i] = [];
            }
        ?>
        <tr>
            <td class="text-center">
                <?php  
                echo $this->_Convert->return_day_text(date("D", strtotime($row['date_work'])))."<br/>";
                echo date("d-m-Y", strtotime($row['date_work']));
                ?>
            </td>
            <td><?php echo implode("<br/>", $task_s[$i]) ?></td>
            <td><?php echo implode("<br/>", array_unique($user_s[$i])) ?></td>
            <td><?php echo implode("<br/>", $task_c[$i]) ?></td>
            <td><?php echo implode("<br/>", array_unique($user_c[$i])) ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>