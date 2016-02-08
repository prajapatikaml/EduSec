<?php

class StudentTransactionController extends EduSecCustom
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
	public function behaviors()
	    {
		return array(
		    'eexcelview'=>array(
		        'class'=>'ext.eexcelview.EExcelBehavior',
		    ),
		);
	    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionNewview($id)
	{
		$this->render('new_view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionFinalview($id)
	{
		$test=new StudentDocsTrans;
		$docs_model=new StudentDocsTrans('mysearch');
		$stu_record=new StudentAcademicRecordTrans('mysearch');
		$studentfeedback=new FeedbackDetailsTable('mysearch');
		$docs_model->unsetAttributes();  // clear any default values
		$stu_record->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentDocsTrans']))
			$docs_model->attributes=$_GET['StudentDocsTrans'];
		
		if(isset($_GET['StudentAcademicRecordTrans']))
			$stu_record->attributes=$_GET['StudentAcademicRecordTrans'];

		if(isset($_GET['FeedbackDetailsTable']))
			$studentfeedback->attributes=$_GET['FeedbackDetailsTable'];
		

		$this->render('final_view',array(
			'model'=>$this->loadModel($id),'docs_model'=>$docs_model,'test'=>$test,'stu_record'=>$stu_record,'studentfeedback'=>$studentfeedback
		));
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
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation(array($info,$model,$user));

		if(!empty($_POST['StudentTransaction']) || !empty($_POST['StudentInfo'] ))
		{
			
		$stud_roll_no = StudentInfo::model()->findAll();
	     if(Yii::app()->controller->action->id=='create'){
		if(empty($stud_roll_no))
		{
			$rollno=$info->student_roll_no=1;
		}
		else
		{
			//$rand=mt_rand(1,2000);
			foreach($stud_roll_no as $s)
			{
                    		$stud[]=$s['student_roll_no'];
				$rollno_m=MAX($stud)+1;
			}		
				if(StudentInfo::model()->exists('student_roll_no='.$rollno_m))
				{
					$rollno=$rollno_m+1;
				}
				else
				{
					$rollno=$rollno_m;
				}			
		}
	      }
	    else
		{
		
		}
		//echo $rollno; exit;
					
		
			
			
			/*$batch_id=$_POST['StudentTransaction']['student_transaction_batch_id'];
			$batch=Batch::model()->findByPk($batch_id);
			$course=$batch->course_id;
			$academic_year=AcademicTerm::model()->findByPk($course);
		
			$model->academic_term_period_id=$academic_year->academic_term_period_id;
			$model->course_id=$batch->course_id;
			$model->academic_term_id=$batch->academic_term_id; */
			$model->attributes=$_POST['StudentTransaction'];			
			$info->attributes=$_POST['StudentInfo'];
			$user->attributes=$_POST['User'];
					
			$info->student_created_by = Yii::app()->user->id;
			$info->student_creation_date = new CDbExpression('NOW()');
			$info->student_email_id_1=strtolower($user->user_organization_email_id);
			$info->student_adm_date = date('Y-m-d',strtotime($_POST['StudentInfo']['student_adm_date']));			
			$info->student_roll_no=$rollno;
			$info->passport_exp_date=date('Y-m-d',strtotime($_POST['StudentInfo']['passport_exp_date']));
			$user->user_organization_email_id = strtolower($info->student_email_id_1);
			$user->user_password =  md5($info->student_email_id_1.$info->student_email_id_1);
			$user->user_created_by =  Yii::app()->user->id;
			$user->user_creation_date = new CDbExpression('NOW()');
			$user->user_type = "student";
			
			if($info->save(false))  
			{  
				$user->save(false);
				$address->save(false);
				$lang->save(false); 						
				$photo->student_photos_path = "no-images";
				$photo->save();
			}
			//if(empty($model->student_transaction_batch_id))
			//$model->student_transaction_batch_id=0;
			//$model->academic_term_id=$_POST['StudentTransaction']['academic_term_id'];
			//$model->academic_term_period_id=$_POST['StudentTransaction']['academic_term_period_id'];
			$model->course_id=$_POST['StudentTransaction']['course_id'];	  
			$model->student_transaction_languages_known_id= $lang->languages_known_id;
			$model->student_transaction_student_id = $info->student_id;
			$model->student_transaction_user_id = $user->user_id;
			$model->student_transaction_student_address_id = $address->student_address_id;
			$model->student_transaction_student_photos_id = $photo->student_photos_id;
			$flag = Studentstatusmaster::model()->findByAttributes(array('status_name'=>'Regular'))->id;
			$model->student_transaction_detain_student_flag = 1;
			$model->save(false);
			
			StudentInfo::model()->updateByPk($model->student_transaction_student_id, array('student_info_transaction_id'=>$model->student_transaction_id));
			$auth_assign->itemname = 'Student';
			$auth_assign->userid = $user->user_id;
			$auth_assign->bizrule = '';
			$auth_assign->data = '';
			$auth_assign->save(true);	
			$this->redirect(array('update','id'=>$model->student_transaction_id));
		} //end of isset if
		else
		{
			$this->render('create',array(
			'model'=>$model,'info'=>$info,'user'=>$user
			));
		}
	}

	public function actionStudentMultipleDivisionAssign()
	{
		$model=new StudentTransaction('multipleDivBatchAssign');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentTransaction']))
			$model->attributes=$_GET['StudentTransaction']; 
                if(isset($_POST['StudentTransaction'])) {
		   $this->redirect(array('studentMultipleDivisionAssign', 'StudentTransaction[student_transaction_branch_id]'=>$_POST['StudentTransaction']['student_transaction_branch_id'], 'StudentTransaction[student_academic_term_name_id]'=>$_REQUEST['StudentTransaction']['student_academic_term_name_id']));
		}
		    
		$this->render('student_multiple_division_assign',array(
		'model'=>$model, 
		));
	}

	public function actionAssignDivBatch()
	{
		$divId = $_POST['Division']['division_name'];
		$batchId = $_POST['Batch']['batch_name'];
	       if(!empty($_POST['student_list']) && !empty($_POST['Division']['division_name']))
		{
			$list=$_POST['student_list'];			
			foreach($list as $l)
			{
				$model = StudentTransaction::model()->findByPk($l);
				$model->student_transaction_division_id=$divId;
				$model->student_transaction_batch_id=$batchId;			
				$model->save();
			}
		}
		$this->redirect(array('admin'));
	}

	public function actionUpdateprofiletab1($id)
	{
	
	   $model=$this->loadModel($id);
	   $user = User::model()->findByPk($model->student_transaction_user_id);
	   $info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
	   $address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);
	   $photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
	   $lang = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
      	   $studentdocstrans = new StudentDocsTrans;
	   $stud_qua = new StudentAcademicRecordTrans;
	   $studentcertificate=new StudentCertificateDetailsTable;
	   $yearModel=new Year;
	   $parent = '';
	   if(isset(Yii::app()->modules['parents']))
	   $parent = new ParentLogin;
	
	   $this->performAjaxValidation(array($info,$model));
	
	   if(isset($_POST['StudentTransaction'])){
		StudentTransaction::model()->updateByPk($id, 
	array(	
	'student_transaction_nationality_id'=>$_POST['StudentTransaction']['student_transaction_nationality_id'],
	));
	$adm = date("Y-m-d", strtotime($_POST['StudentInfo']['student_adm_date']));
	$birthdate = NULL;
	if($_POST['StudentInfo']['student_dob'] !=null && $_POST['StudentInfo']['student_dob']!=0000-00-00)  
	   $birthdate = date("Y-m-d",strtotime($_POST['StudentInfo']['student_dob']));
	else
	   $birthdate='';	
	   StudentInfo::model()->updateByPk($model->student_transaction_student_id, 
	array(
		'student_roll_no'=>$_POST['StudentInfo']['student_roll_no'],
		'student_adm_date'=>$adm,
		'title'=>$_POST['StudentInfo']['title'],
		'student_first_name'=>$_POST['StudentInfo']['student_first_name'],
		'student_middle_name'=>$_POST['StudentInfo']['student_middle_name'],
		'student_last_name'=>$_POST['StudentInfo']['student_last_name'],
		'student_gender'=>$_POST['StudentInfo']['student_gender'],
		'student_mobile_no'=>$_POST['StudentInfo']['student_mobile_no'],
		'student_dob'=>$birthdate,
		'student_email_id_1'=>$_POST['StudentInfo']['student_email_id_1'],
		));
		
		if( isset($_POST['StudentInfo'])) {
		//echo "hi"; 
		if($_POST['StudentInfo']['visa_exp_date'] !=null && $_POST['StudentInfo']['visa_exp_date']!=0000-00-00)	
		{	
		$visadate = date("Y-m-d", strtotime($_POST['StudentInfo']['visa_exp_date']));
		}
		else
		{
		$visadate='';
		}
		if($_POST['StudentInfo']['passport_exp_date'] !=null && $_POST['StudentInfo']['passport_exp_date']!=0000-00-00)
		{
		$passport_exp=date('Y-m-d',strtotime($_POST['StudentInfo']['passport_exp_date']));
		}
		else
		{
		$passport_exp='';
		}
		StudentInfo::model()->updateByPk($model->student_transaction_student_id, 
		array(
		'emergency_cont_name'=>($_POST['StudentInfo']['emergency_cont_name']),
		'emergency_cont_no'=>$_POST['StudentInfo']['emergency_cont_no'],
		'passport_no'=>$_POST['StudentInfo']['passport_no'],
		'visa_exp_date'=>$visadate,
		'passport_exp_date'=>$passport_exp,

		));
		if(isset($_POST['LanguagesKnown'])){
		//echo "hiddd";exit;

		$la=$_POST['LanguagesKnown']['languages_known1'];
		for($i=0;$i<count($la);$i++)
		{
		$la=$_POST['LanguagesKnown']['languages_known1'];
		
		}
	
		$tagss=implode(',',$la);
		echo $tagss."<br>";
		
		LanguagesKnown::model()->updateByPk($model->student_transaction_languages_known_id, 
		array(
		'languages_known1'=>$tagss,
		
		));
		
			}
		}
		
		$this->redirect(array('update','id'=>$id,'#'=>'tab_1'));
		}	
		
		$this->render('updateproftab1',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'user'=>$user,'lang'=>$lang,'studentdocstrans'=>$studentdocstrans, 'stud_qua'=>$stud_qua, 'flag'=>0, 'studentcertificate'=>$studentcertificate,'parent'=>$parent,'yearModel'=>$yearModel
		));
	}
	public function actionUpdateprofiletab2($id)
	{
	   $model=$this->loadModel($id);
	   $user = User::model()->findByPk($model->student_transaction_user_id);
	   $info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
	   $address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);
	   $photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
	   $lang = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
      	   $studentdocstrans = new StudentDocsTrans;
	   $stud_qua = new StudentAcademicRecordTrans;
	   $studentcertificate=new StudentCertificateDetailsTable;
	   $parent = '';
	   $yearModel=new Year;
	   if(isset(Yii::app()->modules['parents']))
	   $parent = new ParentLogin;

	    $this->performAjaxValidation(array($info,$parent));
		 if(isset($_POST['StudentInfo'])){

		StudentInfo::model()->updateByPk($model->student_transaction_student_id, 
		array(
		'student_guardian_name'=>$_POST['StudentInfo']['student_guardian_name'],
		'student_guardian_relation'=>$_POST['StudentInfo']['student_guardian_relation'],
		'student_guardian_qualification'=>$_POST['StudentInfo']['student_guardian_qualification'],
		'student_guardian_occupation'=>$_POST['StudentInfo']['student_guardian_occupation'],
		'student_guardian_income'=>$_POST['StudentInfo']['student_guardian_income'],
		'student_guardian_occupation_address'=>$_POST['StudentInfo']['student_guardian_occupation_address'],
		'student_guardian_home_address'=>$_POST['StudentInfo']['student_guardian_home_address'],
		'student_guardian_occupation_city'=>$_POST['StudentInfo']['student_guardian_occupation_city'],
		'student_guardian_city_pin'=>$_POST['StudentInfo']['student_guardian_city_pin'],
		'student_guardian_phoneno'=>$_POST['StudentInfo']['student_guardian_phoneno'],
		'student_guardian_mobile'=>$_POST['StudentInfo']['student_guardian_mobile'],
		));
		

		if(($model->student_transaction_parent_id == 0 || $model->student_transaction_parent_id == null) && isset(Yii::app()->modules['parents']))
		{
			$parent->attributes=$_POST['ParentLogin'];
			$parent->parent_user_name = strtolower($parent->parent_user_name);
			$parent->parent_password = md5($parent->parent_user_name.$parent->parent_user_name);
			$parent->created_by = Yii::app()->user->id;
			$parent->creation_date = new CDbExpression('NOW()');
			$parent->parent_organization_id =Yii::app()->user->getState('org_id');
			$parent->save();
			StudentTransaction::model()->updateByPk($id, array('student_transaction_parent_id'=>$parent->parent_id));
		}
		$this->redirect(array('update','id'=>$id,'#'=>'tab_3'));
		}
		
	   $this->render('updateproftab2',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'user'=>$user,'studentdocstrans'=>$studentdocstrans, 'stud_qua'=>$stud_qua, 'flag'=>0, 'studentcertificate'=>$studentcertificate,'parent'=>$parent,'yearModel'=>$yearModel
		));
		
	}	
	public function actionUpdateprofiletab3($id)
	{
	   $model=$this->loadModel($id);
	   $user = User::model()->findByPk($model->student_transaction_user_id);
	   $info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
	   $lang = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
      	   $studentdocstrans = new StudentDocsTrans;
	   $stud_qua = new StudentAcademicRecordTrans;
	   $studentcertificate=new StudentCertificateDetailsTable;
	   $parent = $visadate='';
	   if(isset(Yii::app()->modules['parents']))
	   $parent = new ParentLogin;
	   $yearModel=new Year;
	  
	   $this->performAjaxValidation(array($info,$lang));
		
	

		if( isset($_POST['StudentInfo'])) {
		//echo "hi"; 
		if($_POST['StudentInfo']['visa_exp_date'] !=null && $_POST['StudentInfo']['visa_exp_date']!=0000-00-00)	
		{	
		$visadate = date("Y-m-d", strtotime($_POST['StudentInfo']['visa_exp_date']));
		}
		else
		{
		$visadate='';
		}
		StudentInfo::model()->updateByPk($model->student_transaction_student_id, 
		array(
		'emergency_cont_name'=>($_POST['StudentInfo']['emergency_cont_name']),
		'emergency_cont_no'=>$_POST['StudentInfo']['emergency_cont_no'],
		'passport_no'=>$_POST['StudentInfo']['passport_no'],
		'visa_exp_date'=>$visadate,

		));
		if(isset($_POST['LanguagesKnown'])){
		//echo "hiddd";exit;

		$la=$_POST['LanguagesKnown']['languages_known1'];
		for($i=0;$i<count($la);$i++)
		{
		$la=$_POST['LanguagesKnown']['languages_known1'];
		
		}
	
		$tagss=implode(',',$la);
		echo $tagss."<br>";
		
		LanguagesKnown::model()->updateByPk($model->student_transaction_languages_known_id, 
		array(
		'languages_known1'=>$tagss,
		
		));
		
		}
		
		$this->redirect(array('update','id'=>$id,'#'=>'std-profile-view_tab_3'));
		}

		
		
 	      $this->render('updateproftab3',array(
			'model'=>$model,'info'=>$info,'user'=>$user,'lang'=>$lang, 'stud_qua'=>$stud_qua, 'flag'=>0, 'studentcertificate'=>$studentcertificate,'parent'=>$parent,'yearModel'=>$yearModel
		));
		
	}
	public function actionUpdateprofiletab4($id)
	{
	   $model=$this->loadModel($id);
	   $user = User::model()->findByPk($model->student_transaction_user_id);
	   $info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
	   $address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);
	   $photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
	   $lang = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
      	   $studentdocstrans = new StudentDocsTrans;
	   $stud_qua = new StudentAcademicRecordTrans;
	   $studentcertificate=new StudentCertificateDetailsTable;
	   $parent = '';
	   $yearModel=new Year;
	   if(isset(Yii::app()->modules['parents']))
	   $parent = new ParentLogin;

	   $this->performAjaxValidation(array($address));

		 if(isset($_POST['StudentAddress']['student_address_c_line1']) ){

		if($_POST['StudentAddress']){	
		   StudentAddress::model()->updateByPk($model->student_transaction_student_address_id, 
		array(
		'student_address_c_line1'=>$_POST['StudentAddress']['student_address_c_line1'],
		'student_address_c_line2'=>$_POST['StudentAddress']['student_address_c_line2'],
		'student_address_c_country'=>$_POST['StudentAddress']['student_address_c_country'],
		'student_address_c_state'=>$_POST['StudentAddress']['student_address_c_state'],
		'student_address_c_city'=>$_POST['StudentAddress']['student_address_c_city'],
		'student_address_c_pin'=>$_POST['StudentAddress']['student_address_c_pin'],
		'student_address_p_line1'=>$_POST['StudentAddress']['student_address_p_line1'],
		'student_address_p_line2'=>$_POST['StudentAddress']['student_address_p_line2'],
		'student_address_p_country'=>$_POST['StudentAddress']['student_address_p_country'],
		'student_address_p_state'=>$_POST['StudentAddress']['student_address_p_state'],
		'student_address_p_city'=>$_POST['StudentAddress']['student_address_p_city'],
		'student_address_p_pin'=>$_POST['StudentAddress']['student_address_p_pin'],
		//'student_c_address_phone'=>$_POST['StudentAddress']['student_c_address_phone'],
		//'student_c_address_mobile'=>$_POST['StudentAddress']['student_c_address_mobile'],
		'student_c_house_no'=>$_POST['StudentAddress']['student_c_house_no'],
		'student_p_house_no'=>$_POST['StudentAddress']['student_p_house_no'],
		'student_address_c_mobile'=>$_POST['StudentAddress']['student_address_c_mobile'],
		'student_address_c_phone'=>$_POST['StudentAddress']['student_address_c_phone'],
		'student_address_p_mobile'=>$_POST['StudentAddress']['student_address_p_mobile'],
		'student_address_p_phone'=>$_POST['StudentAddress']['student_address_p_phone'],
		
		));
		}
		else{
		    StudentAddress::model()->updateByPk($model->student_transaction_student_address_id, 
		array(
		'student_address_c_line1'=>$_POST['StudentAddress']['student_address_c_line1'],
		'student_address_c_line2'=>$_POST['StudentAddress']['student_address_c_line2'],
		'student_address_c_country'=>$_POST['StudentAddress']['student_address_c_country'],
		'student_address_c_city'=>$_POST['StudentAddress']['student_address_c_city'],
		'student_address_c_pin'=>$_POST['StudentAddress']['student_address_c_pin'],
		'student_address_c_state'=>$_POST['StudentAddress']['student_address_c_state'],
		'student_address_p_line1'=>$_POST['StudentAddress']['student_address_p_line1'],
		'student_address_p_line2'=>$_POST['StudentAddress']['student_address_p_line2'],
		'student_address_p_country'=>$_POST['StudentAddress']['student_address_p_country'],
		'student_address_p_state'=>$_POST['StudentAddress']['student_address_p_state'],
		'student_address_p_city'=>$_POST['StudentAddress']['student_address_p_city'],
		'student_address_p_pin'=>$_POST['StudentAddress']['student_address_p_pin'],
		//'student_c_address_phone'=>$_POST['StudentAddress']['student_c_address_phone'],
		//'student_c_address_mobile'=>$_POST['StudentAddress']['student_c_address_mobile'],
		'student_c_house_no'=>$_POST['StudentAddress']['student_c_house_no'],
		'student_p_house_no'=>$_POST['StudentAddress']['student_p_house_no'],
		'student_address_c_mobile'=>$_POST['StudentAddress']['student_address_c_mobile'],
		'student_address_c_phone'=>$_POST['StudentAddress']['student_address_c_phone'],
		'student_address_p_mobile'=>$_POST['StudentAddress']['student_address_p_mobile'],
		'student_address_p_phone'=>$_POST['StudentAddress']['student_address_p_phone'],
		));
		   }
		   $this->redirect(array('update','id'=>$id, '#'=>'tab_4'));	
		}
		 $this->render('updateproftab4',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'user'=>$user,'lang'=>$lang,'studentdocstrans'=>$studentdocstrans, 'stud_qua'=>$stud_qua, 'flag'=>0, 'studentcertificate'=>$studentcertificate,'parent'=>$parent,'yearModel'=>$yearModel
		));
		
	}
public function actionUpdateprofiletab5($id) // For Academic Details
{
	   $model=$this->loadModel($id);
	   $user = User::model()->findByPk($model->student_transaction_user_id);
	   $info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
	   $stud_qua = new StudentAcademicRecordTrans;
	   $parent = '';
	   $yearModel=new Year;
	   if(isset(Yii::app()->modules['parents']))
	   $parent = new ParentLogin;

	    $this->performAjaxValidation(array($info,$model));
		 if(isset($_POST['StudentInfo']) && isset($_POST['StudentTransaction'])){

	StudentInfo::model()->updateByPk($model->student_transaction_student_id, 
	array(
	'student_roll_no'=>$_POST['StudentInfo']['student_roll_no'],

	));
		if(empty($_POST['StudentTransaction']['academic_term_id']))
		{
			$aca_id='';
		}
		else
		{
			$aca_id=$_POST['StudentTransaction']['academic_term_id'];
		}

		if(empty($_POST['StudentTransaction']['academic_term_period_id']))
		{
			$aca_per_id='';
		}
		else
		{
			$aca_per_id=$_POST['StudentTransaction']['academic_term_period_id'];
		}
		StudentTransaction::model()->updateByPk($id, 
	array(	
	'academic_term_period_id'=>$aca_per_id,
	'academic_term_id'=>$aca_id,
	'student_transaction_batch_id'=>$_POST['StudentTransaction']['student_transaction_batch_id'],
	'course_id'=>$_POST['StudentTransaction']['course_id'],
	));		

		$this->redirect(array('update','id'=>$id,'#'=>'std-profile-view_tab_1'));
		}
		
	   $this->render('updateproftab5',array(
			'model'=>$model,'info'=>$info,'yearModel'=>$yearModel
		));
		
}	
	public function actionUpdateprofilephoto($id)
	{
		$stud_trans = StudentTransaction::model()->findByPk($id);
		$info = StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$id));
		$model=StudentPhotos::model()->findByPk($stud_trans->student_transaction_student_photos_id);
		$old_model=StudentPhotos::model()->findByPk($stud_trans->student_transaction_student_photos_id);

		
		 $this->performAjaxValidation($model);

		if(isset($_POST['StudentPhotos']))
		{
			$old_photo =  $model->student_photos_path;
			$model->student_photos_path = CUploadedFile::getInstance($model,'student_photos_path');
			$yearModel=new Year;
 			$_id=$stud_trans->student_transaction_id;
			if($model->student_photos_path == null)
			{
				$valid_photo = true;
			}
			else
			{
				$valid_photo = $model->validate();
			}
			
			if($valid_photo)
			{
				if($model->student_photos_path!=null)
				{				
					$newfname = '';
					$ext= substr(strrchr($model->student_photos_path,'.'),1);
								
					//following thing done for deleting previously uploaded photo
					$photo = $old_photo;
					$dir1 = Yii::getPathOfAlias('webroot').'/college_data/stud_images/';
					
					if(file_exists($dir1.$photo) && $photo!='no-images' ){
					chmod($dir1.$photo, 0777);
					unlink($dir1.$photo);		
					}		
					if($ext!=null)
					{				
						$newfname = $_id.'_'.$info->student_first_name.'_'.$info->student_info_transaction_id.'.'.$ext;
						$model->student_photos_path->saveAs(Yii::getPathOfAlias('webroot').'/college_data/stud_images/'.$model->student_photos_path = $newfname);
					}
					
					
					Yii::import("ext.EPhpThumb.EPhpThumb");
					$thumb=new EPhpThumb();
					$thumb->init(); //this is needed
					$thumb->create(Yii::getPathOfAlias('webroot').'/college_data/stud_images/'.$model->student_photos_path=$newfname)->resize(500,500)->save(Yii::getPathOfAlias('webroot').'/college_data/stud_images/'.$model->student_photos_path);
					$model->save(false);
				}
				$this->redirect(array('update','id'=>$id));
			}
			
		}

		$this->render('photo_form',array(
			'model'=>$model,
		));
	}

	public function actionStudentcertificate()
	{
	   $model=$this->loadModel($_REQUEST['id']);
	   $user = User::model()->findByPk($model->student_transaction_user_id);
	   $info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
	   $address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);
	   $photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
	   $lang = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
      	   $studentdocstrans = new StudentDocsTrans;
	   $stud_qua = new StudentAcademicRecordTrans;
	   $stud_feed = new FeedbackDetailsTable;
	   $studentcertificate=new StudentCertificateDetailsTable('Studentsearch');
	   $parent = '';
	   $yearModel=new Year;
	   $year=Year::model()->findByPk($model->student_transaction_batch_year);
	   if(isset(Yii::app()->modules['parents']))
	   $parent = new ParentLogin;
		
		$studentcertificate->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentCertificateDetailsTable']))
			$studentcertificate->attributes=$_GET['StudentCertificateDetailsTable'];

		 $this->render('update',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'user'=>$user,'lang'=>$lang,'studentdocstrans'=>$studentdocstrans, 'stud_qua'=>$stud_qua,'stud_feed'=>$stud_feed,'flag'=>0,'studentcertificate'=>$studentcertificate,'parent'=>$parent,'yearModel'=>$yearModel,'year'=>$year
		));
	}	
	
	public function actionStudentdocs()
	{
	   $model=$this->loadModel($_REQUEST['id']);
	   $user = User::model()->findByPk($model->student_transaction_user_id);
	   $info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
	   $address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);
	   $photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
	   $lang = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
	   $stud_qua = new StudentAcademicRecordTrans;
	   $studentcertificate=new StudentCertificateDetailsTable;
	   $studentdocstrans=new StudentDocsTrans('mysearch');
	   $parent = '';
	   $yearModel=new Year;
	   if(isset(Yii::app()->modules['parents']))
	   $parent = new ParentLogin;

	        $studentdocstrans->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentDocsTrans']))
			$studentdocstrans->attributes=$_GET['StudentDocsTrans'];

		$this->render('update',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'user'=>$user,'lang'=>$lang,'studentdocstrans'=>$studentdocstrans, 'stud_qua'=>$stud_qua, 'flag'=>0, 'studentcertificate'=>$studentcertificate,'parent'=>$parent,'yearModel'=>$yearModel
		));
	}
	public function actionStudentacademicrecord()
	{
	   $model=$this->loadModel($_REQUEST['id']);
	   $user = User::model()->findByPk($model->student_transaction_user_id);
	   $info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
	   $address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);
	   $photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
	   $lang = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
	   $stud_qua = new StudentAcademicRecordTrans;
	   $studentcertificate=new StudentCertificateDetailsTable;
	   $studentdocstrans=new StudentDocsTrans;
	   $stud_qua=new StudentAcademicRecordTrans('mysearch');
	   $parent = '';
	   $yearModel=new Year;
	   if(isset(Yii::app()->modules['parents']))
	   $parent = new ParentLogin;
	   $stud_qua->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentAcademicRecordTrans']))
			 $stud_qua->attributes=$_GET['StudentAcademicRecordTrans'];

		$this->render('update',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'user'=>$user,'lang'=>$lang,'studentdocstrans'=>$studentdocstrans, 'stud_qua'=>$stud_qua, 'flag'=>0, 'studentcertificate'=>$studentcertificate,'parent'=>$parent,'yearModel'=>$yearModel
		));
	}
	public function actionStudentperformance()
	{
	   $model=$this->loadModel($_REQUEST['id']);
	   $user = User::model()->findByPk($model->student_transaction_user_id);
	   $info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
	   $address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);
	   $photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
	   $lang = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
	   $stud_qua = new StudentAcademicRecordTrans;
	   $stud_feed = new FeedbackDetailsTable;
	   $studentcertificate=new StudentCertificateDetailsTable;
	   $studentdocstrans=new StudentDocsTrans;
	   $stud_qua=new StudentAcademicRecordTrans;
	   $stud_feed=new FeedbackDetailsTable('mysearch');
	   $parent = '';
	   $yearModel=new Year;
	   $year=Year::model()->findByPk($model->student_transaction_batch_year);
	   if(isset(Yii::app()->modules['parents']))
	   $parent = new ParentLogin;
		
	   $stud_feed->unsetAttributes();  // clear any default values
		if(isset($_GET['FeedbackDetailsTable']))
			$stud_feed->attributes=$_GET['FeedbackDetailsTable'];

		$this->render('update',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'user'=>$user,'lang'=>$lang,'studentdocstrans'=>$studentdocstrans, 'stud_qua'=>$stud_qua,'stud_feed'=>$stud_feed,'flag'=>0,'studentcertificate'=>$studentcertificate,'parent'=>$parent,'yearModel'=>$yearModel,'year'=>$year
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
	public function actionUpdate($id)
	{
	   	
		$model=$this->loadModel($id);
		$user = User::model()->findByPk($model->student_transaction_user_id);
		$info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
		$address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);
		$photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
		$old_photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
		$lang = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
		$studentdocstrans = new StudentDocsTrans;
		$stud_qua = new StudentAcademicRecordTrans;
		$studentcertificate=new StudentCertificateDetailsTable;
		$yearModel=new Year;
		$parent = '';
		if(isset(Yii::app()->modules['parents']))
		   $parent = new ParentLogin;

		$this->render('update',array(
			'model'=>$model,'info'=>$info,'yearModel'=>$yearModel, 'photo'=>$photo,'address'=>$address,'lang'=>$lang,'user'=>$user,'studentdocstrans'=>$studentdocstrans, 'stud_qua'=>$stud_qua,'flag'=>0,'studentcertificate'=>$studentcertificate,'parent'=>$parent
		));
				
	}

	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		$student_info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
		if($model->student_transaction_student_address_id != null)
		$address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);
		$stud_photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
		if($model->student_transaction_languages_known_id != null)		
		$lang_known = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
		$yearModel=new Year;
		//$assign_comp_model = assignCompanyUserTable::model()->findByPk($ass_comp->id);
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
					//chmod($dir1.$stud_photo->student_photos_path, 777);
					unlink($dir1.$stud_photo->student_photos_path);				
				}
			}
		}
		closedir($dh);
		if($model->delete()){
		$use_model = User::model()->findByPk($model->student_transaction_user_id)->delete();
		$stud_photo->delete();
		$student_info->delete();
		if($model->student_transaction_student_address_id != null)
		$address->delete();
		if($model->student_transaction_languages_known_id != null)
		$lang_known->delete();
		}
		//echo $model->student_transaction_student_id; exit;

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	
	/** Delete Photo of update profile*/
	public function actionPhotoDelete($id)
	{
		$model = $this->loadModel($id);
		$stud_photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
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
						//chmod($dir1.$stud_photo->student_photos_path, 777);
						unlink($dir1.$stud_photo->student_photos_path);	
						//$stud_photo->delete();
						$stud_photo->student_photos_path = "no-images";
						$stud_photo->save();			
					}
					else
					{
						$stud_photo->student_photos_path = "no-images";
						$stud_photo->save();			

					}
				}
			}
			closedir($dh);	
		$this->redirect(array('studentTransaction/update','id'=>$model->student_transaction_id));
		
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*$dataProvider=new CActiveDataProvider('StudentTransaction');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/

		$model=new StudentTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentTransaction']))
			$model->attributes=$_GET['StudentTransaction'];

		$this->render('admin',array(
			'model'=>$model,
		));


	}

	/**
	 * Manages all models.
	 */
	


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
	public function actionAllstudent()
	{
		$model=new StudentTransaction('allstudent');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentTransaction']))
			$model->attributes=$_GET['StudentTransaction'];

		$this->render('all_student',array(
			'model'=>$model,
		));	
	}
	public function actionStudentcontact()
	{
		$model=new StudentTransaction('allstudent');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentTransaction']))
			$model->attributes=$_GET['StudentTransaction'];

		$this->render('student_contact',array(
			'model'=>$model,
		));	
	}
	public function actionError()
	{
		$this->render('not_authorised');	
	}

	/*
	*For SHow students of particular batch
	*/
	public function actionBatchWiseStudents()
	{
		$model=new StudentTransaction('batchwisestudent');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentTransaction']))
			$model->attributes=$_GET['StudentTransaction'];

		$this->render('batchwise_student',array(
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
