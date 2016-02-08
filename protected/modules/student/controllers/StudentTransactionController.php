<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

class StudentTransactionController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}

	/**
	 * Get behaviors from eexcelview extension to export data.
	 */
	public function behaviors()
	    {
		return array(
		    'eexcelview'=>array(
		        'class'=>'ext.eexcelview.EExcelBehavior',
		    ),
		);
	    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new StudentTransaction;
		$info =new StudentInfo;
		$user =new User;
		$photo =new StudentPhotos;
		$address=new StudentAddress;
		$lang=new LanguagesKnown;
		$auth_assign = new AuthAssignment;
		$this->performAjaxValidation(array($info,$model,$user));

		if(!empty($_POST['StudentTransaction']) || !empty($_POST['StudentInfo']))
		{
			$model->attributes=$_POST['StudentTransaction'];
			$info->attributes=$_POST['StudentInfo'];
			$user->attributes=$_POST['User'];
		
			$info->student_created_by = Yii::app()->user->id;
			$info->student_creation_date = new CDbExpression('NOW()');
			$info->student_email_id_1=strtolower($user->user_organization_email_id);
			$info->student_adm_date = date('Y-m-d',strtotime($_POST['StudentInfo']['student_adm_date']));			

			$user->user_organization_email_id = strtolower($info->student_email_id_1);
			$user->user_password =  md5($info->student_email_id_1.$info->student_email_id_1);
			$user->user_created_by =  Yii::app()->user->id;
			$user->user_creation_date = new CDbExpression('NOW()');
			$user->user_organization_id = Yii::app()->user->getState('org_id');
			$user->user_type = "student";
			
			if($info->save(false))  
			{  
				$user->save(false);
				$address->save(false);
				$lang->save(false); 						
				$photo->student_photos_path = "no-images";
				$photo->save();
			}
			if(empty($model->student_transaction_batch_id))
			$model->student_transaction_batch_id=0;
	  
			$model->student_transaction_languages_known_id= $lang->languages_known_id;
			$model->student_transaction_student_id = $info->student_id;
			$model->student_transaction_user_id = $user->user_id;
			$model->student_transaction_student_address_id = $address->student_address_id;
			$model->student_transaction_student_photos_id = $photo->student_photos_id;
			$model->student_transaction_organization_id = Yii::app()->user->getState('org_id');
			$model->save();
			$auth_assign->itemname = 'Student';
			$auth_assign->userid = $user->user_id;
			$auth_assign->save();


			StudentInfo::model()->updateByPk($model->student_transaction_student_id, array('student_info_transaction_id'=>$model->student_transaction_id));

			$this->redirect(array('admin'));
		} 
		else
		{
			$this->render('create',array(
			'model'=>$model,'info'=>$info,'user'=>$user
			));
		}
	}

	/**
	 * Update student personal information
	 */
	public function actionUpdateprofiletab1($id)
	{
	
	   $model=$this->loadModel($id);
	   $user = User::model()->findByPk($model->student_transaction_user_id);
	   $info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
	   $address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);
	   $photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
	   $lang = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
	
	   $this->performAjaxValidation(array($info,$model));
	
	   if(isset($_POST['StudentTransaction'])){

	   StudentTransaction::model()->updateByPk($id, 
	array(
	'student_transaction_nationality_id'=>$_POST['StudentTransaction']['student_transaction_nationality_id'],
	'student_academic_term_period_tran_id'=>$_POST['StudentTransaction']['student_academic_term_period_tran_id'],
	'student_academic_term_name_id'=>$_POST['StudentTransaction']['student_academic_term_name_id'],
	'student_transaction_course_id'=>$_POST['StudentTransaction']['student_transaction_course_id']
));

	$adm = date("Y-m-d", strtotime($_POST['StudentInfo']['student_adm_date']));

	$birthdate = NULL;
	if($_POST['StudentInfo']['student_dob'] != '')  
	   $birthdate = date("Y-m-d",strtotime($_POST['StudentInfo']['student_dob']));

	   StudentInfo::model()->updateByPk($model->student_transaction_student_id, 
	array(
		'student_adm_date'=>$adm,
		'student_enroll_no'=>$_POST['StudentInfo']['student_enroll_no'],
		'title'=>$_POST['StudentInfo']['title'],
		'student_first_name'=>$_POST['StudentInfo']['student_first_name'],
		'student_last_name'=>$_POST['StudentInfo']['student_last_name'],
		'student_gender'=>$_POST['StudentInfo']['student_gender'],
		'student_mobile_no'=>$_POST['StudentInfo']['student_mobile_no'],
		'student_dob'=>$birthdate,
		'student_bloodgroup'=>$_POST['StudentInfo']['student_bloodgroup'],
		'student_email_id_1'=>$_POST['StudentInfo']['student_email_id_1'],
		));
		   LanguagesKnown::model()->updateByPk($model->student_transaction_languages_known_id, 
	array(
	'languages_known1'=>$_POST['LanguagesKnown']['languages_known1'],
	'languages_known2'=>$_POST['LanguagesKnown']['languages_known2']
));
		if(isset($_POST['StudentPhotos']))
		{	
			$old_photo =  $photo->student_photos_path;
			$photo->student_photos_path = CUploadedFile::getInstance($photo,'student_photos_path');
			if($photo->student_photos_path == null)
			{
				$valid_photo = true;
			}
			else
			{
				$valid_photo = $photo->validate();
			}
			
			if($valid_photo)
			{
				if($photo->student_photos_path!=null)
				{	
				
					$newfname = '';
					$ext= substr(strrchr($photo->student_photos_path,'.'),1);
					$photo1 = $old_photo;
					$dir1 = Yii::getPathOfAlias('webroot').'/college_data/stud_images/';
					
					if(file_exists($dir1.$photo1) && $photo1!='no-images' ){
					chmod($dir1.$photo1, 0777);
					unlink($dir1.$photo1);		
					}		
					if($ext!=null)
					{		
						$newfname = $info->student_enroll_no.'.'.$ext;
						$photo->student_photos_path->saveAs(Yii::getPathOfAlias('webroot').'/college_data/stud_images/'.$photo->student_photos_path = $newfname);
					}
					
					
					Yii::import("ext.EPhpThumb.EPhpThumb");
					$thumb=new EPhpThumb();
					$thumb->init(); //this is needed
					$thumb->create(Yii::getPathOfAlias('webroot').'/college_data/stud_images/'.$photo->student_photos_path=$newfname)->resize(500,500)->save(Yii::getPathOfAlias('webroot').'/college_data/stud_images/'.$photo->student_photos_path);
					$photo->save(false);
				}
			}
			
		}

		$this->redirect(array('update','id'=>$id));
		}	
		
		$this->render('updateproftab1',array(
			'model'=>$model,'info'=>$info, 'lang'=>$lang,'photo'=>$photo
		));
	}

	/**
	 * Update student guardian information
	 */

	public function actionUpdateprofiletab2($id)
	{
		Yii::app()->clientScript->registerCssFile(
			  Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css');
	   $model=$this->loadModel($id);
	   $user = User::model()->findByPk($model->student_transaction_user_id);
	   $info = StudentInfo::model()->findByPk($model->student_transaction_student_id);

	    $this->performAjaxValidation(array($info));
		 if(isset($_POST['StudentInfo'])){
		StudentInfo::model()->updateByPk($model->student_transaction_student_id, 
		array(
		'student_guardian_name'=>$_POST['StudentInfo']['student_guardian_name'],
		'student_guardian_relation'=>$_POST['StudentInfo']['student_guardian_relation'],
		'student_guardian_income'=>$_POST['StudentInfo']['student_guardian_income'],
		'student_guardian_occupation'=>$_POST['StudentInfo']['student_guardian_occupation'],
		'student_guardian_home_address'=>$_POST['StudentInfo']['student_guardian_home_address'],
		'student_guardian_phoneno'=>$_POST['StudentInfo']['student_guardian_phoneno'],
		'student_guardian_mobile'=>$_POST['StudentInfo']['student_guardian_mobile'],
		));
		
		$this->redirect(array('update','id'=>$id));
		}
		
	   $this->render('updateproftab2',array(
			'model'=>$model,'info'=>$info,
		));
		
	}	

	/**
	 * Update student address information
	 */

	public function actionUpdateprofiletab3($id)
	{
		Yii::app()->clientScript->registerCssFile(
			  Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css');
	   $model=$this->loadModel($id);
	   $info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
	   $address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);

	   $this->performAjaxValidation(array($address));



		 if(isset($_POST['StudentAddress']['student_address_c_line1']) ){
		   StudentAddress::model()->updateByPk($model->student_transaction_student_address_id, 
		array(
		'student_address_c_line1'=>$_POST['StudentAddress']['student_address_c_line1'],
		'student_address_c_line2'=>$_POST['StudentAddress']['student_address_c_line2'],
		'student_address_c_country'=>$_POST['StudentAddress']['student_address_c_country'],
		'student_address_c_state'=>$_POST['StudentAddress']['student_address_c_state'],
		'student_address_c_city'=>$_POST['StudentAddress']['student_address_c_city'],
		'student_address_c_pin'=>$_POST['StudentAddress']['student_address_c_pin'],
		));
	
		   $this->redirect(array('update','id'=>$id));	
		}
		 $this->render('updateproftab3',array(
			'model'=>$model,'info'=>$info, 'address'=>$address
		));
		
	}

	/**
	 * Manage student documents.
	 */

	public function actionStudentdocs()
	{
	   $studentdocstrans=new StudentDocsTrans('mysearch');
	Yii::app()->clientScript->registerCssFile(
			  Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css');

	    $studentdocstrans->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentDocsTrans']))
			$studentdocstrans->attributes=$_GET['StudentDocsTrans'];

		$this->render('/studentDocsTrans/studentdocstrans', array('studentdocstrans'=>$studentdocstrans));
	}

	/**
	 * Manage student academic records.
	 */

	public function actionStudentacademicrecord()
	{
	   $stud_qua=new StudentAcademicRecordTrans('mysearch');
	   $stud_qua->unsetAttributes();  // clear any default values
	   Yii::app()->clientScript->registerCssFile(
			  Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css');

		if(isset($_GET['StudentAcademicRecordTrans']))
			 $stud_qua->attributes=$_GET['StudentAcademicRecordTrans'];

		$this->render('/studentAcademicRecordTrans/studenntacademicrecord', array('stud_qua'=>$stud_qua
		));
	}
	


	/**`
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionImportationinstruction()
	{
		$model = new StudentTransaction;

		$this->render('importinstruction',array(
			'model'=>$model,
		));
		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
	   	
		$model=$this->loadModel($id);
		$user = User::model()->findByPk($model->student_transaction_user_id);
		$info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
		$address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);
		$photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
		$old_photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
		$lang = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
		$studentdocstrans = new StudentDocsTrans('mysearch');
		$stud_qua = new StudentAcademicRecordTrans('mysearch');


		$this->render('update',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'user'=>$user,'studentdocstrans'=>$studentdocstrans, 'stud_qua'=>$stud_qua, 'flag'=>0, 
		));
				
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page. 
	 * Also delete other info of student.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			$model = $this->loadModel($id);
			$student_info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
			if($model->student_transaction_student_address_id != null)
			$address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);
			$stud_photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
			if($model->student_transaction_languages_known_id != null)		
			$lang_known = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
			
			$dir1 = Yii::getPathOfAlias('webroot').'/college_data/stud_images/';
			if($dh = opendir($dir1))
			{
				if($stud_photo->student_photos_path == "no-images")
				{

				}
				else
				{
					if(file_exists($dir1.$stud_photo->student_photos_path))
					{
						unlink($dir1.$stud_photo->student_photos_path);				
					}
				}
			}
			closedir($dh);
			if($this->loadModel($id)->delete()){
			$use_model = User::model()->findByPk($model->student_transaction_user_id)->delete();
			$stud_photo->delete();
			$student_info->delete();
			if($model->student_transaction_student_address_id != null)
			$address->delete();
			if($model->student_transaction_languages_known_id != null)
			$lang_known->delete();
			StudentPaidFeesDetails::model()->deleteAll("student_paid_student_id = :studId", array(':studId'=>$id));
			StudentAcademicRecordTrans::model()->deleteAll("student_academic_record_trans_stud_id = :studId", array(':studId'=>$id));
			StudentDocsTrans::model()->deleteAll("student_docs_trans_user_id = :studId", array(':studId'=>$id));
			}

			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionAdmin()
	{
		$model=new StudentTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentTransaction']))
			$model->attributes=$_GET['StudentTransaction'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	public function actionError()
	{
		$this->render('not_authorised');	
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=StudentTransaction::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($models)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-transaction-form')
		{
			echo CActiveForm::validate($models);
			Yii::app()->end();
		}
	}
}
