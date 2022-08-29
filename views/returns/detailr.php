<?php
$item = $this->jsonObj; $sql = new Model();
?>
<div class="modal-header no-padding">
    <div class="table-header">
        Chi tiết phiếu khôi phục trang thiết bị
    </div>
</div>
<div class="modal-body">
    <div class="row">
        <div class="post">
            <div class="post_top">
                <span>cộng hòa xã hội chủ nghĩa việt nam</span>
                <span>Độc lập - Tự do - Hạnh phúc</span>
            </div>
            <div class="post_middle">
                <span>Phiếu khôi phục trang thiết bị</span>
                <span>Kính gửi: Ban giám hiệu trường THCS Long Biên</span>
            </div>
            <div class="post_main">
                <span>Họ và tên: <b><?php echo $item[0]['fullname'] ?></b></span>
                <span>Phân công nhiệm vụ: <b><?php echo $item[0]['job'] ?></b></span>
                <span>Qua rà soát, kiểm tra trang thiết bị tại kho lưu trữ của nhà trường</span>
                <span>Khôi phục trang thiết bị:</span>
            </div>
            <div class="main_device">
                <table>
                    <thead>
                        <tr>
                            <th class="text_center">STT</th>
                            <th>Tên trang thiết bị</th>
                            <th class="text_center">Mã thiết bị</th>
                            <th class="text_center">Mã phụ</th>
                            <th class="text_center">Ngày thu hồi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text_center">1</td>
                            <td><?php echo $item[0]['device'] ?></td>
                            <td class="text_center"><?php echo $item[0]['device_code'] ?></td>
                            <td class="text_center"><?php echo $item[0]['sub_device'] ?></td>
                            <td class="text_center"><?php echo date("d-m-Y",strtotime($item[0]['create_at'])) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="post_footer">
                <span>Lý do khôi phục: <b><?php echo $item[0]['content'] ?></b></span>
                <div class="post_left">
                    <span></span>
                </div>
                <div class="post_right">
                    <span>Long Biên, <?php echo "ngày ".date("d", strtotime($item[0]['create_at']))." tháng ".date("m", strtotime($item[0]['create_at']))." năn ".date("Y", strtotime($item[0]['create_at'])) ?></span>
                    <span>Người lập phiếu</span>
                    <span><?php echo $item[0]['fullname'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
        <i class="ace-icon fa fa-times"></i>
        Đóng
    </button>
    <?php
    if($item[0]['status'] == 0){
    ?>
    <button class="btn btn-sm btn-success pull-right" onclick="approval(<?php echo $_REQUEST['id'] ?>)">
        <i class="ace-icon fa fa-check"></i>
        Duyệt đề nghị
    </button>
    <?php
    }
    ?>
</div>

<style>
.post{float:left;width:100%;padding:0 50px 0 50px;overflow:hidden;font-size:15px;}
.post .post_top{float:left;width:100%;text-align:center;margin-bottom:20px;overflow:hidden;font-size:17px}
.post .post_top span{float:left;width:100%;line-height:1.5em;font-weight:700}
.post .post_top span:nth-child(1){text-transform:uppercase}
.post .post_middle{float:left;width:100%;overflow:hidden;text-align:center;margin-bottom:10px;}
.post .post_middle span{float:left;width:100%;line-height:1.5em}
.post .post_middle span:nth-child(1){font-size:17px;font-weight:700;text-transform:uppercase}
.post .post_middle span:nth-child(2){margin-top:5px;}
.post .post_main{float:left;width:100%;overflow:hidden}
.post .post_main span{float:left;width:100%;line-height:1.5em}
.post .main_device{float:left;width:100%;margin-top:10px;}
.post .main_device table{float:left;width:100%;border-collapse:collapse}
.post .main_device table th, .post .main_device table td{border:1px solid gray;padding:8px;}
.post .main_device .text_center{text-align:center}
.post .post_footer{float:left;width:100%;margin-top:10px;overflow:hidden}
.post .post_footer span{float:left;width:100%;}
.post .post_footer .post_left{float:left;width:50%;margin-top:20px;}
.post .post_footer .post_left span{text-align:center;font-weight:700;font-size:16px;}
.post .post_footer .post_right{float:left;width:50%;text-align:center}
.post .post_footer .post_right span{float:left;width:100%;}
.post .post_footer .post_right span:nth-child(1){font-style:italic}
.post .post_footer .post_right span:nth-child(2){text-align:center;font-weight:700;font-size:16px;}
.post .post_footer .post_right span:nth-child(3){float:left;width:100%;margin-top:100px;font-weight:700}
</style>