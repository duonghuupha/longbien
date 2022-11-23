<?php
class Report_device_repair extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_device_repair/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $fromdate = (isset($_REQUEST['fromdate']) && $_REQUEST['fromdate'] != '') ? $this->_Convert->convertDate($_REQUEST['fromdate']) : '';
        $todate = (isset($_REQUEST['todate']) && $_REQUEST['todate'] != '') ? $this->_Convert->convertDate($_REQUEST['todate']) : '';
        $agency = isset($_REQUEST['agency']) ? str_replace("$", " ", $_REQUEST['agency']) : '';
        $device = isset($_REQUEST['device']) ? str_replace("$", " ", $_REQUEST['device']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($fromdate, $todate, $agency, $device, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('report_device_repair/content');
    }

    function export_xlsx(){
        $fromdate = (isset($_REQUEST['fromdate']) && $_REQUEST['fromdate'] != '') ? $this->_Convert->convertDate($_REQUEST['fromdate']) : '';
        $todate = (isset($_REQUEST['todate']) && $_REQUEST['todate'] != '') ? $this->_Convert->convertDate($_REQUEST['todate']) : '';
        $agency = isset($_REQUEST['agency']) ? str_replace("$", " ", $_REQUEST['agency']) : '';
        $device = isset($_REQUEST['device']) ? str_replace("$", " ", $_REQUEST['device']) : '';
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
		$sheet->setCellValue ( 'A3', 'BÁO CÁO BẢO  TRÌ - SỬA CHỮA - NÂNG CẤP TRANG THIẾT BỊ');
		$sheet->mergeCellsByColumnAndRow ( 0, 3, 5, 3 );
		$helpExport->setStyle_14_TNR_B_C ( $sheet, 'A3', 'A3' );

		$rowStart = 5;
		$colStart = 'A';
		$rowIndex = $rowStart;
		$colIndex = $colStart;
		$sheet = $objPHPExcel->getActiveSheet ();
		// BEGIN set width for column
		$sheet->getColumnDimension ( 'A' )->setWidth ( 5 );
		$sheet->getColumnDimension ( 'B' )->setWidth ( 16 );
		$sheet->getColumnDimension ( 'C' )->setWidth ( 17 );
        $sheet->getColumnDimension ( 'D' )->setWidth ( 26 );
		$sheet->getColumnDimension ( 'E' )->setWidth ( 17 );
		$sheet->getColumnDimension ( 'F' )->setWidth ( 15 );
        $sheet->getRowDimension('3')->setRowHeight(25);
        $sheet->getRowDimension('5')->setRowHeight(30);
		// END set width for column
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'STT', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Ngày lập', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Đơn vị thực hiện', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'SL thiết bị', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Cập nhật lần cuối', $colIndex );
        $helpExport->setStyle_11_TNR_B_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
        $helpExport->setStyle_Align_Left ( $sheet, 'D' . $rowIndex, 'D' . $rowIndex );

        $jsonObj = $this->model->getFetObj_export($fromdate, $todate, $agency, $device);
        $i = 0;
        foreach($jsonObj as $rows){
            $i++;
            $rowIndex += 1;
            $colIndex = $colStart;
            //$objPHPExcel->getActiveSheet()->getStyle($colIndex.$rowIndex.':'.$colIndex.$rowIndex)->getAlignment()->setWrapText(true);
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $i, $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['code'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, date("d-m-Y", strtotime($rows['date_repair'])), $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['agency'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['total_repair'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, date("H:i:s \n d-m-Y", strtotime($rows['create_at'])), $colIndex );
            $helpExport->setStyle_11_TNR_N_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
            $helpExport->setStyle_Align_Left ( $sheet, 'D' . $rowIndex, 'D' . $rowIndex );
        }

		$sheet->getStyle ( 'A' . $rowStart . ':' . 'F' . $rowIndex )->getBorders ()->getOutline ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
		$sheet->getStyle ( 'A' . $rowStart . ':' . 'F' . $rowIndex )->getBorders ()->getInside ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );

        ////set dinh dang giay a5 cho ban in ra////////////
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setOrientation ( PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT );
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setPaperSize ( PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4 );
        $pageMargin = $sheet->getPageMargins ();
		$pageMargin->setTop ( .5 );
		$pageMargin->setLeft ( 0.35 );
		$pageMargin->setRight ( 0.35 );
        header ( 'Content-Type: application/vnd.ms-excel' );
		header ( 'Content-Disposition: attachment;filename="Bao_cao_bao_tri_sua_chua_nang_cap_trang_thiet_bi.xlsx"' );
		header ( 'Cache-Control: max-age=0' );
		$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
		$objWriter->save ( 'php://output' );
    }

    function export_detail(){
        $fromdate = (isset($_REQUEST['fromdate']) && $_REQUEST['fromdate'] != '') ? $this->_Convert->convertDate($_REQUEST['fromdate']) : '';
        $todate = (isset($_REQUEST['todate']) && $_REQUEST['todate'] != '') ? $this->_Convert->convertDate($_REQUEST['todate']) : '';
        $agency = isset($_REQUEST['agency']) ? str_replace("$", " ", $_REQUEST['agency']) : '';
        $device = isset($_REQUEST['device']) ? str_replace("$", " ", $_REQUEST['device']) : '';
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
		$sheet->setCellValue ( 'A3', 'BÁO CÁO CHI TIẾT BẢO TRÌ - SỬA CHỮA - NÂNG CẤP TRANG THIẾT BỊ');
		$sheet->mergeCellsByColumnAndRow ( 0, 3, 4, 3 );
		$helpExport->setStyle_14_TNR_B_C ( $sheet, 'A3', 'A3' );

		$rowStart = 5;
		$colStart = 'A';
		$rowIndex = $rowStart;
		$colIndex = $colStart;
		$sheet = $objPHPExcel->getActiveSheet ();
		// BEGIN set width for column
		$sheet->getColumnDimension ( 'A' )->setWidth ( 5 );
		$sheet->getColumnDimension ( 'B' )->setWidth ( 16 );
		$sheet->getColumnDimension ( 'C' )->setWidth ( 46 );
        $sheet->getColumnDimension ( 'D' )->setWidth ( 34 );
		$sheet->getColumnDimension ( 'E' )->setWidth ( 34 );
        $sheet->getRowDimension('3')->setRowHeight(25);
        $sheet->getRowDimension('5')->setRowHeight(30);
		// END set width for column
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'STT', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã  thiết bị', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Tên trang thiết bị', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Nội dung lỗi', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Nội dung khắc phục', $colIndex );
        $helpExport->setStyle_11_TNR_B_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
        $helpExport->setStyle_Align_Left ( $sheet, 'C' . $rowIndex, 'E' . $rowIndex );

        $jsonObj = $this->model->getFetObj_export($fromdate, $todate, $agency, $device);
        foreach($jsonObj as $rows){
            $rowIndex += 1;
            $colIndex = $colStart;
            $sheet->getRowDimension($rowIndex)->setRowHeight(23);
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã: '.$rows['code'].' - Ngày lập: '.date("d-m-Y", strtotime($rows['date_repair'])).' - ĐVTH: '.$rows['agency'], $colIndex );
            $sheet->mergeCellsByColumnAndRow(0, $rowIndex, 4, $rowIndex);
            $helpExport->setStyle_11_TNR_B_L ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
            $json = json_decode($this->_Data->get_detail_repair_device($rows['code']), true); $i = 0;
            foreach($json as $item){
                $i++;
                $rowIndex += 1;
                $colIndex = $colStart;
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $i, $colIndex );
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $item['code_d'], $colIndex );
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $item['title'], $colIndex );
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $item['error'], $colIndex );
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $item['fixed'], $colIndex );
                $helpExport->setStyle_11_TNR_N_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
                $helpExport->setStyle_Align_Left ( $sheet, 'C' . $rowIndex, 'E' . $rowIndex );
            }
        }

		$sheet->getStyle ( 'A' . $rowStart . ':' . 'E' . $rowIndex )->getBorders ()->getOutline ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
		$sheet->getStyle ( 'A' . $rowStart . ':' . 'E' . $rowIndex )->getBorders ()->getInside ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );

        ////set dinh dang giay a5 cho ban in ra////////////
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setOrientation ( PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE );
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setPaperSize ( PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4 );
        $pageMargin = $sheet->getPageMargins ();
		$pageMargin->setTop ( .5 );
		$pageMargin->setLeft ( 0.5 );
		$pageMargin->setRight ( 0.5 );
        header ( 'Content-Type: application/vnd.ms-excel' );
		header ( 'Content-Disposition: attachment;filename="Bao_cao_bao_tri_sua_chua_nang_cap_trang_thiet_bi_chi_tiet.xlsx"' );
		header ( 'Cache-Control: max-age=0' );
		$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
		$objWriter->save ( 'php://output' );
    }
}
?>