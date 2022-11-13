<?php
class Report_cal extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_cal/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $teacher = $_REQUEST['teacher']; $fromdate = $this->_Convert->convertDate($_REQUEST['fromdate']);
        $todate = $this->_Convert->convertDate($_REQUEST['todate']); $subject = $_REQUEST['subject'];
        $dep = $_REQUEST['dep']; $lesson = $_REQUEST['lesson']; $exp = $_REQUEST['exp']; $title = $_REQUEST['title'];
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($teacher, $fromdate, $todate, $subject, $dep, $lesson, $exp, $title, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('report_cal/content');
    }

    function export_xlsx(){
        $teacher = $_REQUEST['teacher']; $fromdate = $this->_Convert->convertDate($_REQUEST['fromdate']);
        $todate = $this->_Convert->convertDate($_REQUEST['todate']); $subject = $_REQUEST['subject'];
        $dep = $_REQUEST['dep']; $lesson = $_REQUEST['lesson']; $exp = $_REQUEST['exp']; $title = $_REQUEST['title'];
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
		$sheet->setCellValue ( 'A3', 'LỊCH BÁO GIẢNG');
		$sheet->mergeCellsByColumnAndRow ( 0, 3, 8, 3 );
		$helpExport->setStyle_14_TNR_B_C ( $sheet, 'A3', 'A3' );

		$rowStart = 5;
		$colStart = 'A';
		$rowIndex = $rowStart;
		$colIndex = $colStart;
		$sheet = $objPHPExcel->getActiveSheet ();
		// BEGIN set width for column
		$sheet->getColumnDimension ( 'A' )->setWidth ( 5 );
		$sheet->getColumnDimension ( 'B' )->setWidth ( 22 );
		$sheet->getColumnDimension ( 'C' )->setWidth ( 15 );
        $sheet->getColumnDimension ( 'D' )->setWidth ( 9 );
		$sheet->getColumnDimension ( 'E' )->setWidth ( 15 );
		$sheet->getColumnDimension ( 'F' )->setWidth ( 12 );
        $sheet->getColumnDimension ( 'G' )->setWidth ( 9 );
        $sheet->getColumnDimension ( 'H' )->setWidth ( 28 );
        $sheet->getColumnDimension ( 'I' )->setWidth ( 20 );
        $sheet->getRowDimension('3')->setRowHeight(25);
        $sheet->getRowDimension('1')->setRowHeight(25);
        //$sheet->getRowDimension('5')->setRowHeight(25);
		// END set width for column
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'STT', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Giáo viên', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Ngày dạy', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Tiết', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Môn', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Lớp', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Tiết thứ theo Pp C/trình', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Đầu bài dạy', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Chuẩn bị, điều chỉnh', $colIndex );
        $helpExport->setStyle_11_TNR_B_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );

        $jsonObj = $this->model->getFetObj_export($teacher, $fromdate, $todate, $subject, $dep, $lesson, $exp, $title);
        $i = 0;
        foreach($jsonObj as $rows){
            $i++;
            $rowIndex += 1;
            $colIndex = $colStart;
            $detail = json_decode($this->_Data->get_device_gear_loan($rows['code']), true);
            if(count($detail) > 0){
                foreach($detail as $item){
                    $chuanbi[$i][] = $item['title'];
                }
                $prepare = implode("/n", $chuanbi[$i]);
            }else{
                $prepare = '';
            }
            //$objPHPExcel->getActiveSheet()->getStyle($colIndex.$rowIndex.':'.$colIndex.$rowIndex)->getAlignment()->setWrapText(true);
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $i, $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['fullname'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['date_study'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['lesson'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['subject'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['department'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['lesson_export'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['title'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $prepare, $colIndex );
            $helpExport->setStyle_12_TNR_N_L ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'A' . $rowIndex, 'A' . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'C' . $rowIndex, 'G' . $rowIndex );
            $helpExport->setStyle_Align_Left_Italic_10 ( $sheet, 'I' . $rowIndex, 'I' . $rowIndex );
        }

		$sheet->getStyle ( 'A' . $rowStart . ':' . 'I' . $rowIndex )->getBorders ()->getOutline ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
		$sheet->getStyle ( 'A' . $rowStart . ':' . 'I' . $rowIndex )->getBorders ()->getInside ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );

        ////set dinh dang giay a5 cho ban in ra////////////
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setOrientation ( PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE );
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setPaperSize ( PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4 );
        $pageMargin = $sheet->getPageMargins ();
		$pageMargin->setTop ( .5 );
		$pageMargin->setLeft ( 0.5 );
		$pageMargin->setRight ( 0.5 );
        header ( 'Content-Type: application/vnd.ms-excel' );
		header ( 'Content-Disposition: attachment;filename="So_bao_giang.xlsx"' );
		header ( 'Cache-Control: max-age=0' );
		$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
		$objWriter->save ( 'php://output' );
    }
}
?>