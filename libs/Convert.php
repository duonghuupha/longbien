<?php
class Convert{
     /**
     * Convert dinh danh ngay thang
     **/
    function convertDate($text) {
		if ($text != '') {
			list ( $date, $month, $year ) = explode ( "-", $text );
			$text = $year . '-' . $month . '-' . $date;
		}
		return $text;
	}

    function convert_file($txtname, $tiento){
        $extension = @end(explode(".", $txtname));
  		$prod = time();
  		$newfilename = $prod.'_'.$tiento.".".$extension;
        return $newfilename;
    }

    // hien thi danh sach destination
	function convert_number_to_words($number){
    	$hyphen = ' ';
    	$conjunction = '  ';
    	$separator = ' ';
    	$negative = 'âm ';
    	$decimal = ' phẩy ';
    	$dictionary = array(
    		0 => 'Không',
    		1 => 'Một',
    		2 => 'Hai',
    		3 => 'Ba',
    		4 => 'Bốn',
    		5 => 'Năm',
    		6 => 'Sáu',
    		7 => 'Bảy',
    		8 => 'Tám',
    		9 => 'Chín',
    		10 => 'Mười',
    		11 => 'Mười một',
    		12 => 'Mười hai',
    		13 => 'Mười ba',
    		14 => 'Mười bốn',
    		15 => 'Mười năm',
    		16 => 'Mười sáu',
    		17 => 'Mười bảy',
    		18 => 'Mười tám',
    		19 => 'Mười chín',
    		20 => 'Hai mươi',
    		30 => 'Ba mươi',
    		40 => 'Bốn mươi',
    		50 => 'Năm mươi',
    		60 => 'Sáu mươi',
    		70 => 'Bảy mươi',
    		80 => 'Tám mươi',
    		90 => 'Chín mươi',
    		100 => 'trăm',
    		1000 => 'nghìn',
    		1000000 => 'triệu',
    		1000000000 => 'tỷ',
    		1000000000000 => 'nghìn tỷ',
    		1000000000000000 => 'nghìn triệu triệu',
    		1000000000000000000 => 'tỷ tỷ'
    	);
    	if( !is_numeric( $number ) ){
    		return false;
    	}
    	if( ($number >= 0 && (int)$number < 0) || (int)$number < 0 - PHP_INT_MAX ){
    		// overflow
    		trigger_error( 'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING );
    		return false;
    	}
    	if( $number < 0 ){
    		return $negative . $this->convert_number_to_words( abs( $number ) );
    	}
    	$string = $fraction = null;
    	if( strpos( $number, '.' ) !== false ){
    		list( $number, $fraction ) = explode( '.', $number );
    	}
    	switch (true){
    		case $number < 21:
    			$string = $dictionary[$number];
    			break;
    		case $number < 100:
    			$tens = ((int)($number / 10)) * 10;
    			$units = $number % 10;
    			$string = $dictionary[$tens];
    			if( $units ){
    				$string .= $hyphen . $dictionary[$units];
    			}
    			break;
    		case $number < 1000:
    			$hundreds = $number / 100;
    			$remainder = $number % 100;
    			$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
    			if( $remainder ){
    				$string .= $conjunction . $this->convert_number_to_words( $remainder );
    			}
    			break;
    		default:
    			$baseUnit = pow( 1000, floor( log( $number, 1000 ) ) );
    			$numBaseUnits = (int)($number / $baseUnit);
    			$remainder = $number % $baseUnit;
    			$string = $this->convert_number_to_words( $numBaseUnits ) . ' ' . $dictionary[$baseUnit];
    			if( $remainder ){
    				$string .= $remainder < 100 ? $conjunction : $separator;
    				$string .= $this->convert_number_to_words( $remainder );
    			}
    			break;
    	}
    	if( null !== $fraction && is_numeric( $fraction ) ){
    		$string .= $decimal;
    		$words = array( );
    		foreach( str_split((string) $fraction) as $number ){
    			$words[] = $dictionary[$number];
    		}
    		$string .= implode( ' ', $words );
    	}
    	return $string;
    }

	//pagination
    function pagination($total, $get_pages, $per_page = 20){
        $perpage = $per_page;
        $posts  = $total;
        $pages  = ceil($posts / $perpage);
        //$get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $data = array(
            'options' => array(
                'default'   => 1,
                'min_range' => 1,
                'max_range' => $pages
            )
        );

        $number = trim($get_pages);
        $number = filter_var($number, FILTER_VALIDATE_INT, $data);
        $range  = $perpage * ($number - 1);
        $prev = $number - 1;
        $next = $number + 1;
        $pagination = array('range' => $range, 'perpage' => $perpage, 'prev' => $prev, 'next' => $next, 'number' => $number, 'pages' => $pages);
        return $pagination;
    }

	function vn2latin($cs, $tolower = false){
        /*Mảng chứa tất cả ký tự có dấu trong Tiếng Việt*/
        $marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
            "ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề",
            "ế","ệ","ể","ễ",
            "ì","í","ị","ỉ","ĩ",
            "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ",
            "ờ","ớ","ợ","ở","ỡ",
            "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
            "ỳ","ý","ỵ","ỷ","ỹ",
            "đ",
            "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă",
            "Ằ","Ắ","Ặ","Ẳ","Ẵ",
            "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
            "Ì","Í","Ị","Ỉ","Ĩ",
            "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
            "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
            "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
            "Đ"," ","$","%","?","&",'"',',',':',"/");

        /*Mảng chứa tất cả ký tự không dấu tương ứng với mảng $marTViet bên trên*/
        $marKoDau=array("a","a","a","a","a","a","a","a","a","a","a",
            "a","a","a","a","a","a",
            "e","e","e","e","e","e","e","e","e","e","e",
            "i","i","i","i","i",
            "o","o","o","o","o","o","o","o","o","o","o","o",
            "o","o","o","o","o",
            "u","u","u","u","u","u","u","u","u","u","u",
            "y","y","y","y","y",
            "d",
            "A","A","A","A","A","A","A","A","A","A","A","A",
            "A","A","A","A","A",
            "E","E","E","E","E","E","E","E","E","E","E",
            "I","I","I","I","I",
            "O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O",
            "U","U","U","U","U","U","U","U","U","U","U",
            "Y","Y","Y","Y","Y",
            "D","-","-","-","-","-","-","-",'',"");

        if ($tolower) {
            return strtolower(str_replace($marTViet,$marKoDau,$cs));
        }
        return str_replace($marTViet,$marKoDau,$cs);
    }

	function createLinks($total, $rows, $currentpage, $event, $links = 7) {
        $last = ceil( $total / $rows );
        $start = ( ( $currentpage - $links ) > 0 ) ? $currentpage - $links : 1;
        $end = ( ( $currentpage + $links ) < $last ) ? $currentpage + $links : $last;

        $html = '';
        $class = ( $currentpage == 1 ) ? "active" : "";

        if ( $start > 1 ) {
            $html .= '<li class="paginate_button"><a href="javascript:void(0)" onclick="'.$event.'(1)">1</a></li>';
            $html .= '<li class="paginate_button">';
            $html .= '<a>...</a></li>';
        }
        for ( $i = $start ; $i <= $end; $i++ ) {
            $class = ( $currentpage == $i ) ? "active" : "";
            $html .= '<li class="paginate_button ' . $class . '">';
            $html .= '<a href="javascript:void(0)" onclick="'.$event.'('.$i.')">' . $i . '</a>';
            $html .= '</li>';
        }
        if ( $end < $last ) {
            $html .= '<li class="paginate_button">';
            $html .= '<a >...</a></li>';
            $html .= '<li>';
            $html .= '<a href="javascript:void(0)" onclick="'.$event.'('.$last.')">' . $last . '</a>';
            $html .= '</li>';
        }
        return $html;
    }

    function createLinks_parameter($total, $rows, $currentpage, $event, $parameter, $links = 7) {
        $last = ceil( $total / $rows );
        $start = ( ( $currentpage - $links ) > 0 ) ? $currentpage - $links : 1;
        $end = ( ( $currentpage + $links ) < $last ) ? $currentpage + $links : $last;

        $html = '';
        $class = ( $currentpage == 1 ) ? "active" : "";

        if ( $start > 1 ) {
            $html .= '<li class="paginate_button"><a href="javascript:void(0)" onclick="'.$event.'(1, "'.$parameter.'")">1</a></li>';
            $html .= '<li class="paginate_button">';
            $html .= '<a>...</a></li>';
        }
        for ( $i = $start ; $i <= $end; $i++ ) {
            $class = ( $currentpage == $i ) ? "active" : "";
            $html .= '<li class="paginate_button ' . $class . '">';
            $html .= '<a href="javascript:void(0)" onclick="'.$event.'('.$i.', "'.$parameter.'")">' . $i . '</a>';
            $html .= '</li>';
        }
        if ( $end < $last ) {
            $html .= '<li class="paginate_button">';
            $html .= '<a >...</a></li>';
            $html .= '<li>';
            $html .= '<a href="javascript:void(0)" onclick="'.$event.'('.$last.', "'.$parameter.'")">' . $last . '</a>';
            $html .= '</li>';
        }
        return $html;
    }

    function daysInWeek($weekNum){
        $result = array();
        $datetime = new DateTime('00:00:00');
        $datetime->setISODate((int)$datetime->format('o'), $weekNum, 1);
        $interval = new DateInterval('P1D');
        $week = new DatePeriod($datetime, $interval, 6);
        foreach($week as $day){
            $result[] = $day->format('D d-m-Y');
        }
        return $result;
    }

    function return_day_text($text){
        if($text == 'Mon'){
            $string = 'Thứ hai';
        }elseif($text == 'Tue'){
            $string = 'Thứ ba';
        }elseif($text == 'Wed'){
            $string = 'Thứ tư';
        }elseif($text == 'Thu'){
            $string = 'Thứ năm';
        }elseif($text == 'Fri'){
            $string = 'Thứ sáu';
        }elseif($text == 'Sat'){
            $string = 'Thứ bảy';
        }elseif($text == 'Sun'){
            $string = 'Chủ nhật';
        }
        return $string;
    }

    function generateBarcode($data, $folder) {
        $PNG_TEMP_DIR = DIR_UPLOAD.'/barcode/'.$folder.'/';
        $PNG_WEB_DIR = DIR_UPLOAD.'/barcode/'.$folder.'/';
        $SKU = $data["sku"];
        $filename = $PNG_TEMP_DIR.$SKU.'.png';
        if(file_exists($filename)){
            return $filename;
        }else{
            $productData = $SKU;
            $barcode = new \Com\Tecnick\Barcode\Barcode();
            $bobj = $barcode->getBarcodeObj('C128B', "{$productData}", 450, 70, 'black', array(0, 0, 0, 0));
            $imageData = $bobj->getPngData();
            file_put_contents($filename, $imageData);
            return $filename;
        }
    }

    function generateBarcode_book($data, $folder) {
        $PNG_TEMP_DIR = DIR_UPLOAD.'/barcode/'.$folder.'/';
        $PNG_WEB_DIR = DIR_UPLOAD.'/barcode/'.$folder.'/';
        $SKU = $data["sku"]; $title_file = str_replace(".", "_", $data['sku']);
        $filename = $PNG_TEMP_DIR.$title_file.'.png';
        if(file_exists($filename)){
            return $filename;
        }else{
            $productData = $SKU;
            $barcode = new \Com\Tecnick\Barcode\Barcode();
            $bobj = $barcode->getBarcodeObj('C128B', "{$productData}", 450, 70, 'black', array(0, 0, 0, 0));
            $imageData = $bobj->getPngData();
            file_put_contents($filename, $imageData);
            return $filename;
        }
    }

    function generateBarcode_device($data, $folder) {
        $PNG_TEMP_DIR = DIR_UPLOAD.'/assets/'.$folder.'/';
        $PNG_WEB_DIR = DIR_UPLOAD.'/assets/'.$folder.'/';
        $SKU = $data["sku"]; $title_file = str_replace(".", "_", $data['sku']);
        $filename = $PNG_TEMP_DIR.$title_file.'.png';
        if(file_exists($filename)){
            return $filename;
        }else{
            $productData = $SKU;
            $barcode = new \Com\Tecnick\Barcode\Barcode();
            $bobj = $barcode->getBarcodeObj('C128B', "{$productData}", 450, 70, 'black', array(0, 0, 0, 0));
            $imageData = $bobj->getPngData();
            file_put_contents($filename, $imageData);
            return $filename;
        }
    }

    function return_between_hours($diff){
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours = floor(($diff - $years * 365*60*60*24- $months*30*60*60*24 - $days*60*60*24) / (60*60));
        return $hours;
    }

    function return_show_entries($total, $perpage, $pages){
        if($total == 0){
            $html = "Hiển thị 0 đến 0 của 0 bản ghi";
        }else{
            $html ='Hiển thị '.((($pages-1) * $perpage) + 1).' đến '; 
            $pagenumber = ceil($total/$perpage);
            $to_record = $pages*$perpage;
            if($pages == $pagenumber){
                $html .= $total;
            }else{
                $html .= $to_record;
            }
            $html .= ' của '.$total.' bản ghi';
        }
        return $html;
    }

    function emailValid($string){ 
        if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $string)){
            return true; 
        }else{
            return false;
        }
    } 

    function return_fullname_sort($txt){
        $data = trim($txt); $data = explode(" ", $data);
        $fullname = array_slice($data, -2,  2, true);
        return implode(" ",  $fullname);
    }

    // cat chuoi
    function cut($str, $len){
        $str = trim($str);
        if (strlen($str) <= $len) return $str;
        $str = substr($str, 0, $len);
        if ($str != "") {
            if (!substr_count($str, " ")) return $str." ...";
            while (strlen($str) && ($str[strlen($str) - 1] != " ")) $str = substr($str, 0, -1);
            $str = substr($str, 0, -1)." ...";
        }
        return $str;
    }

    function return_title_function($str){
        $array = array(1 => "Thêm mới", 2 => "Cập nhật", 3 => "Xóa", 4 => "Nhập từ file", 
                        5 => "Xuất dữ liệu", 6 => "Đặt trước");
        $data = explode(",", $str);
        foreach($data as $row){
            $arr_title[] = $array[$row];
        }
        return implode(", ",  $arr_title);
    }

    function return_roles($id, $str){
        $array = array(1 => "Thêm mới", 2 => "Cập nhật", 3 => "Xóa", 4 => "Nhập từ file", 
                        5 => "Xuất dữ liệu", 6 => "Đặt trước");
        $data = explode(",", $str);
        $html = '';
        foreach($data as $row){
            $html .= '
            <li class="tree-item" role="treeitem"> 
                <span class="tree-item-name"> 
                    <span class="tree-label">'.$array[$row].'</span>
                    <input id="role_'.$id.'_'.$row.'" name="role_'.$id.'_" type="checkbox"
                    value="'.$id.'_'.$row.'" onclick="set_checked_sub('.$id.', '.$row.')"/>
                </span> 
            </li>
            ';
        }
        return $html;
    }

    function return_list_role_of_group($roles){
        $data = explode(",", $roles); $html = ''; $sql = new Model();
        $array_role = array(1 => "Thêm mới", 2 => "Cập nhật", 3 => "Xóa", 4 => "Nhập từ file", 
                        5 => "Xuất dữ liệu", 6 => "Đặt trước"); 
        foreach($data as $row){
            $array = explode("_", $row);
            if(count($array) == 1){
                $html .= '<b>'.$sql->return_title_role($array[0]).': </b>';
            }else{
                $html .= $array_role[$array[1]].', ';
            }
        }
        return $html;
    }
}
?>
