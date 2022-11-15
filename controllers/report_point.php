<?php
class Report_point extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_point/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['fullname']) ? str_replace("$", " ", $_REQUEST['fullname']) : '';
        $department = isset($_REQUEST['department']) ? $_REQUEST['department'] : '';
        $subject = isset($_REQUEST['subject']) ? $_REQUEST['subject'] : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $type = $this->model->check_user_is_teacher($this->_Info[0]['id']);
        $jsonObj = $this->model->getFetObj($type, $this->_Info[0]['id'], $keyword, $subject, $department, $this->_Year[0]['id'], $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('report_point/content');
    }

    function export_xlsx(){
        $keyword = isset($_REQUEST['fullname']) ? str_replace("$", " ", $_REQUEST['fullname']) : '';
        $department = isset($_REQUEST['department']) ? $_REQUEST['department'] : '';
        $subject = isset($_REQUEST['subject']) ? $_REQUEST['subject'] : ''; $semester = $_REQUEST['semester'];
        $helpExport = new User_Excel ();
		$objReader = PHPExcel_IOFactory::createReader ( "Excel2007" );
		$colIndex = '';
		$rowIndex = 0;

        $objPHPExcel = new PHPExcel ();
		$sheet = $objPHPExcel->getActiveSheet ();
        //$objPHPExcel->getActiveSheet()->freezePane('D8');

		$sheet->setCellValue ( 'A1', 'Phòng GDĐT Long Biên' );
		$sheet->mergeCellsByColumnAndRow ( 0, 1, 2, 1 );
        $helpExport->setStyle_12_TNR_B_L ( $sheet, 'A1', 'A1' );
        $sheet->setCellValue ( 'A2', 'Trường THCS Long Biên' );
		$sheet->mergeCellsByColumnAndRow ( 0, 2, 2, 2 );
        $helpExport->setStyle_12_TNR_N_L ( $sheet, 'A2', 'A2' );

		$sheet->setCellValue ( 'D1', 'BẢNG ĐIỂM HỌC KỲ ');
		$sheet->mergeCellsByColumnAndRow ( 3, 1, 11, 1 );
		$helpExport->setStyle_12_TNR_B_C ( $sheet, 'D1', 'D1' );
        $sheet->setCellValue ( 'D2', $this->_Year[0]['title'].' - Học kỳ: '.$semester);
		$sheet->mergeCellsByColumnAndRow ( 3, 2, 11, 2 );
        $sheet->setCellValue ( 'D3', 'Môn học: '.$this->_Data->return_title_subject($subject));
		$sheet->mergeCellsByColumnAndRow ( 3, 3, 11, 3 );
		$helpExport->setStyle_12_TNR_N_C ( $sheet, 'D2', 'D3' );

		$rowStart = 5;
		$colStart = 'A';
		$rowIndex = $rowStart;
		$colIndex = $colStart;
		$sheet = $objPHPExcel->getActiveSheet ();
		// BEGIN set width for column
		$sheet->getColumnDimension ( 'A' )->setWidth ( 5 );
        $sheet->getColumnDimension ( 'B' )->setWidth ( 10 );
        $sheet->getColumnDimension ( 'C' )->setWidth ( 18 );
        $sheet->getColumnDimension ( 'D' )->setWidth ( 14 );
        $sheet->getColumnDimension ( 'E' )->setWidth ( 26 );
        $sheet->getColumnDimension ( 'F' )->setWidth ( 12 );
        $sheet->getColumnDimension ( 'G' )->setWidth ( 6 );
        $sheet->getColumnDimension ( 'H' )->setWidth ( 6 );
        $sheet->getColumnDimension ( 'I' )->setWidth ( 6 );
        $sheet->getColumnDimension ( 'J' )->setWidth ( 6 );
        $sheet->getColumnDimension ( 'K' )->setWidth ( 9 );
        $sheet->getColumnDimension ( 'L' )->setWidth ( 9 );

        $sheet->getRowDimension('1')->setRowHeight(23);
        $sheet->getRowDimension('2')->setRowHeight(23);
		// END set width for column
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'STT', $colIndex );
        $sheet->mergeCellsByColumnAndRow(0, $rowIndex, 0, ($rowIndex+1));
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Tên lớp', $colIndex );
        $sheet->mergeCellsByColumnAndRow(1, $rowIndex, 1, ($rowIndex+1));
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã học sinh', $colIndex );
        $sheet->mergeCellsByColumnAndRow(2, $rowIndex, 2, ($rowIndex+1));
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã định danh', $colIndex );
        $sheet->mergeCellsByColumnAndRow(3, $rowIndex, 3, ($rowIndex+1));
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Họ và tên', $colIndex );
        $sheet->mergeCellsByColumnAndRow(4, $rowIndex, 4, ($rowIndex+1));
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Ngày sinh', $colIndex );
        $sheet->mergeCellsByColumnAndRow(5, $rowIndex, 5, ($rowIndex+1));
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'ĐĐGtx', 'J' );
        $sheet->mergeCellsByColumnAndRow(6, $rowIndex, 9, $rowIndex);
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'ĐĐGgk', $colIndex );
        $sheet->mergeCellsByColumnAndRow(10, $rowIndex, 10, ($rowIndex+1));
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'ĐĐGck', $colIndex );
        $sheet->mergeCellsByColumnAndRow(11, $rowIndex, 11, ($rowIndex+1));
        $helpExport->setStyle_11_TNR_B_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );

        $sheet->setCellValue('G6', "1");
        $sheet->setCellValue('H6', "2");
        $sheet->setCellValue('I6', "3");
        $sheet->setCellValue('J6', "4");
        $helpExport->setStyle_11_TNR_B_C($sheet, 'G6', 'J6');

        $rowIndex += 2;
        $colIndex = $colStart;
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '1', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '2', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '3', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '4', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '5', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '6', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '7', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '8', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '9', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '10', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '11', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '12', $colIndex );
        $helpExport->setStyle_10_TNR_I_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
        
        $objPHPExcel->getActiveSheet()->getStyle('A7:L1177')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
        $type = $this->model->check_user_is_teacher($this->_Info[0]['id']);
        $jsonObj = $this->model->getFetObj_export($type, $this->_Info[0]['id'], $keyword, $subject, $department, $this->_Year[0]['id']);
        $i = 0;
        foreach($jsonObj as $rows){
            $i++;
            $rowIndex += 1;
            $colIndex = $colStart;
            //$objPHPExcel->getActiveSheet()->getStyle($colIndex.$rowIndex.':'.$colIndex.$rowIndex)->getAlignment()->setWrapText(true);
            $sheet->getRowDimension($rowIndex)->setRowHeight(23);
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $i, $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['department'], $colIndex );
            $colIndex = $helpExport->setValueAndTypeForSheet ( $sheet, $colIndex . $rowIndex, $rows['code'], PHPExcel_Cell_DataType::TYPE_STRING, $colIndex );
            $colIndex = $helpExport->setValueAndTypeForSheet ( $sheet, $colIndex . $rowIndex, $rows['code_csdl'], PHPExcel_Cell_DataType::TYPE_STRING, $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['fullname'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, date("d-m-Y", strtotime($rows['birthday'])), $colIndex );
            for($z = 1; $z <= 6; $z++){
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $this->_Data->return_point_of_student($z, $rows['id'], $this->_Year[0]['id'], $semester, $subject), $colIndex );
            }
            $helpExport->setStyle_11_TNR_N_L ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'A' . $rowIndex, 'D' . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'F' . $rowIndex, 'L' . $rowIndex );
        }

		$sheet->getStyle ( 'A' . $rowStart . ':' . 'L' . $rowIndex )->getBorders ()->getOutline ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
		$sheet->getStyle ( 'A' . $rowStart . ':' . 'L' . $rowIndex )->getBorders ()->getInside ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );

        ////set dinh dang giay a5 cho ban in ra////////////
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setOrientation ( PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT );
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setPaperSize ( PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4 );
        $pageMargin = $sheet->getPageMargins ();
		$pageMargin->setTop ( .5 );
		$pageMargin->setLeft ( 0.15 );
		$pageMargin->setRight ( 0.15 );
        header ( 'Content-Type: application/vnd.ms-excel' );
		header ( 'Content-Disposition: attachment;filename="Bang_diem_hoc_sinh_mon_'.str_replace("-", "_", $this->_Convert->vn2latin($this->_Data->return_title_subject($subject), true)).'.xlsx"' );
		header ( 'Cache-Control: max-age=0' );
		$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
		$objWriter->save ( 'php://output' );
    }

    function export_csdl(){
        $keyword = isset($_REQUEST['fullname']) ? str_replace("$", " ", $_REQUEST['fullname']) : '';
        $department = isset($_REQUEST['department']) ? $_REQUEST['department'] : '';
        $subject = isset($_REQUEST['subject']) ? $_REQUEST['subject'] : ''; $semester = $_REQUEST['semester'];
        $helpExport = new User_Excel ();
		$objReader = PHPExcel_IOFactory::createReader ( "Excel2007" );
		$colIndex = '';
		$rowIndex = 0;

        $objPHPExcel = new PHPExcel ();
		$sheet = $objPHPExcel->getActiveSheet ();
        //$objPHPExcel->getActiveSheet()->freezePane('D8');

		$sheet->setCellValue ( 'A1', 'Phòng GDĐT Long Biên' );
		$sheet->mergeCellsByColumnAndRow ( 0, 1, 2, 1 );
        $helpExport->setStyle_12_TNR_B_L ( $sheet, 'A1', 'A1' );
        $sheet->setCellValue ( 'A2', 'Trường THCS Long Biên' );
		$sheet->mergeCellsByColumnAndRow ( 0, 2, 2, 2 );
        $sheet->setCellValue ( 'A3', 'Lớp: '.$this->model->return_title_department($department) );
		$sheet->mergeCellsByColumnAndRow ( 0, 3, 2, 3 );
        $helpExport->setStyle_12_TNR_N_L ( $sheet, 'A2', 'A3' );

		$sheet->setCellValue ( 'D1', 'BẢNG ĐIỂM HỌC KỲ ');
		$sheet->mergeCellsByColumnAndRow ( 3, 1, 10, 1 );
		$helpExport->setStyle_12_TNR_B_C ( $sheet, 'D1', 'D1' );
        $sheet->setCellValue ( 'D2', $this->_Year[0]['title'].' - Học kỳ: '.$semester);
		$sheet->mergeCellsByColumnAndRow ( 3, 2, 10, 2 );
        $sheet->setCellValue ( 'D3', 'Môn học: '.$this->_Data->return_title_subject($subject));
		$sheet->mergeCellsByColumnAndRow ( 3, 3, 10, 3 );
		$helpExport->setStyle_12_TNR_N_C ( $sheet, 'D2', 'D3' );

		$rowStart = 5;
		$colStart = 'A';
		$rowIndex = $rowStart;
		$colIndex = $colStart;
		$sheet = $objPHPExcel->getActiveSheet ();
		// BEGIN set width for column
		$sheet->getColumnDimension ( 'A' )->setWidth ( 5 );
        $sheet->getColumnDimension ( 'B' )->setWidth ( 10 );
        //$sheet->getColumnDimension ( 'C' )->setWidth ( 18 );
        $sheet->getColumnDimension ( 'C' )->setWidth ( 14 );
        $sheet->getColumnDimension ( 'D' )->setWidth ( 26 );
        $sheet->getColumnDimension ( 'E' )->setWidth ( 12 );
        $sheet->getColumnDimension ( 'F' )->setWidth ( 6 );
        $sheet->getColumnDimension ( 'G' )->setWidth ( 6 );
        $sheet->getColumnDimension ( 'H' )->setWidth ( 6 );
        $sheet->getColumnDimension ( 'I' )->setWidth ( 6 );
        $sheet->getColumnDimension ( 'J' )->setWidth ( 9 );
        $sheet->getColumnDimension ( 'K' )->setWidth ( 9 );

        $sheet->getRowDimension('1')->setRowHeight(23);
        $sheet->getRowDimension('2')->setRowHeight(23);
		// END set width for column
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'STT', $colIndex );
        $sheet->mergeCellsByColumnAndRow(0, $rowIndex, 0, ($rowIndex+1));
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Tên lớp', $colIndex );
        $sheet->mergeCellsByColumnAndRow(1, $rowIndex, 1, ($rowIndex+1));
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã định danh', $colIndex );
        $sheet->mergeCellsByColumnAndRow(2, $rowIndex, 2, ($rowIndex+1));
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Họ và tên', $colIndex );
        $sheet->mergeCellsByColumnAndRow(3, $rowIndex, 3, ($rowIndex+1));
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Ngày sinh', $colIndex );
        $sheet->mergeCellsByColumnAndRow(4, $rowIndex, 4, ($rowIndex+1));
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'ĐĐGtx', 'I' );
        $sheet->mergeCellsByColumnAndRow(5, $rowIndex, 8, $rowIndex);
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'ĐĐGgk', $colIndex );
        $sheet->mergeCellsByColumnAndRow(9, $rowIndex, 9, ($rowIndex+1));
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'ĐĐGck', $colIndex );
        $sheet->mergeCellsByColumnAndRow(10, $rowIndex, 10, ($rowIndex+1));
        $helpExport->setStyle_11_TNR_B_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );

        $sheet->setCellValue('F6', "1");
        $sheet->setCellValue('G6', "2");
        $sheet->setCellValue('H6', "3");
        $sheet->setCellValue('I6', "4");
        $helpExport->setStyle_11_TNR_B_C($sheet, 'F6', 'I6');

        $rowIndex += 2;
        $colIndex = $colStart;
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '1', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '2', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '3', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '4', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '5', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '6', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '7', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '8', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '9', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '10', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, '11', $colIndex );
        $helpExport->setStyle_10_TNR_I_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
        
        $objPHPExcel->getActiveSheet()->getStyle('A7:K1177')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
        $type = $this->model->check_user_is_teacher($this->_Info[0]['id']);
        $jsonObj = $this->model->getFetObj_export($type, $this->_Info[0]['id'], $keyword, $subject, $department, $this->_Year[0]['id']);
        $i = 0;
        foreach($jsonObj as $rows){
            $i++;
            $rowIndex += 1;
            $colIndex = $colStart;
            //$objPHPExcel->getActiveSheet()->getStyle($colIndex.$rowIndex.':'.$colIndex.$rowIndex)->getAlignment()->setWrapText(true);
            $sheet->getRowDimension($rowIndex)->setRowHeight(23);
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $i, $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['department'], $colIndex );
            $colIndex = $helpExport->setValueAndTypeForSheet ( $sheet, $colIndex . $rowIndex, $rows['code_csdl'], PHPExcel_Cell_DataType::TYPE_STRING, $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['fullname'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, date("d/m/Y", strtotime($rows['birthday'])), $colIndex );
            for($z = 1; $z <= 6; $z++){
                $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $this->_Data->return_point_of_student($z, $rows['id'], $this->_Year[0]['id'], $semester, $subject), $colIndex );
            }
            $helpExport->setStyle_11_TNR_N_L ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'A' . $rowIndex, 'C' . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'E' . $rowIndex, 'K' . $rowIndex );
        }

		$sheet->getStyle ( 'A' . $rowStart . ':' . 'K' . $rowIndex )->getBorders ()->getOutline ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
		$sheet->getStyle ( 'A' . $rowStart . ':' . 'K' . $rowIndex )->getBorders ()->getInside ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );

        ////set dinh dang giay a5 cho ban in ra////////////
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setOrientation ( PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT );
		$objPHPExcel->getActiveSheet ()->getPageSetup ()->setPaperSize ( PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4 );
        $pageMargin = $sheet->getPageMargins ();
		$pageMargin->setTop ( .5 );
		$pageMargin->setLeft ( 0.15 );
		$pageMargin->setRight ( 0.15 );
        header ( 'Content-Type: application/vnd.ms-excel' );
		header ( 'Content-Disposition: attachment;filename="Bang_diem_hoc_sinh_mon_'.str_replace("-", "_", $this->_Convert->vn2latin($this->_Data->return_title_subject($subject), true)).'_'.str_replace("-", "_", $this->_Convert->vn2latin($this->model->return_title_department($department), true)).'.xlsx"' );
		header ( 'Cache-Control: max-age=0' );
		$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
		$objWriter->save ( 'php://output' );
    }
}
?>