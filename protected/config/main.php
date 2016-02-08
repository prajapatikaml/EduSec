<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
include realpath('dbConfig/dbconf.php');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'EduSec College Management System',
	'theme'=>'EduSec',
	
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.extensions.jtogglecolumn.*',
		
		'application.extensions.AjaxList.AjaxList',
		'application.components.*',

		'application.modules.rights.*',
		'application.modules.rights.components.*',
		
		'application.extensions.EMailTemplate.EMailTemplate',
		'application.modules.event.models.*',
		'application.modules.student.models.*',
		'application.modules.parents.models.*',
		'application.modules.employee.models.*',
		'application.modules.fees.models.*',
		'application.modules.timetable.models.*',
		'application.modules.inventory.models.*',
		'application.modules.visitor.models.*',
		'application.extensions.EAjaxUpload.*',
		'application.modules.assignment.models.*',
		 'application.modules.hrms.models.*',
		'application.modules.library.models.*',
		 'application.modules.transport.models.*',
		 'application.modules.hostel.models.*',
		 'application.modules.alumni.models.*',
		 'application.modules.notification.models.*',
		//'application.modules.hrms.components.*',
		'application.modules.exam.models.*',
		'application.modules.transport.models.*',
		'application.modules.mailbox.*',
		'application.modules.mailbox.models.*',
		'application.modules.backup.models.*',
		//'application.modules.importation.models.*',
		'application.extensions.html2pdf.*',
		'application.extensions.crontab.*',
			
	),
		
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'secure',
			'generatorPaths'=>array(
					'ext.gii-extended',
				),
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1','192.168.0.153','192.168.0.154,192.168.1.101'),
		),
		'assignment',
		'event',
		'notification',
		'hrms',
		'backup',
		'alumni',
		'exam',
		'timetable',
		'fees',
		'visitor',
                'inventory',
		'employee',
		'student',
		'parents',
		'transport',
		'webservice',
		'importation',
		'library',
		'hostel',
		'transport',	
		'rights'=>array(
			'install'=>false,
			'superuserName'=>'SuperAdmin',
			'authenticatedName'=>'Authenticated',
			'userIdColumn'=>'user_id',
			'userNameColumn'=>'user_organization_email_id',
			'enableBizRule'=>false,
			'enableBizRuleData'=>false,
			'displayDescription'=>true,
			'flashSuccessKey'=>'RightsSuccess',
			'flashErrorKey'=>'RightsError',
			'baseUrl'=>'/rights',
			'cssFile'=>'rights.css',
			'debug'=>false,
			),
	'mailbox'=>
		    array(  
		    'userClass' => 'User',
		  //  'userIdColumn' => 'id',
		    'userIdColumn' => 'user_id',
		    'usernameColumn' => 'user_organization_email_id',
		    //'usernameColumn' => 'username',
		    //'superuserColumn'=>'user_type',
		   // 'pageSize' => 50,
		    'newsUserId' => 'admin@rudrasoftech.com',
		      ),

	'wdcalendar'    => //array( 'admin' => 'install' ),
			array( 
				'embed'=>true,
                                'wd_options' => array(  
                                    'view' => 'month',
                                   // 'readonly' => 'JS:true' // execute JS
                                ) 
                           ),
	  

	),

	// application components
	'components'=>array(
	
	'ePdf' => array(
                          'class'=> 'ext.mpdf.EYiiPdf',
        		  'params'=> array(
                	                  'mpdf'=> array(
                			  'librarySourcePath' => 'application.extensions.mpdf.mpdf.*',
                			  'constants'=> array(
                    					'_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                					),
                			  'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
					/*'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
					    'mode'              => '', //  This parameter specifies the mode of the new document.
					    'format'            => 'A4', // format A4, A5, ...
					    'default_font_size' => 0, // Sets the default document font size in points (pt)
					    'default_font'      => '', // Sets the default font-family for the new document.
					    'mgl'               => 15, // margin_left. Sets the page margins for the new document.
					    'mgr'               => 15, // margin_right
					    'mgt'               => 16, // margin_top
					    'mgb'               => 16, // margin_bottom
					    'mgh'               => 9, // margin_header
					    'mgf'               => 9, // margin_footer
					    'orientation'       => 'P', // landscape or portrait orientation
					)*/
            					),
           
        				),
    			  ),

		
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class'=>'RWebUser',
		),

		'phpThumb'=>array(
		    'class'=>'ext.EPhpThumb.EPhpThumb',
		    
		),

		'authManager'=>array(
		'class'=>'RDbAuthManager',
		),
		
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
		
				
			 'gii'=>'gii',
		         'gii/<controller:\w+>'=>'gii/<controller>',
		         'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',

			//'<controller:(c1|c2|c3|gii)/>/<action:\w+>' => '<controller>/<action>',	
			'<controller:\w+>/<id:\d+>'=>'<controller>/view',
			'<controller:\w+>/<action:\w+>/<id:\d+>/*'=>'<controller>/<action>',

			'<controller:\w+>/<action:\w+>'=>'<controller>/<action>', 
                        
                         array('webservice/api/login', 'pattern'=>'webservice/api/<model:\w+>', 'verb'=>'POST'),				
			 array('webservice/api/list', 'pattern'=>'webservice/api/<model:\w+>/<uid:\d+>', 'verb'=>'GET'),
			 array('webservice/api/view', 'pattern'=>'webservice/api/<model:\w+>/<id:\d+>/<uid:\d+>', 'verb'=>'GET'),
			 array('webservice/api/update', 'pattern'=>'webservice/api/<model:\w+>/<id:\d+>', 'verb'=>'PUT'),
			 array('webservice/api/delete', 'pattern'=>'webservice/api/<model:\w+>/<id:\d+>', 'verb'=>'DELETE'),
			 array('webservice/api/create', 'pattern'=>'webservice/api/<model:\w+>', 'verb'=>'POST'),       		
			
        
			'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			'<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',


			),
			'showScriptName'=>false,
		),
		/*
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
	
		'db'=>array(
			'connectionString'=>'mysql:host='.$host.';dbname='.$dbName,
			'emulatePrepare' => true,
			'username' => $userName,
			'password' => $passWord,
			'charset' => 'utf8',	
			'tablePrefix' => 'tbl_',		
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
				    'errorAction'=>'site/error',
				),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
					'categories'=>'system.*',

				),
//				array(
//				    'class'=>'CEmailLogRoute',
//				    'levels'=>'error, warning',
//				    'emails'=>'karmraj@rudrasoftech.com',
//				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
               // this is used in contact page
               'adminEmail'=>'webmaster@example.com',
               'pageSize'=>10,
               'webRoot' => dirname(dirname(__FILE__).DIRECTORY_SEPARATOR.'..')
       ),
);
