<?php
// change the following paths if necessary
ini_set("memory_limit","1G");
ini_set("max_input_time","-1");
$yii=dirname(__FILE__).'/protected/yii/framework/yii.php';
//$config=dirname(__FILE__).'/protected/config/main.php';

ini_set("error_reporting","E_ALL & ~E_DEPRECATED");

// remove the following lines when in production mode

defined('YII_DEBUG') or define('YII_DEBUG',true);

// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
$filename = 'install.php';
$confile = 'dbconf.php';


if(file_exists(dirname(__FILE__).'/dbConfig/'.$filename)) {
	header('Location: '.$_SERVER['REQUEST_URI'].'dbConfig/'.$filename);
	exit();
}
else if (!file_exists(dirname(__FILE__).'/dbConfig/'.$confile)){
	header('Location: ' .$_SERVER['REQUEST_URI'].'configForm.php');
	exit();
}
else {
   $config=dirname(__FILE__).'/protected/config/main.php';
   Yii::createWebApplication($config)->run();
}

?>

