<?php
class Report_gear_imp extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_gear_imp/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $source = isset($_REQUEST['source']) ? str_replace("$", " ", $_REQUEST['source']) : '';
        $fromdate = (isset($_REQUEST['fromdate']) && $_REQUEST['fromdate']) ? $this->_Convert->convertDate($_REQUEST['fromdate']) : '';
        $todate = (isset($_REQUEST['todate']) && $_REQUEST['todate']) ? $this->_Convert->convertDate($_REQUEST['todate']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($fromdate, $todate, $source, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('report_gear_imp/content');
    }

    function export_xlsx(){
        $source = isset($_REQUEST['source']) ? str_replace("$", " ", $_REQUEST['source']) : '';
        $fromdate = (isset($_REQUEST['fromdate']) && $_REQUEST['fromdate']) ? $this->_Convert->convertDate($_REQUEST['fromdate']) : '';
        $todate = (isset($_REQUEST['todate']) && $_REQUEST['todate']) ? $this->_Convert->convertDate($_REQUEST['todate']) : '';
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
		$sheet->setCellValue ( 'A3', 'BÁO CÁO QUÁ TRÌNH NHẬP ĐỒ DÙNG DẠY HỌC');
		$sheet->mergeCellsByColumnAndRow ( 0, 3, 7, 3 );
		$helpExport->setStyle_14_TNR_B_C ( $sheet, 'A3', 'A3' );

		$rowStart = 5;
		$colStart = 'A';
		$rowIndex = $rowStart;
		$colIndex = $colStart;
		$sheet = $objPHPExcel->getActiveSheet ();
		// BEGIN set width for column
		$sheet->getColumnDimension ( 'A' )->setWidth ( 5 );
		$sheet->getColumnDimension ( 'B' )->setWidth ( 18 );
		$sheet->getColumnDimension ( 'C' )->setWidth ( 17 );
        $sheet->getColumnDimension ( 'D' )->setWidth ( 26 );
		$sheet->getColumnDimension ( 'E' )->setWidth ( 28 );
		$sheet->getColumnDimension ( 'F' )->setWidth ( 15 );
        $sheet->getColumnDimension ( 'G' )->setWidth ( 15 );
        $sheet->getColumnDimension ( 'H' )->setWidth ( 15 );
        $sheet->getRowDimension('3')->setRowHeight(25);
        $sheet->getRowDimension('5')->setRowHeight(30);
		// END set width for column
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'STT', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã hệ thống', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Ngày nhập', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Người thực hiện', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Nguồn đồ dùng', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Tổng đầu đồ dùng', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Tổng số lượng đồ dùng', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Cập nhật lần cuối', $colIndex );
        $helpExport->setStyle_11_TNR_B_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
        $helpExport->setStyle_Align_Left ( $sheet, 'D' . $rowIndex, 'E' . $rowIndex );

        $jsonObj = $this->model->getFetObj_export($fromdate, $todate, $source);
        $i = 0;
        foreach($jsonObj as $rows){
            $i++;
            $rowIndex += 1;
            $colIndex = $colStart;
            //$objPHPExcel->getActiveSheet()->getStyle($colIndex.$rowIndex.':'.$colIndex.$rowIndex)->getAlignment()->setWrapText(true);
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $i, $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['code'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, date("d-m-Y", strtotime($rows['date_import'])), $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['fullname'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['source'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['total_gear'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['total_qty'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, date("H:i:s \n d-m-Y",strtotime($rows['create_at'])), $colIndex );
            $helpExport->setStyle_11_TNR_N_L ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'A' . $rowIndex, 'C' . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'F' . $rowIndex, 'H' . $rowIndex );
        }

		$sheet->getStyle ( 'A' . $rowStart . ':' . 'H' . $rowIndex )->getBorders ()->getOutline ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
		$sheet->getStyle ( 'A' . $rowStart . ':' . 'H' . $rowIndex )->getBorders ()->getInside ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );

        ////set dinh dang giay a5 cho ban in ra////////////
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setOrientation ( PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE );
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setPaperSize ( PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4 );
        $pageMargin = $sheet->getPageMargins ();
		$pageMargin->setTop ( .5 );
		$pageMargin->setLeft ( 0.35 );
		$pageMargin->setRight ( 0.35 );
        header ( 'Content-Type: application/vnd.ms-excel' );
		header ( 'Content-Disposition: attachment;filename=Bao_cao_qua_trinh_nhap_do_dung_day_hoc.xlsx"' );
		header ( 'Cache-Control: max-age=0' );
		$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
		$objWriter->save ( 'php://output' );
    }

    function export_detail(){
        $source = isset($_REQUEST['source']) ? str_replace("$", " ", $_REQUEST['source']) : '';
        $fromdate = (isset($_REQUEST['fromdate']) && $_REQUEST['fromdate']) ? $this->_Convert->convertDate($_REQUEST['fromdate']) : '';
        $todate = (isset($_REQUEST['todate']) && $_REQUEST['todate']) ? $this->_Convert->convertDate($_REQUEST['todate']) : '';
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
		$sheet->setCellValue ( 'A3', 'BÁO CÁO CHI TIẾT QUÁ TRÌNH NHẬP ĐỒ DÙNG DẠY HỌC');
		$sheet->mergeCellsByColumnAndRow ( 0, 3, 4, 3 );
		$helpExport->setStyle_14_TNR_B_C ( $sheet, 'A3', 'A3' );

		$rowStart = 5;
		$colStart = 'A';
		$rowIndex = $rowStart;
		$colIndex = $colStart;
		$sheet = $objPHPExcel->getActiveSheet ();
		// BEGIN set width for column
		$sheet->getColumnDimension ( 'A' )->setWidth ( 5 );
		$sheet->getColumnDimension ( 'B' )->setWidth ( 18 );
		$sheet->getColumnDimension ( 'C' )->setWidth ( 32 );
        $sheet->getColumnDimension ( 'D' )->setWidth ( 23 );
		$sheet->getColumnDimension ( 'E' )->setWidth ( 14 );
        $sheet->getRowDimension('3')->setRowHeight(25);
        $sheet->getRowDimension('5')->setRowHeight(30);
		// END set width for column
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'STT', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã đồ dùng', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Tên đồ dùng', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Danh mục', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Số lượng nhập', $colIndex );
        $helpExport->setStyle_11_TNR_B_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
        $helpExport->setStyle_Align_Left ( $sheet, 'C' . $rowIndex, 'D' . $rowIndex );

        $jsonObj = $this->model->getFetObj_export($fromdate, $todate, $source);
        foreach($jsonObj as $rows){
            $rowIndex += 1;
            $colIndex = $colStart;
            //$objPHPExcel->getActiveSheet()->getStyle($colIndex.$rowIndex.':'.$colIndex.$rowIndex)->getAlignment()->setWrapText(true);
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã nhập: '.$rows['code'].' - Ngày nhập: '.$rows['date_import'], $colIndex );
            $sheet->mergeCellsByColumnAndRow(0, $rowIndex, 4, $rowIndex);
            $helpExport->setStyle_11_TNR_B_L ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
            // thong tin chi tiet 
            $json = $this->_Data->get_detail_import_gear($rows['code']); $i = 0;
            foreach($json as $item){
                $i++;
                $rowIndex += 1;
                $colIndex = $colStart;
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $i, $colIndex );
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $item['code'], $colIndex );
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $item['title'], $colIndex );
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $item['category'], $colIndex );
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $item['qty'], $colIndex );
                $helpExport->setStyle_11_TNR_N_L ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
                $helpExport->setStyle_Align_Center ( $sheet, 'A' . $rowIndex, 'B' . $rowIndex );
                $helpExport->setStyle_Align_Center ( $sheet, 'E' . $rowIndex, 'E' . $rowIndex );
            }
            //$helpExport->setStyle_Align_Center ( $sheet, 'A' . $rowIndex, 'C' . $rowIndex );
            //$helpExport->setStyle_Align_Center ( $sheet, 'F' . $rowIndex, 'H' . $rowIndex );
        }

		$sheet->getStyle ( 'A' . $rowStart . ':' . 'E' . $rowIndex )->getBorders ()->getOutline ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
		$sheet->getStyle ( 'A' . $rowStart . ':' . 'E' . $rowIndex )->getBorders ()->getInside ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );

        ////set dinh dang giay a5 cho ban in ra////////////
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setOrientation ( PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT );
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setPaperSize ( PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4 );
        $pageMargin = $sheet->getPageMargins ();
		$pageMargin->setTop ( .5 );
		$pageMargin->setLeft ( 0.5 );
		$pageMargin->setRight ( 0.5 );
        header ( 'Content-Type: application/vnd.ms-excel' );
		header ( 'Content-Disposition: attachment;filename=Bao_cao_qua_trinh_nhap_do_dung_day_hoc_chi_tiet.xlsx"' );
		header ( 'Cache-Control: max-age=0' );
		$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
		$objWriter->save ( 'php://output' );
    }
}
?>