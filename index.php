<?php

// change the following paths if necessary
ini_set("memory_limit","1G");
ini_set("max_input_time","-1");
ini_set("error_reporting","E_ALL & ~E_DEPRECATED");


$yii=dirname(__FILE__).'/protected/yii/framework/yii.php';


// remove the following lines when in production mode

defined('YII_DEBUG') or define('YII_DEBUG',false);

// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
	$app = split ("\/", $_SERVER["REQUEST_URI"]);
	$filename = 'install.php';
	$confile = 'dbconf.php';
	if (file_exists($filename)) {
		header('Location: ' . '/'.$app[1].'/'.$filename);
		exit();
	}
	else if (!file_exists($confile)){
		header('Location: ' . '/'.$app[1].'/configForm.php');
		exit();
	}
	else {
	   $config=dirname(__FILE__).'/protected/config/main.php';
	   Yii::createWebApplication($config)->run();
	}
?>

