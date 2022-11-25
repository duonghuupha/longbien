<?php
class Report_proof extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_proof/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $quanlity = isset($_REQUEST['quan']) ? $_REQUEST['quan'] : '';
        $standard = isset($_REQUEST['stand']) ? $_REQUEST['stand'] : '';
        $criteria = isset($_REQUEST['criteria']) ? $_REQUEST['criteria'] : '';
        $code = isset($_REQUEST['code']) ? str_replace("$", " ", $_REQUEST['code']) : '';
        $title = isset($_REQUEST['title']) ? str_replace("$", " ", $_REQUEST['title']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($quanlity, $standard, $criteria, $code, $title, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('report_proof/content');
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function qrcode(){
        $this->view->render("report_proof/qrcode");
    }

    function combo_quan(){
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $jsonObj = $this->model->get_data_combo_quanlity($keyword);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("report_proof/combo_quan");
    }

    function combo_stand(){
        $id = $_REQUEST['id'];
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $jsonObj = $this->model->get_data_combo_standard($keyword, $id);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("report_proof/combo_stand");
    }

    function combo_criteria(){
        $id = $_REQUEST['id'];
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $jsonObj = $this->model->get_data_combo_criteria($keyword, $id);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("report_proof/combo_criteria");
    }
//////////////////////////////////////////////////////////////////////////////////////////////////
    function print_proof(){
        $quanlity = isset($_REQUEST['quan']) ? $_REQUEST['quan'] : '';
        $standard = isset($_REQUEST['stand']) ? $_REQUEST['stand'] : '';
        $criteria = isset($_REQUEST['criteria']) ? $_REQUEST['criteria'] : '';
        $code = isset($_REQUEST['code']) ? str_replace("$", " ", $_REQUEST['code']) : '';
        $title = isset($_REQUEST['title']) ? str_replace("$", " ", $_REQUEST['title']) : '';
        $jsonObj = $this->model->getFetObj_export($quanlity, $standard, $criteria, $code, $title);
        $this->view->jsonObj = $jsonObj;
        $this->view->render('report_proof/print_proof');
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////
    function export_xlsx(){
        $quanlity = isset($_REQUEST['quan']) ? $_REQUEST['quan'] : '';
        $standard = isset($_REQUEST['stand']) ? $_REQUEST['stand'] : '';
        $criteria = isset($_REQUEST['criteria']) ? $_REQUEST['criteria'] : '';
        $code = isset($_REQUEST['code']) ? str_replace("$", " ", $_REQUEST['code']) : '';
        $title = isset($_REQUEST['title']) ? str_replace("$", " ", $_REQUEST['title']) : '';
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
		$sheet->setCellValue ( 'A3', 'BÁO CÁO KIỂM ĐỊNH');
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
        $sheet->getColumnDimension ( 'C' )->setWidth ( 31 );
        $sheet->getColumnDimension ( 'D' )->setWidth ( 31 );
        $sheet->getColumnDimension ( 'E' )->setWidth ( 34 );
        $sheet->getColumnDimension ( 'F' )->setWidth ( 25 );
        $sheet->getColumnDimension ( 'G' )->setWidth ( 15 );
        $sheet->getRowDimension('3')->setRowHeight(25);
        $sheet->getRowDimension('5')->setRowHeight(27);
		// END set width for column
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'STT', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã hóa minh chứng', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Tiêu chuẩn', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Tiêu chí', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Tiêu đề', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Người tạo', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Cập nhật lần cuối', $colIndex );
        $helpExport->setStyle_11_TNR_B_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );

        $jsonObj = $this->model->getFetObj_export($quanlity, $standard, $criteria, $code, $title);
        $i = 0;
        foreach($jsonObj as $rows){
            $i++;
            $rowIndex += 1;
            $colIndex = $colStart;
            //$objPHPExcel->getActiveSheet()->getStyle($colIndex.$rowIndex.':'.$colIndex.$rowIndex)->getAlignment()->setWrapText(true);
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $i, $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['code_proof'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['standard'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['criteria'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['title'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['fullname'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, date("H:i:s \n d-m-Y",strtotime($rows['create_at'])), $colIndex );
            $helpExport->setStyle_11_TNR_N_L ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'A' . $rowIndex, 'B' . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'G' . $rowIndex, 'G' . $rowIndex );
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
		header ( 'Content-Disposition: attachment;filename="Bao_cao_kiem_dinh.xlsx"' );
		header ( 'Cache-Control: max-age=0' );
		$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
		$objWriter->save ( 'php://output' );
    }
}
?>