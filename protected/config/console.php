<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
$app = include('main.php');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
	// application components
	'components'=>array(
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>$app['components']['db'],
	),
);

