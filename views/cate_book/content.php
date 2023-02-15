<?php
$jsonObj = $this->jsonObj;
function showCategories($categories, $parent_id = 0, $char = ''){
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($categories as $key => $item){
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id){
            $cate_child[] = $item;
            unset($categories[$key]);
        }
    }
     
    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($cate_child){
        echo '<ul style="list-style:none;line-height:2em">';
        foreach ($cate_child as $key => $item){
            // Hiển thị tiêu đề chuyên mục
            echo '<li style="line-height:2em">'.$char.$item['title'];
            echo '<span style="margin-left:10px;">';
            echo '<a href="javascript:void(0)" class="green" onclick="edit_book_cate('.$item['id'].', '.$item['parent_id'].')"><i class="ace-icon fa fa-pencil"></i></a>';
            echo ' | <a href="" class="red"><i class="ace-icon fa fa-trash"></i></a></span>';
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['id'], $char.'|---');
            echo '</li>';
        }
        echo '</ul>';
    }
}
showCategories($jsonObj);
?>