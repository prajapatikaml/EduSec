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
 * StuMasterController implements the CRUD actions for StuMaster model.
 *
 * @package EduSec.modules.student.controllers
 */

namespace app\modules\student\controllers;

use Yii;
use app\modules\student\models\StuMaster;
use app\modules\student\models\StuInfo;
use app\modules\student\models\StuGuardians;
use app\modules\student\models\StuAddress;
use app\modules\student\models\StuDocs;
use app\modules\student\models\StuMasterSearch;
use app\models\User;
use app\models\AuthAssignment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use kartik\widgets\Select2;
use app\models\Languages;

class StuMasterController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
		    'docs-download' => ['post'],
		    'delete-doc' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all StuMaster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StuMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StuMaster model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
	$model = $this->findModel($id);
	$info = StuInfo::findOne($model->stu_master_stu_info_id);
	$address = StuAddress::findOne($model->stu_master_stu_address_id);
	$guardian = new StuGuardians();
	$stu_docs = new StuDocs();
	$feesCatModel = new \app\modules\fees\models\FeesCollectCategory();
	$feesTranModel = new \app\modules\fees\models\FeesPaymentTransaction();

        return $this->render('view', [
            'model' => $model, 'info' => $info, 'address' => $address, 'guardian' => $guardian, 'stu_docs' => $stu_docs, 'feesTranModel'=>$feesTranModel, 'feesCatModel'=>$feesCatModel,
        ]);
    }

    /**
     * Creates a new StuMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StuMaster();
	$info = new StuInfo();
	$address = new StuAddress();
	$user =new User();
	$auth_assign = new AuthAssignment();

	if (Yii::$app->request->isAjax) {
		if($info->load(Yii::$app->request->post())) {
                	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                	return ActiveForm::validate($info);
		}
		if($model->load(Yii::$app->request->post())) {
                	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                	return ActiveForm::validate($model);
		}
       	}

	$stud_uniq_no = \app\modules\student\models\StuInfo::find()->max('stu_unique_id');
	$uniq_id = NULL;
	if(empty($stud_uniq_no)) {
		$uniq_id = $info->stu_unique_id = 1;
	}
	else {
		$chk_id = StuInfo::find()->where(['stu_unique_id' => $stud_uniq_no])->exists(); 
		if($chk_id)
			$uniq_id = $stud_uniq_no + 1;
		else
			$uniq_id = $stud_uniq_no;		
	}
	
        if($model->load(Yii::$app->request->post()) || $info->load(Yii::$app->request->post())) 
	{

		$login_id = \app\models\Organization::find()->one()->org_stu_prefix.$uniq_id;

		$model->attributes = $_POST['StuMaster'];			
		$info->attributes = $_POST['StuInfo'];

		$info->stu_dob = Yii::$app->dateformatter->getDateFormat($_POST['StuInfo']['stu_dob']);
		$info->stu_admission_date = Yii::$app->dateformatter->getDateFormat($_POST['StuInfo']['stu_admission_date']);
		if(empty($_POST['StuInfo']['stu_email_id']))
			$info->stu_email_id = NULL;
		else
			$info->stu_email_id = strtolower($_POST['StuInfo']['stu_email_id']);

		$user->user_login_id = $login_id;
		$user->user_password =  md5($user->user_login_id.$user->user_login_id); 
		$user->user_type = "S";
		$user->created_by = Yii::$app->getid->getId();
		$user->created_at = new \yii\db\Expression('NOW()');
		
		if($info->save(false))  
		{  
			$user->save(false);
			$address->save(false);
		}

		$model->stu_master_stu_address_id = $address->stu_address_id;
		$model->stu_master_stu_info_id = $info->stu_info_id;
		$model->stu_master_user_id = $user->user_id;
		$model->created_by = Yii::$app->getid->getId();
		$model->created_at = new \yii\db\Expression('NOW()');
		$model->save(false);

		$s_info = StuInfo::findOne($model->stu_master_stu_info_id);
		$s_info->stu_info_stu_master_id = $model->stu_master_id;
		$s_info->save(false);

		$auth_assign->item_name = 'Student';
		$auth_assign->user_id = $user->user_id;
		$auth_assign->created_at =  date_format(date_create(),'U');
		$auth_assign->save(false);
		
		if ($model->save()) {
			return $this->redirect(['view', 'id'=>$model->stu_master_id]);
		}
		else
			return $this->render('create', ['model' => $model, 'info' => $info, 'uniq_id'=>$uniq_id]);
        } else {
            return $this->render('create', [
                'model' => $model, 'info' => $info, 'uniq_id'=>$uniq_id
            ]);
        }
    }

    /**
     * Updates an existing StuMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate( $sid, $tab )
    {
        $model = $this->findModel($sid);
	$info = StuInfo::findOne($model->stu_master_stu_info_id);
	if(isset($_REQUEST['stu_guard_id']))
	$guard = StuGuardians::find()->where('guardia_stu_master_id ='.$model->stu_master_id.' AND stu_guardian_id = '.$_REQUEST['stu_guard_id'])->one();

	$address = StuAddress::findOne($model->stu_master_stu_address_id);

	if($tab == 'personal')
	{
		if($model->load(Yii::$app->request->post()) && $info->load(Yii::$app->request->post()))
		{
			$model->attributes = $_POST['StuMaster'];			
			$info->attributes = $_POST['StuInfo'];

			if(empty($_POST['StuInfo']['stu_email_id']))
				$info->stu_email_id = NULL;
			else
				$info->stu_email_id = strtolower($_POST['StuInfo']['stu_email_id']);

			$info->stu_dob = Yii::$app->dateformatter->getDateFormat($_POST['StuInfo']['stu_dob']);
			$model->updated_by = Yii::$app->getid->getId();
			$model->updated_at = new \yii\db\Expression('NOW()');
			
			if ($model->save() && $info->save()) {
				return $this->redirect(['view', 'id' => $model->stu_master_id, '#' => "personal"]);
			}
			else {
				return $this->render('personal_info', ['model' => $model, 'info' => $info,]);
			}
		}
		else
		return $this->render('personal_info', [
                'model' => $model, 'info' => $info,
            ]);	
	}
	else if($tab == 'academic')
	{
		if($model->load(Yii::$app->request->post()) && $info->load(Yii::$app->request->post()))
		{
			$model->attributes = $_POST['StuMaster'];			
			$info->attributes = $_POST['StuInfo'];
			$info->stu_admission_date = Yii::$app->dateformatter->getDateFormat($_POST['StuInfo']['stu_admission_date']);
			$model->updated_by = Yii::$app->getid->getId();
			$model->updated_at = new \yii\db\Expression('NOW()');
			
			if ($model->save() && $info->save(false)) {
				return $this->redirect(['view', 'id' => $model->stu_master_id, '#' => "academic"]);
			}
			else
				return $this->render('academic_info', ['model' => $model, 'info' => $info,]);
		}
		else
		return $this->render('academic_info', [
                'model' => $model, 'info' => $info,
            ]);
	}
	else if($tab == 'guardians')
	{
		if (Yii::$app->request->isAjax && $guard->load(Yii::$app->request->post())) {
                        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                        return ActiveForm::validate($guard);
         	}
		if($guard->load(Yii::$app->request->post()) || isset($_POST['StuGuardians']))
		{	
			$guard->attributes = $_POST['StuGuardians'];
			if(empty($_POST['StuGuardians']['guardian_email']))
				$guard->guardian_email = NULL;
			else
				$guard->guardian_email = strtolower($_POST['StuGuardians']['guardian_email']);		

			$guard->updated_by = Yii::$app->getid->getId();
			$guard->updated_at = new \yii\db\Expression('NOW()');
			
			if ($guard->save()) {
				return $this->redirect(['view', 'id' => $model->stu_master_id, '#' => "guardians"]);
			}
			else
				return $this->renderAjax('guardians_info', ['model' => $model, 'info' => $info, 'guard' => $guard]);
		}
		else 
		return $this->renderAjax('guardians_info', [
                'model' => $model, 'info' => $info, 'guard' => $guard
            ] );
	}
	else if($tab == 'address')
	{
		if($address->load(Yii::$app->request->post()))
		{
			$address->attributes = $_POST['StuAddress'];			
	
			if ($address->save()) {
				return $this->redirect(['view', 'id' => $model->stu_master_id, '#' => "address"]);
			}
			else
				return $this->render('address_info', ['model' => $model, 'info' => $info, 'address' => $address]);
		}
		else 
		return $this->render('address_info', [
                'model' => $model, 'info' => $info, 'address' => $address
            ]);
	}
        else {
            return $this->render('update', [
                'model' => $model, 'info' => $info,
            ]);
        }
    }

    public function actionAdddocs()
    {
	$stu_docs = new StuDocs();
	
	if ($stu_docs->load(Yii::$app->request->post())) {
	
		$stu_docs->attributes = $_POST['StuDocs'];

		if(!empty($_REQUEST['StuDocs']['stu_docs_path']))
		{
			$newFName = '';
			foreach($_REQUEST['StuDocs']['stu_docs_path'] as $k => $v) :
				$stu_docs->stu_docs_id = NULL;
				$stu_docs->isNewRecord = true;
				$stu_docs->stu_docs_path = UploadedFile::getInstance($stu_docs,'stu_docs_path['.$k.']');

			if(!empty($stu_docs->stu_docs_path))  {
				$ext= substr(strrchr($stu_docs->stu_docs_path, '.'), 1);
			
			if($ext != null)
			{
				$newFName = $_REQUEST['StuDocs']['stu_docs_stu_master_id'].'-'.($k).'-'.mt_rand(1, time()).'.'.$ext; 
				$stu_docs->stu_docs_path->saveAs(Yii::getAlias('@webroot').'/data/stu_docs/' .$stu_docs->stu_docs_path = $newFName);
			}
				$stu_docs->stu_docs_details = $_REQUEST['StuDocs']['stu_docs_details'][$k];
				$stu_docs->stu_docs_category_id = $_REQUEST['StuDocs']['stu_docs_category_id'][$k];
				$stu_docs->stu_docs_stu_master_id = $_REQUEST['StuDocs']['stu_docs_stu_master_id'];
				$stu_docs->created_by = Yii::$app->getid->getId();
				$stu_docs->stu_docs_submited_at = new \yii\db\Expression('NOW()');
				$stu_docs->save(false);
			}
			/*else  {
				if(count($stu_docs->stu_docs_path) == 0)
					\Yii::$app->session->setFlash('file_upload_err', 'Upload or Select atleast one File');
				else
					continue;
			} */
			endforeach;
		}
			return $this->redirect(['view', 'id' => $stu_docs->stu_docs_stu_master_id, '#' => 'documents']);
        }
    }
 
    public function actionAddguardian($sid)
    {
	$model = $this->findModel($sid);
	$guard = new StuGuardians();


	if ($guard->load(Yii::$app->request->post()) && !empty($_POST['StuGuardians']['guardian_name'])) {

		$guard->attributes = $_POST['StuGuardians'];

		if(empty($_POST['StuGuardians']['guardian_email']))
			$guard->guardian_email = NULL;
		else
			$guard->guardian_email = strtolower($_POST['StuGuardians']['guardian_email']);

		$guard->guardia_stu_master_id = $model->stu_master_id;
		$emg_cont = $guard->find()->where(['is_emg_contact' => 1, 'guardia_stu_master_id' => $model->stu_master_id, 'is_status' => 0])->exists();

		if($emg_cont)
		    $guard->is_emg_contact = 0;
		else
		    $guard->is_emg_contact = 1;

		$guard->created_by = Yii::$app->getid->getId();
		$guard->created_at = new \yii\db\Expression('NOW()');

		if ($guard->save()) {
			return $this->redirect(['stu-master/view', 'id' => $model->stu_master_id, '#' => "guardians"]);
		}
		else
			return $this->render('add_guardian', ['model' => $model, 'guard' => $guard,]);

	}
	return $this->render('add_guardian', [
                'model' => $model, 'guard' => $guard,
            ]);
	
    }

    public function actionChangeStatus( $stu_doc_id, $sid )
    {
	$model = StuDocs::find()->where('stu_docs_id = '.$stu_doc_id.' AND stu_docs_stu_master_id = '.$sid)->one();
	if($_REQUEST['d_status'] == 'APPROVED' && !empty($model))
		$model->stu_docs_status = 1;
	else if($_REQUEST['d_status'] == 'DISAPPROVED' && !empty($model))
		$model->stu_docs_status = 2;
	else
		$model->stu_docs_status = 0;

		$model->save(false);
	
        return $this->redirect(['view', 'id' => $sid, '#'=>'documents']);
    }

    public function actionEmgChangeStatus()
    {
	$guard = StuGuardians::find()->where('guardia_stu_master_id = '.$_REQUEST['sid'])->asArray()->all();
	
	foreach($guard as $gu) :
		if($gu['is_emg_contact'] == 1) {
			\Yii::$app->db->createCommand("UPDATE stu_guardians SET is_emg_contact =0 WHERE guardia_stu_master_id =".$_REQUEST['sid']." AND stu_guardian_id <> ".$_REQUEST['guard_id'])->execute();
		}
		else {
			\Yii::$app->db->createCommand("UPDATE stu_guardians SET is_emg_contact =1 WHERE guardia_stu_master_id =".$_REQUEST['sid']." AND stu_guardian_id = ".$_REQUEST['guard_id'])->execute();
		}	
	endforeach;
	
        //return $this->redirect(['view', 'id' => $sid]);
    }

    public function actionStuPhoto($sid)
    {
	$model = $this->findModel($sid);
	$info = StuInfo::findOne($model->stu_master_stu_info_id);
	$old_info = StuInfo::findOne($model->stu_master_stu_info_id);
	$info->scenario = 'photo-upload';

	if($info->load(Yii::$app->request->post()))
	{
		$info->attributes = $_POST['StuInfo'];	
		$info->stu_photo = UploadedFile::getInstance($info,'stu_photo');
		$old_photo = $old_info->stu_photo;
		$model->updated_by = Yii::$app->getid->getId();
		$model->updated_at = new \yii\db\Expression('NOW()');
		
	    if($info->stu_photo == NULL)
	    {
		$old_photo = $old_info->stu_photo;
	        $valid_photo = true;
	    }
	    else
	    {
	        $valid_photo = $info->validate();
	    }	
	    if($valid_photo)
	    {
	        if($info->stu_photo != NULL)
	        {   
		    $newfname = '';
	            $ext = substr(strrchr($info->stu_photo,'.'),1);
		    //following thing done for deleting previously uploaded photo
	            $photo = $old_photo;

		    $dir1 = Yii::getAlias('@webroot').'/data/stu_images/';
	            if(file_exists($dir1.$photo) && $photo != NULL) {
	            	unlink($dir1.$photo);        
	            }       
	            if($ext!=null)
	            {                
	                $newfname = $info->stu_first_name."_".$info->stu_unique_id.'.'.$ext;
	                $info->stu_photo->saveAs(Yii::getAlias('@webroot').'/data/stu_images/'.$info->stu_photo = $newfname);
	            }    
		}
	     }
	        if ($info->save(false)) {
			return $this->redirect(['view', 'id' => $model->stu_master_id]);
		}
		else
			return $this->renderAjax('photo_form', ['model' => $model, 'info' => $info, ]);
	    }
	    else 
		return $this->renderAjax('photo_form', ['model' => $model, 'info' => $info, ]);
    }

    public function actionDocsDownload( $stu_doc_id )
    {
	$path = Yii::getAlias('@webroot') . '/data/stu_docs/';
	$model = StuDocs::find()->where(['stu_docs_id' => $stu_doc_id])->one();
	$file = $path.$model->stu_docs_path;
	$ext = substr(strrchr($model->stu_docs_path,'.'),1);

	if(!empty($model) && file_exists($file)) {
		return Yii::$app->response->sendFile($file, date('Y-m-dHis').".".$ext);
	}
	else
		throw new NotFoundHttpException('The requested page does not exist.');	

    }
    /**
     * Deletes an existing StuMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();
	$model = StuMaster::findOne($id);
	$model->is_status = 2;
	$model->updated_by = Yii::$app->getid->getId();
	$model->updated_at = new \yii\db\Expression('NOW()');
	$model->update();
	
        return $this->redirect(['index']);
    }

    public function actionDeleteDoc($stu_doc_id)
    {
	$stu_docs = StuDocs::findOne($stu_doc_id);
	$path = Yii::getAlias('@webroot') . '/data/stu_docs/';

	if($stu_docs !== NULL) {
		unlink($path.$stu_docs->stu_docs_path);
        	$stu_docs->delete();
	}
	else
		throw new NotFoundHttpException('The requested page does not exist.');

        return $this->redirect(['view', 'id' => $stu_docs->stu_docs_stu_master_id, '#' => 'documents']);
    }

    /**
     * Finds the StuMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StuMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StuMaster::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
