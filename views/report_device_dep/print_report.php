<title>Trường THCS Long Biên - Quận Long Biên</title>
<body onload="print()">
    <div class="container">
        <div class="top">
            <div class="title_school">Trường THCS Long Biên</div>
            <div class="title_file">Sổ trang thiết bị - <?php echo $this->title ?></div>
        </div>
        <div class="content">
            <table class="customer">
                <thead>
                    <tr role="row">
                        <th class="text-center" style="width:20px" rowspan="2">#</th>
                        <th class="text-center" colspan="3">Mã thiết bị</th>
                        <th class="" rowspan="2">Tiêu đề</th>
                        <th class="text-center" rowspan="2">Số con</th>
                        <th rowspan="2">Danh mục</th>
                        <th class="text-center" rowspan="2">Năm đưa vào sử dụng</th>
                    </tr>
                    <tr>
                        <th class="text-center">Code</th>
                        <th class="text-center" style="width:50px">QRcode</th>
                        <th class="text-center" style="width:100px">Barcode</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach($this->jsonObj as $row){
                        $i++;
                        $class = ($i%2 == 0) ? 'even' : 'odd'; 
                        if($row['cate_id'] == 0){
                            if($row['price'] >= 10000000){
                                $danhmuc = "Tài sản cố định";
                            }else{
                                $danhmuc = "Công cụ dụng cụ";
                            }
                        }else{
                            $danhmuc = $row['category'];
                        }
                        $title_file = $row['code_d'].'_'.$row['sub_device'];
                    ?>
                    <tr role="row" class="<?php echo $class ?>">
                        <td class="text-center"><?php echo $i ?></td>
                        <td class="text-center"><?php echo $row['code_d'] ?></td>
                        <td class="text-center">
                            <?php
                            echo  '<img src="'.URL.'/report_device_dep/qrcode?data='.base64_encode($row['code_d']."-".$row['sub_device'].'_6').'"/>';
                            ?>
                        </td>
                        <td>
                            <img src="<?php echo URL.'/public/assets/barcode/'.$title_file.'.png' ?>" width="100" height="40"/>
                        </td>
                        <td><?php echo $row['title'] ?></td>
                        <td class="text-center"><?php echo $row['sub_device'] ?></td>
                        <td><?php echo $danhmuc ?></td>
                        <td class="text-center"><?php echo $row['year_work'] ?></td>
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