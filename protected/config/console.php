<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
	// application components
	'components'=>array(
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		/*'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=hansaba_18_02_2013',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'ubuntu',
			'charset' => 'utf8',
		),*/
		'db'=>require('db.php'),	
	),
);
