<?php
include realpath('dbconf.php');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'EduSec College Management System',
	
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
		 'application.modules.transport.models.*',
		 'application.modules.hostel.models.*',
		 'application.modules.alumni.models.*',
		 'application.modules.notification.models.*',
		//'application.modules.hrms.components.*',
		'application.modules.exam.models.*',
		'application.modules.transport.models.*',
		'application.modules.mailbox.*',
		'application.modules.mailbox.models.*',
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
			'ipFilters'=>array('127.0.0.1','::1','192.168.0.153','192.168.0.154'),
		),
		'mailbox'=>
		    array(  
		    'userClass' => 'User',
		    'userIdColumn' => 'user_id',
		    'usernameColumn' => 'user_organization_email_id',
		    'newsUserId' => 'admin@rudrasoftech.com',
		 ),
		'assignment',
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
			//'userTypeColumn'=>'user_type',
			'enableBizRule'=>false,
			'enableBizRuleData'=>false,
			'displayDescription'=>true,
			'flashSuccessKey'=>'RightsSuccess',
			'flashErrorKey'=>'RightsError',
			'baseUrl'=>'/rights',
			'layout'=>'rights.views.layouts.main',
			'appLayout'=>'application.views.layouts.main',
			'cssFile'=>'rights.css',
			'debug'=>false,
			),
	),

	// application components
	'components'=>array(
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

		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
		
				
			 'gii'=>'gii',
		         'gii/<controller:\w+>'=>'gii/<controller>',
		         'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
			'<controller:\w+>/<id:\d+>'=>'<controller>/view',
			'<controller:\w+>/<action:\w+>/<id:\d+>/*'=>'<controller>/<action>',
			'<controller:\w+>/<action:\w+>'=>'<controller>/<action>', 
			'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			'<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',


			),
			'showScriptName'=>false,
		),
		

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
					'levels'=>'error, warning, trace, info',
					'categories'=>'system.*',

				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
               // this is used in contact page
               'adminEmail'=>'webmaster@example.com',
               'pageSize'=>25,
               'webRoot' => dirname(dirname(__FILE__).DIRECTORY_SEPARATOR.'..')
       ),
);
