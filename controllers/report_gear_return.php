<?php
class Report_gear_return extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_gear_return/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15; 
        $status = (isset($_REQUEST['status'])) ? $_REQUEST['status'] : 0;
        $title = (isset($_REQUEST['title']) && $_REQUEST['title'] != '') ? str_replace("$", " ", $_REQUEST['title']) : '';
        $fromdate = (isset($_REQUEST['fromdate']) && $_REQUEST['fromdate'] != '') ? $this->_Convert->convertDate($_REQUEST['fromdate']) : '';
        $todate = (isset($_REQUEST['todate']) && $_REQUEST['todate'] != '') ? $this->_Convert->convertDate($_REQUEST['todate']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($fromdate, $todate, $title, $status, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('report_gear_return/content');
    }

    function export_xlsx(){
        $status = (isset($_REQUEST['status'])) ? $_REQUEST['status'] : 0;
        $title = (isset($_REQUEST['title']) && $_REQUEST['title'] != '') ? str_replace("$", " ", $_REQUEST['title']) : '';
        $dep = (isset($_REQUEST['dep']) && $_REQUEST['dep'] != '') ? $_REQUEST['dep'] : '';
        $fromdate = (isset($_REQUEST['fromdate']) && $_REQUEST['fromdate'] != '') ? $this->_Convert->convertDate($_REQUEST['fromdate']) : '';
        $todate = (isset($_REQUEST['todate']) && $_REQUEST['todate'] != '') ? $this->_Convert->convertDate($_REQUEST['todate']) : '';
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
		$sheet->setCellValue ( 'A3', 'BÁO CÁO THU HỒI - KHÔI PHỤC ĐỒ DÙNG DẠY HỌC');
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
        $sheet->getColumnDimension ( 'D' )->setWidth ( 41 );
		$sheet->getColumnDimension ( 'E' )->setWidth ( 43 );
		$sheet->getColumnDimension ( 'F' )->setWidth ( 14 );
        $sheet->getRowDimension('3')->setRowHeight(25);
        $sheet->getRowDimension('5')->setRowHeight(30);
		// END set width for column
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'STT', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Ngày tạo', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Thiết bị', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Lý do thu hồi / Khôi phục', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Trạng thái', $colIndex );
        $helpExport->setStyle_11_TNR_B_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
        $helpExport->setStyle_Align_Left ( $sheet, 'D' . $rowIndex, 'E' . $rowIndex );

        $jsonObj = $this->model->getFetObj_export($fromdate, $todate, $dep, $title, $status);
        $i = 0;
        foreach($jsonObj as $rows){
            $i++;
            $rowIndex += 1;
            $colIndex = $colStart;
            if($rows['status'] == 1){
                $status = 'Thu hồi';
            }elseif($rows['status'] == 2){
                $status = 'Khôi phục';
            }
            //$objPHPExcel->getActiveSheet()->getStyle($colIndex.$rowIndex.':'.$colIndex.$rowIndex)->getAlignment()->setWrapText(true);
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $i, $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['code'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, date("d-m-Y", strtotime($rows['create_at'])), $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['title'].'-'.$rows['sub_utensils'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['content'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $status, $colIndex );
            $helpExport->setStyle_11_TNR_N_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
            $helpExport->setStyle_Align_Left ( $sheet, 'D' . $rowIndex, 'E' . $rowIndex );
        }

		$sheet->getStyle ( 'A' . $rowStart . ':' . 'F' . $rowIndex )->getBorders ()->getOutline ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
		$sheet->getStyle ( 'A' . $rowStart . ':' . 'F' . $rowIndex )->getBorders ()->getInside ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );

        ////set dinh dang giay a5 cho ban in ra////////////
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setOrientation ( PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE );
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setPaperSize ( PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4 );
        $pageMargin = $sheet->getPageMargins ();
		$pageMargin->setTop ( .5 );
		$pageMargin->setLeft ( 0.5 );
		$pageMargin->setRight ( 0.5 );
        header ( 'Content-Type: application/vnd.ms-excel' );
		header ( 'Content-Disposition: attachment;filename="Bao_cao_thu_hoi_khoi_phuc_do_dung_day_hoc.xlsx"' );
		header ( 'Cache-Control: max-age=0' );
		$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
		$objWriter->save ( 'php://output' );
    }
}
?>