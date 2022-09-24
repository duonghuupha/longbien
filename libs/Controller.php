<?php
class Controller {
    public $_Data;
    public $_Info;
    public $_Convert;
    public $_Year;
    public $_Log;
	function __construct() {
		$this->view = new View(); $this->_Data = new Model();
        $this->_Info = (isset($_SESSION['data'])) ? $_SESSION['data']: [];
        $this->_Convert = new Convert();
        $this->_Year = (isset($_SESSION['year'])) ? $_SESSION['year'] : [];
        $this->_Log = new Log();
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
            session_destroy();
            header ('Location: '.URL.'/index/login');
            exit;
        }else{
            if(isset($_REQUEST['url'])){
                $url = $_REQUEST['url'];
                $url = explode("/", $url);
                if($this->_Info[0]['id'] != 1){
                    if($url[0] != 'other' || $url[0] != 'notify' || $url[0] != 'dashboard'){
                        if($this->_Data->check_role_controller($this->_Info[0]['group_role_id'], $url[0]) == 0){
                            session_start();
                            session_destroy();
                            header ('Location: '.URL.'/index/login');
                            exit;
                        }
                    }
                }
            }else{
                $url = "index";
            }
            
        }
    }
}
?>
