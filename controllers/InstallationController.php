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

/**
 * InstallationController implements the CRUD actions for Installation model.
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use yii\base\ErrorException;



class InstallationController extends Controller
{
    public $layout = 'installation-layout';

    /**
     * Ruturn welcome page of application setup when application runnine first/no-institute found.
     * @return mixed
     */
    public function actionIndex()
    {
	$model = new \app\models\Installation();
	$model->scenario = 'agree';
	if(Yii::$app->request->post()) {
		if(isset($_REQUEST['return'])) 
			return $this->redirect(['institute-setup']);
		else
			return $this->redirect(['db-config']);
	}
        return $this->render('welcome', [
		'model'=>$model,
        ]);
    }

    /**
     * Ruturn database and host related setting.
     * @return mixed
     */
    public function actionDbConfig()
    {
	$chkDbFile = Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR.'db.php';
	if(file_exists($chkDbFile))
		return $this->goHome();

	$model = new \app\models\Installation();
	$model->scenario = 'dbConfig';
	if(isset($_POST['Installation']) && $model->load(Yii::$app->request->post())) {
	     $dbCheckResults = $model->dbSetup($model->db_host, $model->db_user, $model->db_password, $model->db_name);
	     if($dbCheckResults['status']) {
		$dbInstallPath = Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR.'db-install.php';
		$dbConfigPath = Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR;

		if(!file_exists($dbInstallPath)) {
			Yii::$app->session->setFlash('db-config-error', "File not found $dbInstallPath");
		} elseif(!is_writable($dbConfigPath)) {
			Yii::$app->session->setFlash('db-config-error', "Config directory must be writable by the Web server process.</br> <b>".$dbConfigPath."</b>");
		} else {
			$dbContent = file_get_contents($dbInstallPath);
			$searches = ['__DBHOST__', '__DBNAME__', '__DBUSER__',  '__DBPASSWORD__'];
			$replaces = [$model->db_host, $model->db_name, $model->db_user, $model->db_password];
			$dbContent = str_replace($searches, $replaces, $dbContent);
			
			if(@file_put_contents($dbConfigPath.'db.php', $dbContent)===false) {
				Yii::$app->session->setFlash('db-config-error', "Cannot write to file </br> <b>".$dbConfigPath."db.php</b>");
			} else {
				return $this->goHome();
			} 		    
		}

	     } else {
		Yii::$app->session->setFlash('db-config-error', $dbCheckResults['message']);
	     }

	}
        return $this->render('db-config', [
		'model'=>$model,
        ]);
    }

    /**
     * Import Edusec database.
     * @return mixed
     */
    public function actionDbImport()
    {
	$checkTbl = Yii::$app->db->schema->tableNames;
	if(!empty($checkTbl))
		return $this->redirect(['institute-setup']);

	$model = new \app\models\Installation();
	$model->scenario = 'dbImport';
	if(isset($_POST['Installation']) && $model->load(Yii::$app->request->post())) {
		if($model->is_demo_db) {
			$dbResults = $model->dbImport(true);
		} else {
			$dbResults = $model->dbImport();
		}

		if($dbResults['status']) {
			if($model->is_demo_db) {
				Yii::$app->session->setFlash('demo-db-success', "EduSec sample database import successfully !!!");
				return $this->redirect(['setup-completed']);
			} else {
				Yii::$app->session->setFlash('setup-completed-success', "EduSec empty database import successfully !!!");
				return $this->redirect(['institute-setup']);
			}	
		} else {
			Yii::$app->session->setFlash('db-import-error', $dbResults['message']);
		}
	}

        return $this->render('db-import', [
		'model'=>$model
        ]);	
    }

    /**
     * Ruturn institute-setup page if application is no-institute found.
     * @return mixed
     */
    public function actionInstituteSetup()
    {
	$chkInstituteTbl = \app\models\Organization::find()->exists();
	if($chkInstituteTbl)
		return $this->redirect(['user-setup']);

	$model = new \app\models\Organization();
	$model->scenario = 'insert';
	if(isset($_POST['Organization']) && $model->load(Yii::$app->request->post()))
	{
		$image_string = null;
		$model->attributes=$_POST['Organization'];
		$model->org_email = strtolower($_POST['Organization']['org_email']);
		$model->created_at = new \yii\db\Expression('NOW()');

		ob_start();
		if(!empty($_FILES['Organization']['tmp_name']['org_logo']))
		{

			$file = UploadedFile::getInstance($model,'org_logo');
			$model->org_logo_type = $file->type;
			$fp = fopen($file->tempName, 'r');
			$content = fread($fp, filesize($file->tempName));
			fclose($fp);

			if($model->org_logo_type == "image/png") 
			{
				$src_img = imagecreatefrompng($file->tempName);
				$dst_img = imagecreatetruecolor(90, 70);
				imagealphablending($dst_img, false);
				imagesavealpha($dst_img,true);
				$transparent = imagecolorallocatealpha($dst_img, 255, 255, 255, 127);
				imagefilledrectangle($dst_img, 0, 0, 90, 70, $transparent);
				imagecopyresampled($dst_img, $src_img, 0,0,0,0, 90, 70, imagesx($src_img), imagesy($src_img));
				imagepng($dst_img);                                
				ob_start();
				imagepng($dst_img);
				$image_string = ob_get_contents();
				ob_end_flush();
			}
			if($model->org_logo_type == "image/jpg" || $model->org_logo_type == "image/jpeg") 
			{

				$src_img = imagecreatefromjpeg($file->tempName);
				$dst_img = imagecreatetruecolor(90, 70);
				imagealphablending($dst_img, false);
				imagesavealpha($dst_img,true);
				$transparent = imagecolorallocatealpha($dst_img, 255, 255, 255, 127);
				imagefilledrectangle($dst_img, 0, 0, 90, 70, $transparent);
				imagecopyresampled($dst_img, $src_img, 0,0,0,0, 90, 70, imagesx($src_img), imagesy($src_img));
				imagejpeg($dst_img);                                
				ob_start();
				imagepng($dst_img);
				$image_string = ob_get_contents();
				ob_end_flush();
			}
			if($model->org_logo_type == "image/gif") 
			{

				$src_img = imagecreatefromgif($file->tempName);
				$dst_img = imagecreatetruecolor(90, 70);
				imagealphablending($dst_img, false);
				imagesavealpha($dst_img,true);
				$transparent = imagecolorallocatealpha($dst_img, 255, 255, 255, 127);
				imagefilledrectangle($dst_img, 0, 0, 90, 70, $transparent);
				imagecopyresampled($dst_img, $src_img, 0,0,0,0, 90, 70, imagesx($src_img), imagesy($src_img));
				imagepng($dst_img);                                
				ob_start();
				imagecreatefromgif($dst_img);
				$image_string = ob_get_contents();
				ob_end_flush();
			}
			$model->org_logo = $image_string;
		}
		if($model->save())
			return $this->redirect(['user-setup']);
	}
        return $this->render('institute-setup', [
		'model'=>$model	
        ]);
    }

    /**
     * Ruturn user-setup page if application no-user found.
     * @return mixed
     */
    public function actionUserSetup()
    {
	$chkUserTbl = \app\models\User::find()->exists();
	if($chkUserTbl)
		return $this->redirect(['setup-completed']);

	$model = new \app\models\User();
	$model->scenario = 'firstTime';
	$chkUserTbl = \app\models\User::find()->exists();
	if($chkUserTbl)
		return $this->redirect(['site/login']);	

	if ($model->load(Yii::$app->request->post())) {
	    $model->created_by = 1;
	    $model->created_at = new \yii\db\Expression('NOW()');
	    $model->user_login_id = $model->admin_user; 
	    $model->user_password = MD5($model->create_password.$model->create_password); 
	    $model->user_type = 'A'; 
	    if($model->save()) {
				$auth_assign = new \app\models\AuthAssignment();
				$auth_assign->item_name = 'SuperAdmin';
				$auth_assign->user_id = $model->user_id;
				$auth_assign->created_at =  date_format(date_create(),'U');
				if($auth_assign->save(false)) 
					return $this->redirect(['setup-completed']);
		}
    } 
        return $this->render('user-setup', [
		'model'=>$model	
        ]);
    }

    /**
     * Ruturn last installation setup page.
     * @return mixed
     */
    public function actionSetupCompleted()
    {
	if(Yii::$app->request->post()) {
		return $this->redirect(['site/login']);
	} 
	return $this->render('setup-completed', [

        ]);
    }
}
