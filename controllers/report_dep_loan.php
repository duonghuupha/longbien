<?php
class Report_dep_loan extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_dep_loan/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $fullname = (isset($_REQUEST['fullname']) && $_REQUEST['fullname'] != '') ? str_replace("$", " ", $_REQUEST['fullname']) : '';
        $lesson = (isset($_REQUEST['lesson']) && $_REQUEST['lesson'] != '') ? $_REQUEST['lesson'] : '';
        $fromdate = (isset($_REQUEST['fromdate']) && $_REQUEST['fromdate'] != '') ? $this->_Convert->convertDate($_REQUEST['fromdate']) : '';
        $todate = (isset($_REQUEST['todate']) && $_REQUEST['todate'] != '') ? $this->_Convert->convertDate($_REQUEST['todate']) : '';
        $dep = (isset($_REQUEST['del']) && $_REQUEST['dep'] != '') ? $_REQUEST['dep'] : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($fromdate, $todate, $fullname, $lesson, $dep, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('report_dep_loan/content');
    }

    function export_xlsx(){
        $fullname = (isset($_REQUEST['fullname']) && $_REQUEST['fullname'] != '') ? str_replace("$", " ", $_REQUEST['fullname']) : '';
        $lesson = (isset($_REQUEST['lesson']) && $_REQUEST['lesson'] != '') ? $_REQUEST['lesson'] : '';
        $fromdate = (isset($_REQUEST['fromdate']) && $_REQUEST['fromdate'] != '') ? $this->_Convert->convertDate($_REQUEST['fromdate']) : '';
        $todate = (isset($_REQUEST['todate']) && $_REQUEST['todate'] != '') ? $this->_Convert->convertDate($_REQUEST['todate']) : '';
        $dep = (isset($_REQUEST['del']) && $_REQUEST['dep'] != '') ? $_REQUEST['dep'] : '';
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
		$sheet->setCellValue ( 'A3', 'BÁO CÁO THEO DÕI MƯỢN - TRẢ TRANG THIẾT BỊ');
		$sheet->mergeCellsByColumnAndRow ( 0, 3, 6, 3 );
		$helpExport->setStyle_14_TNR_B_C ( $sheet, 'A3', 'A3' );

		$rowStart = 5;
		$colStart = 'A';
		$rowIndex = $rowStart;
		$colIndex = $colStart;
		$sheet = $objPHPExcel->getActiveSheet ();
		// BEGIN set width for column
		$sheet->getColumnDimension ( 'A' )->setWidth ( 5 );
		$sheet->getColumnDimension ( 'B' )->setWidth ( 18 );
		$sheet->getColumnDimension ( 'C' )->setWidth ( 26 );
        $sheet->getColumnDimension ( 'D' )->setWidth ( 17 );
		$sheet->getColumnDimension ( 'E' )->setWidth ( 10 );
		$sheet->getColumnDimension ( 'F' )->setWidth ( 26 );
        $sheet->getColumnDimension ( 'G' )->setWidth ( 40 );
        $sheet->getRowDimension('3')->setRowHeight(25);
        $sheet->getRowDimension('5')->setRowHeight(30);
		// END set width for column
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'STT', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Người mượn', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Ngày mượn', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Tiết học', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Phòng chức năng', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Nội dung', $colIndex );
        $helpExport->setStyle_11_TNR_B_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
        $helpExport->setStyle_Align_Left ( $sheet, 'C' . $rowIndex, 'C' . $rowIndex );
        $helpExport->setStyle_Align_Left ( $sheet, 'G' . $rowIndex, 'G' . $rowIndex );

        $jsonObj = $this->model->getFetObj_export($fromdate, $todate, $fullname, $lesson, $dep);
        $i = 0;
        foreach($jsonObj as $rows){
            $i++;
            $rowIndex += 1;
            $colIndex = $colStart;
            //$objPHPExcel->getActiveSheet()->getStyle($colIndex.$rowIndex.':'.$colIndex.$rowIndex)->getAlignment()->setWrapText(true);
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $i, $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['code'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['fullname_loan'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, date("d-m-Y", strtotime($rows['date_loan'])), $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['lesson'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['department'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['content'], $colIndex );
            $helpExport->setStyle_11_TNR_N_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
            $helpExport->setStyle_Align_Left ( $sheet, 'C' . $rowIndex, 'C' . $rowIndex );
            $helpExport->setStyle_Align_Left ( $sheet, 'G' . $rowIndex, 'G' . $rowIndex );
        }

		$sheet->getStyle ( 'A' . $rowStart . ':' . 'G' . $rowIndex )->getBorders ()->getOutline ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
		$sheet->getStyle ( 'A' . $rowStart . ':' . 'G' . $rowIndex )->getBorders ()->getInside ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );

        ////set dinh dang giay a5 cho ban in ra////////////
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setOrientation ( PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE );
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setPaperSize ( PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4 );
        $pageMargin = $sheet->getPageMargins ();
		$pageMargin->setTop ( .5 );
		$pageMargin->setLeft ( 0.25 );
		$pageMargin->setRight ( 0.25 );
        header ( 'Content-Type: application/vnd.ms-excel' );
		header ( 'Content-Disposition: attachment;filename="Bao_cao_su_dung_phong_chuc_nang.xlsx"' );
		header ( 'Cache-Control: max-age=0' );
		$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
		$objWriter->save ( 'php://output' );
    }

    function combo_dep_function(){
        $jsonObj = $this->model->get_combo_dep_function();
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("report_dep_loan/combo_dep_function");
    }
}
?>