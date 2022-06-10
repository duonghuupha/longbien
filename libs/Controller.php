<?php
class Controller {
    private $_Data;
    private $_Info;
    private $_Convert;
	function __construct() {
		$this->view = new View();
        $this->_Data = new Model();
        @$this->_Info = $_SESSION['data'];
        $this->_Convert = new Convert();
	}

	public function loadModel($name) {
		$path = 'models/'.$name.'_model.php';

		if (file_exists($path)) {
			require 'models/'.$name.'_model.php';
			$modelName = $name . '_Model';
			$this->model = new $modelName();
		}
	}

	public function PhadhInt(){
        Session::init();
        $logged = Session::get('loggedIn');
        if($logged == false){
            session_start();
            //Session::destroy();
            session_destroy();
            header ('Location: '.URL.'/index/login');
            exit;
        }else{
            if(isset($_REQUEST['url'])){
                $url = $_REQUEST['url'];
            }else{
                $url = "index";
            }
            
        }
    }
}
?>
