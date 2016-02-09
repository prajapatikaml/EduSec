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

namespace app\models;
use Yii;
use yii\base\Model;

/**
 * This is the model class for use only installation.
 */
class Installation extends Model
{
    public $db_host, $db_user, $db_name, $db_password;
    public $is_demo_db, $is_agree;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['db_host', 'db_user', 'db_name'], 'required', 'on'=>'dbConfig'],
	    [['db_password'], 'safe', 'on'=>'dbConfig'],
	    [['is_demo_db'], 'required', 'on'=>'dbImport', 'message'=>'Please select atleast one database'],
	    ['is_agree', 'required', 'on' => 'agree', 'requiredValue' => 1, 'message' => 'Please agree terms and conditions'],
	    [['db_password'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'db_host' => 'Database host',
            'db_user' => 'Database user',
	    'db_password' => 'Database password',
	    'db_name' => 'Database name',
	    'is_demo_db'=>'Select Database',
	    'is_agree'=>'I agree to these conditions?',
        ];
    }

    /**
     * @Check database connection and create database if any error is occurred to return error 
     * @return $dbResults;
     */
    public static function dbSetup($servername, $username, $password, $dbname)
    {
	try {
		$conn = new \PDO("mysql:host=$servername", $username, $password);
		$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		$conn->exec("CREATE DATABASE {$dbname} DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci") or die(print_r($dbh->errorInfo(), true));
		$dbResults = ['status'=>true, 'message'=>'Database setup successfully', 'data'=>$conn];
	}
	catch(\PDOException $e) {
		$dbResults = ['status'=>false, 'message'=>"<b>Error in database settings : </b><br>" . $e->getMessage(), 'data'=>false];
	}
	
	return $dbResults;
    }

    /**
     * @Check db file is create if create return db file content
     */
    public static function getDbConfig()
    {
        $dbConfigPath = Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR.'db.php';
	if(!file_exists($dbConfigPath)) {
		$results = ['status'=>false, 'message'=>'File is not found : '.$dbConfigPath,  'data'=>false];
	} else {
		$results = ['status'=>true, 'message'=>'Records Get Successfully', 'data'=>@include($dbConfigPath)];
	}

	return $results;
    }

    /**
     * @Get current connected database information into db.php
     */
    public static function initDb()
    {
	$db = NULL;
	$dbFileInfo = self::getDbConfig();
	if($dbFileInfo['status']) {
		$db = new \yii\db\Connection([
			'dsn' => $dbFileInfo['data']['dsn'],
			'username' => $dbFileInfo['data']['username'],
			'password' => $dbFileInfo['data']['password'],
			'charset' => $dbFileInfo['data']['charset'],
			'enableSchemaCache' => $dbFileInfo['data']['enableSchemaCache'],
		]);
	}
	return $db;
    }

    /**
     * @import edusec database
     */
    public static function dbImport($is_demo_db = false)
    {
	if($is_demo_db) {
		$dbPath = Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR.'edusec-sample-db.sql';
	} else {
		$dbPath = Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR.'edusec-empty-db.sql';
	}

	if(!file_exists($dbPath)) {
		$results = ['status'=>false, 'message'=>'File is not found : '.$dbPath];
	} else {
		$dbData = file_get_contents($dbPath);
		$command = Yii::$app->db->createCommand($dbData);
		$exResults = $command->execute();
		$results = ['status'=>true, 'message'=>$exResults];
	}

	return $results;	

    }

}
