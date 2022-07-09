<div class="modal-header no-padding">
    <div class="table-header">
        Chi tiết phiếu đề nghị thu hồi thiết bị
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
                <span>đề nghị thu hồi trang thiết bị</span>
                <span>Kính gửi: Hiệu trưởng trường THCS Long Biên</span>
            </div>
            <div class="post_main">
                <span>Họ và tên: <b>Nguyễn Văn A</b></span>
                <span>Phân công nhiệm vụ: <b>Nhân viên CNTT</b></span>
                <span>Qua rà soát, kiểm tra trang thiết bị tại <b>Phòng A101 - Lớp 6A1</b></span>
                <span>Đề nghị thu hồi trang thiết bị:</span>
            </div>
            <div class="main_device">
                <table>
                    <thead>
                        <tr>
                            <th class="text_center">STT</th>
                            <th>Tên trang thiết bị</th>
                            <th class="text_center">Mã thiết bị</th>
                            <th class="text_center">Mã phụ</th>
                            <th class="text_center">Ngày phân bổ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text_center">1</td>
                            <td>Máy tính giáo viên Core I5</td>
                            <td class="text_center">12345686</td>
                            <td class="text_center">1</td>
                            <td class="text_center">23-04-2022</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="post_footer">
                <span>Lý do thu hồi: <b>Sửa chữa và nhập lưu kho</b></span>
                <div class="post_left">
                    <span>Thủ trưởng đơn vị</span>
                </div>
                <div class="post_right">
                    <span>Long Biên, ngày 23 tháng 05 năm 2022</span>
                    <span>Người đề nghị</span>
                    <span>Nguyễn Văn A</span>
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
    <button class="btn btn-sm btn-success pull-right" onclick="approval(<?php echo $_REQUEST['id'] ?>)">
        <i class="ace-icon fa fa-check"></i>
        Duyệt đề nghị
    </button>
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