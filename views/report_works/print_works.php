<title>Trường THCS Long Biên - Quận Long Biên</title>
<body onload="print()">
    <div class="container">
        <div class="top">
            <div class="title_school">Trường THCS Long Biên</div>
            <div class="title_file">Danh sách hồ sơ công việc</div>
        </div>
        <div class="content">
            <table class="customer">
                <thead>
                    <tr role="row">
                        <th class="text-center" style="width:20px" rowspan="2">#</th>
                        <th class="text-center" colspan="2">Mã hồ sơ</th>
                        <th class="" rowspan="2">Danh mục</th>
                        <th class="" rowspan="2">Tiêu đề</th>
                        <th rowspan="2">Người tạo</th>
                        <th class="text-center"rowspan="2">Cập nhật lần cuối</th>
                    </tr>
                    <tr>
                        <th class="text-center" style="width:120px;">Code</th>
                        <th class="text-center" style="width:50px;">Qrcode</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i = 0;
                    foreach($this->jsonObj as $row){
                        $i++;
                        $class = ($i%2 == 0) ? 'even' : 'odd';
                        foreach($this->_Data->return_title_works_cate($row['works_id']) as $item){
                            $array[$i][] = $item['title'];
                        }
                    ?>
                    <tr role="row" class="<?php echo $class ?>">
                        <td class="text-center"><?php echo $i ?></td>
                        <td class="text-center"><?php echo $row['code'] ?></a></td>
                        <td class="text-center">
                            <?php
                                echo  '<img src="'.URL.'/report_works/qrcode?data='.base64_encode($row['code'].'_2').'"/>';
                            ?>
                        </td>
                        <td><?php echo implode("; ", $array[$i]); ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['fullname'] ?></td>
                        <td class="text-center"><?php echo date("H:i:s d-m-Y", strtotime($row['create_at'])) ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<style>
*{
    margin:0;
    padding:0;
}
body{
    width:100%;
    font-size:16px;
    font-family:'Time News Roman';
}
.container{
    float:left;
    width:100%;
    overflow:hidden;
}
.container .top{
    float:left;
    width:100%;
    margin-bottom:30px;
    overflow:hidden;
}
.container .top .title_school{
    float:left;
    width:100%;
    margin-bottom:10px;
    text-transform:uppercase;
    font-weight:700;
}
.container .top .title_file{
    float:left;
    width:100%;
    text-transform:uppercase;
    font-weight:700;
    font-size:18px;
    text-align:center;
}
.container .content{
    float:left;
    width:100%;
    overflow:hidden;
}
table.customer{
    border-collapse: collapse;
    width:100%;
}
table.customer th, table.customer td{
    border: 1px solid #000;
    padding:3px;
}
.text-center{
    text-align:center;
}
</style>