<?php
class Physical_room extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('physical_room/index');
        require('layouts/footer.php');
    }

    function content(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword,  $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('physical_room/content');
    }

    function add(){
        $region = $_REQUEST['region']; $floor = $_REQUEST['floor'];
        $title = $_REQUEST['title'];
        $data = array('title' => $title, 'region' => $region, 'floor' => $floor, "user_id" => $this->_Info[0]['id'],
                        "create_at" => date("Y-m-d H:i:s"), "status" => 0);
        $temp = $this->model->addObj($data);
        if($temp){
            $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'add');
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("physical_room/add");
    }

    function update(){
        $id = $_REQUEST['id'];
        $region = $_REQUEST['region']; $floor = $_REQUEST['floor'];
        $title = $_REQUEST['title'];
        $data = array('title' => $title, 'region' => $region, 'floor' => $floor, "user_id" => $this->_Info[0]['id'],
                        "create_at" => date("Y-m-d H:i:s"));
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'edit');
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("physical_room/update");
    }

    function del(){
        $id = $_REQUEST['id']; $data = array("status" => 1);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'del');
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("physical_room/del");
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function form(){
        $this->view->render('physical_room/form');
    }

    function do_import(){
        $file = $_FILES['file']['tmp_name'];
        $objFile = PHPExcel_IOFactory::identify($file);
        $objData = PHPExcel_IOFactory::createReader($objFile);
        $objData->setReadDataOnly(true);
        $objPHPExcel = $objData->load($file);
        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $Totalrow = $sheet->getHighestRow();
        $LastColumn = $sheet->getHighestColumn();
        $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
        $data = [];
        for ($i = 4; $i <= $Totalrow; $i++) {
            for ($j = 1; $j < $TotalCol; $j++) {
                //$data[$i - 2][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                if($j == 1){
                    $region = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                }elseif($j == 2){
                    $floor = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                }elseif($j == 3){
                    $title = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                }
            }
            $data = array("title" => $title, 'region' => $region, 'floor' => $floor,
                            'user_id' => $this->_Info[0]['id'], 
                            'create_at' => date("Y-m-d H:i:s"), 'status' => 0);
            $this->model->addObj($data);
        }
        $this->_Log->save_log(date("Y-m-d H:i:s"), $this->_Info[0]['id'], 'imp');
        $jsonObj['msg'] = "Import dữ liệu thành công";
        $jsonObj['success'] = true;
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render('physical_room/do_import');
    }
}
?>
