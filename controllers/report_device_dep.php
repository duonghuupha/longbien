<?php
class Report_device_dep extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('report_device_dep/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15; 
        $id = (isset($_REQUEST['id']) && $_REQUEST['id'] != '') ? $_REQUEST['id'] : 0;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($id, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('report_device_dep/content');
    }

    function return_title(){
        $id = $_REQUEST['id'];
        $jsonObj = $this->model->get_title_department($id);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render('report_device_dep/return_title');
    }

    function qrcode(){
        $this->view->render('report_device_dep/qrcode');
    }

    function print_report(){
        $id = $_REQUEST['id']; $title = $this->model->get_title_department($id);
        $this->view->title = $title; $jsonObj = $this->model->getFetObj_export($id);
        $this->view->jsonObj = $jsonObj;
        $this->view->render('report_device_dep/print_report');
    }

    function export_xlsx(){
        $id = $_REQUEST['id']; $title = $this->model->get_title_department($id);
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
		$sheet->setCellValue ( 'A3', 'DANH SÁCH TRANG THIẾT BỊ - '.mb_strtoupper($title, 'utf8'));
		$sheet->mergeCellsByColumnAndRow ( 0, 3, 5, 3 );
		$helpExport->setStyle_14_TNR_B_C ( $sheet, 'A3', 'A3' );

		$rowStart = 5;
		$colStart = 'A';
		$rowIndex = $rowStart;
		$colIndex = $colStart;
		$sheet = $objPHPExcel->getActiveSheet ();
		// BEGIN set width for column
		$sheet->getColumnDimension ( 'A' )->setWidth ( 5 );
		$sheet->getColumnDimension ( 'B' )->setWidth ( 15 );
		$sheet->getColumnDimension ( 'C' )->setWidth ( 37 );
        $sheet->getColumnDimension ( 'D' )->setWidth ( 9 );
		$sheet->getColumnDimension ( 'E' )->setWidth ( 15 );
		$sheet->getColumnDimension ( 'F' )->setWidth ( 15 );
        $sheet->getRowDimension('3')->setRowHeight(25);
        $sheet->getRowDimension('5')->setRowHeight(30);
		// END set width for column
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'STT', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Mã TB', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Tên trang thiết bị', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Số con', $colIndex );
		$colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Danh mục', $colIndex );
        $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, 'Năm đưa vào sử dụng', $colIndex );
        $helpExport->setStyle_11_TNR_B_C ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );

        $jsonObj = $this->model->getFetObj_export($id);
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
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['code_d'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['title'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['sub_device'], $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $danhmuc, $colIndex );
            $colIndex = $helpExport->setValueForSheet ( $sheet, $colIndex . $rowIndex, $rows['year_work'], $colIndex );
            $helpExport->setStyle_12_TNR_N_L ( $sheet, $colStart . $rowIndex, $colIndex . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'A' . $rowIndex, 'B' . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'D' . $rowIndex, 'D' . $rowIndex );
            $helpExport->setStyle_Align_Center ( $sheet, 'F' . $rowIndex, 'F' . $rowIndex );
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
		header ( 'Content-Disposition: attachment;filename="So_trang_thiet_bi_'.str_replace("-", "_", $this->_Convert->vn2latin($title, true)).'.xlsx"' );
		header ( 'Cache-Control: max-age=0' );
		$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
		$objWriter->save ( 'php://output' );
    }
}
?>