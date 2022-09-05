<?php
class Report_device extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_device/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $type = $_REQUEST['type']; $cate = $_REQUEST['cate'];
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data($type, $cate, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('report_device/content');
    }

    function export(){
        $type = $_REQUEST['type']; $cate = $_REQUEST['cate'];
        $helpExport = new User_Excel ();
		$objReader = PHPExcel_IOFactory::createReader ( "Excel2007" );
		$colIndex = '';
		$rowIndex = 0;

        $objPHPExcel = new PHPExcel ();
		$sheet = $objPHPExcel->getActiveSheet ();
        //$objPHPExcel->getActiveSheet()->freezePane('D8');

		$sheet->setCellValue ( 'A1', 'TRƯỜNG THCS LONG BIÊN' );
		$sheet->mergeCellsByColumnAndRow ( 0, 1, 3, 1 );
		$helpExport->setStyle_12_TNR_B_L ( $sheet, 'A1', 'A1' );
		$sheet->setCellValue ( 'A3', 'DANH SÁCH TRANG THIẾT BỊ');
		$sheet->mergeCellsByColumnAndRow ( 0, 3, 7, 3 );
		$helpExport->setStyle_14_TNR_B_C ( $sheet, 'A3', 'A3' );

		$rowStart = 5;
		$colStart = 'A';
		$rowIndex = $rowStart;
		$colIndex = $colStart;
		$sheet = $objPHPExcel->getActiveSheet ();
		// BEGIN set width for column
		$sheet->getColumnDimension ( 'A' )->setWidth ( 5 );
		$sheet->getColumnDimension ( 'B' )->setWidth ( 15 );
		$sheet->getColumnDimension ( 'C' )->setWidth ( 35 );
        $sheet->getColumnDimension ( 'D' )->setWidth ( 25 );
		$sheet->getColumnDimension ( 'E' )->setWidth ( 15 );
		$sheet->getColumnDimension ( 'F' )->setWidth ( 15 );
        $sheet->getColumnDimension ( 'G' )->setWidth ( 15 );
        $sheet->getColumnDimension ( 'H' )->setWidth ( 10 );
        $sheet->getRowDimension('3')->setRowHeight(30);
        $sheet->getRowDimension('5')->setRowHeight(25);
		// END set width for column
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'STT', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã TB', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Tên trang thiết bị', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Danh mục', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Xuất sứ', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Năm sử dụng', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Nguyên giá', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Số lượng', $colIndex );
        $helpExport->setStyle_11_TNR_B_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );

        $jsonObj = $this->model->get_data_export($type, $cate);
        $i = 0;
        foreach($jsonObj as $rows){
            $i++;
            $rowIndex += 1;
            $colIndex = $colStart;
            if($rows['cate_id'] == 0){
                if($rows['price'] >= 10000000){
                    $danhmuc = "Tài sản cố định";
                }else{
                    $danhmuc = "Công cụ dụng cụ";
                }
            }else{
                $danhmuc = $rows['category'];
            }
            //$objPHPExcel->getActiveSheet()->getStyle($colIndex.$rowIndex.':'.$colIndex.$rowIndex)->getAlignment()->setWrapText(true);
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $i, $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['code'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['title'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $danhmuc, $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['origin'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['year_work'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, number_format($rows['price']), $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['stock'], $colIndex );
            $helpExport->setStyle_12_TNR_N_L ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'A' . $rowIndex, 'B' . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'E' . $rowIndex, 'F' . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'H' . $rowIndex, 'H' . $rowIndex );
            $helpExport->setStyle_Align_Right ( $sheet, 'G' . $rowIndex, 'G' . $rowIndex );
        }

		$sheet->getStyle ( 'A' . $rowStart . ':' . 'H' . $rowIndex )->getBorders ()->getOutline ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
		$sheet->getStyle ( 'A' . $rowStart . ':' . 'H' . $rowIndex )->getBorders ()->getInside ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );

        ////set dinh dang giay a5 cho ban in ra////////////
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setOrientation ( PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE );
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setPaperSize ( PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4 );
        $pageMargin = $sheet->getPageMargins ();
		$pageMargin->setTop ( .5 );
		$pageMargin->setLeft ( 0.5 );
		$pageMargin->setRight ( 0.5 );
        header ( 'Content-Type: application/vnd.ms-excel' );
		header ( 'Content-Disposition: attachment;filename="Danh_sach_trang_thiet_bi.xlsx"' );
		header ( 'Cache-Control: max-age=0' );
		$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
		$objWriter->save ( 'php://output' );
    }
}
?>
