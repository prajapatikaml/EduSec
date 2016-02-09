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
 * EmpMasterController implements the CRUD actions for EmpMaster model.
 *
 * @package EduSec.modules.employee.controllers
 */

namespace app\modules\employee\controllers;

use Yii;
use app\modules\employee\models\EmpMaster;
use app\modules\employee\models\EmpMasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\employee\models\EmpInfo;
use app\modules\employee\models\EmpAddress;
use app\modules\employee\models\EmpCategory;
use app\modules\employee\models\EmpDepartment;
use app\modules\employee\models\EmpDesignation;
use app\modules\employee\models\EmpStatus;
use app\models\Nationality;
use app\models\Languages;
use app\models\User;
use app\models\AuthAssignment;
use yii\helpers\Json;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use yii\web\UploadedFile;
use app\modules\employee\models\EmpDocs;
use yii\bootstrap\Modal;

class EmpMasterController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
		    'docs-download' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all EmpMaster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmpMaster model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
	$model = $this->findModel($id);
	$info = EmpInfo::findOne($model->emp_master_emp_info_id);
	$address = EmpAddress::findOne($model->emp_master_emp_address_id);
	$emp_docs = new EmpDocs();
        return $this->render('view', [
            'model' => $model, 'info' => $info, 'address' => $address,'emp_docs' =>$emp_docs,
        ]);
    }

    /**
     * Creates a new EmpMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
	$model = new EmpMaster();
	$info = new EmpInfo(); 
	$user = new User();
	$address = new EmpAddress(); 
	$auth_assign =new AuthAssignment();
	
	$empUniqueId = EmpInfo::find()->max('emp_unique_id');
	$empno = null;
	if(empty($empUniqueId)) {
		$empno = $info->emp_unique_id = 1;
	}
	else {
		$chkId = EmpInfo::find()->where(['emp_unique_id' => $empUniqueId])->exists(); 
		if($chkId)
			$empno = $empUniqueId + 1;
		else
			$empno = $empUniqueId;		
	}
	
	if ($model->load(Yii::$app->request->post()) && $info->load(Yii::$app->request->post())) {

		if (Yii::$app->request->isAjax) {
                	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                	return ActiveForm::validate($info);
 		}
		if (Yii::$app->request->isAjax) {
                	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                	return ActiveForm::validate($model);
 		}
		
		$model->attributes = $_POST['EmpMaster'];
		$info->attributes =$_POST['EmpInfo'];
		$info->emp_dob = Yii::$app->dateformatter->getDateFormat($_POST['EmpInfo']['emp_dob']);
		$info->emp_joining_date = Yii::$app->dateformatter->getDateFormat($_POST['EmpInfo']['emp_joining_date']);
		$info->emp_unique_id = $empno;
		if(empty($_POST['EmpInfo']['emp_email_id']))
			$info->emp_email_id =NULL;
		else
			$info->emp_email_id = strtolower($info->emp_email_id); 
		
		$user->user_login_id = \app\models\Organization::find()->one()->org_emp_prefix.$info->emp_unique_id;
		$user->user_password =  md5($user->user_login_id.$user->user_login_id);
		$user->user_type = "E";
		$user->created_by = Yii::$app->getid->getId();
		$user->created_at = new \yii\db\Expression('NOW()');

		if($info->save(false))  
		{  
			$user->save(false);
			$address->save(false);					
		}

		$model->emp_master_emp_address_id = $address->emp_address_id;
		$model->emp_master_emp_info_id = $info->emp_info_id;
		$model->emp_master_user_id = $user->user_id;
		$model->created_by = Yii::$app->getid->getId();
		$model->created_at= new \yii\db\Expression('NOW()');

		$model->save(false);
		$emp_info = EmpInfo::findOne($model->emp_master_emp_info_id);
		$emp_info->emp_info_emp_master_id = $model->emp_master_id;
		$emp_info->save(false);
		
		$auth_assign->item_name = 'Employee';
		$auth_assign->user_id = $user->user_id;
		$auth_assign->created_at =  date_format(date_create(),'U');
		$auth_assign->save(false);

		if($model->save(false))
           		 return $this->redirect(['view', 'id' => $model->emp_master_id]);
		else
			return $this->render('create', ['model' => $model,'info'=>$info,'user'=>$user, 'empno'=>$empno]);
        } else {
            return $this->render('create', [
                'model' => $model,'info' =>$info,'user'=>$user, 'empno'=>$empno
            ]);
        }
    }

    /**
     * Updates an existing EmpMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($empid,$tab)
    {
        $model = $this->findModel($empid);
	$info = EmpInfo::findOne($model->emp_master_emp_info_id);
	$address = EmpAddress::findOne($model->emp_master_emp_address_id);
	$emp_docs = new EmpDocs();
	if($tab == 'personal')
	{
		if ($info->load(Yii::$app->request->post()) && Yii::$app->request->isAjax) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			return ActiveForm::validate($info);
	 	}
		if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			return ActiveForm::validate($model);
		}
		if($model->load(Yii::$app->request->post()) || $info->load(Yii::$app->request->post()))
		{
			$model->attributes = $_POST['EmpMaster'];			
			$info->attributes = $_POST['EmpInfo'];

			if(empty($_POST['EmpInfo']['emp_email_id']))
				$info->emp_email_id = NULL;
			else
				$info->emp_email_id=$_POST['EmpInfo']['emp_email_id'];
			
			$info->emp_dob = Yii::$app->dateformatter->getDateFormat($_POST['EmpInfo']['emp_dob']);
			$info->emp_joining_date = Yii::$app->dateformatter->getDateFormat($_POST['EmpInfo']['emp_joining_date']);
			$model->updated_by = Yii::$app->getid->getId();
			$model->updated_at= new \yii\db\Expression('NOW()');

			if ($model->save() && $info->save()) {
				return $this->redirect(['view', 'id' => $model->emp_master_id ,'#' => "personal"]);
			}
			else
				return $this->render('emp_personal_info', ['model' => $model, 'info' => $info,]);
		}		
		else
			return $this->render('emp_personal_info', [
                		'model' => $model, 'info' => $info,
            			]);	
	 }
	 else if($tab == 'address')
	 {
		if($address->load(Yii::$app->request->post()))
		{
			$address->attributes = $_POST['EmpAddress'];			
			$model->updated_by = Yii::$app->getid->getId();
			$model->updated_at= new \yii\db\Expression('NOW()');
			if ($address->save()) {
				return $this->redirect(['view', 'id' => $model->emp_master_id,'#' => "address"]);
			}
			else
				return $this->render('emp_address', ['model' => $model, 'info' => $info, 'address' => $address,]);
		}
		else 
			return $this->render('emp_address', [
                		'model' => $model, 'info' => $info, 'address' => $address,
            		]);
	 }
	else if($tab == 'guardians')
	 {
		if($info->load(Yii::$app->request->post()) )
		{
			$info->attributes = $_POST['EmpInfo'];	
			if(empty($_POST['EmpInfo']['emp_guardian_email_id']))
				$info->emp_guardian_email_id = NULL;		
			$model->updated_by = Yii::$app->getid->getId();
			$model->updated_at= new \yii\db\Expression('NOW()');
			if ($info->save(false) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->emp_master_id,'#' => "guardians"]);
			}
			else
				return $this->render('emp_guardians', ['model' => $model, 'info' => $info, ]);
		}
		else 
			return $this->render('emp_guardians', [
                		'model' => $model, 'info' => $info,  ]);
	 }
	else if($tab == 'otherinfo')
	{			

		if($info->load(Yii::$app->request->post()))
		{
			$info->attributes = $_POST['EmpInfo'];	
			$model->updated_by = Yii::$app->getid->getId();
			$model->updated_at= new \yii\db\Expression('NOW()');			
			if(empty($_POST['EmpInfo']['emp_attendance_card_id']))	
				$info->emp_attendance_card_id = NULL;	
			
			if ($info->save() && $model->save()) {
				return $this->redirect(['view', 'id' => $model->emp_master_id,'#' => "otherinfo"]);
			}
			else {
				return $this->render('emp_otherinfo', ['model' => $model, 'info' => $info]);
			}
		}
		else 
		return $this->render('emp_otherinfo', ['model' => $model, 'info' => $info, ]);
	}
	else {
            return $this->render('update', [
                'model' => $model, 'info' => $info,
            ]);
        }
    }

/* -------------  update Employee's Profice picture ---------------  */
    public function actionEmpPhoto($eid)
    {
	$model = $this->findModel($eid);
	$info = EmpInfo::findOne($model->emp_master_emp_info_id);
	$info->scenario = 'photo-upload';
	$old_photo = $info->emp_photo;

	if($info->load(Yii::$app->request->post()))
	{	
		$info->attributes = $_POST['EmpInfo'];	
		$info->emp_photo = UploadedFile::getInstance($info,'emp_photo');	
		$model->updated_by = Yii::$app->getid->getId();
		$model->updated_at= new \yii\db\Expression('NOW()');			

		if($info->validate('emp_photo') && !empty($info->emp_photo))
		{ 				
			$ext= substr(strrchr($info->emp_photo,'.'),1);
			$photo = $old_photo;
			$dir1 = Yii::getAlias('@webroot').'/data/emp_images/';

			if(file_exists($dir1.$photo) && $photo!='no-photo' && $photo!= NULL) {
				unlink($dir1.$photo);        
			}
			if($ext!=null) { 
				$newfname = $info->emp_first_name.'_'.$info->emp_unique_id.'.'.$ext;
				$returnResults = $info->emp_photo->saveAs(Yii::getAlias('@webroot').'/data/emp_images/'.$info->emp_photo = $newfname);
				if($returnResults) {
					$info->save(false);
				} 
			}    
		}
		return $this->redirect(['view', 'id' => $model->emp_master_id]);  
	  }
	  return $this->renderAjax('photo_form', ['model' => $model, 'info' => $info, ]);
      }


   /** ************	   For Employee Add Documents     */
	
    public function actionAdddocs()
    {
	$emp_docs = new EmpDocs();

	if ($emp_docs->load(Yii::$app->request->post())) {
		$emp_docs->attributes = array_filter($_POST['EmpDocs']);
		if(!empty($_REQUEST['EmpDocs']['emp_docs_path']))
		{
			$newFName = '';
			foreach($_REQUEST['EmpDocs']['emp_docs_path'] as $k => $v) :

				$emp_docs->emp_docs_id = NULL;
				$emp_docs->isNewRecord = true;
				$emp_docs->emp_docs_path = UploadedFile::getInstance($emp_docs,'emp_docs_path['.$k.']');
			if(!empty($emp_docs->emp_docs_path))  {
				$ext= substr(strrchr($emp_docs->emp_docs_path, '.'), 1);
			
			if($ext != null)
			{
				$newFName = $_REQUEST['EmpDocs']['emp_docs_emp_master_id'].'-'.($k).'-'.mt_rand(1, time()).'.'.$ext; 
				$emp_docs->emp_docs_path->saveAs(Yii::getAlias('@webroot').'/data/emp_docs/' .$emp_docs->emp_docs_path = $newFName);
			}
				$emp_docs->emp_docs_details = $_REQUEST['EmpDocs']['emp_docs_details'][$k];
				$emp_docs->emp_docs_category_id = $_REQUEST['EmpDocs']['emp_docs_category_id'][$k];
				$emp_docs->emp_docs_emp_master_id = $_REQUEST['EmpDocs']['emp_docs_emp_master_id'];
				$emp_docs->created_by = Yii::$app->getid->getId();
				$emp_docs->emp_docs_submited_at = new \yii\db\Expression('NOW()');
				$emp_docs->save(false);
			}
						
			endforeach;
		}
			return $this->redirect(['view', 'id' => $emp_docs->emp_docs_emp_master_id,'#' => 'documents']);
        }
    }
	
    /**********************************************************************************
      Employee Documents Status Update action.emp_doc is the id of emp_doc table..
	"0" =>"Pending" By default Set as Pending.
        "1" =>"Disapproved"
        "2" =>"Approved"
   -************************************************************************************/
    public function actionChangeStatus( $emp_doc, $eid )
    {
	$model = EmpDocs::find()->where('emp_docs_id = '.$emp_doc.' AND emp_docs_emp_master_id = '.$eid)->one();
	if($_REQUEST['d_status'] == 'APPROVED' && !empty($model))
		$model->emp_docs_status = 1;
	else if($_REQUEST['d_status'] == 'DISAPPROVED' && !empty($model))
		$model->emp_docs_status = 2;
	else
		$model->emp_docs_status = 0;

		$model->save(false);
	
        return $this->redirect(['view', 'id' => $eid, '#'=>'documents']);
    }

    /* ---------  Downloading particular employee's allocated documents--------       */
    public function actionDocsDownload( $emp_doc_id )
    {
	$path = Yii::getAlias('@webroot') .'/data/emp_docs/';
	$model = EmpDocs::find()->where(['emp_docs_id' => $emp_doc_id])->one();
	$file = $path.$model->emp_docs_path;
	$ext = substr(strrchr($model->emp_docs_path,'.'),1);
	
	if(!empty($model) && file_exists($file)) {
		return Yii::$app->response->sendFile($file, date('Y-m-dHis').".".$ext);
	}
	else
		throw new NotFoundHttpException('The requested page does not exist.');	

    }
    /**
     * Deletes an existing EmpMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
       // $this->findModel($id)->delete();
	$model = EmpMaster::findOne($id);
	$model->is_status = 2;
	$model->updated_by = Yii::$app->getid->getId();
	$model->updated_at = new \yii\db\Expression('NOW()');
	$model->update();
	
        return $this->redirect(['index']);
    }

    /**********************************
	  Employee Document Delete action.  
	  emp_doc is the id of emp_docs table.
    *****************/

    public function actionDeleteDoc($emp_doc_id)
    {
	$emp_docs = EmpDocs::findOne($emp_doc_id);
	if($emp_docs !== NULL)
        	$emp_docs->delete();
	else
		throw new NotFoundHttpException('The requested page does not exist.');

        return $this->redirect(['view', 'id' => $emp_docs->emp_docs_emp_master_id,'#' => 'documents']);
    }


    /**
     * Finds the EmpMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EmpMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EmpMaster::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
