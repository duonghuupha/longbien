<?php
class Report_device_loan extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_device_loan/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $fullname = isset($_REQUEST['fullname']) ? str_replace("$", " ", $_REQUEST['fullname']) : '';
        $title = isset($_REQUEST['title']) ? str_replace("$", " ", $_REQUEST['title']) : '';
        $fromloan = (isset($_REQUEST['fromloan']) && $_REQUEST['fromloan']) ? $this->_Convert->convertDate($_REQUEST['fromloan']) : '';
        $toloan = (isset($_REQUEST['toloan']) && $_REQUEST['toloan']) ? $this->_Convert->convertDate($_REQUEST['toloan']) : '';
        $fromreturn = (isset($_REQUEST['fromreturn']) && $_REQUEST['fromreturn']) ? $this->_Convert->convertDate($_REQUEST['fromreturn']) : '';
        $toreturn = (isset($_REQUEST['toreturn']) && $_REQUEST['toreturn']) ? $this->_Convert->convertDate($_REQUEST['toreturn']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($fromloan, $toloan, $fromreturn, $toreturn, $fullname, $title, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('report_device_loan/content');
    }

    function export_xlsx(){
        $fullname = isset($_REQUEST['fullname']) ? str_replace("$", " ", $_REQUEST['fullname']) : '';
        $title = isset($_REQUEST['title']) ? str_replace("$", " ", $_REQUEST['title']) : '';
        $fromloan = (isset($_REQUEST['fromloan']) && $_REQUEST['fromloan']) ? $this->_Convert->convertDate($_REQUEST['fromloan']) : '';
        $toloan = (isset($_REQUEST['toloan']) && $_REQUEST['toloan']) ? $this->_Convert->convertDate($_REQUEST['toloan']) : '';
        $fromreturn = (isset($_REQUEST['fromreturn']) && $_REQUEST['fromreturn']) ? $this->_Convert->convertDate($_REQUEST['fromreturn']) : '';
        $toreturn = (isset($_REQUEST['toreturn']) && $_REQUEST['toreturn']) ? $this->_Convert->convertDate($_REQUEST['toreturn']) : '';
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
		$sheet->getColumnDimension ( 'C' )->setWidth ( 17 );
        $sheet->getColumnDimension ( 'D' )->setWidth ( 26 );
		$sheet->getColumnDimension ( 'E' )->setWidth ( 17 );
		$sheet->getColumnDimension ( 'F' )->setWidth ( 15 );
        $sheet->getColumnDimension ( 'G' )->setWidth ( 10 );
        $sheet->getRowDimension('3')->setRowHeight(25);
        $sheet->getRowDimension('5')->setRowHeight(30);
		// END set width for column
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'STT', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Ngày mượn', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Người mượn', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Ngày dự kiến trả', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Số  lượng thiết bị mượn', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Trạng thái', $colIndex );
        $helpExport->setStyle_11_TNR_B_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
        $helpExport->setStyle_Align_Left ( $sheet, 'D' . $rowIndex, 'D' . $rowIndex );

        $jsonObj = $this->model->getFetObj_export($fromloan, $toloan, $fromreturn, $toreturn, $fullname, $title);
        $i = 0;
        foreach($jsonObj as $rows){
            $i++;
            $rowIndex += 1;
            $colIndex = $colStart;
            if($rows['status'] == 0){
                $status = 'Chưa chả';
            }elseif($rows['status'] == 1){
                $status = 'Đã trả';
            }elseif($rows['status'] == 2){
                $status = 'Trả một phần';
            }
            //$objPHPExcel->getActiveSheet()->getStyle($colIndex.$rowIndex.':'.$colIndex.$rowIndex)->getAlignment()->setWrapText(true);
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $i, $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['code'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, date("d-m-Y", strtotime($rows['date_loan'])), $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['fullname_loan'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, date("d-m-Y", strtotime($rows['date_return'])), $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['qty'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $status, $colIndex );
            $helpExport->setStyle_11_TNR_N_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
            $helpExport->setStyle_Align_Left ( $sheet, 'D' . $rowIndex, 'D' . $rowIndex );
        }

		$sheet->getStyle ( 'A' . $rowStart . ':' . 'G' . $rowIndex )->getBorders ()->getOutline ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
		$sheet->getStyle ( 'A' . $rowStart . ':' . 'G' . $rowIndex )->getBorders ()->getInside ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );

        ////set dinh dang giay a5 cho ban in ra////////////
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setOrientation ( PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT );
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setPaperSize ( PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4 );
        $pageMargin = $sheet->getPageMargins ();
		$pageMargin->setTop ( .5 );
		$pageMargin->setLeft ( 0.15 );
		$pageMargin->setRight ( 0.15 );
        header ( 'Content-Type: application/vnd.ms-excel' );
		header ( 'Content-Disposition: attachment;filename=Bao_cao_theo_doi_muon_tra_thiet_bi.xlsx"' );
		header ( 'Cache-Control: max-age=0' );
		$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
		$objWriter->save ( 'php://output' );
    }

    function export_detail(){
        $fullname = isset($_REQUEST['fullname']) ? str_replace("$", " ", $_REQUEST['fullname']) : '';
        $title = isset($_REQUEST['title']) ? str_replace("$", " ", $_REQUEST['title']) : '';
        $fromloan = (isset($_REQUEST['fromloan']) && $_REQUEST['fromloan']) ? $this->_Convert->convertDate($_REQUEST['fromloan']) : '';
        $toloan = (isset($_REQUEST['toloan']) && $_REQUEST['toloan']) ? $this->_Convert->convertDate($_REQUEST['toloan']) : '';
        $fromreturn = (isset($_REQUEST['fromreturn']) && $_REQUEST['fromreturn']) ? $this->_Convert->convertDate($_REQUEST['fromreturn']) : '';
        $toreturn = (isset($_REQUEST['toreturn']) && $_REQUEST['toreturn']) ? $this->_Convert->convertDate($_REQUEST['toreturn']) : '';
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
		$sheet->setCellValue ( 'A3', 'BÁO CÁO THEO DÕI MƯỢN - TRẢ TRANG THIẾT BỊ CHI TIẾT');
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
		$sheet->getColumnDimension ( 'C' )->setWidth ( 17 );
        $sheet->getColumnDimension ( 'D' )->setWidth ( 26 );
		$sheet->getColumnDimension ( 'E' )->setWidth ( 17 );
		$sheet->getColumnDimension ( 'F' )->setWidth ( 15 );
        $sheet->getRowDimension('3')->setRowHeight(25);
        $sheet->getRowDimension('5')->setRowHeight(30);
		// END set width for column
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'STT', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã thiết bị', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Số con', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Tên thiế bị', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Ngày trả', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Trạng thái', $colIndex );
        $helpExport->setStyle_11_TNR_B_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
        $helpExport->setStyle_Align_Left ( $sheet, 'D' . $rowIndex, 'D' . $rowIndex );

        $jsonObj = $this->model->getFetObj_export($fromloan, $toloan, $fromreturn, $toreturn, $fullname, $title);
        foreach($jsonObj as $rows){
            $i++;
            $rowIndex += 1;
            $colIndex = $colStart;
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã: '.$rows['code'].' - Ngày mượn: '.date('d-m-Y',  strtotime($rows['date_loan'])).' - Người mượn: '.$rows['fullname_loan'], $colIndex );
            $sheet->mergeCellsByColumnAndRow(0, $rowIndex, 5, $rowIndex);
            $helpExport->setStyle_11_TNR_B_L ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
            $json = $this->_Data->get_device_selected_report($rows['code']); $i = 0;
            foreach($json as $item){
                $i++;
                $rowIndex += 1;
                $colIndex = $colStart;
                if($item['status'] == 0){
                    $status = 'Chưa chả';
                }else{
                    $status = 'Đã trả';
                }
            //$objPHPExcel->getActiveSheet()->getStyle($colIndex.$rowIndex.':'.$colIndex.$rowIndex)->getAlignment()->setWrapText(true);
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $i, $colIndex );
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $item['code'], $colIndex );
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $item['sub_device'], $colIndex );
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $item['title'], $colIndex );
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, date("d-m-Y", strtotime($item['date_return'])), $colIndex );
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $status, $colIndex );
                $helpExport->setStyle_11_TNR_N_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
                $helpExport->setStyle_Align_Left ( $sheet, 'D' . $rowIndex, 'D' . $rowIndex );
            }
        }

		$sheet->getStyle ( 'A' . $rowStart . ':' . 'F' . $rowIndex )->getBorders ()->getOutline ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
		$sheet->getStyle ( 'A' . $rowStart . ':' . 'F' . $rowIndex )->getBorders ()->getInside ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );

        ////set dinh dang giay a5 cho ban in ra////////////
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setOrientation ( PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT );
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setPaperSize ( PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4 );
        $pageMargin = $sheet->getPageMargins ();
		$pageMargin->setTop ( .5 );
		$pageMargin->setLeft ( 0.25 );
		$pageMargin->setRight ( 0.25 );
        header ( 'Content-Type: application/vnd.ms-excel' );
		header ( 'Content-Disposition: attachment;filename=Bao_cao_theo_doi_muon_tra_thiet_bi_chi_tiet.xlsx"' );
		header ( 'Cache-Control: max-age=0' );
		$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
		$objWriter->save ( 'php://output' );
    }
}
?>