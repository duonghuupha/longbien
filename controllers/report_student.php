<?php
class Report_student extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_student/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $code = isset($_REQUEST['code']) ? $_REQUEST['code'] : '';
        $codecsdl = isset($_REQUEST['codecsdl']) ? $_REQUEST['codecsdl'] : '';
        $name = isset($_REQUEST['name']) ? str_replace("$", " ", $_REQUEST['name']) : '';
        $date = isset($_REQUEST['date']) ? $this->_Convert->convertDate($_REQUEST['date']) : '';
        $class = isset($_REQUEST['class']) ? $_REQUEST['class'] : '';
        $address = isset($_REQUEST['address']) ? str_replace("$", " ", $_REQUEST['address']) : '';
        $gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : 0; 
        $religion = isset($_REQUEST['religion']) ? $_REQUEST['religion'] : 0;
        $people = isset($_REQUEST['people']) ? $_REQUEST['people'] : '';
        $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : 1;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword, $code, $codecsdl, $name, $date, $class, $address, $gender, $people, $religion, $this->_Year[0]['id'], $status, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('report_student/content');
    }

    function export_xlsx(){
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $code = isset($_REQUEST['code']) ? $_REQUEST['code'] : '';
        $codecsdl = isset($_REQUEST['codecsdl']) ? $_REQUEST['codecsdl'] : '';
        $name = isset($_REQUEST['name']) ? str_replace("$", " ", $_REQUEST['name']) : '';
        $date = isset($_REQUEST['date']) ? $this->_Convert->convertDate($_REQUEST['date']) : '';
        $class = isset($_REQUEST['class']) ? $_REQUEST['class'] : '';
        $address = isset($_REQUEST['address']) ? str_replace("$", " ", $_REQUEST['address']) : '';
        $gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : 0; 
        $religion = isset($_REQUEST['religion']) ? $_REQUEST['religion'] : 0;
        $people = isset($_REQUEST['people']) ? $_REQUEST['people'] : '';
        $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : 1;
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
		$sheet->setCellValue ( 'A3', 'DANH SÁCH HỌC SINH');
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
        $sheet->getColumnDimension ( 'C' )->setWidth ( 18 );
        $sheet->getColumnDimension ( 'D' )->setWidth ( 28 );
        $sheet->getColumnDimension ( 'E' )->setWidth ( 15 );
        $sheet->getColumnDimension ( 'F' )->setWidth ( 8 );
        $sheet->getColumnDimension ( 'G' )->setWidth ( 15 );
        $sheet->getColumnDimension ( 'H' )->setWidth ( 40 );
        $sheet->getRowDimension('3')->setRowHeight(30);
        $sheet->getRowDimension('1')->setRowHeight(23);
		// END set width for column
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'STT', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã HS', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã định danh', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Họ và tên', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Lớp học', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Giới tính', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Ngày sinh', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Địa chỉ', $colIndex );
        $helpExport->setStyle_11_TNR_B_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
        $objPHPExcel->getActiveSheet()->getStyle('A6:H1177')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
        $jsonObj = $this->model->getFetObj_export($keyword, $code, $codecsdl, $name, $date, $class, $address, $gender, $people, $religion, $this->_Year[0]['id'], $status);
        $i = 0;
        foreach($jsonObj as $rows){
            $i++;
            $rowIndex += 1;
            $colIndex = $colStart; $gender = ($rows['gender'] == 1) ? "Nam" : 'Nữ';
            //$objPHPExcel->getActiveSheet()->getStyle($colIndex.$rowIndex.':'.$colIndex.$rowIndex)->getAlignment()->setWrapText(true);
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $i, $colIndex );
            $colIndex = $helpExport->setValueAndTypeForSheet ( $sheet, $colIndex . $rowIndex, $rows['code'], PHPExcel_Cell_DataType::TYPE_STRING, $colIndex );
            $colIndex = $helpExport->setValueAndTypeForSheet ( $sheet, $colIndex . $rowIndex, $rows['code_csdl'], PHPExcel_Cell_DataType::TYPE_STRING, $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['fullname'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['department'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $gender, $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, date("d-m-Y", strtotime($rows['birthday'])), $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['address'], $colIndex );
            $helpExport->setStyle_11_TNR_N_L ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'A' . $rowIndex, 'C' . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'E' . $rowIndex, 'G' . $rowIndex );
        }

		$sheet->getStyle ( 'A' . $rowStart . ':' . 'H' . $rowIndex )->getBorders ()->getOutline ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
		$sheet->getStyle ( 'A' . $rowStart . ':' . 'H' . $rowIndex )->getBorders ()->getInside ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );

        ////set dinh dang giay a5 cho ban in ra////////////
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setOrientation ( PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE );
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setPaperSize ( PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4 );
        $pageMargin = $sheet->getPageMargins ();
		$pageMargin->setTop ( .5 );
		$pageMargin->setLeft ( 0.15 );
		$pageMargin->setRight ( 0.15 );
        header ( 'Content-Type: application/vnd.ms-excel' );
		header ( 'Content-Disposition: attachment;filename="Danh_sach_hoc_sinh.xlsx"' );
		header ( 'Cache-Control: max-age=0' );
		$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
		$objWriter->save ( 'php://output' );
    }
}
?>