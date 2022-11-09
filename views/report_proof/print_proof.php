<title>Trường THCS Long Biên - Quận Long Biên</title>
<body onload="print()">
    <div class="container">
        <div class="top">
            <div class="title_school">Trường THCS Long Biên</div>
            <div class="title_file">Danh sách minh chứng kiểm định</div>
        </div>
        <div class="content">
            <table class="customer">
                <thead>
                    <tr role="row">
                        <th class="text-center" style="width:20px" rowspan="2">#</th>
                        <th class="text-center" colspan="2">Mã hóa minh chứng</th>
                        <th class="" rowspan="2">Tiêu chuẩn / tiêu chí</th>
                        <th class="" rowspan="2">Tiêu đề</th>
                    </tr>
                    <tr>
                        <th class="text-center" style="width:80px">Code</th>
                        <th class="text-center" style="width:50px">Qrcode</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach($this->jsonObj as $row){
                        $i++;
                        $class = ($i%2 == 0) ? 'even' : 'odd';
                    ?>
                    <tr role="row" class="<?php echo $class ?>">
                        <td class="text-center"><?php echo $i ?></td>
                        <td class="text-center"><?php echo $row['code_proof'] ?></td>
                        <td class="text-center">
                            <?php
                                echo  '<img src="'.URL.'/report_proof/qrcode?data='.base64_encode($row['code_proof'].'_1').'"/>';
                            ?>
                        </td>
                        <td><?php echo "<b><i>".$row['standard']."</i></b><br/>".$row['criteria'] ?></td>
                        <td><?php echo $row['title'] ?></td>
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