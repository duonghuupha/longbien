<?php
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
// Use an autoloader!
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';
require 'libs/Convert.php';
require 'libs/Log.php';
// Library
require 'libs/Database.php';
require 'libs/Session.php';
require 'libs/config/paths.php';
require 'libs/config/database.php';
// Barcode
require 'libs/vendor/autoload.php';
include('libs/phpqrcode/qrlib.php'); 
/**
* PHPExcel_IOFactory
*/
require_once 'libs/PHPExcel/PHPExcel/IOFactory.php';
include ("libs/PHPExcel/PHPEXCHelper.php");
/**
* PHPExcel
*/
include 'libs/Excel.php';
require_once 'libs/PHPExcel/PHPExcel.php';
// Calendar
include('libs/Calendar.php');
$app = new Bootstrap();

?>
