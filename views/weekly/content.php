<?php
$data = base64_decode($_REQUEST['data']); 
?>
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
        $listdate = $this->_Convert->daysInWeek($_REQUEST['week']);
        foreach($listdate as $row){
        ?>
        <tr>
            <td class="text-center">
                <?php echo $this->_Convert->return_day_text(date("D", strtotime($row)))."<br/>".date("d-m-Y",strtotime($row)); ?>
            </td>
            <!-- sang-->
            <td>
                <!-- truyền biến thời gian và ngày làm việc-->
                <?php
                $json_am = $this->_Data->get_all_task_of_user_via_time_work($data, date("Y-m-d",  strtotime($row)), 1);
                echo "<ul>";
                foreach($json_am as $item_am){
                    echo "<li>".$item_am['title']."</li>";
                }
                echo "</ul>";
                ?>
            </td>
            <!-- BHG truc sang-->
            <td>
                <?php
                $json_am_user = $this->_Data->get_all_user_main_via_time_work($data, date("Y-m-d",  strtotime($row)), 1);
                echo "<ul>";
                foreach($json_am_user as $item_am_user){
                    echo "<li>".$this->_Convert->return_fullname_sort($item_am_user['fullname'])."</li>";
                }
                echo "</ul>";
                ?>
            </td>
            <!-- chieu -->
            <td>
                <!-- truyền biến thời gian và ngày làm việc-->
                <?php
                $json_pm = $this->_Data->get_all_task_of_user_via_time_work($data, date("Y-m-d",  strtotime($row)), 2);
                echo "<ul>";
                foreach($json_pm as $item_pm){
                    echo "<li>".$item_pm['title']."</li>";
                }
                echo "</ul>";
                ?>
            </td>
            <!-- BHG truc chieu-->
            <td>
            <?php
                $json_pm_user = $this->_Data->get_all_user_main_via_time_work($data, date("Y-m-d",  strtotime($row)), 2);
                echo "<ul>";
                foreach($json_pm_user as $item_pm_user){
                    echo "<li>".$this->_Convert->return_fullname_sort($item_pm_user['fullname'])."</li>";
                }
                echo "</ul>";
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>