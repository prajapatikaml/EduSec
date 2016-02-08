<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

class EmployeeTransactionController extends RController
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
		$model=new EmployeeTransaction;
		$info=new EmployeeInfo;
		$user =new User;
		$photo =new EmployeePhotos;
		$address=new EmployeeAddress;
		$lang=new LanguagesKnown;
		$auth_assign = new AuthAssignment;
		
		$this->performAjaxValidation(array($info,$model,$user));

		if(!empty($_POST['EmployeeTransaction']) || !empty($_POST['EmployeeInfo']))
		{
			$model->attributes=$_POST['EmployeeTransaction'];
			$info->attributes=$_POST['EmployeeInfo'];
			$user->attributes=$_POST['User'];			

			$doa = $info->employee_joining_date;
			$dateofadmission = date("Y-m-d", strtotime($doa));
			$info->employee_joining_date = $dateofadmission;
			
			$cardid_length = strlen((string) $info->employee_attendance_card_id);
			
			$cardid = $info->employee_attendance_card_id;
			$digit = 0;
			$diff = 10-$cardid_length;
			for($i=1;$i<=$diff;$i++)
			{
				$cardid = $digit.$cardid;
			}
			$info->employee_attendance_card_id = $cardid;
			$info->employee_private_email =strtolower($user->user_organization_email_id); 
			$info->employee_created_by = Yii::app()->user->id;
            		$info->employee_creation_date = new CDbExpression('NOW()');
			  $user->user_organization_email_id = $info->employee_private_email;
			  $user->user_password =  md5($info->employee_private_email.$info->employee_private_email);
			  $user->user_created_by =  Yii::app()->user->id;
			  $user->user_creation_date = new CDbExpression('NOW()');

			  $user->user_type = "employee";
			  if($info->save(false))  
			  {  
			        $user->save(false);
				$address->save(false);
				$lang->save(false);			
				$photo->employee_photos_path = "no-images" ;
				$photo->save(false);
			  }
			$model->employee_transaction_employee_id = $info->employee_id;
			$model->employee_transaction_user_id = $user->user_id;
			$model->employee_transaction_emp_photos_id = $photo->employee_photos_id;
	                $model->employee_transaction_emp_address_id = $address->employee_address_id;
			$model->employee_transaction_languages_known_id=$lang->languages_known_id;
			$model->employee_transaction_organization_id = Yii::app()->user->getState('org_id');
			$model->employee_status = 0;

		       	$model->save(false); 
			$auth_assign->itemname = 'Employee';
			$auth_assign->userid = $user->user_id;
			$auth_assign->save();

		        $this->redirect(array('update','id'=>$model->employee_transaction_id));

	 	}			 
		else
		{
			$this->render('create',array(
			'model'=>$model,'info'=>$info,'user'=>$user,
		));
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$info = EmployeeInfo::model()->findByPk($model->employee_transaction_employee_id);
		$address = EmployeeAddress::model()->findByPk($model->employee_transaction_emp_address_id);
		$photo = EmployeePhotos::model()->findByPk($model->employee_transaction_emp_photos_id);
		$lang = LanguagesKnown::model()->findByPk($model->employee_transaction_languages_known_id);

		$emp_doc = new EmployeeDocsTrans;
		$emp_record = new EmployeeAcademicRecordTrans('mysearch');
		$emp_exp = new EmployeeExperienceTrans;
		$emp_certificate = new EmployeeCertificateDetailsTable;

		
		 $this->render('update',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'emp_doc'=>$emp_doc,'emp_record'=>$emp_record,'emp_exp'=>$emp_exp,'flag'=>1,'emp_certificate'=>$emp_certificate
				));	    	
	
	}

	/**
	 * Update employee personal info.
	 * 
	 */
	public function actionUpdateTab1($id)
	{
		$model=$this->loadModel($id);
		$info = EmployeeInfo::model()->findByPk($model->employee_transaction_employee_id);
		$photo = EmployeePhotos::model()->findByPk($model->employee_transaction_emp_photos_id);
		$lang = LanguagesKnown::model()->findByPk($model->employee_transaction_languages_known_id);

		$this->performAjaxValidation(array($info,$model));
		
		if(isset($_POST['EmployeeTransaction'])) {
			EmployeeTransaction::model()->updateByPk($id,array(
			'employee_transaction_designation_id'=>$_POST['EmployeeTransaction']['employee_transaction_designation_id'],
			'employee_transaction_department_id'=>$_POST['EmployeeTransaction']['employee_transaction_department_id'],
			'employee_transaction_nationality_id'=>$_POST['EmployeeTransaction']['employee_transaction_nationality_id'],
			
		));
		
		if($_POST['EmployeeInfo']['employee_dob']!="")
		{
		$dateofbirth = date("Y-m-d", strtotime($_POST['EmployeeInfo']['employee_dob']));		
		}
		else
		   $dateofbirth = NULL;
		
		EmployeeInfo::model()->updateByPk($info->employee_id,array(
			'employee_no'=>$_POST['EmployeeInfo']['employee_no'],
			'employee_name_alias'=>$_POST['EmployeeInfo']['employee_name_alias'],
			'employee_joining_date'=>date("Y-m-d", strtotime($_POST['EmployeeInfo']['employee_joining_date'])),
			'title'=>$_POST['EmployeeInfo']['title'],
			'employee_first_name'=>$_POST['EmployeeInfo']['employee_first_name'],
			'employee_last_name'=>$_POST['EmployeeInfo']['employee_last_name'],
			'employee_dob'=>$dateofbirth,
			'employee_gender'=>$_POST['EmployeeInfo']['employee_gender'],
			'employee_bloodgroup'=>$_POST['EmployeeInfo']['employee_bloodgroup'],
			'employee_marital_status'=>$_POST['EmployeeInfo']['employee_marital_status'],
			'employee_type'=>$_POST['EmployeeInfo']['employee_type'],
			'employee_private_mobile'=>$_POST['EmployeeInfo']['employee_private_mobile'],
			'employee_private_email'=>$_POST['EmployeeInfo']['employee_private_email'],
			'employee_faculty_of'=>$_POST['EmployeeInfo']['employee_faculty_of'],
		));

		$lang->languages_known1=$_POST['LanguagesKnown']['languages_known1'];
		$lang->save();

	   if(isset($_POST['EmployeePhotos']))
            {
	      $old_photo = $photo->employee_photos_path;
              $photo->employee_photos_path = CUploadedFile::getInstance($photo,'employee_photos_path');
            if($photo->employee_photos_path == null)
            {
                $valid_photo = true;
            }
            else
            {
                $valid_photo = $photo->validate();
            }
          
            if($valid_photo)
            {
		 
                if($photo->employee_photos_path!=null)
                {    $newfname = '';
                    $ext= substr(strrchr($photo->employee_photos_path,'.'),1);
                    
                   
                    //following thing done for deleting previously uploaded photo
                    $photo1 = $old_photo;
                    $dir1 = Yii::getPathOfAlias('webroot').'/college_data/emp_images/';
                    
                   if(file_exists($dir1.$photo1) && $photo1!='no-images'){
                    unlink($dir1.$photo1);        
                    }       
                    if($ext!=null)
                    {    
			   
                        $newfname = $info->employee_attendance_card_id.'.'.$ext;
                        $photo->employee_photos_path->saveAs(Yii::getPathOfAlias('webroot').'/college_data/emp_images/'.$photo->employee_photos_path = $newfname);
                    }
                               
                    Yii::import("ext.EPhpThumb.EPhpThumb");
                    $thumb=new EPhpThumb();
                    $thumb->init(); //this is needed
                    $thumb->create(Yii::getPathOfAlias('webroot').'/college_data/emp_images/'.$photo->employee_photos_path=$newfname)->resize(500,500)->save(Yii::getPathOfAlias('webroot').'/college_data/emp_images/'.$photo->employee_photos_path);
		    $photo->save(false);                
		}
                
            }
            
        }
			$this->redirect(array('update','id'=>$id));
		}
		$this->render('updateproftab1',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'lang'=>$lang
		));
				
	}

	/**
	 * Update employee guardian info.
	 * 
	 */
	public function actionUpdateprofiletab2($id)
	{
		Yii::app()->clientScript->registerCssFile(
			  Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css');
		$model=$this->loadModel($id);
		$info = EmployeeInfo::model()->findByPk($model->employee_transaction_employee_id);

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation(array($info));
		
		if(isset($_POST['EmployeeInfo']))
		{
		$ph_no = null;
		$mo_no1 = null;
		$mo_no2 = null; 
		if($_POST['EmployeeInfo']['employee_guardian_phone_no'] !=null)
		   $ph_no = $_POST['EmployeeInfo']['employee_guardian_phone_no'];
		if($_POST['EmployeeInfo']['employee_guardian_mobile1'] !=null)
		   $mo_no1 = $_POST['EmployeeInfo']['employee_guardian_mobile1'];


		EmployeeInfo::model()->updateByPk($info->employee_id,array(
			'employee_guardian_name'=>$_POST['EmployeeInfo']['employee_guardian_name'],
			'employee_guardian_relation'=>$_POST['EmployeeInfo']['employee_guardian_relation'],

			'employee_guardian_phone_no'=>$ph_no,
			'employee_guardian_occupation'=>$_POST['EmployeeInfo']['employee_guardian_occupation'],
			'employee_guardian_income'=>$_POST['EmployeeInfo']['employee_guardian_income'],
			'employee_guardian_mobile1'=>$mo_no1,

			'employee_guardian_home_address'=>$_POST['EmployeeInfo']['employee_guardian_home_address'],
		));
			$this->redirect(array('update','id'=>$id));
		}
		$this->render('updateproftab2',array('model'=>$model,'info'=>$info,
		));
	}

	/**
	 * Update employee address info.
	 * 
	 */
	public function actionUpdateprofiletab3($id)
	{
		Yii::app()->clientScript->registerCssFile(
			  Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css');
		$model=$this->loadModel($id);
		$info = EmployeeInfo::model()->findByPk($model->employee_transaction_employee_id);

		$address = EmployeeAddress::model()->findByPk($model->employee_transaction_emp_address_id);

		$this->performAjaxValidation(array($address));
		if(isset($_POST['EmployeeAddress'])){

		EmployeeAddress::model()->UpdateByPk($model->employee_transaction_emp_address_id,array(
			'employee_address_c_line1'=>$_POST['EmployeeAddress']['employee_address_c_line1'],
			'employee_address_c_line2'=>$_POST['EmployeeAddress']['employee_address_c_line2'],
			'employee_address_c_country'=>$_POST['EmployeeAddress']['employee_address_c_country'],
			'employee_address_c_state'=>$_POST['EmployeeAddress']['employee_address_c_state'],
			'employee_address_c_city'=>$_POST['EmployeeAddress']['employee_address_c_city'],
			'employee_address_c_pincode'=>$_POST['EmployeeAddress']['employee_address_c_pincode'],
			
		));
		    $this->redirect(array('update','id'=>$id));
		}
		$this->render('updateproftab3',array(
			'model'=>$model,'info'=>$info,'address'=>$address,
	   ));	
	}

	/**
	 * Manage employee academic record details
	 * 
	 */
	public function actionEmployeeAcademicRecords()
	{
		Yii::app()->clientScript->registerCssFile(
			  Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css');
		$emp_record=new EmployeeAcademicRecordTrans('mysearch');
		$model=EmployeeTransaction::model()->findByPk($_REQUEST['id']);
	
		$emp_record->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeAcademicRecordTrans']))
			$emp_record->attributes=$_GET['EmployeeAcademicRecordTrans'];

		$this->render('/employeeAcademicRecordTrans/employeerecords',array(
			'model'=>$model,'emp_record'=>$emp_record));
	}

	/**
	 * Manage employee documents 
	 * 
	 */

	public function actionEmployeedocs()
	{
		Yii::app()->clientScript->registerCssFile(
			  Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css');
		$emp_doc=new EmployeeDocsTrans('mysearch');
		
		$model=EmployeeTransaction::model()->findByPk($_REQUEST['id']);
		
		$emp_doc->unsetAttributes();  // clear any default values

		if(isset($_GET['EmployeeDocsTrans']))
			$emp_doc->attributes=$_GET['EmployeeDocsTrans'];

		$this->render('/employeeDocsTrans/employeedocs',array(
			'model'=>$model,'emp_doc'=>$emp_doc));	
	}

	/**
	 * Manage employee certificates.
	 * 
	 */

	public function actionEmployeeCertificates()
	{
		$emp_certificate = new EmployeeCertificateDetailsTable('Employeesearch');
		$emp_doc=new EmployeeDocsTrans;
		$emp_record=new EmployeeAcademicRecordTrans;
		$model=EmployeeTransaction::model()->findByPk($_REQUEST['id']);
		$info = EmployeeInfo::model()->findByPk($model->employee_transaction_employee_id);
		$photo = EmployeePhotos::model()->findByPk($model->employee_transaction_emp_photos_id);
		$lang = LanguagesKnown::model()->findByPk($model->employee_transaction_languages_known_id);
		$emp_exp = new EmployeeExperienceTrans;
		$address = EmployeeAddress::model()->findByPk($model->employee_transaction_emp_address_id);
		
		$emp_certificate->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeCertificateDetailsTable']))
			$emp_certificate->attributes=$_GET['EmployeeCertificateDetailsTable'];

		$this->render('update',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'emp_doc'=>$emp_doc,'emp_record'=>$emp_record,'emp_exp'=>$emp_exp,'flag'=>1,'emp_certificate'=>$emp_certificate
		));
	}

	/**
	 * Manage employee experience details
	 * 
	 */

	public function actionEmployeeExperience()
	{
		$emp_exp=new EmployeeExperienceTrans('mysearch');
		
		$emp_certificate = new EmployeeCertificateDetailsTable;
		$emp_doc=new EmployeeDocsTrans;
		$emp_record=new EmployeeAcademicRecordTrans;
		$model=EmployeeTransaction::model()->findByPk($_REQUEST['id']);
		$info = EmployeeInfo::model()->findByPk($model->employee_transaction_employee_id);
		$photo = EmployeePhotos::model()->findByPk($model->employee_transaction_emp_photos_id);
		$lang = LanguagesKnown::model()->findByPk($model->employee_transaction_languages_known_id);
		$address = EmployeeAddress::model()->findByPk($model->employee_transaction_emp_address_id);
		
		$emp_exp->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeExperienceTrans']))
			$emp_exp->attributes=$_GET['EmployeeExperienceTrans'];

		$this->render('update',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'emp_doc'=>$emp_doc,'emp_record'=>$emp_record,'emp_exp'=>$emp_exp,'flag'=>1,'emp_certificate'=>$emp_certificate
		));
	}

	/**
	 * Delete all the info related to employee like personal info, address info, other info. 
	 * 
	 */

	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			$model = $this->loadModel($id);
			$employee_info = EmployeeInfo::model()->findByPk($model->employee_transaction_employee_id);
			if($model->employee_transaction_emp_address_id != null)
			$address = EmployeeAddress::model()->findByPk($model->employee_transaction_emp_address_id);
			$emp_photo = EmployeePhotos::model()->findByPk($model->employee_transaction_emp_photos_id);	
			if($model->employee_transaction_languages_known_id != null)	
			$lang_known = LanguagesKnown::model()->findByPk($model->employee_transaction_languages_known_id);
			
			$dir1 = Yii::getPathOfAlias('webroot').'/college_data/emp_images/';
			if($dh = opendir($dir1))
			{
				if($emp_photo->employee_photos_path == "no-images")
				{

				}
				else
				{
					if(file_exists($dir1.$emp_photo->employee_photos_path))
					{
						chmod($dir1.$emp_photo->employee_photos_path, 777);
						unlink($dir1.$emp_photo->employee_photos_path);				
					}
				}
			}
			closedir($dh);
			if($this->loadModel($id)->delete()){
			$use_model = User::model()->findByPk($model->employee_transaction_user_id)->delete();
			$emp_photo->delete();
			$employee_info->delete();
			if($model->employee_transaction_emp_address_id != null)
			$address->delete();
			if($model->employee_transaction_languages_known_id != null)	
			$lang_known->delete();
			EmployeeAcademicRecordTrans::model()->deleteAll(" 	employee_academic_record_trans_user_id= :empId", array(':empId'=>$id));
			EmployeeDocsTrans::model()->deleteAll("employee_docs_trans_user_id = :empId", array(':empId'=>$id));
			}
			
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * List all models.
	 */
	public function actionIndex()
	{
		$model=new EmployeeTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeTransaction']))
			$model->attributes=$_GET['EmployeeTransaction'];

		$this->render('admin',array(
			'model'=>$model,
		));


	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EmployeeTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeTransaction']))
			$model->attributes=$_GET['EmployeeTransaction'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=EmployeeTransaction::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='employee-transaction-form')
		{
			echo CActiveForm::validate($models);
			Yii::app()->end();
		}
	}
	
	/*
	* Return state array for state dependent dropdown in form.
	*/
	public function actionUpdateCStates()
	{
		    
		    $data = State::model()->findAll(array('condition'=>'country_id='.(int) $_REQUEST['EmployeeAddress']['employee_address_c_country']));
		    $data = CHtml::listData($data,'state_id','state_name');
		    foreach($data as $value=>$name)
			{
		        echo CHtml::tag('option', 
				array('value'=>$value),CHtml::encode($name),true);
	 		}
	 }
}
