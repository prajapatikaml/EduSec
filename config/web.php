<?php
/*****************************************************************************************
 * EduSec  Open Source Edition is a School / College management system developed by
 * RUDRA SOFTECH. Copyright (C) 2010-2015 RUDRA SOFTECH.

 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see http://www.gnu.org/licenses. 

 * You can contact RUDRA SOFTECH, 1st floor Geeta Ceramics, 
 * Opp. Thakkarnagar BRTS station, Ahmedbad - 382350, India or
 * at email address info@rudrasoftech.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * RUDRA SOFTECH" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by RUDRA SOFTECH".
 *****************************************************************************************/

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'EduSec',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
		'request' => [
			'cookieValidationKey' => 'JDqkJaMgIITAKcsJY6yvLQdM9jf7WghX',
		],
		'pdf'=>[
			'class'=>'app\components\ExportToPdf',
		],
		'excel'=>[
			'class'=>'app\components\ExportToExcel',
		],
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
		'getid'=>[
			'class'=>'app\components\GetUserId',
		],
		'authManager' => [
			'class' => 'yii\rbac\DbManager',
			'defaultRoles' => ['guest'],
		],
		'dateformatter'=>[
			'class'=>'app\components\DateFormat',
		],
		'user' => [
			'identityClass' => 'app\models\User',
			'enableAutoLogin' => false,
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'formatter' => [
			'dateFormat' => 'dd-MM-yyyy',
			'datetimeFormat' => 'php:d-m-Y H:i:s',
			'timeFormat' => 'php:H:i:s',
			'decimalSeparator' => ',',
			'thousandSeparator' => ' ',
			'currencyCode' => 'Rs.',
			'class' => 'yii\i18n\Formatter',
		],
        	'db' => require(__DIR__ . '/db.php'),
    ],
	
	'as access' => [
		'class' => 'mdm\admin\components\AccessControl',
		'allowActions' => [
			'site/*',
			'installation/*',
		]
	],
    'params' => $params,
    'modules' => [
	'course' => 'app\modules\course\CourseModule',
	'student' => 'app\modules\student\StudentModule',
	'employee' => 'app\modules\employee\EmployeeModule',
	'fees' => 'app\modules\fees\FeesModule',
	'report' => 'app\modules\report\Report',
	'dashboard' => 'app\modules\dashboard\DashboardModule',
	'rights' => [
        'class' => 'mdm\admin\Module',
	    'controllerMap' => [
                 'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'app\models\User',
                    'idField' => 'user_id', // id field of model User
		    'usernameField' => 'user_login_id', // username field of model User
                ],
            ],
        ],
    ],
];

if (YII_ENV_DEV) {
    //configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';
	
	$config['components']['assetManager'] = [
		'linkAssets' => true,
	];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
		'class'=>'yii\gii\Module',
		'allowedIPs'=>['127.0.0.1','192.168.1.*'],
    ];
}

return $config;
