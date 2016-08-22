<?php 

/*
	author: Robson Gomes
*/
session_start();
error_reporting(E_ALL);


define("DIR_FRAMEWORK",str_replace($_SERVER['DOCUMENT_ROOT'],"",str_replace("/".basename(__FILE__),"",str_replace("\\","/",__FILE__)))."/");
define("ROOT_PATH_SCRIPTS",str_replace("\\","/",dirname(__FILE__) ) );
define("ROOT_PATH", str_replace("\\","/",dirname(__FILE__) . "/" )) ;

require_once "System/System.class.php";
include_once ROOT_PATH_SCRIPTS.	"/Script/AcaoView.php";

new System($Load->ftmp."%");

exit;
?>
