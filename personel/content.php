<table 
    id="dynamic-table" 
    class="table table-striped table-bordered table-hover dataTable no-footer" 
    role="grid"
    aria-describedby="dynamic-table_info">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px">#</th>
            <th class="text-center" style="width:80px">Mã</th>
            <th class="">Họ và tên</th>
            <th class="text-center hidden-480">Giới tinh</th>
            <th class="text-center hidden-480">Ngày sinh</th>
            <th class="text-center hidden-480">Trình độ</th>
            <th class="text-center hidden-480" title="Phân công nhiệm vụ">
                PCNV
                <i class="ace-icon fa fa-question-circle bigger-110"></i>
            </th>
            <th class="hidden-480">Chuyên môn</th>
            <th class="text-center" style="width:100px">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for($i = 1; $i <= 15; $i++){
            $class = ($i%2 == 0) ? 'even' : 'odd'; 
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center">89342756</td>
            <td>Nguyễn Văn A</td>
            <td class="text-center hidden-480">Nam</td>
            <td class="text-center hidden-480">12-09-1979</td>
            <td class="text-center hidden-480">Đại học</td>
            <td class="text-center hidden-480">Giáo viên</td>
            <td class="hidden-480">Toán, Tin</td>
            <td class="text-center">
                <div class="action-buttons">
                    <a class="blue" href="javascript:void(0)" onclick="detail()">
                        <i class="ace-icon fa fa-search-plus bigger-130"></i>
                    </a>
                    <a class="green hidden-480" href="#">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <a class="red hidden-480" href="#">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                </div>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<div class="row mini">
    <div class="col-xs-12 col-sm-6">
        <div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">
            Hiển thị 1 đến 10 của 23 bản ghi</div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
            <ul class="pagination">
                <li class="paginate_button previous disabled" id="dynamic-table_previous">
                    <a href="#">Trước</a>
                </li>
                <li class="paginate_button active">
                    <a href="#">1</a>
                </li>
                <li class="paginate_button">
                    <a href="#">2</a>
                </li>
                <li class="paginate_button">
                    <a href="#">3</a>
                </li>
                <li class="paginate_button next" id="dynamic-table_next">
                    <a href="#">Sau</a>
                </li>
            </ul>
        </div>
    </div>
</div>